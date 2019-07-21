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

namespace Tygh\Addons\MasterProducts\Product;

use Tygh\Addons\ProductVariations\Product\AdditionalDataLoader as BaseAdditionalDataLoader;
use Tygh\Database\Connection;
use Tygh\Enum\ProductTracking;

/**
 * Contains the logic for combining the data of a master product and the data of a vendor product.
 *
 * @package Tygh\Addons\ProductVariations
 *
 * @property \Tygh\Addons\MasterProducts\Product\Manager $product_manager
 */
class AdditionalDataLoader extends BaseAdditionalDataLoader
{
    /** @var array $available_vendor_products */
    private $available_vendor_products = [];

    private $company_id;

    private $vendor_products;

    protected $area;

    /** @inheritdoc */
    public function __construct(
        array &$products,
        array $params,
        array $auth,
        $cart_language,
        Manager $product_manager,
        Connection $db
    ) {
        parent::__construct($products, $params, $auth, $cart_language, $product_manager, $db);

        $master_product_ids = fn_array_column($this->products, 'master_product_id');
        $products_self = fn_array_column($this->products, 'product_id');
        $variations = fn_array_column($this->products, 'variation_product_id');

        $master_product_ids = array_unique(array_filter(array_merge($products_self, $variations, $master_product_ids)));

        if (!empty($master_product_ids)) {
            $statuses = ['A'];

            if ($this->is_preview) {
                $statuses[] = 'H';
            }
            $this->available_vendor_products = $this->getVendorProductsByMasterProductIds(
                $master_product_ids,
                $statuses
            );
        }
    }

    /** @inheritdoc */
    public function loadBaseData($product)
    {
        $company_id = $this->company_id;
        if (!empty($product['extra']['company_id'])) {
            $company_id = $product['extra']['company_id'];
        } elseif (!empty($product['company_id'])) {
            $company_id = $product['company_id'];
        }

        if (!$company_id) {
            return $product;
        }

        /** @var \Tygh\Addons\MasterProducts\Product\Type $product_type */
        $product_type = $this->product_manager->getProductTypeInstance($product['product_type']);

        $master_product_id = $product['product_id'];
        if (isset($product['variation_product_id'])) {
            $master_product_id = $product['variation_product_id'];
        }

        $vendor_product = $this->getVendorProduct($master_product_id, $company_id);
        if (!$vendor_product) {
            // FIXME: reverse merge direction is used when viewing vendor product
            if (isset($product['master_product_id'])) {
                if (!empty($this->images[$product['master_product_id']])) {
                    $product['main_pair'] = reset($this->images[$product['master_product_id']]);
                }
                if (!empty($this->additional_images[$product['master_product_id']])) {
                    $product['image_pairs'] = $this->additional_images[$product['master_product_id']];
                }
            }
            return $product;
        }

        foreach ($product as $field => $value) {
            if ($product_type->isFieldMergeableForVendorProduct($field)
                && array_key_exists($field, $vendor_product) && $field !== 'amount' /* FIXME */
            ) {

                if ($field == 'product_code' && empty($vendor_product[$field])) {
                    continue;
                }

                $product[$field] = $vendor_product[$field];
            }
        }

        if ($product_type->isFieldMergeableForVendorProduct('prices')) {
            $product['base_price'] = $product['price'] = $vendor_product['price'];

            if (isset($product['prices']) || (isset($product['detailed_params']['info_type']) && $product['detailed_params']['info_type'] === 'D')) {
                fn_get_product_prices($vendor_product['product_id'], $vendor_product, $this->auth);

                $product['prices'] = isset($vendor_product['prices']) ? $vendor_product['prices'] : [];
            }
        }

        if ($product_type->isFieldMergeableForVendorProduct('tax_ids')) {
            if (is_array($vendor_product['tax_ids'])) {
                $product['tax_ids'] = $vendor_product['tax_ids'];
            } else {
                $product['tax_ids'] = explode(',', $vendor_product['tax_ids']);
            }
        }

        if ($product_type->isFieldMergeableForVendorProduct('amount')) {
            $product['inventory_amount'] = $vendor_product['amount'];
        }

        if ($product_type->isFieldMergeableForVendorProduct('detailed_image')
            && !empty($this->images[$product['product_id']])
        ) {
            $product['main_pair'] = reset($this->images[$product['product_id']]);
        }

        if ($product_type->isFieldMergeableForVendorProduct('detailed_image')
            && !empty($this->additional_images[$product['product_id']])
        ) {
            $product['image_pairs'] = $this->additional_images[$product['product_id']];
        }

        $selected_options = isset($product['selected_options'])
            ? $product['selected_options']
            : [];

        if (isset($product['price']) && empty($product['modifiers_price'])) {
            $product['base_modifier'] = fn_apply_options_modifiers($selected_options, $product['base_price'], 'P',
                [], ['product_data' => $product]);
            $old_price = $product['price'];
            $product['price'] = fn_apply_options_modifiers($selected_options, $product['price'], 'P', [],
                ['product_data' => $product]);

            if (empty($product['original_price'])) {
                $product['original_price'] = $old_price;
            }

            $product['original_price'] = fn_apply_options_modifiers($selected_options, $product['original_price'], 'P',
                [], ['product_data' => $product]);
            $product['modifiers_price'] = $product['price'] - $old_price;
        }

        if (!empty($product['list_price'])) {
            $product['list_price'] = fn_apply_options_modifiers($selected_options, $product['list_price'], 'P', [],
                ['product_data' => $product]);
        }

        if (!empty($product['prices']) && is_array($product['prices'])) {
            foreach ($product['prices'] as $key => $item) {
                $product['prices'][$key]['price'] = fn_apply_options_modifiers($selected_options, $item['price'], 'P',
                    [], ['product_data' => $product]);
            }
        }

        if (!empty($product['selected_options'])) {
            $product['options_combination'] = fn_get_options_combination($selected_options);
        }

        if (!empty($product['changed_option'])) {
            $product['options_changed'] = true;
        }

        // FIXME: Move to the scheme of the merged fields
        $product['company_id'] = $vendor_product['company_id'];

        $product['master_product_id'] = $product['product_id'];
        $product['vendor_product_id'] = $vendor_product['product_id'];

        if ($this->auth['area'] === 'A') {
            $product['product_id'] = $vendor_product['product_id'];
        }

        return $product;
    }

    /**
     * Provides list of vendor products by master product IDs.
     *
     * @param int[]    $master_product_ids List of master product IDs
     * @param string[] $statuses           List of statues
     *
     * @return array Vendor products grouped by master product ID and company ID
     */
    private function getVendorProductsByMasterProductIds(array $master_product_ids, array $statuses = ['A'])
    {
        $area = isset($this->auth['area']) ? $this->auth['area'] : 'C';

        if (
            $this->product_manager->isInventoryTracking()
            && !$this->product_manager->isShowOutOfStockProducts()
            && !$this->is_preview
            && $area === 'C'
        ) {
            return $this->db->getMultiHash(
                'SELECT master_products.product_id AS master_product_id, products.company_id, products.product_id FROM ?:products AS products'
                . ' INNER JOIN ?:products AS master_products ON (master_products.product_id = products.parent_product_id AND master_products.product_type = products.product_type)'
                . ' WHERE products.company_id <> 0 AND products.parent_product_id IN (?n) AND products.status IN (?a)'
                . '     AND (master_products.tracking = ?s OR products.amount > 0)',
                ['master_product_id', 'company_id', 'product_id'],
                $master_product_ids, $statuses, ProductTracking::DO_NOT_TRACK
            );
        } else {
            return $this->db->getMultiHash(
                'SELECT master_products.product_id AS master_product_id, products.company_id, products.product_id FROM ?:products AS products'
                . ' LEFT JOIN ?:products AS master_products ON (master_products.product_id = products.parent_product_id AND master_products.product_type = products.product_type)'
                . ' WHERE products.company_id <> 0 AND products.parent_product_id IN (?n) AND products.status IN (?a)',
                ['master_product_id', 'company_id', 'product_id'],
                $master_product_ids, $statuses
            );
        }
    }

    /**
     * Sets company ID.
     *
     * @param int $company_id
     */
    public function setCompanyId($company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * Provides company ID.
     *
     * @return int
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * Gets vendor product ID by master product ID and company ID.
     *
     * @param int $master_product_id
     * @param int $company_id
     *
     * @return null
     */
    private function getVendorProduct($master_product_id, $company_id)
    {
        $vendor_products = $this->getVendorProducts($master_product_id);

        return isset($vendor_products[$company_id])
            ? $vendor_products[$company_id]
            : null;
    }

    /**
     * Gets vendor products of the selected master product.
     *
     * @param int $master_product_id
     *
     * @return array|null
     */
    public function getVendorProducts($master_product_id)
    {
        if ($this->vendor_products === null) {
            $this->preloadVendorProducts();
        }

        return isset($this->vendor_products[$master_product_id])
            ? $this->vendor_products[$master_product_id]
            : null;
    }

    /**
     * Preloads vendor products.
     */
    private function preloadVendorProducts()
    {
        $product_ids = array_reduce($this->available_vendor_products, function ($carry, $item) {
            return array_merge($carry, $item);
        }, []);

        list($vendor_products) = fn_get_products([
            'area'                       => $this->is_preview ? 'A' : $this->auth['area'],
            'status'                     => $this->is_preview ? ['A', 'H'] : ['A'],
            'parent_product_id'          => null,
            'pid'                        => $product_ids,
            'action'                     => $this->is_preview ? 'preview' : null,
            'skip_rating'                => true, // prevent fetching discussions data
            'merge_with_master_products' => false,
        ]);

        foreach ($vendor_products as $product) {
            $this->vendor_products[$product['master_product_id']][$product['company_id']] = $product;
        }

        $product_ids_to_get_images = array_filter(array_merge(
            fn_array_column($vendor_products, 'vendor_product_id'),
            fn_array_column($vendor_products, 'master_product_id')
        ));

        $this->images = fn_get_image_pairs(
            $product_ids_to_get_images,
            'product',
            'M',
            $this->params['get_icon'],
            $this->params['get_detailed'],
            $this->language
        );

        $this->additional_images = fn_get_image_pairs(
            $product_ids_to_get_images,
            'product',
            'M',
            $this->params['get_icon'],
            $this->params['get_detailed'],
            $this->language
        );
    }
}