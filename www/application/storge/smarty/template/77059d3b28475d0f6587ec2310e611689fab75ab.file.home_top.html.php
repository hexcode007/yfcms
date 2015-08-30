<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:44:50
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/home_top.html" */ ?>
<?php /*%%SmartyHeaderCode:168169277755a5d732d8ab64-94304502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77059d3b28475d0f6587ec2310e611689fab75ab' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/home_top.html',
      1 => 1436924651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168169277755a5d732d8ab64-94304502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'home_info' => 0,
    'member_info' => 0,
    'static_url' => 0,
    'home_channel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d732e0df86_35249453',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d732e0df86_35249453')) {function content_55a5d732e0df86_35249453($_smarty_tpl) {?><div class="member_left_top">
    <ul>
        <li class="tx"><a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['home_info']->value['photo'];?>
"></a> <br><a href="/home/head/">上传头像</a>&nbsp; | &nbsp;<a href="/home/info/">编辑资料</a></li>
        <li class="hy"><span><?php if ($_smarty_tpl->tpl_vars['member_info']->value['truename']) {?><?php echo $_smarty_tpl->tpl_vars['member_info']->value['truename'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['member_info']->value['username'];?>
<?php }?></span>，您好。欢迎您来到云扫除，<?php if ($_smarty_tpl->tpl_vars['member_info']->value['lastTime']) {?>您上次登录时间是<?php echo $_smarty_tpl->tpl_vars['member_info']->value['lastTime'];?>
<?php }?></li>
        <li class="xxx"><span><b><?php echo $_smarty_tpl->tpl_vars['home_info']->value['report_num'];?>
</b> 条<br>举报网址</span> <span><b><?php echo $_smarty_tpl->tpl_vars['home_info']->value['article_num'];?>
</b> 篇<br>投稿文章</span> <span><b><?php echo $_smarty_tpl->tpl_vars['home_info']->value['pushfile_num'];?>
</b> 次<br>数据分析</span> <span><b><?php echo $_smarty_tpl->tpl_vars['home_info']->value['score_num'];?>
</b> 分<br>积分统计</span></li>
        <li class="lxx"><span><a href="#">点此复制地址</a></span>下线地址：http://www.yunsaochu.com/track/c/?rid=1008</li>
    </ul>
</div>
<div class="member_left_class">
    <ul>
        <li class="sz"><a href="/home/"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/001.png"></a> <br><a href="/home/"><?php if ($_smarty_tpl->tpl_vars['home_channel']->value=='index') {?><strong>我的动态</strong><?php } else { ?>我的动态<?php }?></a></li>
        <li class="sz"><a href="/home/tg/"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/002.png"></a> <br><a href="/home/tg/"><?php if ($_smarty_tpl->tpl_vars['home_channel']->value=='tg') {?><strong>投稿文章</strong><?php } else { ?>投稿文章<?php }?></a></li>
        <li class="sz"><a href="/home/info/"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/003.png"></a> <br><a href="/home/info/"><?php if ($_smarty_tpl->tpl_vars['home_channel']->value=='info') {?><strong>设置资料</strong><?php } else { ?>设置资料<?php }?></a></li>
        <li class="sz"><a href="/home/audit/"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/004.png"></a> <br><a href="/home/audit/"><?php if ($_smarty_tpl->tpl_vars['home_channel']->value=='audit') {?><strong>审核进度</strong><?php } else { ?>审核进度<?php }?></a></li>
        <li class="sz"><a href="/home/report/"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/005.png"></a> <br><a href="/home/report/"><?php if ($_smarty_tpl->tpl_vars['home_channel']->value=='report') {?><strong>举报网站</strong><?php } else { ?>举报网站<?php }?></a></li>
        <li class="sz"><a href="/home/head/"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/006.png"></a> <br><a href="/home/head/"><?php if ($_smarty_tpl->tpl_vars['home_channel']->value=='head') {?><strong>上传头像</strong><?php } else { ?>上传头像<?php }?></a></li>
    </ul>
</div>
<?php }} ?>
