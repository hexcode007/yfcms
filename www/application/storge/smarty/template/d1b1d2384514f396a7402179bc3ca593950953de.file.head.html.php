<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:45:12
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/head.html" */ ?>
<?php /*%%SmartyHeaderCode:84693088655a5d74831ac57-54787828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1b1d2384514f396a7402179bc3ca593950953de' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/head.html',
      1 => 1436924649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84693088655a5d74831ac57-54787828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'home_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d748363894_02945063',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d748363894_02945063')) {function content_55a5d748363894_02945063($_smarty_tpl) {?><div class="zuobi">
    <a href="/">云扫除</a> > <a href="/home/">会员中心</a></span>
</div>


<!----------member---------->
<div class="member">
    <div class="member_left">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/home_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="member_left_tg">
             <form action="/home/headSave/" method="post" onsubmit="" id="form_info" form_tittle="用户头像修改"  target="iframe1" enctype="multipart/form-data">
            <iframe id="iframe1" name="iframe1" style="display:none;"></iframe>
            <dt>上传头像：<input id="file_upload" name="photo" type="file" /> <span>建议大小120x120</span></dt>
            <dt>使用头像：<br> <img class="sctx" width="120" height="120" src="<?php echo $_smarty_tpl->tpl_vars['home_info']->value['photo'];?>
" id="member_head"></dt>
            <dt><input class="vote_bnt" value="保存" type="submit" /></dt>
             </form>
        </div>
    </div>
    <div class="member_right">
        <div class="member_right_ad">300x250广告</div>
    </div>
</div><?php }} ?>
