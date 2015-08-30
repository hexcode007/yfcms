<?php /* Smarty version Smarty-3.1.17, created on 2015-07-14 13:29:33
         compiled from "C:\wwwroot\yfcms\www\application\views\layout\default_layout.html" */ ?>
<?php /*%%SmartyHeaderCode:987855a49e3d98aa57-23588562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4113415cc439a48b6c5b2583731d11b2cdb9ecd1' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\layout\\default_layout.html',
      1 => 1436368596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '987855a49e3d98aa57-23588562',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a49e3da4fc75_60762304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a49e3da4fc75_60762304')) {function content_55a49e3da4fc75_60762304($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/bodytop.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['main']->value) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['main']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("layout/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php }} ?>
