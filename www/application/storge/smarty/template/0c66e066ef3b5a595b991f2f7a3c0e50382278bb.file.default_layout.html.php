<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 22:26:08
         compiled from "F:\www\yfcms\www\application\views\layout\default_layout.html" */ ?>
<?php /*%%SmartyHeaderCode:2492555a66d809bc223-55199326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c66e066ef3b5a595b991f2f7a3c0e50382278bb' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\layout\\default_layout.html',
      1 => 1436969481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2492555a66d809bc223-55199326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a66d80a4e5f6_67326196',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a66d80a4e5f6_67326196')) {function content_55a66d80a4e5f6_67326196($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/bodytop.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['main']->value) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['main']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("layout/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
