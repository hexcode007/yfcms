<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:32:08
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/member_top.html" */ ?>
<?php /*%%SmartyHeaderCode:171463691555a5d438113b83-37731521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8268536fe850e72fc66309155dcabd6ffb3b11cd' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/member_top.html',
      1 => 1436924651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171463691555a5d438113b83-37731521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member_top' => 0,
    'mt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d438137c91_19750528',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d438137c91_19750528')) {function content_55a5d438137c91_19750528($_smarty_tpl) {?><ul>

    <?php  $_smarty_tpl->tpl_vars['mt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_top']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mt']->key => $_smarty_tpl->tpl_vars['mt']->value) {
$_smarty_tpl->tpl_vars['mt']->_loop = true;
?>
    <li>
    <dd class="left"><img src="<?php echo $_smarty_tpl->tpl_vars['mt']->value['photo'];?>
"></dd>
    <dd class="tit"><span><?php echo $_smarty_tpl->tpl_vars['mt']->value['totalScore'];?>
分</span><a href="#"><?php echo $_smarty_tpl->tpl_vars['mt']->value['truename'];?>
</a></dd>
    <dd class="dec">查询分析：<?php echo $_smarty_tpl->tpl_vars['mt']->value['push_count'];?>
次，举报作弊：<?php echo $_smarty_tpl->tpl_vars['mt']->value['report_count'];?>
个网站</dd>
    </li>
    <?php } ?>
</ul><?php }} ?>
