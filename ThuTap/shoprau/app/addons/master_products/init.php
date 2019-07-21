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

use Tygh\Addons\MasterProducts\ServiceProvider;

// replace product variations product manager with the master products one
unset(Tygh::$app['addons.product_variations.product.manager']);
Tygh::$app->register(new ServiceProvider());

fn_register_hooks(
    // general products list management
    'get_products_pre',
    'get_products',
    'get_product_data',
    'get_product_data_post',
    'gather_additional_products_data_params',
    'gather_additional_product_data_before_options',

    // administration panel products management
    'company_products_check',
    'is_product_company_condition_required_post',
    'dispatch_before_display',

    // cart content management
    'get_cart_product_icon',
    'pre_get_cart_product_data',
    'add_product_to_cart_get_price',
    'check_amount_in_stock_before_check',
    'get_product_code',
    'add_to_cart',
    'get_cart_product_data',
    'generate_cart_id',

    // order placement
    'update_product_amount_pre',
    'change_order_status_before_update_product_amount',
    'checkout_place_order_before_check_amount_in_stock',
    'create_order_details',

    // product variations tweaks
    'additional_data_loader_get_variation_codes_by_product_ids',

    // product update routine
    'update_product_post',
    'update_product_categories_pre',
    'update_product_categories_post'
);