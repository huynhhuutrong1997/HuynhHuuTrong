<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:15
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\addons\product_variations\hooks\products\qty_description.override.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3954907975b5040d7136ad0-94775852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd54f85d4a0433424a3fb148036d791e4221bc09d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\addons\\product_variations\\hooks\\products\\qty_description.override.tpl',
      1 => 1542716952,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '3954907975b5040d7136ad0-94775852',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'product' => 0,
    'obj_prefix' => 0,
    'obj_id' => 0,
    'min_qty' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040d718d9d9_81750299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040d718d9d9_81750299')) {function content_5b5040d718d9d9_81750299($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php
fn_preload_lang_vars(array('text_cart_min_qty','text_cart_min_qty'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['product']->value['product_type']===constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_CONFIGURABLE")) {?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="qty_description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['min_qty']->value&&$_smarty_tpl->tpl_vars['product']->value['min_qty']) {?>
            <p class="ty-min-qty-description"><?php echo $_smarty_tpl->__("text_cart_min_qty",array("[product]"=>$_smarty_tpl->tpl_vars['product']->value['product'],"[quantity]"=>$_smarty_tpl->tpl_vars['product']->value['min_qty']));?>
.</p>
        <?php }?>
    <!--qty_description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/product_variations/hooks/products/qty_description.override.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/product_variations/hooks/products/qty_description.override.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['product']->value['product_type']===constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_CONFIGURABLE")) {?>
    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="qty_description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['min_qty']->value&&$_smarty_tpl->tpl_vars['product']->value['min_qty']) {?>
            <p class="ty-min-qty-description"><?php echo $_smarty_tpl->__("text_cart_min_qty",array("[product]"=>$_smarty_tpl->tpl_vars['product']->value['product'],"[quantity]"=>$_smarty_tpl->tpl_vars['product']->value['min_qty']));?>
.</p>
        <?php }?>
    <!--qty_description_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }
}?><?php }} ?>
