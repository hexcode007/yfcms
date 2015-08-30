<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 23:52:36
         compiled from "F:\www\yfcms\www\application\views\modules\article_new.html" */ ?>
<?php /*%%SmartyHeaderCode:1893455a681c49c7322-63764749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89b145c7412bea7452fc5436d25b28ffe51ef9a6' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\modules\\article_new.html',
      1 => 1436969482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1893455a681c49c7322-63764749',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article_recommen' => 0,
    'ar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a681c49fff19_65962958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a681c49fff19_65962958')) {function content_55a681c49fff19_65962958($_smarty_tpl) {?><ul>
    <?php  $_smarty_tpl->tpl_vars['ar'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ar']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['article_recommen']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ar']->key => $_smarty_tpl->tpl_vars['ar']->value) {
$_smarty_tpl->tpl_vars['ar']->_loop = true;
?>
	    <li><span>感谢 <b><?php echo $_smarty_tpl->tpl_vars['ar']->value['memberName'];?>
</b> 投稿，系统奖励其 <b><?php echo $_smarty_tpl->tpl_vars['ar']->value['score'];?>
</b> 积分</span><a href="#"><?php echo $_smarty_tpl->tpl_vars['ar']->value['title'];?>
</a></li>
	<?php } ?>
</ul><?php }} ?>
