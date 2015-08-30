<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 22:26:08
         compiled from "F:\www\yfcms\www\application\views\modules\member_new.html" */ ?>
<?php /*%%SmartyHeaderCode:2171955a66d80b98a43-92413249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e36bcde38201f77ec2d3e1980317d23efe29ffd' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\modules\\member_new.html',
      1 => 1436969482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2171955a66d80b98a43-92413249',
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
  'unifunc' => 'content_55a66d80ba5811_76017863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a66d80ba5811_76017863')) {function content_55a66d80ba5811_76017863($_smarty_tpl) {?><ul>
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
