<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:43:17
         compiled from "C:\xampp\htdocs\shoprau\design\backend\templates\addons\advanced_import\hooks\index\scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21341362845b5041155c9bc6-40923302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f640e0fa0db27d39a02f11003ef064633d6fef02' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\backend\\templates\\addons\\advanced_import\\hooks\\index\\scripts.post.tpl',
      1 => 1539150706,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '21341362845b5041155c9bc6-40923302',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b504115607607_07675557',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b504115607607_07675557')) {function content_5b504115607607_07675557($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.script.php';
if (!is_callable('smarty_block_inline_script')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\block.inline_script.php';
?><?php
fn_preload_lang_vars(array('advanced_import.cant_save_preset_invalid_modifiers'));
?>
<?php echo smarty_function_script(array('src'=>"js/addons/advanced_import/func.js"),$_smarty_tpl);?>

<?php echo smarty_function_script(array('src'=>"js/addons/advanced_import/read_more.js"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
    (function(_, $) {
        _.tr({
            "advanced_import.cant_save_preset_invalid_modifiers":
                "<?php echo strtr($_smarty_tpl->__("advanced_import.cant_save_preset_invalid_modifiers"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
"
        });
    }(Tygh, Tygh.$));
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
