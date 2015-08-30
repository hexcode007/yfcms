<?php /* Smarty version Smarty-3.1.17, created on 2015-07-14 14:34:25
         compiled from "C:\wwwroot\yfcms\www\application\views\modules\member_top.html" */ ?>
<?php /*%%SmartyHeaderCode:1772255a4ad71e6db59-20109441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f4368126db4c442a944029888748d6d8eb0ecad' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\modules\\member_top.html',
      1 => 1436788156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1772255a4ad71e6db59-20109441',
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
  'unifunc' => 'content_55a4ad71ed7a61_18686347',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a4ad71ed7a61_18686347')) {function content_55a4ad71ed7a61_18686347($_smarty_tpl) {?><ul>

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
