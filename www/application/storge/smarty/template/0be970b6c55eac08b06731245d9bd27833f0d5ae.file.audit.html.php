<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 10:26:27
         compiled from "C:\wwwroot\yfcms\www\application\views\home\audit.html" */ ?>
<?php /*%%SmartyHeaderCode:2151355a4ad4327bba4-40770183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0be970b6c55eac08b06731245d9bd27833f0d5ae' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\home\\audit.html',
      1 => 1436927184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2151355a4ad4327bba4-40770183',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a4ad4334ab12_29195634',
  'variables' => 
  array (
    'my_article_list' => 0,
    'al' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a4ad4334ab12_29195634')) {function content_55a4ad4334ab12_29195634($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wwwroot\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="#">会员中心</a></span>
</div>


<!----------member---------->
<div class="member">
    <div class="member_left">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/home_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="member_left_jd">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['al'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['al']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['my_article_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['al']->key => $_smarty_tpl->tpl_vars['al']->value) {
$_smarty_tpl->tpl_vars['al']->_loop = true;
?>
                <li><em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['al']->value['createTime'],"%Y-%m-%d %H:%M:%S");?>
</em> 在 <a href="/home/article/">老生常谈</a> 投稿了 <a href="/article/<?php echo $_smarty_tpl->tpl_vars['al']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['al']->value['title'];?>
</a><span><?php if ($_smarty_tpl->tpl_vars['al']->value['isAudit']==1) {?>审核通过<?php } elseif ($_smarty_tpl->tpl_vars['al']->value['isAudit']==2) {?>审核未通过<?php } else { ?>未审核<?php }?></span></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/home_ad.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
