<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:41:40
         compiled from "C:\xampp\htdocs\shoprau\design\themes\bright_theme\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43563935b5040b406dbb4-82498870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2a4f68254912cc85338f595fe3d24a4768e4a16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\bright_theme\\templates\\index.tpl',
      1 => 1532162552,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '43563935b5040b406dbb4-82498870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language_direction' => 0,
    'page_title' => 0,
    'breadcrumbs' => 0,
    'i' => 0,
    'skip_page_title' => 0,
    'location_data' => 0,
    'logos' => 0,
    'runtime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040b44a9b55_67342345',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040b44a9b55_67342345')) {function content_5b5040b44a9b55_67342345($_smarty_tpl) {?><?php if (!is_callable('smarty_block_hook')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\block.hook.php';
if (!is_callable('smarty_modifier_count')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\modifier.count.php';
if (!is_callable('smarty_function_render_location')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.render_location.php';
?><?php
fn_preload_lang_vars(array('on_site_template_editing','on_site_live_editing'));
?>

<!DOCTYPE html>
<html <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:html_tag")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:html_tag"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:html_tag"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 lang="<?php echo htmlspecialchars(@constant('CART_LANGUAGE'), ENT_QUOTES, 'UTF-8');?>
" dir="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_direction']->value, ENT_QUOTES, 'UTF-8');?>
">
<head>
<?php $_smarty_tpl->_capture_stack[0][] = array("page_title", null, null); ob_start(); ?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:title")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:title"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php if ($_smarty_tpl->tpl_vars['page_title']->value) {?>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_title']->value, ENT_QUOTES, 'UTF-8');?>

<?php } else { ?>
    <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['i']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['i']->iteration=0;
 $_smarty_tpl->tpl_vars['i']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value) {
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->iteration++;
 $_smarty_tpl->tpl_vars['i']->index++;
 $_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->index === 0;
 $_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['first'] = $_smarty_tpl->tpl_vars['i']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bkt"]['last'] = $_smarty_tpl->tpl_vars['i']->last;
?>
        <?php if ($_smarty_tpl->tpl_vars['language_direction']->value=='rtl') {?>
            <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['last']) {
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['last']&&!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['first']) {?> :: <?php }
echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['i']->value['title']), ENT_QUOTES, 'UTF-8');
}?>
        <?php } else { ?>
            <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['first']) {
echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['i']->value['title']), ENT_QUOTES, 'UTF-8');
if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['bkt']['last']) {?> :: <?php }
}?>
        <?php }?>
    <?php } ?>
    <?php if (!$_smarty_tpl->tpl_vars['skip_page_title']->value&&$_smarty_tpl->tpl_vars['location_data']->value['title']) {
if (smarty_modifier_count($_smarty_tpl->tpl_vars['breadcrumbs']->value)>1) {?> - <?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['location_data']->value['title'], ENT_QUOTES, 'UTF-8');
}?>
<?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:title"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<title>Shop rau sạch</title>
<?php echo $_smarty_tpl->getSubTemplate ("meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:links")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:links"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <link href="<?php echo htmlspecialchars(fn_query_remove($_smarty_tpl->tpl_vars['logos']->value['favicon']['image']['image_path'],'t'), ENT_QUOTES, 'UTF-8');?>
" rel="shortcut icon" type="<?php echo htmlspecialchars(fn_get_mime_content_type($_smarty_tpl->tpl_vars['logos']->value['favicon']['image']['absolute_path']), ENT_QUOTES, 'UTF-8');?>
" />
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:links"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php echo $_smarty_tpl->getSubTemplate ("common/styles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('include_dropdown'=>true), 0);?>

<?php if (defined("DEVELOPMENT")&&@constant('DEVELOPMENT')==true) {?>
<?php echo '<script'; ?>
 type="text/javascript" data-no-defer>
window.jsErrors = [];
window.onerror = function(errorMessage) {
    document.write('<div data-ca-debug="1" style="border: 2px solid red; margin: 2px;">' + errorMessage + '</div>');
};
<?php echo '</script'; ?>
>
<!--[if lt IE 9]><?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.1.9/es5-shim.min.js"><?php echo '</script'; ?>
><![endif]-->
<?php }?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:head_scripts")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:head_scripts"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:head_scripts"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</head>

<body>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:body")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:body"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("common/toolbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->__("on_site_template_editing"),'href'=>"customization.disable_mode?type=design"), 0);?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['live_editor']) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("common/toolbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>$_smarty_tpl->__("on_site_live_editing"),'href'=>"customization.disable_mode?type=live_editor"), 0);?>

        <?php }?>
        <?php if (defined("THEMES_PANEL")&&!$_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['live_editor']) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("demo_theme_selector.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>

        <div class="ty-tygh <?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['theme_editor']) {?>te-mode<?php }?> <?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['live_editor']||$_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']||@constant('THEMES_PANEL')) {?>ty-top-panel-padding<?php }?>" id="tygh_container">

        <?php echo $_smarty_tpl->getSubTemplate ("common/loading_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ("common/notification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <div class="ty-helper-container" id="tygh_main_container">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:content")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:content"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                 
                <?php echo smarty_function_render_location(array(),$_smarty_tpl);?>

            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:content"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <!--tygh_main_container--></div>

        <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"index:footer")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"index:footer"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:footer"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <!--tygh_container--></div>

        <?php echo $_smarty_tpl->getSubTemplate ("common/scripts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


        <?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("backend:common/template_editor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['theme_editor']) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("backend:common/theme_editor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"index:body"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <!--chat zalo-->
    <div class="zalo-chat-widget" data-oaid="650862563194880763" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="400" margin-left="0"></div>
<?php echo '<script'; ?>
 src="https://sp.zalo.me/plugins/sdk.js"><?php echo '</script'; ?>
>


<!--chat FB-->
<style type="text/css">
.hisella-messages { position: fixed; bottom: -300px; left: 0; z-index: 999999; }
.hisella-messages-outer { position: relative; }
#hisella-minimize { background: #3b5998; font-size: 14px; color: #fff; padding: 3px 10px; position: absolute; top: -25px; left: -1px; border: 1px solid #E9EAED; cursor: pointer; }
@media screen and (max-width:768px){ #hisella-facebook { opacity:0; } .hisella-messages { bottom: -300px; right: -135px; } }
</style>
<div id='fb-root'></div>
<?php echo '<script'; ?>
>
(function($) { $(document).ready(function(){ $( '#hisella-minimize' ).click( function() { if( $( '#hisella-facebook' ).css( 'opacity' ) == 1 ) { $( '#hisella-facebook' ).css( 'opacity', 0.9 ); $( '.hisella-messages' ).animate( { right: '0' } ).animate( { bottom: '0' } ); } else { $( '.hisella-messages' ).animate( { bottom: '-300px' } ).animate( { right: '-135px' }, 400, function(){ $( '#hisella-facebook' ).css( 'opacity', 1 ) } ); } } ) }); })(jQuery);
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
<?php echo '</script'; ?>
>
<div class="hisella-messages"><div class="hisella-messages-outer"><div id="hisella-minimize">Facebook chat</div><div id="hisella-facebook" class='fb-page' data-adapt-container-width='true' data-height='300' data-hide-cover='false' data-href='https://www.facebook.com/Shop-rau-s%E1%BA%A1ch-1300982793368094/?modal=admin_todo_tour' data-show-facepile='true' data-show-posts='false' data-small-header='false' data-tabs='messages' data-width='250'></div></div></div>
    
</body>

</html>
<?php }} ?>
