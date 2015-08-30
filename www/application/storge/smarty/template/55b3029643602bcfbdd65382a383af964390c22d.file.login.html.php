<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 22:26:08
         compiled from "F:\www\yfcms\www\application\views\modules\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1686855a66d80b68419-49516895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b3029643602bcfbdd65382a383af964390c22d' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\modules\\login.html',
      1 => 1436969482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1686855a66d80b68419-49516895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a66d80b6d254_00332000',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a66d80b6d254_00332000')) {function content_55a66d80b6d254_00332000($_smarty_tpl) {?><ul class="left">
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
