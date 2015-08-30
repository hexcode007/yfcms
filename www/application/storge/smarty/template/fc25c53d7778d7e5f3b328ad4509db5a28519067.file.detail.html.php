<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 23:52:36
         compiled from "F:\www\yfcms\www\application\views\article\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:128355a681c4911a37-20502487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc25c53d7778d7e5f3b328ad4509db5a28519067' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\article\\detail.html',
      1 => 1436969480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128355a681c4911a37-20502487',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'detail' => 0,
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a681c49b33a7_46178285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a681c49b33a7_46178285')) {function content_55a681c49b33a7_46178285($_smarty_tpl) {?><div class="zuobi">
    <a href="/">云扫除</a> > <a href="/article/">老生常谈</a>
</div>

<div class="list">

    <div class="list_left">
        <div class="list_left_news"><h1><?php echo $_smarty_tpl->tpl_vars['detail']->value['title'];?>
</h1></div>
        <div class="list_left_name">
            感谢 <a href="#" target="_blank"><b><?php echo $_smarty_tpl->tpl_vars['detail']->value['author'];?>
</b></a> 在 <?php echo $_smarty_tpl->tpl_vars['detail']->value['createTime'];?>
 投稿！奖励 <b><?php echo $_smarty_tpl->tpl_vars['detail']->value['score'];?>
</b> 积分！  <span><a href="/home/tg/" target="_blank">我要投稿</a></span>
        </div>
        <div class="list_left_body">
            <?php echo $_smarty_tpl->tpl_vars['detail']->value['content'];?>

        </div>
        <div class="list_left_dc">
            <ul>
                <li class="ding"><i class="icon-like"></i>0 <a href="#">喜欢</a></li>
                <li class="cai"><i class="icon-like"></i>0 <a href="#">差劲</a></li>
            </ul>
        </div>


        <div class="main_left_top"><span><a href="#">更多</a></span> <span><a href="#">投稿网盟推广经</a></span>最新推荐文章</div>
        <div class="main_left_article">
            <?php echo $_smarty_tpl->getSubTemplate ("modules/article_new.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
