<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:30
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\addons\reward_points\hooks\profiles\my_account_menu.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8824248015b5040e601a921-85402972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9803e94607163d5e7ef107744c47a68fbe81a334' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\addons\\reward_points\\hooks\\profiles\\my_account_menu.post.tpl',
      1 => 1542716957,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '8824248015b5040e601a921-85402972',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'auth' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040e605a098_91046986',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040e605a098_91046986')) {function content_5b5040e605a098_91046986($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php
fn_preload_lang_vars(array('my_points','my_points'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['auth']->value['user_id']) {?>
<li class="ty-account-info__item ty-dropdown-box__item"><a class="ty-account-info__a" href="<?php echo htmlspecialchars(fn_url("reward_points.userlog"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo $_smarty_tpl->__("my_points");?>
&nbsp;<span class="ty-reward-points-count">(<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['user_info']->value['points'])===null||$tmp==='' ? "0" : $tmp), ENT_QUOTES, 'UTF-8');?>
)</span></a></li>
<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/reward_points/hooks/profiles/my_account_menu.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/reward_points/hooks/profiles/my_account_menu.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['auth']->value['user_id']) {?>
<li class="ty-account-info__item ty-dropdown-box__item"><a class="ty-account-info__a" href="<?php echo htmlspecialchars(fn_url("reward_points.userlog"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo $_smarty_tpl->__("my_points");?>
&nbsp;<span class="ty-reward-points-count">(<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['user_info']->value['points'])===null||$tmp==='' ? "0" : $tmp), ENT_QUOTES, 'UTF-8');?>
)</span></a></li>
<?php }
}?><?php }} ?>
