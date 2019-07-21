<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:29
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\addons\vendor_communication\hooks\profiles\my_account_menu.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15698115625b5040e5d9df00-73272434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '746b34a0ed76edc7513a4366d94de980c4c98dc8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\addons\\vendor_communication\\hooks\\profiles\\my_account_menu.post.tpl',
      1 => 1542716945,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '15698115625b5040e5d9df00-73272434',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040e5ddbc28_89834724',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040e5ddbc28_89834724')) {function content_5b5040e5ddbc28_89834724($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php
fn_preload_lang_vars(array('vendor_communication.messages','vendor_communication.messages'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if (fn_allowed_for("MULTIVENDOR")&&$_smarty_tpl->tpl_vars['auth']->value['user_id']) {?>
    <li class="ty-account-info__item ty-dropdown-box__item"><a class="ty-account-info__a underlined" href="<?php echo htmlspecialchars(fn_url("vendor_communication.threads"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" ><?php echo $_smarty_tpl->__("vendor_communication.messages");?>
</a></li>
<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/vendor_communication/hooks/profiles/my_account_menu.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/vendor_communication/hooks/profiles/my_account_menu.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if (fn_allowed_for("MULTIVENDOR")&&$_smarty_tpl->tpl_vars['auth']->value['user_id']) {?>
    <li class="ty-account-info__item ty-dropdown-box__item"><a class="ty-account-info__a underlined" href="<?php echo htmlspecialchars(fn_url("vendor_communication.threads"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" ><?php echo $_smarty_tpl->__("vendor_communication.messages");?>
</a></li>
<?php }
}?><?php }} ?>
