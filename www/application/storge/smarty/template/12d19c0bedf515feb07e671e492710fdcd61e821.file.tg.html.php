<?php /* Smarty version Smarty-3.1.17, created on 2015-07-14 14:32:54
         compiled from "C:\wwwroot\yfcms\www\application\views\home\tg.html" */ ?>
<?php /*%%SmartyHeaderCode:2134855a49e3dc85968-18392221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12d19c0bedf515feb07e671e492710fdcd61e821' => 
    array (
      0 => 'C:\\wwwroot\\yfcms\\www\\application\\views\\home\\tg.html',
      1 => 1436855572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2134855a49e3dc85968-18392221',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a49e3dcc4dc0_02078110',
  'variables' => 
  array (
    'member_info' => 0,
    'artice_cats' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a49e3dcc4dc0_02078110')) {function content_55a49e3dcc4dc0_02078110($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'C:\\wwwroot\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\function.html_options.php';
?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="#">会员中心</a></span>
</div>

<!----------member---------->
<div class="member">
    <div class="member_left">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/home_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="member_left_tg">
            <form action="/home/tgSave/" method="post" onsubmit="" id="form_tg" form_tittle="投稿">
                <dt>文章标题：<input size="50" id="t0" name="title" type="text" class="input" maxlength="50" notnull="true" rule="/^[\S][\s\S]{5,49}$/" info="文章标题"/> <span>6-50个字符</span></dt>
                <dt>文章作者：<input size="20" id="t1" name="author" type="text" class="input" maxlength="10" value="<?php echo $_smarty_tpl->tpl_vars['member_info']->value['username'];?>
" notnull="true" rule="/^[\S][\s\S]{1,9}$/" info="文章作者" /> <span>2-10个字符</span></dt>
                <dt>所属栏目：<select class="item-blur" id="catId" name="catId" notnull="true" info="所属栏目">
                            <option value=''>--请选择所属栏目--</option>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['artice_cats']->value,'selected'=>0),$_smarty_tpl);?>

                        </select><span> 必选</span></dt>
                <dt>文章内容： <span>最少50个汉字</span><br><textarea id="content" name="content" class="inputs" notnull="true" rule="/^[\S][\s\S]{50,}$/" info="文章内容"></textarea></dt>
                <dt>验证码：<input id="yzm" size="6" name="yzm" type="text"  class="input" maxlength="4"   notnull="true" rule="/^[0-9a-zA-Z]{4}$/" info="验证码"/><img align="absmiddle" src="/yzm.php" height="25" width="55" onClick="this.src='/yzm.php?' + Math.random();" /></dt>
                <dt><input class="vote_bnt" value="投稿" type="button" id="saveBtn" /></dt>
            </form>

        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/home_ad.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<script type="text/javascript">
$(function(){
    $("#saveBtn").click(function(){
        $("#form_tg").ajaxSubmit({
            callback:function(msg){
                if(msg.status==0){
                    alert("投稿成功,审核通过后,积分将送至您的账户");
                    location.reload(false);
                }else{
                    alert(msg.info);
                }
            }
        });
    });
})
</script><?php }} ?>
