<div class="switch switch-mini cm-switch list-btns company-switch-storefront-status-button" data-ca-company-id="{$company.company_id}" data-ca-opened-status="{"StorefrontStatuses::OPENED"|enum}" data-ca-closed-status="{"StorefrontStatuses::CLOSED"|enum}" data-ca-return-url="{$config.current_url|escape:url}" id="switch_storefront_status_{$company.company_id}">
    {$checked = $company.storefront_status == "StorefrontStatuses::OPENED"|enum}
    <input type="checkbox"{if $checked} checked="checked"{/if}/>
</div>
