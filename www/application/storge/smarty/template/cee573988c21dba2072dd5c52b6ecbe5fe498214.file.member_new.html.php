<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:32:08
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/member_new.html" */ ?>
<?php /*%%SmartyHeaderCode:195774779355a5d43813cb26-90215839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cee573988c21dba2072dd5c52b6ecbe5fe498214' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/member_new.html',
      1 => 1436924651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195774779355a5d43813cb26-90215839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member_new' => 0,
    'mt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d4381704c9_00110141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d4381704c9_00110141')) {function content_55a5d4381704c9_00110141($_smarty_tpl) {?><ul>
    <?php  $_smarty_tpl->tpl_vars['mt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_new']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mt']->key => $_smarty_tpl->tpl_vars['mt']->value) {
$_smarty_tpl->tpl_vars['mt']->_loop = true;
?>
    <li><a href="#<?php echo $_smarty_tpl->tpl_vars['mt']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['mt']->value['photo'];?>
"><br><?php echo $_smarty_tpl->tpl_vars['mt']->value['truename'];?>
</a></li>
    <?php } ?>
</ul><?php }} ?>
