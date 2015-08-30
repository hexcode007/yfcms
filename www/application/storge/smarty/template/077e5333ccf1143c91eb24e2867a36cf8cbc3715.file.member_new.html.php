<?php /* Smarty version Smarty-3.1.17, created on 2015-07-14 14:34:25
         compiled from "C:\wwwroot\yfcms\www\application\views\modules\member_new.html" */ ?>
<?php /*%%SmartyHeaderCode:1015655a4ad71eecf01-48848594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '077e5333ccf1143c91eb24e2867a36cf8cbc3715' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\modules\\member_new.html',
      1 => 1436788139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1015655a4ad71eecf01-48848594',
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
  'unifunc' => 'content_55a4ad71f29fd2_58179810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a4ad71f29fd2_58179810')) {function content_55a4ad71f29fd2_58179810($_smarty_tpl) {?><ul>
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
