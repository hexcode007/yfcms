<?php /* Smarty version Smarty-3.1.17, created on 2015-07-14 14:34:25
         compiled from "C:\wwwroot\yfcms\www\application\views\modules\login.html" */ ?>
<?php /*%%SmartyHeaderCode:2055855a4ad71deb6a9-55626477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f76b5d8ace619df61ab2021c256d6221221ac1f9' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\modules\\login.html',
      1 => 1436717972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2055855a4ad71deb6a9-55626477',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a4ad71e1df43_30066986',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a4ad71e1df43_30066986')) {function content_55a4ad71e1df43_30066986($_smarty_tpl) {?><ul class="left">
    <li class="in"><input id="username" class="logininputanew" value="请输入用户名" onblur="if (!this.value) {
                            this.value = '请输入用户名';
                            this.style.color = '#b2b2b2';
                        }" onfocus="if (this.value == '请输入用户名')
                                    this.value = '';
                                this.style.color = '#272727'" type="text"></li>
    <li class="in"><input id="password" class="logininputanew" value="请输入密码" onblur="if (!this.value) {
                            this.value = '请输入密码';
                            this.style.color = '#b2b2b2';
                        }" onfocus="if (this.value == '请输入密码')
                                    this.value = '';
                                this.style.color = '#272727'" type="password"></li>
</ul>
<ul class="right">
    <li class="btn"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/login-btn.png" onclick="login()"></li>
</ul><?php }} ?>
