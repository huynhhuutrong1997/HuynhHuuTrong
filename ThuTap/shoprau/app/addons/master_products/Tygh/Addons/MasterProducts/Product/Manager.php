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

use Tygh\Addons\ProductVariations\Product\Manager as BaseManager;
use Tygh\Common\OperationResult;

class Manager extends BaseManager
{
    /**
     * Provides vendor product ID of the specified master product ID.
     *
     * @param int $master_product_id Master product ID
     * @param int $company_id        Vendor company ID
     *
     * @return int|false Vendor product ID or false if none found
     */
    public function getVendorProductId($master_product_id, $company_id)
    {
        if (!$master_product_id) {
            return false;
        }

        $id = $this->db->getField(
            'SELECT products.product_id FROM ?:products AS products'
            . ' INNER JOIN ?:products AS master_products ON master_products.product_id = products.parent_product_id'
            . ' AND master_products.product_type = products.product_type'
            . ' WHERE master_products.product_id = ?i AND products.company_id = ?i',
            $master_product_id,
            $company_id
        );

        if ($id) {
            return (int) $id;
        }

        return false;
    }

    /**
     * Gets list of vendor products IDs.
     *
     * @param int $master_product_id Master product ID
     *
     * @return int[] Vendor product IDs
     */
    public function getVendorProductIds($master_product_id)
    {
        if (!$master_product_id) {
            return [];
        }

        $ids = $this->db->getColumn(
            'SELECT products.product_id FROM ?:products AS products'
            . ' INNER JOIN ?:products AS master_products ON master_products.product_id = products.parent_product_id'
            . ' AND master_products.product_type = products.product_type'
            . ' WHERE master_products.product_id = ?i',
            $master_product_id
        );

        if ($ids) {
            return array_map('intval', $ids);
        }

        return [];
    }

    /**
     * Gets vendor product parentness information.
     *
     * @param int $vendor_product_id
     *
     * @return array|bool
     */
    public function getVendorProduct($vendor_product_id)
    {
        if (!$vendor_product_id) {
            return false;
        }

        $vendor_product = $this->db->getRow(
            'SELECT products.product_id, master_products.product_id AS master_product_id, products.company_id, products.product_type'
            . ' FROM ?:products AS products'
            . ' INNER JOIN ?:products AS master_products ON master_products.product_id = products.parent_product_id'
            . ' AND master_products.product_type = products.product_type'
            . ' WHERE products.product_id = ?i',
            $vendor_product_id
        );

        if ($vendor_product) {
            return $vendor_product;
        }

        return false;
    }

    /**
     * Creates a vendor product from a master product.
     *
     * @param int $master_product_id Master product ID
     * @param int $company_id        Vendor company ID
     *
     * @return \Tygh\Common\OperationResult Operation result with vendor product ID
     * @throws \Tygh\Exceptions\DatabaseException
     * @throws \Tygh\Exceptions\DeveloperException
     */
    public function createVendorProduct($master_product_id, $company_id)
    {
        $result = $this->cloneProduct($master_product_id, $company_id);
        if (!$result->isSuccess()) {
            return $result;
        }

        $clone_details = $result->getData();
        if (!$clone_details['vendor_product_exists']) {
            $this->cloneProductPrices($master_product_id, $clone_details['vendor_product_id']);
            $this->cloneProductDescriptions($master_product_id, $clone_details['vendor_product_id']);
            $this->cloneProductCategories($master_product_id, $clone_details['vendor_product_id']);

            if ($this->getProductFieldValue($master_product_id, 'product_type') === self::PRODUCT_TYPE_CONFIGURABLE) {
                $variations = $this->getProductVariations($master_product_id);
                foreach ($variations as $variation_product_id) {
                    $this->createVendorProduct($variation_product_id, $company_id);
                }
            }
        }

        return $result;
    }

    /**
     * Clones product data from ?:products table.
     *
     * @param int $master_product_id Product ID
     * @param int $company_id        Vendor company ID
     *
     * @return \Tygh\Common\OperationResult Vendor product ID creation result
     * @throws \Tygh\Exceptions\DatabaseException
     * @throws \Tygh\Exceptions\DeveloperException
     */
    private function cloneProduct($master_product_id, $company_id)
    {
        $result = new OperationResult(true);
        $vendor_product_id = $this->getVendorProductId($master_product_id, $company_id);
        if ($vendor_product_id) {
            $result->setData([
                'vendor_product_exists' => true,
                'vendor_product_id'     => $vendor_product_id,
            ]);

            return $result;
        }

        $product = $this->db->getRow(
            'SELECT * FROM ?:products WHERE product_id = ?i AND company_id = ?i',
            $master_product_id,
            0
        );
        if (!$product) {
            $result->setSuccess(false);
        }

        $product['parent_product_id'] = $master_product_id;
        $product['company_id'] = $company_id;

        unset($product['product_id'], $product['variation_code'], $product['variation_options'], $product['is_default_variation']);

        $vendor_product_id = $this->db->query('INSERT INTO ?:products ?e', $product);
        $result->setData([
            'vendor_product_exists' => false,
            'vendor_product_id'     => $vendor_product_id,
        ]);

        return $result;
    }

    /**
     * Clones product prices from ?:product_prices table.
     *
     * @param int $master_product_id Master product ID
     * @param int $vendor_product_id Vendor product ID
     *
     * @throws \Tygh\Exceptions\DatabaseException
     * @throws \Tygh\Exceptions\DeveloperException
     */
    private function cloneProductPrices($master_product_id, $vendor_product_id)
    {
        $prices = $this->db->getArray('SELECT * FROM ?:product_prices WHERE product_id = ?i', $master_product_id);

        foreach ($prices as &$price) {
            $price['product_id'] = $vendor_product_id;
        }

        $this->db->query('INSERT INTO ?:product_prices ?m', $prices);
    }

    /**
     * Clones product descriptions from ?:product_descriptions table.
     *
     * @param int $master_product_id Master product ID
     * @param int $vendor_product_id Vendor product ID
     */
    public function cloneProductDescriptions($master_product_id, $vendor_product_id, $lang_code = null)
    {
        $condition = $this->db->quote('AND product_id = ?i', $master_product_id);
        if ($lang_code !== null) {
            $condition .= $this->db->quote(' AND lang_code = ?s', $lang_code);
        }

        $descriptions = $this->db->getArray('SELECT * FROM ?:product_descriptions WHERE 1 ?p', $condition);

        foreach ($descriptions as $description) {
            $description['product_id'] = $vendor_product_id;
            $this->db->replaceInto('product_descriptions', $description);
        }
    }

    /**
     * @inheritdoc
     *
     * @param string $type
     *
     * @return \Tygh\Addons\MasterProducts\Product\Type
     */
    public function getProductTypeInstance($type)
    {
        if (!$this->isProductTypeExists($type)) {
            $type = self::PRODUCT_TYPE_SIMPLE;
        }

        if (!isset($this->types_cache[$type])) {
            $this->types_cache[$type] = new Type($this->getProductTypeSchema($type));
        }

        return $this->types_cache[$type];
    }
}