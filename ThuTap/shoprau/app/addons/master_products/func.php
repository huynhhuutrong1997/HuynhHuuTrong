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

use Tygh\Addons\MasterProducts\Product\AdditionalDataLoader;
use Tygh\BlockManager\Block;
use Tygh\BlockManager\ProductTabs;
use Tygh\Enum\ProductTracking;
use Tygh\Registry;

/**
 * Installs the add-on products block and the product tab.
 */
function fn_master_products_install()
{
    $company_ids = [0];

    /** @var \Tygh\BlockManager\Block $block */
    $block = Block::instance();
    /** @var ProductTabs $product_tabs */
    $product_tabs = ProductTabs::instance();

    foreach ($company_ids as $company_id) {
        $block_data = [
            'type'         => 'products',
            'properties'   => [
                'template' => 'addons/master_products/blocks/products/vendor_products.tpl',
            ],
            'content_data' => [
                'content' => [
                    'items' => [
                        'filling' => 'master_products.vendor_products_filling',
                        'limit'   => '0',
                    ],
                ],
            ],
            'company_id'   => $company_id,
        ];

        $block_description = [
            'lang_code' => DEFAULT_LANGUAGE,
            'name'      => __('master_products.vendor_products_block_name', [], DEFAULT_LANGUAGE),
        ];

        $block_id = $block->update($block_data, $block_description);

        $tab_data = [
            'tab_type'      => 'B',
            'block_id'      => $block_id,
            'template'      => '',
            'addon'         => 'master_products',
            'status'        => 'A',
            'is_primary'    => 'N',
            'position'      => 0,
            'product_ids'   => null,
            'company_id'    => $company_id,
            'show_in_popup' => 'N',
            'lang_code'     => DEFAULT_LANGUAGE,
            'name'          => __('master_products.vendor_products_tab_name', [], DEFAULT_LANGUAGE),
        ];

        $product_tabs->update($tab_data);
    }
}

/**
 * Hook handler: adds extra products search parameters.
 *
 * @param array  $params         Products search params
 * @param int    $items_per_page Amount of products shown per page
 * @param string $lang_code      Two-letter language code for product descriptions
 */
function fn_master_products_get_products_pre(&$params, $items_per_page, $lang_code)
{
    $params = array_merge([
        'merge_with_master_products' => null,
        'show_master_products_only'  => false,
        'area'                       => AREA,
    ], $params);

    $params['runtime_company_id'] = Registry::get('runtime.company_id');

    if ($params['merge_with_master_products'] === null) {
        $params['merge_with_master_products'] = !$params['show_master_products_only'] && (
            $params['area'] === 'C' ||
            $params['runtime_company_id']
        );
    }

    // replace product ID of the parent configurable product with the variation product ID
    if (!empty($params['is_vendor_products_list'])) {
        $product_id = reset($params['parent_product_id']);

        /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];

        $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');
        if ($product_type === $product_manager::PRODUCT_TYPE_CONFIGURABLE) {
            if (!empty($params['product_data'][$product_id]['product_options'])) {
                $selected_options = $params['product_data'][$product_id]['product_options'];
                $variation_id = $product_manager->getVariationId($product_id, $selected_options);
                $params['parent_product_id'] = $variation_id;
            } else {
                $params['parent_product_id'] = [$product_manager->getDefaultVariationId($product_id)];
            }
        }
    }

    // vendors must see only active master products
    if ($params['show_master_products_only'] && $params['runtime_company_id']) {
        $params['status'] = 'A';
    }
}

/**
 * Hook handler: modifies products obtaining process to include vendor products into the list.
 */
function fn_master_products_get_products(
    &$params,
    &$fields,
    $sortings,
    &$condition,
    &$join,
    $sorting,
    &$group_by,
    $lang_code,
    $having
) {
    $parent_product_id = null;
    if (isset($params['parent_product_id'])) {
        $parent_product_id = array_filter((array) $params['parent_product_id']);
    }

    // FIXME: Dirty hack
    if ($params['merge_with_master_products']) {
        $fields['product_id'] = '(CASE'
            . ' WHEN master_products.product_id <> 0 THEN master_products.product_id'
            . ' ELSE products.product_id'
            . ' END) AS product_id';
    }

    $fields['vendor_product_id'] = 'products.product_id AS vendor_product_id';
    $fields['master_product_id'] = 'master_products.product_id AS master_product_id';

    $join = db_quote(' LEFT JOIN ?:products AS master_products ON master_products.product_id = products.parent_product_id'
            . ' AND master_products.product_type = products.product_type'
        ) . $join;

    if ($params['merge_with_master_products']) {
        $group_by = 'product_id';
    }

    $condition_replacements = [];

    if ($parent_product_id && $params['merge_with_master_products']) {
        if (is_array($params['parent_product_id'])) {
            $parent_product_id_condition = db_quote('IN (?n)', $params['parent_product_id']);
        } else {
            $parent_product_id_condition = db_quote('= ?i', $params['parent_product_id']);
        }

        $search = db_quote('products.parent_product_id ?p', $parent_product_id_condition);
        $replace = db_quote(
            '(products.parent_product_id ?p OR master_products.parent_product_id ?p)',
            $parent_product_id_condition,
            $parent_product_id_condition
        );

        $condition_replacements[$search] = $replace;
    }

    if ($params['product_type'] && $params['merge_with_master_products']) {
        $search = db_quote('AND products.product_type IN (?a)', $params['product_type']);
        $replace = db_quote(
            'AND (products.product_type IN (?a) OR master_products.product_type IN (?a))',
            $params['product_type'],
            $params['product_type']
        );
        $condition_replacements[$search] = $replace;
    }

    if (!empty($params['pid'])) {
        $search = db_quote('AND companies.status = ?s', 'A');
        $replace = db_quote('AND (companies.status = ?s OR products.company_id = ?i)', 'A', 0);
        $condition_replacements[$search] = $replace;
    }

    if ($params['area'] === 'C') {
        $search = db_quote('AND products.status IN (?a)', ['A']);
        $replace = db_quote(
            'AND products.status IN (?a) AND (master_products.status IN (?a) OR master_products.status IS NULL)',
            ['A'],
            ['A']
        );
        $condition_replacements[$search] = $replace;
    }

    if ($params['show_master_products_only']) {
        if ($params['runtime_company_id']) {
            $search = db_quote(' AND products.company_id = ?i', $params['runtime_company_id']);
            $replace = db_quote(' AND products.company_id = ?i', 0);
            $condition_replacements[$search] = $replace;
        } else {
            $condition .= db_quote(' AND products.company_id = ?i', 0);
        }
    } elseif ($params['area'] === 'A' && !$parent_product_id) {
        $condition .= db_quote(' AND products.company_id <> ?i ', 0);
    }

    // FIXME: Dirty hack
    $condition = strtr($condition, $condition_replacements);

    return;
}

/**
 * Hook handler: adds master product ID into a list of fetched product fields.
 */
function fn_master_products_get_product_data($product_id, &$field_list, &$join, $auth, $lang_code, $condition)
{
    $join = db_quote(' LEFT JOIN ?:products AS master_products ON master_products.product_id = ?:products.parent_product_id'
            . ' AND master_products.product_type = ?:products.product_type'
        ) . $join;

    $field_list .= ', master_products.product_id AS master_product_id';
}

/**
 * Hook handler: modifies seo name and stock information.
 */
function fn_master_products_get_product_data_post(&$product_data, $auth, $preview, $lang_code)
{
    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    if (!$product_manager->getVendorProduct($product_data['product_id'])) {
        return;
    }

    /** @var \Tygh\Addons\MasterProducts\Product\Type $product_type */
    $product_type = $product_manager->getProductTypeInstance($product_data['product_type']);

    $product_data['is_vendor_product'] = true;
    // Skip creating seo name
    $product_data['seo_name'] = $product_data['product_id'];

    if (isset($product_data['image_pairs']) && $product_type->isFieldMergeableForVendorProduct('additional_images')) {
        $product_data['image_pairs'] = fn_get_image_pairs($product_data['master_product_id'], 'product', 'A', true, true, $lang_code);
    }

    if (isset($product_data['main_pair']) && $product_type->isFieldMergeableForVendorProduct('detailed_image')) {
        $product_data['main_pair'] = fn_get_image_pairs($product_data['master_product_id'], 'product', 'M', true, true, $lang_code);
    }
}

/**
 * Hook handler: prepares environment to inject vendor data into a product data.
 */
function fn_master_products_gather_additional_products_data_params(
    $product_ids,
    $params,
    &$products,
    $auth,
    &$products_images,
    &$additional_images,
    $product_options,
    $has_product_options,
    $has_product_options_links
) {
    $loader = new AdditionalDataLoader(
        $products,
        $params,
        $auth,
        CART_LANGUAGE,
        Tygh::$app['addons.product_variations.product.manager'],
        Tygh::$app['db']
    );

    $runtime_company_id = fn_master_products_get_runtime_company_id();

    $loader->setCompanyId($runtime_company_id);

    Registry::set('master_products_loader', $loader);
}

/**
 * Hook handler: injects vendor product data into a product data.
 */
function fn_master_products_gather_additional_product_data_before_options(&$product, $auth, &$params)
{
    /** @var AdditionalDataLoader $loader */
    $loader = Registry::get('master_products_loader');

    $product = $loader->loadBaseData($product);

    return;
}

/**
 * Hook handler: adds icon of the master product when adding a product to the cart.
 */
function fn_master_products_get_cart_product_icon(&$product_id, $product_data, $selected_options, &$image)
{
    if ($image === null) {
        /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];

        $vendor_product = $product_manager->getVendorProduct($product_id);
        if ($vendor_product) {
            $product_id = $vendor_product['master_product_id'];
        }
    }
}

/**
 * Hook handler: adds master product categories.
 */
function fn_master_products_pre_get_cart_product_data(
    $hash,
    $product,
    $skip_promotion,
    $cart,
    $auth,
    $promotion_amount,
    $fields,
    &$join
) {
    Registry::set('master_products.active_product', $product, true);
}

/**
 * Hook handler: adds company ID and vendor product ID into cart ID calculation.
 */
function fn_master_products_generate_cart_id(&$_cid, $extra, $only_selectable)
{
    if (!empty($extra['vendor_product_id'])) {
        $_cid[] = $extra['vendor_product_id'];
    }
}

/**
 * Hook handler: sets company ID for a vendor product.
 */
function fn_master_products_add_to_cart(&$cart, $product_id, $_id)
{
    if (isset($cart['products'][$_id]['extra']['company_id'])) {
        $cart['products'][$_id]['company_id'] = $cart['products'][$_id]['extra']['company_id'];
    }
}

/**
 * Hook handler: overrides variation price.
 */
function fn_master_products_add_product_to_cart_get_price(
    $product_data,
    $cart,
    $auth,
    $update,
    $_id,
    &$data,
    $product_id,
    $amount,
    &$price,
    $zero_price_action,
    $allow_add
) {
    if (isset($data['extra']['vendor_product_id'])) {
        $vendor_product_id = $data['extra']['vendor_product_id'];

        if (isset($data['extra']['variation_product_id'])) {
            $data['extra']['variation_product_id'] = $vendor_product_id;
        }

        $price = fn_get_product_price($vendor_product_id, $amount, $auth);
    }
}

/**
 * Hook handler: overrides variation stock information.
 * FIXME: Remove code duplication
 *
 * @see fn_product_variations_check_amount_in_stock_before_check
 */
function fn_master_products_check_amount_in_stock_before_check(
    $product_id,
    $amount,
    $product_options,
    $cart_id,
    $is_edp,
    $original_amount,
    $cart,
    $update_id,
    &$product,
    &$current_amount
) {
    if (
        (isset($product['tracking'])
            && $product['tracking'] === ProductTracking::DO_NOT_TRACK)
        || Registry::get('settings.General.inventory_tracking') == 'N'
    ) {
        return;
    }

    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    $product_type_instance = $product_manager->getProductTypeInstance($product_type);

    $active_product = Registry::get('master_products.active_product');

    $company_id = fn_master_products_get_runtime_company_id($active_product);
    if (!$company_id) {
        return;
    }

    $target_product_id = $product_id;
    if ($product_type === $product_manager::PRODUCT_TYPE_CONFIGURABLE) {
        $target_product_id = $product_manager->getVariationId($product_id, $product_options);
    }

    $vendor_product_id = $product_manager->getVendorProductId($target_product_id, $company_id);
    if ($vendor_product_id) {
        $current_amount = $product_manager->getProductFieldValue($vendor_product_id, 'amount');
        $avail_since = $product_manager->getProductFieldValue($vendor_product_id, 'avail_since');

        if (!empty($avail_since) && TIME < $avail_since) {
            $current_amount = 0;
        }

        foreach ($product as $key => $value) {
            if ($product_type_instance->isFieldMergeable($key)) {
                $product[$key] = $product_manager->getProductFieldValue($vendor_product_id, $key);
            }
        }
    }

    if ($product_type === $product_manager::PRODUCT_TYPE_CONFIGURABLE) {
        if (!empty($cart['products']) && is_array($cart['products'])) {
            foreach ($cart['products'] as $key => $item) {
                if ($key != $cart_id && $item['product_id'] == $product_id) {
                    if (isset($item['extra']['variation_product_id'])) {
                        $item_variation_id = $item['extra']['variation_product_id'];
                    } else {
                        $item_variation_id = $product_manager->getVariationId($product_id, $item['product_options']);
                    }

                    if ($item_variation_id == $target_product_id) {
                        $current_amount -= $item['amount'];
                    }
                }
            }
        }
    }
}

/**
 * Hook handler: overrides master product code.
 *
 * @see fn_product_variations_get_product_code
 */
function fn_master_products_get_product_code($product_id, $selected_options, &$product_code)
{
    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $active_product = Registry::get('master_products.active_product');

    $company_id = fn_master_products_get_runtime_company_id($active_product);
    if (!$company_id) {
        return;
    }

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    /** @var \Tygh\Addons\MasterProducts\Product\Type $product_type_instance */
    $product_type_instance = $product_manager->getProductTypeInstance($product_type);

    if (!$product_type_instance->isFieldAvailableForVendorProduct('product_code')) {
        return;
    }

    $master_product_id = $product_id;
    if ($product_type === $product_manager::PRODUCT_TYPE_CONFIGURABLE) {
        $master_product_id = $product_manager->getVariationId($product_id, $selected_options);
    }

    if ($master_product_id) {
        $vendor_product_id = $product_manager->getVendorProductId($master_product_id, $company_id);
        if ($vendor_product_id) {
            $product_code = $product_manager->getProductFieldValue($vendor_product_id, 'product_code');
        }
    }
}

/**
 * Hook handler: overrides master product data.
 *
 * @see fn_product_variations_get_cart_product_data
 */
function fn_master_products_get_cart_product_data($product_id, &$_pdata, $product, $auth, &$cart, $hash)
{
    $cart['products'][$hash]['product_type'] = $_pdata['product_type'];

    $_pdata['company_id'] = $product['company_id'];

    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    if (empty($product['extra']['vendor_product_id'])) {
        return;
    }

    $amount = !empty($product['amount_total']) ? $product['amount_total'] : $product['amount'];

    $vendor_product_id = $product['extra']['vendor_product_id'];

    $product_type_instance = $product_manager->getProductTypeInstance($_pdata['product_type']);

    if ($_pdata['product_type'] === $product_manager::PRODUCT_TYPE_CONFIGURABLE) {
        $_pdata['extra']['variation_product_id'] = $vendor_product_id;
    }

    if (!isset($_pdata['extra'])) {
        $_pdata['extra'] = [];
    }

    $_pdata['extra'] = array_merge($_pdata['extra'], $product['extra']);

    $_pdata['price'] = fn_get_product_price($vendor_product_id, $amount, $auth);
    $_pdata['in_stock'] = $product_manager->getProductFieldValue($vendor_product_id, 'amount');

    if (!isset($product['stored_price']) || $product['stored_price'] !== 'Y') {
        $_pdata['base_price'] = $_pdata['price'];
    }

    foreach ($_pdata as $key => $value) {
        if ($product_type_instance->isFieldMergeable($key) && $key !== 'amount') {
            $_pdata[$key] = $product_manager->getProductFieldValue($vendor_product_id, $key);
        }
    }
}

/**
 * Hook handler: stores currently processed product in the runtime to determine the proper vendor product ID when
 * chaning a product stock.
 */
function fn_master_products_change_order_status_before_update_product_amount(
    $order_id,
    $status_to,
    $status_from,
    $force_notification,
    $place_order,
    $order_info,
    $k,
    $v
) {
    Registry::set('master_products.active_product', $v, true);
}

/**
 * Hook handler: stores currently processed product in the runtime to determe product stock on when placing an order.
 */
function fn_master_products_checkout_place_order_before_check_amount_in_stock(
    $cart,
    $auth,
    $params,
    $cart_id,
    $product,
    $_is_edp
) {
    Registry::set('master_products.active_product', $product, true);
}

/**
 * Hook handler: changes vendor product stock.
 */
function fn_master_products_update_product_amount_pre(
    &$product_id,
    $amount,
    $product_options,
    $sign,
    &$tracking,
    &$current_amount,
    &$product_code
) {
    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $active_product = Registry::get('master_products.active_product');

    if (!isset($active_product['extra']['vendor_product_id'])) {
        return;
    }

    $vendor_product_id = $active_product['extra']['vendor_product_id'];

    /** @var \Tygh\Addons\MasterProducts\Product\Type $product_type */
    $product_type = $product_manager->getProductTypeInstanceByProductId($product_id);

    $product_id = $vendor_product_id;

    $current_amount = $product_manager->getProductFieldValue($vendor_product_id, 'amount', null, true);

    if ($product_type->isFieldAvailableForVendorProduct('product_code')) {
        $product_code = $product_manager->getProductFieldValue($vendor_product_id, 'product_code');
    }
}

/**
 * Hook handler: sets vendor product code.
 */
function fn_master_products_create_order_details($order_id, $cart, &$order_details, $extra)
{
    if (!empty($extra['vendor_product_id'])) {
        /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];

        $vendor_product_id = $extra['vendor_product_id'];

        /** @var \Tygh\Addons\MasterProducts\Product\Type $product_type */
        $product_type = $product_manager->getProductTypeInstanceByProductId($vendor_product_id);

        if ($product_type->isFieldAvailableForVendorProduct('product_code')) {
            $order_details['product_code'] = $product_manager->getProductFieldValue($vendor_product_id, 'product_code');
        }
    }
}

/**
 * Hook handler: excludes options of variations that are not sold by vendor.
 */
function fn_master_products_additional_data_loader_get_variation_codes_by_product_ids(
    $instance,
    $product_ids,
    $statuses,
    $fields,
    $join,
    &$condition
) {
    $company_id = fn_master_products_get_runtime_company_id();
    if (!$company_id) {
        return;
    }

    $condition .= db_quote(
        ' AND EXISTS('
        . ' SELECT 1 FROM ?:products AS vendor_products WHERE'
        . ' vendor_products.parent_product_id = variations.product_id AND vendor_products.company_id = ?i'
        . ' OR vendor_products.product_id = variations.product_id AND variations.company_id = ?i'
        . ' )',
        $company_id, $company_id
    );
}

/**
 * Fetches company ID from any passed object or runtime.
 * FIXME: Obtaining company_id from the $_REQUEST is ugly. Must be redone.
 *
 * @param array|null $object Object to extract company_id from
 * @param string     $area   Site area
 *
 * @return int Company ID
 */
function fn_master_products_get_runtime_company_id($object = null, $area = AREA)
{
    if ($object === null && $area === 'C') {
        // FIXME
        $object = $_REQUEST;
    }

    static $runtime_company_id;

    if (isset($object['company_id'])) {
        return (int) $object['company_id'];
    }

    if ($runtime_company_id === null) {
        $runtime_company_id = (int) Registry::ifGet('runtime.vendor_id', Registry::get('runtime.company_id'));
    }

    return $runtime_company_id;
}

/**
 * Helper function that generates sidebar menu with master and vendor products on the products management pages.
 *
 * @param string $controller Currently dispatched controller
 * @param string $mode       Currently dispatched controller mode
 */
function fn_master_products_generate_navigation_sections($controller, $mode)
{
    $section = $controller . '.' . $mode;

    Registry::set('navigation.dynamic.sections', [
        'products.manage'          => [
            'title' => __('master_products.products_being_sold'),
            'href'  => 'products.manage',
        ],
        'products.master_products' => [
            'title' => __('master_products.products_that_vendors_can_sell'),
            'href'  => 'products.master_products',
        ],
    ]);

    Registry::set('navigation.dynamic.active_section', $section);
}

/**
 * Hook handler: allows viewing master products.
 */
function fn_master_products_company_products_check(&$product_ids, $notify, &$company_condition)
{
    $controller = Registry::ifGet('runtime.controller', 'products');
    $mode = Registry::ifGet('runtime.mode', 'update');
    $request_method = isset($_SERVER['REQUEST_METHOD']) // FIXME
        ? $_SERVER['REQUEST_METHOD']
        : 'GET';

    if ($controller !== 'products' || $mode !== 'update' || $request_method !== 'GET') {
        return;
    }

    $company_condition = fn_get_company_condition(
        '?:products.company_id',
        true,
        Registry::get('runtime.company_id'),
        true
    );
}

/**
 * Hook handler: allows viewing master products.
 */
function fn_master_products_is_product_company_condition_required_post($product_id, &$is_required)
{
    $product_company_id = (int) db_get_field('SELECT company_id FROM ?:products WHERE product_id = ?i', $product_id);

    if ($product_company_id === 0) {
        $is_required = false;
    }
}

/**
 * Hook handler: removes unnecessary tabs from vendor product editing page.
 */
function fn_master_products_dispatch_before_display()
{
    $controller = Registry::get('runtime.controller');
    $mode = Registry::get('runtime.mode');

    if (AREA !== 'A' || $controller !== 'products' || $mode !== 'update') {
        return;
    }

    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];
    /** @var \Tygh\SmartyEngine\Core $view */
    $view = Tygh::$app['view'];

    /** @var array $product_data */
    $product_data = $view->getTemplateVars('product_data');
    if (empty($product_data['is_vendor_product'])) {
        return;
    }

    /** @var \Tygh\Addons\MasterProducts\Product\Type $product_type */
    $product_type = $product_manager->getProductTypeInstance($product_data['product_type']);
    $tabs = Registry::get('navigation.tabs');

    if (is_array($tabs)) {

        foreach ($tabs as $key => $tab) {
            if (!$product_type->isTabAvailableForVendorProduct($key)) {
                unset($tabs[$key]);
            }
        }

        Registry::set('navigation.tabs', $tabs);
    }
}

/**
 * Hook handler: updates vendor products descriptions when editing a master product.
 */
function fn_master_products_update_product_post($product_data, $product_id, $lang_code, $create)
{
    if ($create) {
        return;
    }

    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $vendor_product_ids_list = $product_manager->getVendorProductIds($product_id);

    foreach ($vendor_product_ids_list as $vendor_product_id) {
        $product_manager->cloneProductDescriptions($product_id, $vendor_product_id, $lang_code);
    }
}

/**
 * Hook handler: prevents vendor product categories update.
 */
function fn_master_products_update_product_categories_pre($product_id, &$product_data, $rebuild, $company_id)
{
    if (empty($product_data['category_ids'])) {
        return;
    }

    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    if ($product_manager->getVendorProduct($product_id)) {
        $product_data['category_ids'] = [];
    }
}

/**
 * Hook handler: updates vendor products categories when editing a master product.
 */
function fn_master_products_update_product_categories_post(
    $product_id,
    $product_data,
    $existing_categories,
    $rebuild,
    $company_id
) {
    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $vendor_product_ids_list = $product_manager->getVendorProductIds($product_id);

    foreach ($vendor_product_ids_list as $vendor_product_id) {
        $product_manager->cloneProductCategories($product_id, $vendor_product_id);
    }
}