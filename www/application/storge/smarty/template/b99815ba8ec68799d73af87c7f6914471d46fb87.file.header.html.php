<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:01:08
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/layout/header.html" */ ?>
<?php /*%%SmartyHeaderCode:168169277755a5ccf4ee4141-89823449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b99815ba8ec68799d73af87c7f6914471d46fb87' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/layout/header.html',
      1 => 1436924650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168169277755a5ccf4ee4141-89823449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
    'css' => 0,
    'c' => 0,
    'js' => 0,
    'j' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5ccf4f19643_44984355',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5ccf4f19643_44984355')) {function content_55a5ccf4f19643_44984355($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns:wb="http://open.weibo.com/wb">
<head><meta charset="utf-8"><title>百度口碑</title>
    <meta name="keywords" content="百度口碑,商家评价,服务,网友真实评论,点评,商家,靠谱">
    <meta name="description" content="百度口碑是围绕商家口碑的UGC互动社区，通过网民对商家的真实评论，商家口碑事件，专业人士咨询，帮助用户决策。是体现网民对商家、网站产品或服务态度的信息平台。网民可以通过本系统平台发布对线下交易过程中所感受的服务，商家印象，自身评价，形成口碑，助力广大网民信息决策。">
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
css/style.css" />
    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
css/<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" />
    <?php } ?>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
js/jquery.ext.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
js/global.js"></script>
    <?php  $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['j']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['j']->key => $_smarty_tpl->tpl_vars['j']->value) {
$_smarty_tpl->tpl_vars['j']->_loop = true;
?>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
js/<?php echo $_smarty_tpl->tpl_vars['j']->value;?>
"></script>   
    <?php } ?>
</head>
<body><?php }} ?>
