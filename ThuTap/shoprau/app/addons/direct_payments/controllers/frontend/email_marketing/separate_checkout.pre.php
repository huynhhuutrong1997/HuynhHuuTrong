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

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($mode == 'place_order') {
        if (!empty($_REQUEST['subscribe_customer'])) {

            /** @var \Tygh\Addons\DirectPayments\Cart\Service $cart_service */
            $cart_service = Tygh::$app['addons.direct_payments.cart.service'];
            $cart = &$cart_service->getCart();

            fn_em_subscribe_email($cart['user_data']['email'], array(
                'name' => fn_direct_payments_em_get_subscriber_name()
            ));
        }
    }

    return;
}
