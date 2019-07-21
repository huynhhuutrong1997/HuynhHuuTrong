<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:21
         compiled from "919fcfa3245d801a1f310749e6e360110780ad06" */ ?>
<?php /*%%SmartyHeaderCode:4647169685b5040dd9d9392-44512605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '919fcfa3245d801a1f310749e6e360110780ad06' => 
    array (
      0 => '919fcfa3245d801a1f310749e6e360110780ad06',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '4647169685b5040dd9d9392-44512605',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'addons' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040dd9f36c1_94099706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040dd9f36c1_94099706')) {function content_5b5040dd9f36c1_94099706($_smarty_tpl) {?><?php if (!is_callable('smarty_function_call_phone')) include 'C:/xampp/htdocs/shoprau/app/addons/call_requests/functions/smarty_plugins\\function.call_phone.php';
if (!is_callable('smarty_function_call_request')) include 'C:/xampp/htdocs/shoprau/app/addons/call_requests/functions/smarty_plugins\\function.call_request.php';
?><?php if ($_smarty_tpl->tpl_vars['addons']->value['call_requests']['status']=="A") {?>
<div class="ty-cr-phone-number-link">
    <div class="ty-cr-phone"><?php echo smarty_function_call_phone(array(),$_smarty_tpl);?>
  <span class="ty-cr-work">Mon-Fr 10a.m.-6p.m.</span></div>
    <div class="ty-cr-link"><?php echo smarty_function_call_request(array(),$_smarty_tpl);?>
</div>
</div>
<?php }?><?php }} ?>
