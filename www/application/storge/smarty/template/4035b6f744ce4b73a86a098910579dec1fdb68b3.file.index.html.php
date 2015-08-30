<?php /* Smarty version Smarty-3.1.17, created on 2015-07-14 18:44:50
         compiled from "C:\wwwroot\yfcms\www\application\views\home\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1539055a4a150b40d96-73778000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4035b6f744ce4b73a86a098910579dec1fdb68b3' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\home\\index.html',
      1 => 1436870689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1539055a4a150b40d96-73778000',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a4a150c2a530_67376578',
  'variables' => 
  array (
    'domain_list' => 0,
    'dl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a4a150c2a530_67376578')) {function content_55a4a150c2a530_67376578($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wwwroot\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><!----------zuobi---------->
<div class="zuobi">
    <a href="/">云扫除</a> > <a href="/home/">会员中心</a></span>
</div>

<div class="member">
    <div class="member_left">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/home_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="member_left_new">
            <?php  $_smarty_tpl->tpl_vars['dl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['domain_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dl']->key => $_smarty_tpl->tpl_vars['dl']->value) {
$_smarty_tpl->tpl_vars['dl']->_loop = true;
?>
            <ul>
                <li class="tx"><img src="<?php echo $_smarty_tpl->tpl_vars['dl']->value['memberPhoto'];?>
"></li>
                <?php if ($_smarty_tpl->tpl_vars['dl']->value['type']==1) {?>
                     <li class="dt"><span>奖励 <?php echo $_smarty_tpl->tpl_vars['dl']->value['score'];?>
 积分</span><a href="#<?php echo $_smarty_tpl->tpl_vars['dl']->value['memberId'];?>
"><?php echo $_smarty_tpl->tpl_vars['dl']->value['memberName'];?>
</a> 在 <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dl']->value['createTime'],"%Y-%m-%d %H:%M:%S");?>
</b> 举报了一个网盟推广作弊网站</li>
                    <li class="dec"><?php echo $_smarty_tpl->tpl_vars['dl']->value['memberName'];?>
举报的网址在云扫除共被 <?php echo $_smarty_tpl->tpl_vars['dl']->value['reportCount'];?>
 用户举报过，<a href="#<?php echo $_smarty_tpl->tpl_vars['dl']->value['type'];?>
/<?php echo $_smarty_tpl->tpl_vars['dl']->value['id'];?>
">查看详情</a></li>
                <?php } else { ?>
                    <li class="dt"><span>奖励 <?php echo $_smarty_tpl->tpl_vars['dl']->value['score'];?>
 积分</span><a href="#<?php echo $_smarty_tpl->tpl_vars['dl']->value['memberId'];?>
"><?php echo $_smarty_tpl->tpl_vars['dl']->value['memberName'];?>
</a> 在 <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dl']->value['createTime'],"%Y-%m-%d %H:%M:%S");?>
</b> 分析了账户里的网盟网址</li>
                    <?php if ($_smarty_tpl->tpl_vars['dl']->value['isAnalyze']) {?>
                    <li class="dec">云扫除为其分析出了 <?php if ($_smarty_tpl->tpl_vars['dl']->value['star5']) {?><?php echo $_smarty_tpl->tpl_vars['dl']->value['star5'];?>
个五星，<?php }?><?php if ($_smarty_tpl->tpl_vars['dl']->value['star4']) {?><?php echo $_smarty_tpl->tpl_vars['dl']->value['star4'];?>
个四星，<?php }?><?php if ($_smarty_tpl->tpl_vars['dl']->value['star3']) {?><?php echo $_smarty_tpl->tpl_vars['dl']->value['star3'];?>
个三星，<?php }?><?php if ($_smarty_tpl->tpl_vars['dl']->value['star2']) {?><?php echo $_smarty_tpl->tpl_vars['dl']->value['star2'];?>
个二星，<?php }?><?php if ($_smarty_tpl->tpl_vars['dl']->value['star1']) {?><?php echo $_smarty_tpl->tpl_vars['dl']->value['star1'];?>
个一星<?php }?>，<a href="#<?php echo $_smarty_tpl->tpl_vars['dl']->value['type'];?>
/<?php echo $_smarty_tpl->tpl_vars['dl']->value['id'];?>
">查看详情</a></li>
                    <?php } else { ?>
                    <li class="dec">管理员审核中,通过后将进入云端分析</li>
                    <?php }?>
                <?php }?>
                
            </ul>
            <?php } ?>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/home_ad.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><?php }} ?>
