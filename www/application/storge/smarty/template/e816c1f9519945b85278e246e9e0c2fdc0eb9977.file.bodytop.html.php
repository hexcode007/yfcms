<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:01:08
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/layout/bodytop.html" */ ?>
<?php /*%%SmartyHeaderCode:195774779355a5ccf4f204e7-01212017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e816c1f9519945b85278e246e9e0c2fdc0eb9977' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/layout/bodytop.html',
      1 => 1436924649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195774779355a5ccf4f204e7-01212017',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member_info' => 0,
    'static_url' => 0,
    'channel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5ccf50246f3_74474824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5ccf50246f3_74474824')) {function content_55a5ccf50246f3_74474824($_smarty_tpl) {?><div class="top">
    <div class="top_top">
        <ul>
            <li class="left"><?php if (isset($_smarty_tpl->tpl_vars['member_info']->value['id'])) {?><?php if ($_smarty_tpl->tpl_vars['member_info']->value['truename']) {?><?php echo $_smarty_tpl->tpl_vars['member_info']->value['truename'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['member_info']->value['username'];?>
<?php }?>您好，欢迎来到云扫除&nbsp;<a href='/home/'>个人中心</a>&nbsp;<a href='javascript:;' onclick='loginout()'>注销</a>
                <?php } else { ?>您好，欢迎来到云扫除&nbsp;<a href="/login.html">请登录</a><?php }?>
            </li>
            <li class="right"><a href="#">一分钟了解云扫除</a></li>
        </ul>
    </div>
    <div class="top2_ad"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/11.jpg" width=980 height=75 /></div>
</div>

<div class="nav">
    <div class="nav_all">
        <div class="nav_all_logo">LOGO</div>
        <div class="nav_all_left">
            <ul>
                <li class="<?php if (isset($_smarty_tpl->tpl_vars['channel']->value)&&$_smarty_tpl->tpl_vars['channel']->value=="index") {?>on<?php }?>" ><a href="/">网站首页</a></li>
                <li class="<?php if (isset($_smarty_tpl->tpl_vars['channel']->value)&&$_smarty_tpl->tpl_vars['channel']->value=="cheat") {?>on<?php }?>"><a href="/cheat/">作弊网站</a></li>
                <li class="<?php if (isset($_smarty_tpl->tpl_vars['channel']->value)&&$_smarty_tpl->tpl_vars['channel']->value=="article") {?>on<?php }?>"><a href="/article/">老生常谈</a></li>
                <li class="<?php if (isset($_smarty_tpl->tpl_vars['channel']->value)&&$_smarty_tpl->tpl_vars['channel']->value=="home") {?>on<?php }?>"><a href="/home/">会员中心</a></li>
            </ul>
        </div>
        <div class="nav_all_right">
            <ul>
                <li><a href="/analyze/">数据分析</a></li>
            </ul>
        </div>
    </div>
</div><?php }} ?>
