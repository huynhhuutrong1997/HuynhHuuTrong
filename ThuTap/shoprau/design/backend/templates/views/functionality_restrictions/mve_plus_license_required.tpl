{if "MULTIVENDOR"|fn_allowed_for && $store_mode != "plus"}
    <div id="restriction_promo_dialog" class="restriction-promo restriction-promo--ult">
        {__("text_only_mve_plus_license_required", [
        "[product]" => $smarty.const.PRODUCT_NAME,
        "[mve_plus_license_url]" => $config.resources.mve_plus_license_url
        ])}
        <div class="center">
            <a class="restriction-update-btn restriction-update-btn--single" href="{$config.resources.mve_plus_license_url}" target="_blank">{__("upgrade_license")}</a>
        </div>
    </div>
{/if}
