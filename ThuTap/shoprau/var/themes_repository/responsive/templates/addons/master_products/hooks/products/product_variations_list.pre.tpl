{if $product.product_id != $product.vendor_product_id && $product.company_id}
    {$variation_link = fn_link_attach(fn_url($variation_link), "company_id=`$product.company_id`") scope="parent"}
{/if}
