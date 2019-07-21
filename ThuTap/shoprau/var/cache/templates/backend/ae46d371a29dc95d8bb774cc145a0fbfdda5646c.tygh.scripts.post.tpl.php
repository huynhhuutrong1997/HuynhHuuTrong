<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:43:17
         compiled from "C:\xampp\htdocs\shoprau\design\backend\templates\addons\vendor_plans\hooks\index\scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18989106525b5041151977e8-71051230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae46d371a29dc95d8bb774cc145a0fbfdda5646c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\backend\\templates\\addons\\vendor_plans\\hooks\\index\\scripts.post.tpl',
      1 => 1539150706,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '18989106525b5041151977e8-71051230',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vendor_plans_payments' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5041151d44d9_84406080',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5041151d44d9_84406080')) {function content_5b5041151d44d9_84406080($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\block.inline_script.php';
?><?php if ($_smarty_tpl->tpl_vars['vendor_plans_payments']->value) {?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
Tygh.$(document).ready(function() {
    Tygh.$.get('<?php echo fn_url('vendor_plans.async?is_ajax=1','A','current');?>
');
});
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<?php }} ?>
