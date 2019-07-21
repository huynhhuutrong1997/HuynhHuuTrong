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

use Tygh\Addons\ProductVariations\Product\Type as BaseType;

class Type extends BaseType
{
    /**
     * Checks whether a product tab can be displayed on a vendor product editing page.
     *
     * @param string $tab_id Tab name
     *
     * @return bool
     */
    public function isTabAvailableForVendorProduct($tab_id)
    {
        $result = parent::isTabAvailable($tab_id);

        if ($result && isset($this->schema['child_tabs'])) {
            $result = in_array($tab_id, $this->schema['child_tabs']);
        }

        return $result;
    }

    /**
     * Checks wheter a product field can be edited for a vendor product.
     *
     * @param string $field Field name
     *
     * @return bool
     */
    public function isFieldAvailableForVendorProduct($field)
    {
        $result = parent::isFieldAvailable($field);

        if ($result && isset($this->schema['child_fields'])) {
            $result = in_array($field, $this->schema['child_fields']);
        }

        return $result;
    }

    /**
     * Checks wheter a product field could be merged from vendor product into a master product.
     *
     * @param string $field Field name
     *
     * @return bool
     */
    public function isFieldMergeableForVendorProduct($field)
    {
        $result = parent::isFieldMergeable($field);
        if ($result) {
            return $result;
        }

        if (!isset($this->schema['child_mergeable_fields'])) {
            return false;
        }

        return in_array($field, $this->schema['child_mergeable_fields'], true);
    }
}