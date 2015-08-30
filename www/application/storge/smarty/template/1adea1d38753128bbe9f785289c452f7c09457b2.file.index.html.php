<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 22:26:13
         compiled from "F:\www\yfcms\www\application\views\cheat\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2844255a66d8599c3c0-49649863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1adea1d38753128bbe9f785289c452f7c09457b2' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\cheat\\index.html',
      1 => 1436969480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2844255a66d8599c3c0-49649863',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_cat' => 0,
    'pc' => 0,
    'member_info' => 0,
    'member_data' => 0,
    'member_count' => 0,
    'report_domain_count' => 0,
    'analyze_domain_count' => 0,
    'static_url' => 0,
    'domain_list' => 0,
    'dl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a66d85a70385_61652861',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a66d85a70385_61652861')) {function content_55a66d85a70385_61652861($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\www\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="#">作弊网站</a> > <a href="#">分类浏览</a>
</div>

<div class="list">

    <div class="list_left">
        <div class="list_left_top">
            <ul>
                <a class="on">全部网址</a>
                <?php  $_smarty_tpl->tpl_vars['pc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pc']->key => $_smarty_tpl->tpl_vars['pc']->value) {
$_smarty_tpl->tpl_vars['pc']->_loop = true;
?>
                <a href="#<?php echo $_smarty_tpl->tpl_vars['pc']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['pc']->value['title'];?>
</a>
                <?php } ?>
            </ul>
        </div>
        <div class="list_left_dec">
            <ul>
                <?php if (isset($_smarty_tpl->tpl_vars['member_info']->value['id'])) {?>
                <li class="tu"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['member_data']->value['photo'];?>
"></a></li>
                <li class="tit"><span>共有 <b><?php echo $_smarty_tpl->tpl_vars['member_count']->value;?>
</b> 个用户，举报了 <b><?php echo $_smarty_tpl->tpl_vars['report_domain_count']->value;?>
</b> 条网址,云端分析了<b><?php echo $_smarty_tpl->tpl_vars['analyze_domain_count']->value;?>
</b>条网址</span><a href="#">全部网址</a></li>
                <li class="dec"><span><a href="/home/"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/04.gif"></a></span> <b><?php echo $_smarty_tpl->tpl_vars['member_data']->value['truename'];?>
</b>，您好！您共有积分 </b><?php echo $_smarty_tpl->tpl_vars['member_data']->value['totalScore'];?>
</b> 分，可下载 <b><?php echo $_smarty_tpl->tpl_vars['member_data']->value['totalScore'];?>
</b> 条作弊网址！</li>
                <?php }?>
            </ul>
        </div>

        <div class="main_left_top"><span><a href="/home/report/">举报作弊网站</a></span>最新全部动态</div>

        <div class="main_left_new">
            <?php  $_smarty_tpl->tpl_vars['dl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['domain_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dl']->key => $_smarty_tpl->tpl_vars['dl']->value) {
$_smarty_tpl->tpl_vars['dl']->_loop = true;
?>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['dl']->value['memberPhoto'];?>
"></li>
                <?php if ($_smarty_tpl->tpl_vars['dl']->value['type']==1) {?>
                     <li class="tit"><span>奖励 <?php echo $_smarty_tpl->tpl_vars['dl']->value['score'];?>
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
                    <li class="tit"><span>奖励 <?php echo $_smarty_tpl->tpl_vars['dl']->value['score'];?>
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

    <div class="list_right">

        <div class="login_right">
            <div class="login_right_top">
                <?php echo $_smarty_tpl->getSubTemplate ("modules/login.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="login_right_cer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/01.gif"></div>
            <div class="login_right_bot"><b>云扫除能为您做什么？</b><br>云扫除是收集网上所有关于作弊百度联盟的网站，网盟推广用户可以批量提交作弊网址;云扫除还可以为您批量分析您网盟推广里面的网址效果如何，给您分析出来建议您屏蔽的网址！</div>
        </div>

        <div class="main_right_top">活跃排行榜</div>
        <div class="main_right_tline"></div>
        <div class="main_right_name">
            <?php echo $_smarty_tpl->getSubTemplate ("modules/member_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="main_right_bline"></div>

        <div class="main_right_top">最新注册用户</div>
        <div class="main_right_tline"></div>
        <div class="main_right_new">
            <?php echo $_smarty_tpl->getSubTemplate ("modules/member_new.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="main_right_bline"></div>


    </div>
</div><?php }} ?>
