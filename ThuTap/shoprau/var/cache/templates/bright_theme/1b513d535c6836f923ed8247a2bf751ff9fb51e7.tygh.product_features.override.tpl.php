<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:42:11
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\addons\product_variations\hooks\products\product_features.override.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12517386075b5040d3ae4dc1-08343831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b513d535c6836f923ed8247a2bf751ff9fb51e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\addons\\product_variations\\hooks\\products\\product_features.override.tpl',
      1 => 1542716952,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '12517386075b5040d3ae4dc1-08343831',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'show_features' => 0,
    'product' => 0,
    'obj_prefix' => 0,
    'obj_id' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040d3b44bd5_74500853',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040d3b44bd5_74500853')) {function content_5b5040d3b44bd5_74500853($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if ($_smarty_tpl->tpl_vars['show_features']->value&&$_smarty_tpl->tpl_vars['product']->value['product_type']===constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_CONFIGURABLE")) {?>
    <?php $_smarty_tpl->createLocalArrayVariable('product', null, 0);
$_smarty_tpl->tpl_vars['product']->value['product_features'] = fn_get_product_features_list($_smarty_tpl->tpl_vars['product']->value);?>
    <?php $_smarty_tpl->tpl_vars['product'] = new Smarty_variable(fn_product_variations_merge_features($_smarty_tpl->tpl_vars['product']->value), null, 0);?>

    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_features]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_features']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('features'=>$_smarty_tpl->tpl_vars['product']->value['product_features'],'no_container'=>true), 0);?>

    <!--product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
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
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/product_variations/hooks/products/product_features.override.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/product_variations/hooks/products/product_features.override.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if ($_smarty_tpl->tpl_vars['show_features']->value&&$_smarty_tpl->tpl_vars['product']->value['product_type']===constant("\Tygh\Addons\ProductVariations\Product\Manager::PRODUCT_TYPE_CONFIGURABLE")) {?>
    <?php $_smarty_tpl->createLocalArrayVariable('product', null, 0);
$_smarty_tpl->tpl_vars['product']->value['product_features'] = fn_get_product_features_list($_smarty_tpl->tpl_vars['product']->value);?>
    <?php $_smarty_tpl->tpl_vars['product'] = new Smarty_variable(fn_product_variations_merge_features($_smarty_tpl->tpl_vars['product']->value), null, 0);?>

    <div class="cm-reload-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
" id="product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="appearance[show_features]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['show_features']->value, ENT_QUOTES, 'UTF-8');?>
" />
        <?php echo $_smarty_tpl->getSubTemplate ("views/products/components/product_features_short_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('features'=>$_smarty_tpl->tpl_vars['product']->value['product_features'],'no_container'=>true), 0);?>

    <!--product_features_update_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_prefix']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['obj_id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }
}?><?php }} ?>
