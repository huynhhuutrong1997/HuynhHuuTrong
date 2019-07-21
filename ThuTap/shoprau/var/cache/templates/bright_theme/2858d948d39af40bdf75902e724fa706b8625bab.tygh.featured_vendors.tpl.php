<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:41:58
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\blocks\vendor_list_templates\featured_vendors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3525067665b5040c61b6719-57407445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2858d948d39af40bdf75902e724fa706b8625bab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\blocks\\vendor_list_templates\\featured_vendors.tpl',
      1 => 1542716919,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '3525067665b5040c61b6719-57407445',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'block' => 0,
    'items' => 0,
    'columns' => 0,
    'splitted_companies' => 0,
    'scompanies' => 0,
    'company' => 0,
    'obj_prefix' => 0,
    'show_logo' => 0,
    'obj_id' => 0,
    'form_open' => 0,
    'logo' => 0,
    'show_location' => 0,
    'city' => 0,
    'country' => 0,
    'rating' => 0,
    'show_rating' => 0,
    'products_count' => 0,
    'show_products_count' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040c62775e0_75330747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040c62775e0_75330747')) {function content_5b5040c62775e0_75330747($_smarty_tpl) {?><?php if (!is_callable('smarty_function_split')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.split.php';
if (!is_callable('smarty_function_math')) include 'C:\\xampp\\htdocs\\shoprau\\app\\lib\\vendor\\smarty\\smarty\\libs\\plugins\\function.math.php';
if (!is_callable('smarty_block_hook')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\block.hook.php';
if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>

<?php $_smarty_tpl->tpl_vars['show_location'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['show_location'])===null||$tmp==='' ? "N" : $tmp)=="Y", null, 0);?>
<?php $_smarty_tpl->tpl_vars['show_rating'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['show_rating'])===null||$tmp==='' ? "N" : $tmp)=="Y", null, 0);?>
<?php $_smarty_tpl->tpl_vars['show_products_count'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['show_products_count'])===null||$tmp==='' ? "N" : $tmp)=="Y", null, 0);?>

<?php $_smarty_tpl->tpl_vars['columns'] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['number_of_columns'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['obj_prefix'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000", null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['items']->value) {?>
    <?php echo smarty_function_split(array('data'=>$_smarty_tpl->tpl_vars['items']->value,'size'=>(($tmp = @$_smarty_tpl->tpl_vars['columns']->value)===null||$tmp==='' ? "5" : $tmp),'assign'=>"splitted_companies"),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"100 / x",'x'=>(($tmp = @$_smarty_tpl->tpl_vars['columns']->value)===null||$tmp==='' ? "5" : $tmp),'assign'=>"cell_width"),$_smarty_tpl);?>


    <div class="grid-list ty-grid-vendors">
        <?php  $_smarty_tpl->tpl_vars["scompanies"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["scompanies"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['splitted_companies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["scompanies"]->key => $_smarty_tpl->tpl_vars["scompanies"]->value) {
$_smarty_tpl->tpl_vars["scompanies"]->_loop = true;
$_smarty_tpl->tpl_vars["company"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["company"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scompanies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["company"]->key => $_smarty_tpl->tpl_vars["company"]->value) {
$_smarty_tpl->tpl_vars["company"]->_loop = true;
?><div class="ty-column<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['columns']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['company']->value) {
if ($_smarty_tpl->tpl_vars['company']->value['logos']) {
$_smarty_tpl->tpl_vars['show_logo'] = new Smarty_variable(true, null, 0);
} else {
$_smarty_tpl->tpl_vars['show_logo'] = new Smarty_variable(false, null, 0);
}
$_smarty_tpl->tpl_vars['obj_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['company']->value['company_id'], null, 0);
$_smarty_tpl->tpl_vars['obj_id_prefix'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['company']->value['company_id']), null, 0);
echo $_smarty_tpl->getSubTemplate ("common/company_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('company'=>$_smarty_tpl->tpl_vars['company']->value,'show_links'=>true,'show_logo'=>$_smarty_tpl->tpl_vars['show_logo']->value,'show_city'=>true,'show_country'=>true), 0);?>
<div class="ty-grid-list__item"><?php $_smarty_tpl->tpl_vars['form_open'] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_open']->value];
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"companies:featured_vendors")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"companies:featured_vendors"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<div class="ty-grid-list__company-logo"><?php $_smarty_tpl->tpl_vars['logo'] = new Smarty_variable("logo_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['logo']->value];?>
</div><?php if ($_smarty_tpl->tpl_vars['show_location']->value) {?><div class="ty-grid-list__item-location"><?php $_smarty_tpl->tpl_vars['city'] = new Smarty_variable("city_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
$_smarty_tpl->tpl_vars['country'] = new Smarty_variable("country_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="company-location"><bdi><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['city']->value];?>
, <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['country']->value];?>
</bdi></a></div><?php }
$_smarty_tpl->tpl_vars['rating'] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
if (Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['rating']->value]&&$_smarty_tpl->tpl_vars['show_rating']->value) {?><div class="grid-list__rating"><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['rating']->value];?>
</div><?php }?><div class="ty-grid-list__total-products"><?php $_smarty_tpl->tpl_vars['products_count'] = new Smarty_variable("products_count_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
if (Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['products_count']->value]&&$_smarty_tpl->tpl_vars['show_products_count']->value) {
echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['products_count']->value];
}?></div><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"companies:featured_vendors"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div><?php }?></div><?php }
} ?>
    </div>
<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/vendor_list_templates/featured_vendors.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/vendor_list_templates/featured_vendors.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?>

<?php $_smarty_tpl->tpl_vars['show_location'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['show_location'])===null||$tmp==='' ? "N" : $tmp)=="Y", null, 0);?>
<?php $_smarty_tpl->tpl_vars['show_rating'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['show_rating'])===null||$tmp==='' ? "N" : $tmp)=="Y", null, 0);?>
<?php $_smarty_tpl->tpl_vars['show_products_count'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['block']->value['properties']['show_products_count'])===null||$tmp==='' ? "N" : $tmp)=="Y", null, 0);?>

<?php $_smarty_tpl->tpl_vars['columns'] = new Smarty_variable($_smarty_tpl->tpl_vars['block']->value['properties']['number_of_columns'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['obj_prefix'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['block']->value['block_id'])."000", null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['items']->value) {?>
    <?php echo smarty_function_split(array('data'=>$_smarty_tpl->tpl_vars['items']->value,'size'=>(($tmp = @$_smarty_tpl->tpl_vars['columns']->value)===null||$tmp==='' ? "5" : $tmp),'assign'=>"splitted_companies"),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"100 / x",'x'=>(($tmp = @$_smarty_tpl->tpl_vars['columns']->value)===null||$tmp==='' ? "5" : $tmp),'assign'=>"cell_width"),$_smarty_tpl);?>


    <div class="grid-list ty-grid-vendors">
        <?php  $_smarty_tpl->tpl_vars["scompanies"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["scompanies"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['splitted_companies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["scompanies"]->key => $_smarty_tpl->tpl_vars["scompanies"]->value) {
$_smarty_tpl->tpl_vars["scompanies"]->_loop = true;
$_smarty_tpl->tpl_vars["company"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["company"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scompanies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["company"]->key => $_smarty_tpl->tpl_vars["company"]->value) {
$_smarty_tpl->tpl_vars["company"]->_loop = true;
?><div class="ty-column<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['columns']->value, ENT_QUOTES, 'UTF-8');?>
"><?php if ($_smarty_tpl->tpl_vars['company']->value) {
if ($_smarty_tpl->tpl_vars['company']->value['logos']) {
$_smarty_tpl->tpl_vars['show_logo'] = new Smarty_variable(true, null, 0);
} else {
$_smarty_tpl->tpl_vars['show_logo'] = new Smarty_variable(false, null, 0);
}
$_smarty_tpl->tpl_vars['obj_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['company']->value['company_id'], null, 0);
$_smarty_tpl->tpl_vars['obj_id_prefix'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['obj_prefix']->value).((string)$_smarty_tpl->tpl_vars['company']->value['company_id']), null, 0);
echo $_smarty_tpl->getSubTemplate ("common/company_data.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('company'=>$_smarty_tpl->tpl_vars['company']->value,'show_links'=>true,'show_logo'=>$_smarty_tpl->tpl_vars['show_logo']->value,'show_city'=>true,'show_country'=>true), 0);?>
<div class="ty-grid-list__item"><?php $_smarty_tpl->tpl_vars['form_open'] = new Smarty_variable("form_open_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['form_open']->value];
$_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"companies:featured_vendors")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"companies:featured_vendors"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<div class="ty-grid-list__company-logo"><?php $_smarty_tpl->tpl_vars['logo'] = new Smarty_variable("logo_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['logo']->value];?>
</div><?php if ($_smarty_tpl->tpl_vars['show_location']->value) {?><div class="ty-grid-list__item-location"><?php $_smarty_tpl->tpl_vars['city'] = new Smarty_variable("city_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
$_smarty_tpl->tpl_vars['country'] = new Smarty_variable("country_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="company-location"><bdi><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['city']->value];?>
, <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['country']->value];?>
</bdi></a></div><?php }
$_smarty_tpl->tpl_vars['rating'] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
if (Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['rating']->value]&&$_smarty_tpl->tpl_vars['show_rating']->value) {?><div class="grid-list__rating"><?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['rating']->value];?>
</div><?php }?><div class="ty-grid-list__total-products"><?php $_smarty_tpl->tpl_vars['products_count'] = new Smarty_variable("products_count_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);
if (Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['products_count']->value]&&$_smarty_tpl->tpl_vars['show_products_count']->value) {
echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['products_count']->value];
}?></div><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"companies:featured_vendors"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div><?php }?></div><?php }
} ?>
    </div>
<?php }
}?><?php }} ?>
