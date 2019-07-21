<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:38
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\addons\call_requests\hooks\index\scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7785757455b5040ee0e3de9-23636860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0952213d4f627a502e3f9d8a306fef989f2fa3d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\addons\\call_requests\\hooks\\index\\scripts.post.tpl',
      1 => 1542716958,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '7785757455b5040ee0e3de9-23636860',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'call_requests_phone_mask_codes' => 0,
    'addons' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040ee1a3f73_24067335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040ee1a3f73_24067335')) {function content_5b5040ee1a3f73_24067335($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.script.php';
if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php
fn_preload_lang_vars(array('call_requests.error_validator_phone','call_requests.error_validator_phone'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo smarty_function_script(array('src'=>"js/lib/maskedinput/jquery.maskedinput.min.js"),$_smarty_tpl);?>


<?php echo smarty_function_script(array('src'=>"js/lib/inputmask/jquery.inputmask.min.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/lib/jquery-bind-first/jquery.bind-first-0.2.3.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/lib/inputmask-multi/jquery.inputmask-multi.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
    (function(_, $) {
        _.call_requests_phone_masks_list = <?php echo $_smarty_tpl->tpl_vars['call_requests_phone_mask_codes']->value;?>
;
        <?php if ($_smarty_tpl->tpl_vars['addons']->value['call_requests']['phone_mask']) {?>
            _.call_phone_mask = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['addons']->value['call_requests']['phone_mask'], ENT_QUOTES, 'UTF-8');?>
'
        <?php }?>

        _.tr({
            'call_requests.error_validator_phone': '<?php echo strtr($_smarty_tpl->__("call_requests.error_validator_phone"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'
        });
    }(Tygh, Tygh.$));
<?php echo '</script'; ?>
>

<?php echo smarty_function_script(array('src'=>"js/addons/call_requests/call_requests.js"),$_smarty_tpl);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/call_requests/hooks/index/scripts.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/call_requests/hooks/index/scripts.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo smarty_function_script(array('src'=>"js/lib/maskedinput/jquery.maskedinput.min.js"),$_smarty_tpl);?>


<?php echo smarty_function_script(array('src'=>"js/lib/inputmask/jquery.inputmask.min.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/lib/jquery-bind-first/jquery.bind-first-0.2.3.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/lib/inputmask-multi/jquery.inputmask-multi.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
    (function(_, $) {
        _.call_requests_phone_masks_list = <?php echo $_smarty_tpl->tpl_vars['call_requests_phone_mask_codes']->value;?>
;
        <?php if ($_smarty_tpl->tpl_vars['addons']->value['call_requests']['phone_mask']) {?>
            _.call_phone_mask = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['addons']->value['call_requests']['phone_mask'], ENT_QUOTES, 'UTF-8');?>
'
        <?php }?>

        _.tr({
            'call_requests.error_validator_phone': '<?php echo strtr($_smarty_tpl->__("call_requests.error_validator_phone"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'
        });
    }(Tygh, Tygh.$));
<?php echo '</script'; ?>
>

<?php echo smarty_function_script(array('src'=>"js/addons/call_requests/call_requests.js"),$_smarty_tpl);
}?><?php }} ?>
