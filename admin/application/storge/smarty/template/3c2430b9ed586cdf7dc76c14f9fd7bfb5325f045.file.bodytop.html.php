<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 21:39:36
         compiled from "F:\www\yfcms\admin\application\views\layout\bodytop.html" */ ?>
<?php /*%%SmartyHeaderCode:2571855ae4b985880e3-55288118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c2430b9ed586cdf7dc76c14f9fd7bfb5325f045' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\layout\\bodytop.html',
      1 => 1436382363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2571855ae4b985880e3-55288118',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4b98596157_57959286',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4b98596157_57959286')) {function content_55ae4b98596157_57959286($_smarty_tpl) {?><div class="head ">
    <div class="headinner">
        <div class="items">
            <div class="logo">
                <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/logo.png" />
            </div>
            <div class=" user_login">
                您好，<strong class="font_yellow"> <?php echo $_smarty_tpl->tpl_vars['user_info']->value['username'];?>
 </strong> <a href="javascript:;" class="widthm" onclick="return loginout();"> 退出 </a>
            </div>
        </div>
    </div>
</div><?php }} ?>
