<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:41:52
         compiled from "C:\xampp\htdocs\shoprau\design\themes\bright_theme\templates\blocks\static_templates\my_account_links_advanced.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12764429795b5040c0952425-65859052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32087bbdb2b0ca2fac9fedf95da871d00f5504b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\bright_theme\\templates\\blocks\\static_templates\\my_account_links_advanced.tpl',
      1 => 1542716924,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '12764429795b5040c0952425-65859052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'auth' => 0,
    'addons' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040c09968c0_85623457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040c09968c0_85623457')) {function content_5b5040c09968c0_85623457($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php
fn_preload_lang_vars(array('profile_details','sign_in','create_account','orders','wishlist','comparison_list','profile_details','sign_in','create_account','orders','wishlist','comparison_list'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><ul id="account_info_links_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
" class="ty-account-info__links">
<?php if ($_smarty_tpl->tpl_vars['auth']->value['user_id']) {?>
    <li><a href="<?php echo htmlspecialchars(fn_url("profiles.update"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("profile_details");?>
</a></li>
<?php } else { ?>
    <li><a href="<?php echo htmlspecialchars(fn_url("auth.login_form"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("sign_in");?>
</a></li>
    <li><a href="<?php echo htmlspecialchars(fn_url("profiles.add"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("create_account");?>
</a></li>
<?php }?>
    <li><a href="<?php echo htmlspecialchars(fn_url("orders.search"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("orders");?>
</a></li>
    <?php if ($_smarty_tpl->tpl_vars['addons']->value['wishlist']&&$_smarty_tpl->tpl_vars['addons']->value['wishlist']['status']=='A') {?>
        <li><a href="<?php echo htmlspecialchars(fn_url("wishlist.view"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("wishlist");?>
</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['enable_compare_products']=='Y') {?>
    <li><a href="<?php echo htmlspecialchars(fn_url("product_features.compare"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("comparison_list");?>
</a></li>
    <?php }?>
<!--account_info_links_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
--></ul><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/my_account_links_advanced.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/my_account_links_advanced.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><ul id="account_info_links_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
" class="ty-account-info__links">
<?php if ($_smarty_tpl->tpl_vars['auth']->value['user_id']) {?>
    <li><a href="<?php echo htmlspecialchars(fn_url("profiles.update"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("profile_details");?>
</a></li>
<?php } else { ?>
    <li><a href="<?php echo htmlspecialchars(fn_url("auth.login_form"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("sign_in");?>
</a></li>
    <li><a href="<?php echo htmlspecialchars(fn_url("profiles.add"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("create_account");?>
</a></li>
<?php }?>
    <li><a href="<?php echo htmlspecialchars(fn_url("orders.search"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("orders");?>
</a></li>
    <?php if ($_smarty_tpl->tpl_vars['addons']->value['wishlist']&&$_smarty_tpl->tpl_vars['addons']->value['wishlist']['status']=='A') {?>
        <li><a href="<?php echo htmlspecialchars(fn_url("wishlist.view"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("wishlist");?>
</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['settings']->value['General']['enable_compare_products']=='Y') {?>
    <li><a href="<?php echo htmlspecialchars(fn_url("product_features.compare"), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("comparison_list");?>
</a></li>
    <?php }?>
<!--account_info_links_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['snapping_id'], ENT_QUOTES, 'UTF-8');?>
--></ul><?php }?><?php }} ?>
