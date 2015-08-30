<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:45:10
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/audit.html" */ ?>
<?php /*%%SmartyHeaderCode:84693088655a5d746837377-78804576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bc631ce950ab8b16bb1bf5e309dd37fad331292' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/audit.html',
      1 => 1436924648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84693088655a5d746837377-78804576',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'my_domain_list' => 0,
    'dl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d74689a602_01768427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d74689a602_01768427')) {function content_55a5d74689a602_01768427($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/a/domains/ys.vip8.org/public_html/yfcms/framework/librarys/Smarty/libs/plugins/modifier.date_format.php';
?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="#">会员中心</a></span>
</div>


<!----------member---------->
<div class="member">
    <div class="member_left">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/home_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="member_left_jd">
            <ul>
                <?php  $_smarty_tpl->tpl_vars['dl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['my_domain_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dl']->key => $_smarty_tpl->tpl_vars['dl']->value) {
$_smarty_tpl->tpl_vars['dl']->_loop = true;
?>
                <li><em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dl']->value['createTime'],"%Y-%m-%d %H:%M:%S");?>
</em> 在 <a href="/home/article/">老生常谈</a> 投稿了 <a href="#">我爱一个网盟推广作弊网站</a><span>未审核</span></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/home_ad.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<?php }} ?>
