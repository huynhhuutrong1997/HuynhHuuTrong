{if $runtime.company_id && $product_data.product_id && (!$product_data.company_id || $product_data.is_vendor_product && !$product_type->isFieldAvailableForVendorProduct("detailed_image"))}
    {$allow_update_files = false scope = parent}
{/if}