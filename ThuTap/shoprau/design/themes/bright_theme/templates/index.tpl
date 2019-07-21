{*  To modify and rearrange content blocks in your storefront pages
    or change the page structure, use the layout editor under Design->Layouts
    in your admin panel.

    There, you can:

    * modify the page layout
    * make it fluid or static
    * set the number of columns
    * add, remove, and move blocks
    * change block templates and types and more.

    You only need to edit a .tpl file to create a new template
    or modify an existing one; often, this is not the case.

    Basic layouting concepts:

    This theme uses the Twitter Bootstrap 2.3 CSS framework.

    A layout consists of four containers (CSS class .container):
    TOP PANEL, HEADER, CONTENT, and FOOTER.

    Containers are partitioned with fixed-width grids (CSS classes .span1, .span2, etc.).

    Content blocks live inside grids. You can drag'n'drop blocks
    from grid to grid in the layout editor.

    A block represents a certain content type (e.g. products)
    and uses a certain template to display it (e.g. list with thumbnails).
*}
<!DOCTYPE html>
<html {hook name="index:html_tag"}{/hook} lang="{$smarty.const.CART_LANGUAGE}" dir="{$language_direction}">
<head>
{capture name="page_title"}
{hook name="index:title"}
{if $page_title}
    {$page_title}
{else}
    {foreach from=$breadcrumbs item=i name="bkt"}
        {if $language_direction == 'rtl'}
            {if !$smarty.foreach.bkt.last}{if !$smarty.foreach.bkt.last && !$smarty.foreach.bkt.first} :: {/if}{$i.title|strip_tags}{/if}
        {else}
            {if !$smarty.foreach.bkt.first}{$i.title|strip_tags}{if !$smarty.foreach.bkt.last} :: {/if}{/if}
        {/if}
    {/foreach}
    {if !$skip_page_title && $location_data.title}{if $breadcrumbs|count > 1} - {/if}{$location_data.title}{/if}
{/if}
{/hook}
{/capture}
<title>Shop rau sạch</title>
{include file="meta.tpl"}
{hook name="index:links"}
    <link href="{$logos.favicon.image.image_path|fn_query_remove:'t'}" rel="shortcut icon" type="{$logos.favicon.image.absolute_path|fn_get_mime_content_type}" />
{/hook}
{include file="common/styles.tpl" include_dropdown=true}
{if "DEVELOPMENT"|defined && $smarty.const.DEVELOPMENT == true}
<script type="text/javascript" data-no-defer>
window.jsErrors = [];
window.onerror = function(errorMessage) {
    document.write('<div data-ca-debug="1" style="border: 2px solid red; margin: 2px;">' + errorMessage + '</div>');
};
</script>
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.1.9/es5-shim.min.js"></script><![endif]-->
{/if}
{hook name="index:head_scripts"}{/hook}
</head>

<body>
    {hook name="index:body"}
        {if $runtime.customization_mode.design}
            {include file="common/toolbar.tpl" title=__("on_site_template_editing") href="customization.disable_mode?type=design"}
        {/if}
        {if $runtime.customization_mode.live_editor}
            {include file="common/toolbar.tpl" title=__("on_site_live_editing") href="customization.disable_mode?type=live_editor"}
        {/if}
        {if "THEMES_PANEL"|defined && !$runtime.customization_mode.live_editor}
            {include file="demo_theme_selector.tpl"}
        {/if}

        <div class="ty-tygh {if $runtime.customization_mode.theme_editor}te-mode{/if} {if $runtime.customization_mode.live_editor || $runtime.customization_mode.design || $smarty.const.THEMES_PANEL}ty-top-panel-padding{/if}" id="tygh_container">

        {include file="common/loading_box.tpl"}
        {include file="common/notification.tpl"}

        <div class="ty-helper-container" id="tygh_main_container">
            {hook name="index:content"}
                 {* NOTE:
                    render_location - call a Smarty function that builds a page structure according to the layout (see Design->Layouts).
                    The function renders a template and generates blocks depending on 'dispatch'.
                *}
                {render_location}
            {/hook}
        <!--tygh_main_container--></div>

        {hook name="index:footer"}{/hook}
        <!--tygh_container--></div>

        {include file="common/scripts.tpl"}

        {if $runtime.customization_mode.design}
            {include file="backend:common/template_editor.tpl"}
        {/if}
        {if $runtime.customization_mode.theme_editor}
            {include file="backend:common/theme_editor.tpl"}
        {/if}
    {/hook}
    <!--chat zalo-->
    <div class="zalo-chat-widget" data-oaid="650862563194880763" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="400" margin-left="0"></div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>


<!--chat FB-->
<style type="text/css">
.hisella-messages { position: fixed; bottom: -300px; left: 0; z-index: 999999; }
.hisella-messages-outer { position: relative; }
#hisella-minimize { background: #3b5998; font-size: 14px; color: #fff; padding: 3px 10px; position: absolute; top: -25px; left: -1px; border: 1px solid #E9EAED; cursor: pointer; }
@media screen and (max-width:768px){ #hisella-facebook { opacity:0; } .hisella-messages { bottom: -300px; right: -135px; } }
</style>
<div id='fb-root'></div>
<script>
(function($) { $(document).ready(function(){ $( '#hisella-minimize' ).click( function() { if( $( '#hisella-facebook' ).css( 'opacity' ) == 1 ) { $( '#hisella-facebook' ).css( 'opacity', 0.9 ); $( '.hisella-messages' ).animate( { right: '0' } ).animate( { bottom: '0' } ); } else { $( '.hisella-messages' ).animate( { bottom: '-300px' } ).animate( { right: '-135px' }, 400, function(){ $( '#hisella-facebook' ).css( 'opacity', 1 ) } ); } } ) }); })(jQuery);
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="hisella-messages"><div class="hisella-messages-outer"><div id="hisella-minimize">Facebook chat</div><div id="hisella-facebook" class='fb-page' data-adapt-container-width='true' data-height='300' data-hide-cover='false' data-href='https://www.facebook.com/Shop-rau-s%E1%BA%A1ch-1300982793368094/?modal=admin_todo_tour' data-show-facepile='true' data-show-posts='false' data-small-header='false' data-tabs='messages' data-width='250'></div></div></div>
    
</body>

</html>
