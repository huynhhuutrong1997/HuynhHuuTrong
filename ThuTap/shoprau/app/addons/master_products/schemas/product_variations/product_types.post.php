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

use Tygh\Addons\ProductVariations\Product\Manager;

defined('BOOTSTRAP') or die('Access denied');

/**
 * @var array $schema
 */

$tabs = [
    'detailed',
    'shippings',
    'qty_discounts',
];

$fields = [
    'product_id',
    'prices',
    'amount',
    'status',
    'timestamp',
    'lang_code',
    'shippings',
    'weight',
    'shipping_freight',
    'box_height',
    'box_length',
    'box_width',
    'min_items_in_box',
    'max_items_in_box',
    'min_qty',
    'max_qty',
    'qty_step',
    'list_qty_count',
    'free_shipping',
];

foreach ($schema as $type => &$spec) {
    $spec['child_tabs'] = $tabs;
    $spec['child_fields'] = $fields;
    $spec['child_mergeable_fields'] = array_merge(
        $schema[Manager::PRODUCT_TYPE_CONFIGURABLE]['mergeable_fields'],
        ['additional_images']
    );
}

return $schema;