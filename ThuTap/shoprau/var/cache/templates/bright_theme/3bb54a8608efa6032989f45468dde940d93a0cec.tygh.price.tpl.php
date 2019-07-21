<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:12
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\common\price.tpl" */ ?>
<?php /*%%SmartyHeaderCode:710162425b5040d46d6258-25258068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bb54a8608efa6032989f45468dde940d93a0cec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\common\\price.tpl',
      1 => 1542716919,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '710162425b5040d46d6258-25258068',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'settings' => 0,
    'value' => 0,
    'primary_currency' => 0,
    'currencies' => 0,
    'span_id' => 0,
    'class' => 0,
    'live_editor_name' => 0,
    'live_editor_phrase' => 0,
    'secondary_currency' => 0,
    'is_integer' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040d4897de1_86315278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040d4897de1_86315278')) {function content_5b5040d4897de1_86315278($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_format_price')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\modifier.format_price.php';
if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['settings']->value['General']['alternative_currency']=="use_selected_and_alternative") {
echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,false,$_smarty_tpl->tpl_vars['live_editor_name']->value,$_smarty_tpl->tpl_vars['live_editor_phrase']->value);
if ($_smarty_tpl->tpl_vars['secondary_currency']->value!=$_smarty_tpl->tpl_vars['primary_currency']->value) {?>&nbsp;<?php if ($_smarty_tpl->tpl_vars['class']->value) {?><span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>(<?php if ($_smarty_tpl->tpl_vars['class']->value) {?></span><?php }?><bdi><?php echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,true,$_smarty_tpl->tpl_vars['is_integer']->value,$_smarty_tpl->tpl_vars['live_editor_name']->value,$_smarty_tpl->tpl_vars['live_editor_phrase']->value);?>
</bdi><?php if ($_smarty_tpl->tpl_vars['class']->value) {?><span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>)<?php if ($_smarty_tpl->tpl_vars['class']->value) {?></span><?php }
}
} else { ?><bdi><?php echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,true,$_smarty_tpl->tpl_vars['live_editor_name']->value,$_smarty_tpl->tpl_vars['live_editor_phrase']->value);?>
</bdi><?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="common/price.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/price.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['settings']->value['General']['alternative_currency']=="use_selected_and_alternative") {
echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['primary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,false,$_smarty_tpl->tpl_vars['live_editor_name']->value,$_smarty_tpl->tpl_vars['live_editor_phrase']->value);
if ($_smarty_tpl->tpl_vars['secondary_currency']->value!=$_smarty_tpl->tpl_vars['primary_currency']->value) {?>&nbsp;<?php if ($_smarty_tpl->tpl_vars['class']->value) {?><span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>(<?php if ($_smarty_tpl->tpl_vars['class']->value) {?></span><?php }?><bdi><?php echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,true,$_smarty_tpl->tpl_vars['is_integer']->value,$_smarty_tpl->tpl_vars['live_editor_name']->value,$_smarty_tpl->tpl_vars['live_editor_phrase']->value);?>
</bdi><?php if ($_smarty_tpl->tpl_vars['class']->value) {?><span class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['class']->value, ENT_QUOTES, 'UTF-8');?>
"><?php }?>)<?php if ($_smarty_tpl->tpl_vars['class']->value) {?></span><?php }
}
} else { ?><bdi><?php echo smarty_modifier_format_price($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['currencies']->value[$_smarty_tpl->tpl_vars['secondary_currency']->value],$_smarty_tpl->tpl_vars['span_id']->value,$_smarty_tpl->tpl_vars['class']->value,true,$_smarty_tpl->tpl_vars['live_editor_name']->value,$_smarty_tpl->tpl_vars['live_editor_phrase']->value);?>
</bdi><?php }
}?><?php }} ?>
