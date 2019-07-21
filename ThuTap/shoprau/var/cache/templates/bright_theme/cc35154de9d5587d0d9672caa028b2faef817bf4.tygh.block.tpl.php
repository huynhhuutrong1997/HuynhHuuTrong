<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:41:52
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\views\block_manager\render\block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2522668125b5040c03ba007-58599895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc35154de9d5587d0d9672caa028b2faef817bf4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\views\\block_manager\\render\\block.tpl',
      1 => 1542716920,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2522668125b5040c03ba007-58599895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'block' => 0,
    'content_alignment' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040c03e5e39_75152694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040c03e5e39_75152694')) {function content_5b5040c03e5e39_75152694($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']||$_smarty_tpl->tpl_vars['content_alignment']->value=='RIGHT'||$_smarty_tpl->tpl_vars['content_alignment']->value=='LEFT') {?>
    <div class="<?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['user_class'], ENT_QUOTES, 'UTF-8');
}
if ($_smarty_tpl->tpl_vars['content_alignment']->value=='RIGHT') {?> ty-float-right<?php } elseif ($_smarty_tpl->tpl_vars['content_alignment']->value=='LEFT') {?>
    ty-float-left<?php }?>">
<?php }?>
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php if ($_smarty_tpl->tpl_vars['block']->value['user_class']||$_smarty_tpl->tpl_vars['content_alignment']->value=='RIGHT'||$_smarty_tpl->tpl_vars['content_alignment']->value=='LEFT') {?>
    </div>
<?php }?><?php }} ?>
