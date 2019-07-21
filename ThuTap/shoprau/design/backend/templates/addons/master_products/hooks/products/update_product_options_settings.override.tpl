{if $product_data.is_vendor_product &&
    !$product_type->isFieldAvailableForVendorProduct("options_type") &&
    !$product_type->isFieldAvailableForVendorProduct("exceptions_type")
}
    <!-- Overridden by the Common Products for Vendors add-on -->
{/if}
