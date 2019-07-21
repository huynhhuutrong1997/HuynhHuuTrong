{if $product.product_id != $product.vendor_product_id && $product.company_id}
    {$product_detail_view_url = fn_link_attach(fn_url($product_detail_view_url), "company_id=`$product.company_id`") scope="parent"}
{/if}