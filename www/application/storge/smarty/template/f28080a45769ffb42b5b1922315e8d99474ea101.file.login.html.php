<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:32:08
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/login.html" */ ?>
<?php /*%%SmartyHeaderCode:168169277755a5d438100f30-32345279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f28080a45769ffb42b5b1922315e8d99474ea101' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/modules/login.html',
      1 => 1436924651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168169277755a5d438100f30-32345279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d43810a3d5_61889349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d43810a3d5_61889349')) {function content_55a5d43810a3d5_61889349($_smarty_tpl) {?><ul class="left">
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
