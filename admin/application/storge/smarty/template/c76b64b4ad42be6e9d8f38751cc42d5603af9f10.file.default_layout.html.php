<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 21:39:36
         compiled from "F:\www\yfcms\admin\application\views\layout\default_layout.html" */ ?>
<?php /*%%SmartyHeaderCode:1911255ae4b984460f8-38548804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c76b64b4ad42be6e9d8f38751cc42d5603af9f10' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\layout\\default_layout.html',
      1 => 1436382363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1911255ae4b984460f8-38548804',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4b985141a4_19786746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4b985141a4_19786746')) {function content_55ae4b985141a4_19786746($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php echo $_smarty_tpl->getSubTemplate ("layout/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <body>
        <?php echo $_smarty_tpl->getSubTemplate ("layout/bodytop.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="mainout items">
            <div class="main">
                <?php if ($_smarty_tpl->tpl_vars['main']->value) {?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['main']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }?>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("layout/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("layout/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html>


<?php }} ?>
