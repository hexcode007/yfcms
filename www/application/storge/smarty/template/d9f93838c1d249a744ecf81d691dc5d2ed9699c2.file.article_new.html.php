<?php /* Smarty version Smarty-3.1.17, created on 2015-07-14 14:44:47
         compiled from "C:\wwwroot\yfcms\www\application\views\modules\article_new.html" */ ?>
<?php /*%%SmartyHeaderCode:2817655a4af0a6b74a1-41448112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f93838c1d249a744ecf81d691dc5d2ed9699c2' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\modules\\article_new.html',
      1 => 1436856175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2817655a4af0a6b74a1-41448112',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a4af0a6daf33_49428590',
  'variables' => 
  array (
    'article_recommen' => 0,
    'ar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a4af0a6daf33_49428590')) {function content_55a4af0a6daf33_49428590($_smarty_tpl) {?><ul>
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
