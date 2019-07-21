<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:09
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\addons\product_variations\hooks\products\product_name.override.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2433393815b5040d1df9222-03744244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '330a0c9a9008f9024ff55c180b13317628d24195' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\addons\\product_variations\\hooks\\products\\product_name.override.tpl',
      1 => 1542716952,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2433393815b5040d1df9222-03744244',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'hide_links' => 0,
    'obj_prefix' => 0,
    'obj_id' => 0,
    'show_name' => 0,
    'product_link' => 0,
    'show_trunc_name' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040d1ecc997_33211165',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040d1ecc997_33211165')) {function content_5b5040d1ecc997_33211165($_smarty_tpl) {?><?php if (!is_callable('smarty_function_live_edit')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.live_edit.php';
if (!is_callable('smarty_modifier_truncate')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\modifier.truncate.php';
if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['product']->value['product_type']===constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_CONFIGURABLE")) {?>
    <?php if (!$_smarty_tpl->tpl_vars['hide_links']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['options_changed']) {?>
            <?php $_smarty_tpl->tpl_vars['product_link'] = new Smarty_variable(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])."&combination=".((string)$_smarty_tpl->tpl_vars['product']->value['options_combination'])), null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars['product_link'] = new Smarty_variable(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), null, 0);?>
        <?php }?>
    <?php }?>

    <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="name_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['show_name']->value) {?>
            <input type="hidden" name="appearance[show_name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_name']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['hide_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="product-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['product']), ENT_QUOTES, 'UTF-8');?>
" <?php echo smarty_function_live_edit(array('name'=>"product:product:".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'phrase'=>$_smarty_tpl->tpl_vars['product']->value['product']),$_smarty_tpl);?>
><?php }
echo $_smarty_tpl->tpl_vars['product']->value['product'];
if ($_smarty_tpl->tpl_vars['hide_links']->value) {?></strong><?php } else { ?></a><?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['show_trunc_name']->value) {?>
            <input type="hidden" name="appearance[show_trunc_name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_trunc_name']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['hide_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="product-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['product']), ENT_QUOTES, 'UTF-8');?>
" <?php echo smarty_function_live_edit(array('name'=>"product:product:".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'phrase'=>$_smarty_tpl->tpl_vars['product']->value['product']),$_smarty_tpl);?>
><?php }
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['product'],44,"...",true);
if ($_smarty_tpl->tpl_vars['hide_links']->value) {?></strong><?php } else { ?></a><?php }?>
        <?php }?>
    <!--name_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
<?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/product_variations/hooks/products/product_name.override.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/product_variations/hooks/products/product_name.override.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['product']->value['product_type']===constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_CONFIGURABLE")) {?>
    <?php if (!$_smarty_tpl->tpl_vars['hide_links']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['options_changed']) {?>
            <?php $_smarty_tpl->tpl_vars['product_link'] = new Smarty_variable(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])."&combination=".((string)$_smarty_tpl->tpl_vars['product']->value['options_combination'])), null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars['product_link'] = new Smarty_variable(fn_url("products.view?product_id=".((string)$_smarty_tpl->tpl_vars['product']->value['product_id'])), null, 0);?>
        <?php }?>
    <?php }?>

    <span class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="name_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['show_name']->value) {?>
            <input type="hidden" name="appearance[show_name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_name']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['hide_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="product-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['product']), ENT_QUOTES, 'UTF-8');?>
" <?php echo smarty_function_live_edit(array('name'=>"product:product:".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'phrase'=>$_smarty_tpl->tpl_vars['product']->value['product']),$_smarty_tpl);?>
><?php }
echo $_smarty_tpl->tpl_vars['product']->value['product'];
if ($_smarty_tpl->tpl_vars['hide_links']->value) {?></strong><?php } else { ?></a><?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['show_trunc_name']->value) {?>
            <input type="hidden" name="appearance[show_trunc_name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_trunc_name']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <?php if ($_smarty_tpl->tpl_vars['hide_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="product-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['product']->value['product']), ENT_QUOTES, 'UTF-8');?>
" <?php echo smarty_function_live_edit(array('name'=>"product:product:".((string)$_smarty_tpl->tpl_vars['product']->value['product_id']),'phrase'=>$_smarty_tpl->tpl_vars['product']->value['product']),$_smarty_tpl);?>
><?php }
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['product'],44,"...",true);
if ($_smarty_tpl->tpl_vars['hide_links']->value) {?></strong><?php } else { ?></a><?php }?>
        <?php }?>
    <!--name_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></span>
<?php }?>
<?php }?><?php }} ?>
