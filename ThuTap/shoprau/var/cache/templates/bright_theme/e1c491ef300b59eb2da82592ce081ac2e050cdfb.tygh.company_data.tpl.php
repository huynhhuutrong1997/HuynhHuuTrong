<?php /* Smarty version Smarty-3.1.21, created on 2018-07-19 14:41:58
         compiled from "C:\xampp\htdocs\shoprau\design\themes\responsive\templates\common\company_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16939203515b5040c668a298-67504104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1c491ef300b59eb2da82592ce081ac2e050cdfb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shoprau\\design\\themes\\responsive\\templates\\common\\company_data.tpl',
      1 => 1542716919,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '16939203515b5040c668a298-67504104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'obj_id' => 0,
    'company' => 0,
    'hide_links' => 0,
    'show_links' => 0,
    'show_name' => 0,
    'show_trunc_name' => 0,
    'no_capture' => 0,
    'capture_name' => 0,
    'show_descr' => 0,
    'show_products_count' => 0,
    'show_city' => 0,
    'show_country' => 0,
    'show_logo' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5b5040c6969f97_76259934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b5040c6969f97_76259934')) {function content_5b5040c6969f97_76259934($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\modifier.truncate.php';
if (!is_callable('smarty_block_hook')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\block.hook.php';
if (!is_callable('smarty_function_set_id')) include 'C:/xampp/htdocs/shoprau/app/functions/smarty_plugins\\function.set_id.php';
?><?php
fn_preload_lang_vars(array('more','product_s','more','product_s'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
$_smarty_tpl->tpl_vars['obj_id'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['company']->value['company_id'] : $tmp), null, 0);?>

<?php if ((isset($_smarty_tpl->tpl_vars['hide_links']->value)&&!isset($_smarty_tpl->tpl_vars['show_links']->value))) {?>
    <?php $_smarty_tpl->tpl_vars['show_links'] = new Smarty_variable(!$_smarty_tpl->tpl_vars['hide_links']->value, null, 0);?>
<?php } elseif ((isset($_smarty_tpl->tpl_vars['show_links']->value)&&!isset($_smarty_tpl->tpl_vars['hide_links']->value))) {?>
    <?php $_smarty_tpl->tpl_vars['hide_links'] = new Smarty_variable(!$_smarty_tpl->tpl_vars['show_links']->value, null, 0);?>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_name']->value) {?>
        <?php if (!$_smarty_tpl->tpl_vars['show_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="ty-company-title"><?php }
echo $_smarty_tpl->tpl_vars['company']->value['company'];
if (!$_smarty_tpl->tpl_vars['show_links']->value) {?></strong><?php } else { ?></a><?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['show_trunc_name']->value) {?>
        <?php if (!$_smarty_tpl->tpl_vars['show_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="ty-company-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['company']->value['company']), ENT_QUOTES, 'UTF-8');?>
"><?php }
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['company']->value['company'],45,"...",true);
if (!$_smarty_tpl->tpl_vars['show_links']->value) {?></strong><?php } else { ?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"companies:data_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"companies:data_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"companies:data_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("company_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_descr']->value) {?>
        <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['company']->value['company_description']),1024);
if ($_smarty_tpl->tpl_vars['show_links']->value&&fn_strlen($_smarty_tpl->tpl_vars['company']->value['company_description'])>1024) {?> <a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("more");?>
</a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("company_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("products_count_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_products_count']->value) {?>
        <?php if (!$_smarty_tpl->tpl_vars['show_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="ty-company-total-products"><?php }
echo $_smarty_tpl->tpl_vars['company']->value['products_count'];?>
  <?php echo $_smarty_tpl->__("product_s");
if (!$_smarty_tpl->tpl_vars['show_links']->value) {?></strong><?php } else { ?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("products_count_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("city_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_city']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['company']->value['city'];?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("city_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("country_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_country']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['company']->value['country'];?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("country_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("logo_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_logo']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['show_links']->value) {?><a class="ty-company-image-wrapper" href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('images'=>$_smarty_tpl->tpl_vars['company']->value['logos']['theme']['image'],'image_width'=>"120",'class'=>"ty-company-image"), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['show_links']->value) {?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("logo_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"companies:company_data")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"companies:company_data"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"companies:company_data"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="common/company_data.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/company_data.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
$_smarty_tpl->tpl_vars['obj_id'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['obj_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['company']->value['company_id'] : $tmp), null, 0);?>

<?php if ((isset($_smarty_tpl->tpl_vars['hide_links']->value)&&!isset($_smarty_tpl->tpl_vars['show_links']->value))) {?>
    <?php $_smarty_tpl->tpl_vars['show_links'] = new Smarty_variable(!$_smarty_tpl->tpl_vars['hide_links']->value, null, 0);?>
<?php } elseif ((isset($_smarty_tpl->tpl_vars['show_links']->value)&&!isset($_smarty_tpl->tpl_vars['hide_links']->value))) {?>
    <?php $_smarty_tpl->tpl_vars['hide_links'] = new Smarty_variable(!$_smarty_tpl->tpl_vars['show_links']->value, null, 0);?>
<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_name']->value) {?>
        <?php if (!$_smarty_tpl->tpl_vars['show_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="ty-company-title"><?php }
echo $_smarty_tpl->tpl_vars['company']->value['company'];
if (!$_smarty_tpl->tpl_vars['show_links']->value) {?></strong><?php } else { ?></a><?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['show_trunc_name']->value) {?>
        <?php if (!$_smarty_tpl->tpl_vars['show_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="ty-company-title" title="<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['company']->value['company']), ENT_QUOTES, 'UTF-8');?>
"><?php }
echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['company']->value['company'],45,"...",true);
if (!$_smarty_tpl->tpl_vars['show_links']->value) {?></strong><?php } else { ?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("name_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"companies:data_block")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"companies:data_block"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"companies:data_block"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("rating_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("company_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_descr']->value) {?>
        <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['company']->value['company_description']),1024);
if ($_smarty_tpl->tpl_vars['show_links']->value&&fn_strlen($_smarty_tpl->tpl_vars['company']->value['company_description'])>1024) {?> <a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("more");?>
</a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("company_descr_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("products_count_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_products_count']->value) {?>
        <?php if (!$_smarty_tpl->tpl_vars['show_links']->value) {?><strong><?php } else { ?><a href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
" class="ty-company-total-products"><?php }
echo $_smarty_tpl->tpl_vars['company']->value['products_count'];?>
  <?php echo $_smarty_tpl->__("product_s");
if (!$_smarty_tpl->tpl_vars['show_links']->value) {?></strong><?php } else { ?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("products_count_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("city_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_city']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['company']->value['city'];?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("city_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("country_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_country']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['company']->value['country'];?>

    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("country_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->_capture_stack[0][] = array("logo_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, null); ob_start(); ?>
    <?php if ($_smarty_tpl->tpl_vars['show_logo']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['show_links']->value) {?><a class="ty-company-image-wrapper" href="<?php echo htmlspecialchars(fn_url("companies.products?company_id=".((string)$_smarty_tpl->tpl_vars['company']->value['company_id'])), ENT_QUOTES, 'UTF-8');?>
"><?php }?>
            <?php echo $_smarty_tpl->getSubTemplate ("common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('images'=>$_smarty_tpl->tpl_vars['company']->value['logos']['theme']['image'],'image_width'=>"120",'class'=>"ty-company-image"), 0);?>

        <?php if ($_smarty_tpl->tpl_vars['show_links']->value) {?></a><?php }?>
    <?php }?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if ($_smarty_tpl->tpl_vars['no_capture']->value) {?>
    <?php $_smarty_tpl->tpl_vars['capture_name'] = new Smarty_variable("logo_".((string)$_smarty_tpl->tpl_vars['obj_id']->value), null, 0);?>
    <?php echo Smarty::$_smarty_vars['capture'][$_smarty_tpl->tpl_vars['capture_name']->value];?>

<?php }?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('hook', array('name'=>"companies:company_data")); $_block_repeat=true; echo smarty_block_hook(array('name'=>"companies:company_data"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_hook(array('name'=>"companies:company_data"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);
}?><?php }} ?>
