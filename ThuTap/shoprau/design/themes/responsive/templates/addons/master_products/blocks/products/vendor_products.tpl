{if $items|default:[]}

    <div class="ty-sellers-list">
    {foreach $items as $vendor_product}
        {$company_id = $vendor_product.company_id}
        {$product_id = $vendor_product.product_id}
        {$obj_prefix = "`$company_id`-"}

        <div class="ty-sellers-list__item">
            <form action="{""|fn_url}"
                  method="post"
                  name="vendor_products_form_{$company_id}"
                  enctype="multipart/form-data"
                  class="cm-disable-empty-files cm-ajax cm-ajax-full-render cm-ajax-status-middle"
            >
                <input type="hidden" name="result_ids" value="cart_status*,wish_list*,checkout*,account_info*,average_rating*"/>
                <input type="hidden" name="redirect_url" value="{$redirect_url|default:$config.current_url}"/>

                {$show_logo = $vendor_product.company.logos}

                {include file="common/company_data.tpl"
                        company=$vendor_product.company
                        show_name=true
                        show_links=true
                        show_logo=$show_logo
                        show_city=true
                        show_country=true
                        show_rating=true
                        show_posts_count=false
                }

                {include file="common/product_data.tpl"
                        product=$vendor_product
                        show_add_to_cart=true
                        show_amount_label=false
                        show_product_amount=true
                        show_add_to_wishlist=true
                        show_buy_now=false
                }

                <div class="ty-sellers-list__content">

                    {hook name="companies:vendor_products"}
                    <div class="ty-sellers-list__image">
                        {$logo="logo_`$company_id`"}
                        {$smarty.capture.$logo nofilter}
                    </div>

                    <div class="ty-sellers-list__title">
                        {$name="name_`$company_id`"}
                        {$smarty.capture.$name nofilter}

                        {$rating="rating_`$company_id`"}
                        <div class="sellers-list__rating">
                            {$smarty.capture.$rating nofilter}
                        </div>
                    </div>

                    <div class="ty-sellers-list__item-location">
                        {$city="city_`$company_id`"}
                        {$country="country_`$company_id`"}
                        {hook name="companies:vendor_products_location"}
                        <a href="{"companies.products?company_id=`$company_id`"|fn_url}"
                           class="company-location"
                        ><bdi>{$smarty.capture.$city nofilter}, {$smarty.capture.$country nofilter}</bdi></a>
                        {/hook}
                    </div>

                    <div class="ty-sellers-list__controls">
                        {$product_amount = "product_amount_`$product_id`"}
                        {$smarty.capture.$product_amount nofilter}

                        <div class="ty-sellers-list__price">
                            <a class="ty-sellers-list__price-link"
                               href="{fn_link_attach(fn_url("products.view?product_id=`$product_id`"), "company_id=`$company_id`")}"
                            >
                                {include file="common/price.tpl"
                                    value=$vendor_product.price
                                    class="ty-price-num"
                                }
                            </a>
                        </div>

                        <div class="ty-sellers-list__buttons">
                            {$add_to_cart = "add_to_cart_`$product_id`"}
                            {$smarty.capture.$add_to_cart nofilter}

                            {$list_buttons = "list_buttons_`$product_id`"}
                            {$smarty.capture.$list_buttons nofilter}
                        </div>

                    </div>
                    {/hook}
                </div>
            </form>
        </div>
    {/foreach}
    </div>
{/if}