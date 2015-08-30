<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 22:26:12
         compiled from "F:\www\yfcms\www\application\views\article\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1000855a66d84346292-14495504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c15af2063f8563f87d2d2d48f932eaa76bbe7b1' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\article\\index.html',
      1 => 1436969480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1000855a66d84346292-14495504',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'l' => 0,
    'pagestr' => 0,
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a66d843a10b8_72348855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a66d843a10b8_72348855')) {function content_55a66d843a10b8_72348855($_smarty_tpl) {?><div class="zuobi">
    <a href="/">云扫除</a> > <a href="/analyze/">数据分析</a> 
</div>

<div class="list">

    <div class="list_left">

        <div class="list_left_news">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
                <li><span>感谢 <b><?php echo $_smarty_tpl->tpl_vars['l']->value['author'];?>
</b> 投稿，奖 <b><?php echo $_smarty_tpl->tpl_vars['l']->value['score'];?>
</b> 分</span><a href="/article/<?php echo $_smarty_tpl->tpl_vars['l']->value['id'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['l']->value['title'];?>
</a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="list_left_page">
            <?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>

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
</div>
<?php }} ?>
