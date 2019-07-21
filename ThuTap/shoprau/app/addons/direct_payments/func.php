<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

defined('BOOTSTRAP') or die('Access denied');

use Tygh\BlockManager\Layout;
use Tygh\BlockManager\Location;
use Tygh\Enum\Addons\DirectPayments\OrderDataTypes;
use Tygh\Enum\VendorPayoutApprovalStatuses;
use Tygh\Enum\VendorPayoutTypes;
use Tygh\Registry;
use Tygh\Tools\Url;
use Tygh\VendorPayouts;

function fn_direct_payments_install()
{
    db_query('UPDATE ?:vendor_payouts SET payment_company_id = company_id WHERE order_id <> 0');
}

/**
 * Removes direct_payments layout pages.
 */
function fn_direct_payments_uninstall()
{
    $layouts = Layout::instance()->getList();

    foreach ($layouts as $layout_data) {

        $location_manager = Location::instance($layout_data['layout_id']);

        foreach (array('cart', 'complete', '') as $mode) {

            $location_data = $location_manager->getList(array(
                'dispatch' => Url::buildUrn(array('separate_checkout', $mode)),
            ));
            if (!$location_data) {
                continue;
            }
            $location_data = reset($location_data);

            $location_manager->remove($location_data['location_id']);
        }
    }
}

/**
 * @see \fn_prepare_checkout_payment_methods().
 */
function fn_prepare_direct_payments_payment_methods(&$cart, &$auth, $lang_code = CART_LANGUAGE)
{
    static $payment_methods = array();
    static $payment_groups = array();

    if (isset($auth['user_type'])
        && $auth['user_type'] === 'V'
    ) {
        $vendor_id = 0;
    } else {
        $vendor_id = isset($cart['vendor_id']) ? $cart['vendor_id'] : null;
    }

    // Get payment methods
    if (empty($payment_methods[$vendor_id])) {

        $payments = fn_get_payments(array(
            'usergroup_ids' => $auth['usergroup_ids'],
            'company_id'    => $vendor_id,
        ));

        if (!$payments) {
            $payments = fn_get_payments(array(
                'usergroup_ids' => $auth['usergroup_ids'],
                'company_id'    => 0,
            ));
        }

        $payment_methods[$vendor_id] = $payments;

        $payment_groups[$vendor_id] = array();
    }

    // Check if payment method has surcharge rates
    foreach ($payment_methods[$vendor_id] as $id => &$payment) {

        if ($payment['processor_type'] == 'C') {
            continue;
        }

        $payment['surcharge_value'] = 0;
        if (floatval($payment['a_surcharge'])) {
            $payment['surcharge_value'] += $payment['a_surcharge'];
        }
        if (floatval($payment['p_surcharge']) && !empty($cart['total'])) {
            $payment['surcharge_value'] += fn_format_price($cart['total'] * $payment['p_surcharge'] / 100);
        }

        $payment['image'] = fn_get_image_pairs($payment['payment_id'], 'payment', 'M', true, true, $lang_code);

        $payment_groups[$vendor_id][$payment['payment_category']][$id] = $payment;
    }
    unset($payment);

    if (!empty($payment_groups[$vendor_id])) {
        ksort($payment_groups[$vendor_id]);
    }

    /**
     * Allows to modify payment methods grouped by category used for the checkout page.
     *
     * @param array $cart           Array of the cart contents and user information necessary for purchase
     * @param array $auth           Array of user authentication data (e.g. uid, usergroup_ids, etc.)
     * @param array $payment_groups List of payment methods grouped by category
     */
    fn_set_hook('prepare_direct_payments_payment_methods', $cart, $auth, $payment_groups[$vendor_id]);

    return $payment_groups[$vendor_id];
}

/**
 * @see \fn_em_get_subscriber_name().
 */
function fn_direct_payments_em_get_subscriber_name()
{
    /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
    $cart_service = Tygh::$app['addons.direct_payments.cart.service'];
    $cart = &$cart_service->getCart();

    $name = '';

    if (!empty($cart['user_data']['firstname'])) {
        $name = $cart['user_data']['firstname'];
    } elseif (!empty(Tygh::$app['session']['auth']['user_id'])) {
        $user_info = fn_get_user_info(Tygh::$app['session']['auth']['user_id'], false);
        $name = $user_info['firstname'];
    }

    return $name;
}

/**
 * @see \fn_user_logout()
 */
function fn_direct_payments_user_logout($auth)
{
    /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
    $cart_service = Tygh::$app['addons.direct_payments.cart.service'];
    $cart_service->save($auth['user_id']);

    // Regenerate session_id for security reasons
    Tygh::$app['session']->regenerateID();
    fn_init_user();
    $auth = Tygh::$app['session']['auth'];

    if (!empty($auth['user_id'])) {
        fn_log_user_logout($auth);
    }

    unset(Tygh::$app['session']['auth']);

    $cart_service->clear(false, true);

    fn_delete_session_data(AREA . '_user_id', AREA . '_password');

    unset(Tygh::$app['session']['product_notifications']);

    fn_login_user(); // need to fill Tygh::$app['session']['auth'] array for anonymous user

    /**
     * Allows to perform any actions after user logout.
     *
     * @param array $auth Auth data from session
     */
    fn_set_hook('user_logout_after', $auth);
}

/**
 * Provides mini cart data for 'Cart content' block.
 *
 * @return array Cart content
 */
function fn_direct_payments_get_mini_cart()
{
    /** @var \Tygh\Web\Session $session */
    $session = Tygh::$app['session'];

    $cart = array(
        'amount'           => 0,
        'display_subtotal' => 0,
        'products'         => array(),
        'vendor_ids'       => array(),
        'vendor_id'        => 0,
    );

    if ($session->isStarted()) {
        /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
        $cart_service = Tygh::$app['addons.direct_payments.cart.service'];

        foreach ($cart_service->getCarts() as $vendor_id => $vendor_cart) {
            if (fn_cart_is_empty($vendor_cart)) {
                continue;
            }

            if (isset($vendor_cart['amount'])) {
                $cart['amount'] += $vendor_cart['amount'];
            }

            if (isset($vendor_cart['display_subtotal'])) {
                $cart['display_subtotal'] += $vendor_cart['display_subtotal'];
            }

            if (isset($vendor_cart['products'])) {
                $cart['products'] += $vendor_cart['products'];
            }

            $cart['vendor_ids'][] = $vendor_id;
        }
    }

    return $cart;
}

/**
 * Stores current vendor_id in runtime.
 *
 * @param int $id Vendor ID
 */
function fn_direct_payments_set_runtime_vendor($id)
{
    /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
    $cart_service = Tygh::$app['addons.direct_payments.cart.service'];

    $cart_service->setRuntimeVendorId($id);
}

/**
 * Checks whether payment is owned by a vendor.
 *
 * @param int       $vendor_id Vendor ID
 * @param array|int $payment   Payment data or payment ID
 *
 * @return bool
 */
function fn_direct_payments_check_payment_owner($vendor_id, $payment)
{
    if ($vendor_id === null) {
        $vendor_id = Registry::get('runtime.company_id');
    }

    if (!$vendor_id || !$payment) {
        return true;
    }

    if (is_numeric($payment)) {
        $payment = fn_get_payment_method_data($payment);
    }

    return $payment['company_id'] == $vendor_id;
}

/**
 * Checks whether promotion is owned by a vendor.
 *
 * @param int       $vendor_id Vendor ID
 * @param array|int $promotion Promotion data or payment ID
 *
 * @return bool
 */
function fn_direct_payments_check_promotion_owner($vendor_id, $promotion)
{
    if ($vendor_id === null) {
        $vendor_id = Registry::get('runtime.company_id');
    }

    if (!$vendor_id || !$promotion) {
        return true;
    }

    if (is_numeric($promotion)) {
        $promotion = fn_get_promotion_data($promotion);
    }

    return $promotion['company_id'] == $vendor_id;
}

/**
 * Hook handler: replaces 'checkout' controller with the 'direct_payments' one.
 */
function fn_direct_payments_get_route_runtime(
    $req,
    $area,
    $result,
    $is_allowed_url,
    &$controller,
    $mode,
    $action,
    $dispatch_extra,
    $current_url_params,
    $current_url
)
{
    if ($controller == 'checkout') {
        $controller = 'separate_checkout';
        $_REQUEST['dispatch'] = 'separate_' . $_REQUEST['dispatch'];
    }
}

/**
 * Hook handler: adds company filtering for payments.
 */
function fn_direct_payments_get_payments(&$params, $fields, $join, $order, &$condition, $having)
{
    if (AREA === 'A' && !isset($params['company_id'])) {
        $params['company_id'] = (int) Registry::get('runtime.company_id');
    }

    if (isset($params['company_id'])) {
        $condition[] = db_quote('?:payments.company_id = ?i', $params['company_id']);
    }
}

/**
 * Hook handler: adds company filtering for promotions.
 */
function fn_direct_payments_get_promotions(&$params, $fields, $sortings, &$condition, $join, $group, $lang_code)
{
    if (AREA === 'A') {
        $params['company_id'] = (int) Registry::get('runtime.company_id');
    }

    if ($vendor_id = Registry::get('runtime.direct_payments.cart.vendor_id')) {
        $params['company_id'] = $vendor_id;
    }

    if (isset($params['company_id'])) {
        $condition .= db_quote(' AND ?:promotions.company_id = ?i', $params['company_id']);
    }
}

/**
 * Hook handler: bootstraps pre- and post- controllers for add-ons from the Separate checkout add-on.
 */
function fn_direct_payments_dispatch_assign_template($controller, $mode, $area, &$controllers_cascade)
{
    if ($controller != 'direct_payments') {
        return;
    }

    $area_name = fn_get_area_name($area);
    $addon_dir = Registry::get('config.dir.addons');
    $pre_controllers = $post_controllers = array();

    foreach ((array) Registry::get('addons') as $addon_name => $data) {
        if ($addon_name == 'direct_payments') {
            continue;
        }
        $dirs = array(
            $addon_dir . 'direct_payments/controllers/' . $area_name . '/' . $addon_name . '/',
            $addon_dir . 'direct_payments/controllers/common/' . $addon_name . '/',
        );
        foreach ($dirs as $dir) {
            if (is_readable($dir . $controller . '.pre.php')) {
                $pre_controllers[] = $dir . $controller . '.pre.php';
            }
            if (is_readable($dir . $controller . '.post.php')) {
                $post_controllers[] = $dir . $controller . '.post.php';
            }
        }
    }

    $base_controller = $addon_dir . 'direct_payments/controllers/' . $area_name . '/direct_payments.php';
    $base_controller_position = array_search($base_controller, $controllers_cascade);

    if ($pre_controllers) {
        array_splice($controllers_cascade, $base_controller_position, 0, $pre_controllers);
    }
    if ($post_controllers) {
        $controllers_cascade = array_merge($controllers_cascade, $post_controllers);
    }
}

/**
 * Hook handler: properly populates cart info on login.
 */
function fn_direct_payments_user_init($auth, $user_info, $first_init)
{
    /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
    $cart_service = Tygh::$app['addons.direct_payments.cart.service'];

    if (!$first_init) {
        return;
    }

    $user_type = empty($auth['user_id'])
        ? 'U'
        : 'R';
    $current_user_id = fn_get_session_data('cu_id');
    $user_id = empty($auth['user_id'])
        ? $current_user_id
        : $auth['user_id'];

    $cart_service->load($user_id, 'C', $user_type);
    $cart_service->save($user_id, 'C', $user_type);

    $user_data = fn_get_user_info($user_id);
    $cart_service->setUserData($user_data);
}

/**
 * Hook handler: properly populates cart info on login.
 */
function fn_direct_payments_init_user_session_data(&$sess_data, $user_id)
{
    /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
    $cart_service = Tygh::$app['addons.direct_payments.cart.service'];

    $cart_service->load($user_id, 'C');
    if (AREA == 'C') {
        $cart_service->save($user_id);
    }

    $user_data = fn_get_user_info($user_id);
    $cart_service->setUserData($user_data);

    $sess_data['product_notifications']['email'] = !empty($user_data['email'])
        ? $user_data['email']
        : '';
}

/**
 * Hook handler: sets company condition when extracting cart info.
 */
function fn_direct_payments_pre_extract_cart($cart, &$condition, $item_types)
{
    if (isset($cart['vendor_id'])) {
        $condition .= db_quote(' AND company_id = ?i', $cart['vendor_id']);
    }
}

/**
 * Hook handler: sets company condition when storing cart info.
 */
function fn_direct_payments_save_cart_content_pre($cart, $user_id, $type, $user_type)
{
    if (isset($cart['vendor_id'])) {
        fn_direct_payments_set_runtime_vendor($cart['vendor_id']);
    }
}

/**
 * Hook handler: sets company condition when storing cart info.
 */
function fn_direct_payments_user_session_products_condition($params, &$conditions)
{
    if ($vendor_id = Registry::get('runtime.direct_payments.cart.vendor_id')) {
        $conditions['company_id'] = db_quote('company_id = ?i', $vendor_id);
    }
}

/**
 * Hook handler: resets promotions cache when switching vendors on cart calculation.
 */
function fn_direct_payments_promotion_apply_before_get_promotions(
    $zone,
    $data,
    $auth,
    $cart_products,
    &$promotions,
    $applied_promotions
)
{
    static $cache = array();

    if (!empty($data['company_id'])) {
        $company_id = $data['company_id'];
        /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
        $cart_service = Tygh::$app['addons.direct_payments.cart.service'];
        $cart_service->setRuntimeVendorId($company_id);
    } else {
        $company_id = Registry::get('runtime.direct_payments.cart.vendor_id');
    }

    foreach ($promotions as $zone => $zone_promotions) {
        foreach ($zone_promotions as $promotion_id => $promotion) {
            $cache[$promotion['company_id']][$zone][$promotion_id] = $promotion;
        }
    }

    if (isset($cache[$company_id][$zone])) {
        $promotions[$zone] = $cache[$company_id][$zone];
    } else {
        unset($promotions[$zone]);
    }
}

/**
 * Hook handler: creates vendor payout for the paid order.
 */
function fn_direct_payments_change_order_status(
    $status_to,
    $status_from,
    $order_info,
    $force_notification,
    $order_statuses,
    $place_order
) {
    if ($order_statuses[$status_to]['params']['inventory'] === 'I'
        || empty($order_info['company_id'])
        || !empty($order_info['is_commission_payout_requested'])
    ) {
        return;
    }

    $payouts_manager = VendorPayouts::instance(array('vendor' => $order_info['company_id']));

    $order_payout = $payouts_manager->getSimple(array(
        'order_id'    => $order_info['order_id'],
        'payout_type' => VendorPayoutTypes::ORDER_PLACED,
    ));
    if (!$order_payout) {
        return;
    }

    $order_payout = reset($order_payout);

    if (!isset($order_payout['commission_amount'])) {
        $order_payout['commission_amount'] = 0;
    }

    $payouts = array();
    $is_vendor_payment = fn_direct_payments_check_payment_owner($order_info['company_id'], $order_info['payment_id']);

    if ($is_vendor_payment) {
        $payouts[] = array(
            'payout_type'     => VendorPayoutTypes::WITHDRAWAL,
            'payout_amount'   => $order_payout['order_amount'],
            'comments'        => '',
            'company_id'      => $order_info['company_id'],
            'approval_status' => VendorPayoutApprovalStatuses::COMPLETED,
        );
    }

    foreach ($payouts as $payout_params) {
        $payouts_manager->update($payout_params);
    }

    // mark payout as requested
    db_replace_into('order_data', array(
        'order_id' => $order_info['order_id'],
        'type'     => OrderDataTypes::PAYOUT_REQUEST,
        'data'     => serialize(true),
    ));
}

/**
 * Checks wheter the Vendor plans add-on is installed.
 *
 * @return bool
 */
function fn_direct_payments_is_vendor_plans_addon_installed()
{
    static $has_vendor_plans;
    if ($has_vendor_plans === null) {
        $has_vendor_plans = Registry::ifGet('addons.vendor_plans', null) !== null;
    }

    return $has_vendor_plans;
}

/**
 * Hook handler: sets company ID when creating/updating payment.
 */
function fn_direct_payments_update_payment_pre(
    &$payment_data,
    $payment_id,
    $lang_code,
    $certificate_file,
    $certificates_dir
)
{
    $payment_data['company_id'] = (int) Registry::get('runtime.company_id');
}

/**
 * Hook handler: sets company ID when creating/updating shipping.
 */
function fn_direct_payments_update_shipping(&$shipping_data, $shipping_id, $lang_code)
{
    if (!$shipping_id || !empty($shipping_data['company_id'])) {
        $shipping_data['company_id'] = (int) Registry::get('runtime.company_id');
    }
}

/**
 * Hook handler: prevents administrator from seeing/editing vendor shipping methods.
 */
function fn_direct_payments_get_available_shippings($company_id, $fields, $join, &$condition)
{
    if (!$company_id) {
        $condition = db_quote('a.company_id = ?i', 0);
    }
}

/**
 * Hook handler: sets order payout request status.
 *
 * @param array $order           Order info
 * @param array $additional_data Additional order data
 */
function fn_direct_payments_get_order_info(&$order, &$additional_data)
{
    if (!empty($additional_data[OrderDataTypes::PAYOUT_REQUEST])) {
        $order['is_commission_payout_requested'] = unserialize($additional_data[OrderDataTypes::PAYOUT_REQUEST]);
    }
}

/**
 * Hook handler: sets company ID when creating/updating promotion.
 */
function fn_direct_payments_update_promotion_pre(&$data, $promotion_id, $lang_code)
{
    $data['company_id'] = (int) Registry::get('runtime.company_id');
}

/**
 * Hook handler: manipulates with surcharge value for payout calculation
 */
function fn_direct_payments_vendor_plans_calculate_commission_for_payout_before($order_info, $company_data, $payout_data, $total, $shipping_cost, $surcharge_from_total, &$surcharge_to_commission, $commission)
{
    /**
     * Since all payments now belong to vendor, we need:
     * 1. To leave "$surcharge_from_total" as is, to be subtracted from order total, because we do not want to give away some part of money that vendor may have to pay to payment service
     * 2. To set "$surcharge_to_commission" to zero, because we do not want the payment surcharge be included to payout
     */
    $surcharge_to_commission = 0;
}

/**
 * Hook handler: adds payment company ID for the order payout.
 */
function fn_direct_payments_vendor_payouts_update($instance, &$data, $payout_id, $action)
{
    if (!empty($data['order_id'])) {
        $order_info = fn_get_order_info($data['order_id']);
        $data['payment_company_id'] = $order_info['payment_method']['company_id'];
    }
}