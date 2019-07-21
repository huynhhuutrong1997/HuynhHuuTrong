<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:43:14
         compiled from "C:\xampp\htdocs\shoprau\design\backend\templates\buttons\sign_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99131575b50411250d0f9-29132857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '876c605f829514afbfd9bb8792ce94e1153b070d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\backend\\templates\\buttons\\sign_in.tpl',
      1 => 1539150706,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '99131575b50411250d0f9-29132857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b504112525202_60316183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b504112525202_60316183')) {function content_5b504112525202_60316183($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('sign_in'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>$_smarty_tpl->__("sign_in"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_arrow'=>"on",'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value), 0);?>
<?php }} ?>
