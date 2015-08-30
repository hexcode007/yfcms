<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:01:08
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/layout/default_layout.html" */ ?>
<?php /*%%SmartyHeaderCode:84693088655a5ccf4cd7796-71096762%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd81743a761073d3c799e73aeb2ac9d47ab346d02' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/layout/default_layout.html',
      1 => 1436924650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84693088655a5ccf4cd7796-71096762',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5ccf4e4a636_88562812',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5ccf4e4a636_88562812')) {function content_55a5ccf4e4a636_88562812($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/bodytop.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['main']->value) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['main']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("layout/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
