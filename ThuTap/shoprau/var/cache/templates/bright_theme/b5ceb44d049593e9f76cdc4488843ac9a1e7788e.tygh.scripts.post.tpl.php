<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:38
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\addons\image_zoom\hooks\index\scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18735363725b5040ee565290-43765616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5ceb44d049593e9f76cdc4488843ac9a1e7788e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\addons\\image_zoom\\hooks\\index\\scripts.post.tpl',
      1 => 1542716966,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '18735363725b5040ee565290-43765616',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'config' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040ee5a8df5_05507369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040ee5a8df5_05507369')) {function content_5b5040ee5a8df5_05507369($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><?php echo '<script'; ?>
 type="text/javascript">
CloudZoom = {
    path: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_location'], ENT_QUOTES, 'UTF-8');?>
/js/addons/image_zoom'
};
<?php echo '</script'; ?>
>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/image_zoom/hooks/index/scripts.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/image_zoom/hooks/index/scripts.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><?php echo '<script'; ?>
 type="text/javascript">
CloudZoom = {
    path: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['current_location'], ENT_QUOTES, 'UTF-8');?>
/js/addons/image_zoom'
};
<?php echo '</script'; ?>
>
<?php }?><?php }} ?>
