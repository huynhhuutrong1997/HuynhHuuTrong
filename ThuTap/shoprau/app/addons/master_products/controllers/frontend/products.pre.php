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

if ($mode == 'view') {
    $product_id = isset($_REQUEST['product_id']) ? (int) $_REQUEST['product_id'] : null;

    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $parent_product_id = $product_manager->getProductFieldValue($product_id, 'parent_product_id');
    $company_id = $product_manager->getProductFieldValue($product_id, 'company_id');

    if ($parent_product_id && $company_id) {
        return [
            CONTROLLER_STATUS_REDIRECT,
            fn_link_attach(
                fn_url('products.view?product_id=' . $parent_product_id),
                'company_id=' . $company_id
            ),
        ];
    }
}