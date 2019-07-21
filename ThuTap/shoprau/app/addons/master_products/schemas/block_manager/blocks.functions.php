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

/**
 * Fetches vendor products additional data for vendor_products_filling in products block
 *
 * @param array $products All vendor products
 */
function fn_master_products_get_vendor_products(&$products, $params)
{
    list($companies,) = fn_get_companies([
        'company_id' => fn_array_column($products, 'company_id'),
        'extend'     => [
            'product_count'  => 'N',
            'logos'          => true,
            'placement_info' => true,
        ],
    ], Tygh::$app['session']['auth'], count($products));

    $companies = fn_array_combine(fn_array_column($companies, 'company_id'), $companies);

    fn_gather_additional_products_data($products, $params);

    /** @var \Tygh\Addons\MasterProducts\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    foreach ($products as $i => &$product) {
        if ($product['product_type'] == $product_manager::PRODUCT_TYPE_VARIATION) {
            $product['product_id'] = $product_manager->getProductFieldValue($product['parent_product_id'], 'parent_product_id');
            $product['selected_options'] = $product_manager->getProductVariationOptionsValue($product['parent_product_id']);
        } else {
            $product['product_id'] = $product['parent_product_id'];
        }

        $product['company'] = $companies[$product['company_id']];
        $product['is_vendor_products_list_item'] = true;
    }
    unset($product);

    return;
}

/**
 * Filters variations out when browsing a master product page.
 *
 * @param array $products Variations list
 */
function fn_master_products_remove_variations_from_master_product(&$products)
{
    if (!fn_master_products_get_runtime_company_id()) {
        $products = [];
    }
}
