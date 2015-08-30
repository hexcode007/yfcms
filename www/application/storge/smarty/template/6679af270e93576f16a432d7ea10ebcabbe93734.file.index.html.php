<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:32:07
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:84693088655a5d437edfba6-50277554%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6679af270e93576f16a432d7ea10ebcabbe93734' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/index/index.html',
      1 => 1436924649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84693088655a5d437edfba6-50277554',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
    'domain_list' => 0,
    'dl' => 0,
    'article_recommen' => 0,
    'ar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d4380f6a52_23641955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d4380f6a52_23641955')) {function content_55a5d4380f6a52_23641955($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/a/domains/ys.vip8.org/public_html/yfcms/framework/librarys/Smarty/libs/plugins/modifier.date_format.php';
?><!----------login---------->
<div class="login">
    <div class="login_left"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/index.png"></div>
    <div class="login_right">
        <div class="login_right_top">
            <?php echo $_smarty_tpl->getSubTemplate ("modules/login.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
        <div class="login_right_cer"><a href="/reg.html"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/01.gif"></a></div>
        <div class="login_right_bot"><b>云扫除能为您做什么？</b><br>云扫除是收集网上所有关于作弊百度联盟的网站，网盟推广用户可以批量提交作弊网址;云扫除还可以为您批量分析您网盟推广里面的网址效果如何，给您分析出来建议您屏蔽的网址！</div>
    </div>
</div>

<!----------main---------->
<div class="main">
    <div class="main_left">
        <div class="main_left_top"><span><a href="#">更多</a></span> <span><a href="#">举报作弊网站</a></span> <span><a href="#">分析查询</a></span>网站最新动态</div>
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
        <div class="main_left_top"><span><a href="#">更多</a></span> <span><a href="#">投稿网盟推广经</a></span>最新推荐文章</div>
        <div class="main_left_article">
            <ul>
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
            </ul>
        </div>
    </div>
    <div class="main_right">
        <div class="main_right_top">活跃排行榜</div>
        <div class="main_right_tline"></div>
        <div class="main_right_name">
            <?php echo $_smarty_tpl->getSubTemplate ("modules/member_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="main_right_bline"></d
            <div class="main_right_top">最新注册用户</div>
            <div class="main_right_tline"></div>
            <div class="main_right_new">
                <?php echo $_smarty_tpl->getSubTemplate ("modules/member_new.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="main_right_bline"></div>

        </div>
    </div>

    <!----------class---------->
    <div class="class">
        <div class="class_top"><span><a href="#">全部</a> <a href="#">举报</a></span>分类浏览查阅</div>
        <div class="class_bot">
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/001.jpg"></li>
                <li class="tit"><a href="#">图片/艺术</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/002.gif"></li>
                <li class="tit"><a href="#">生活/居家</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/003.jpg"></li>
                <li class="tit"><a href="#">社会/财经</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/004.gif"></li>
                <li class="tit"><a href="#">健康/养生</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/005.gif"></li>
                <li class="tit"><a href="#">情感/婚姻</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/006.jpg"></li>
                <li class="tit"><a href="#">历史/文化</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/007.gif"></li>
                <li class="tit"><a href="#">影音/休闲</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/008.jpg"></li>
                <li class="tit"><a href="#">职场/社交</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/009.jpg"></li>
                <li class="tit"><a href="#">美食/烹饪</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/010.gif"></li>
                <li class="tit"><a href="#">教育/学习</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/011.jpg"></li>
                <li class="tit"><a href="#">电脑/上网</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
            <ul>
                <li class="tu"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/008.jpg"></li>
                <li class="tit"><a href="#">新手/帮助</a></li>
                <li class="dec">共计2345条网址，共 3245 人举报过 4545 次</li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
    
</script>
<?php }} ?>
