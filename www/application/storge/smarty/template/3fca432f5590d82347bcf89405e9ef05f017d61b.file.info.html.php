<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:45:09
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/info.html" */ ?>
<?php /*%%SmartyHeaderCode:84693088655a5d7455c0947-07449353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fca432f5590d82347bcf89405e9ef05f017d61b' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/info.html',
      1 => 1436924649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84693088655a5d7455c0947-07449353',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'info' => 0,
    'product_cat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d745662950_38126043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d745662950_38126043')) {function content_55a5d745662950_38126043($_smarty_tpl) {?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="#">会员中心</a></span>
</div>

<div class="member">
    <div class="member_left">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/home_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="member_left_tg">
            <form action="/home/infoSave/" method="post" onsubmit="" id="form_info" form_tittle="用户信息修改">
            <dt>注册账户：<em><?php echo $_smarty_tpl->tpl_vars['info']->value['username'];?>
</em> <span>无法修改</span></dt>
            <dt>我的昵称：<input size="20" id="t0" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['truename'];?>
" name="truename" type="text" class="input" maxlength="10" notnull="true" rule="/^[\S][\s\S]{1,9}$/" info="我的昵称" /> <span>2-10个字符</span></dt>
            <dt>我的邮箱：<input size="50" id="t0" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['email'];?>
" name="email" type="text" class="input" maxlength="50" notnull="true" rule="/^[a-z0-9-]{1,30}@[a-z0-9-]{1,65}.[a-z]{3}$/" info="我的邮箱" /><span> 必填</span></dt>
            <dt>我的手机：<input size="50" id="t0" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['mobile'];?>
" name="mobile" type="text" class="input" maxlength="50" notnull="true" rule="/^1[3|4|5|7|8][0-9]{9}$/" info="我的手机"/><span> 必填</span></dt>
            <dt>公司名称：<input size="50" id="t0" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['companyName'];?>
" name="companyName" type="text" class="input" maxlength="50" /></dt>
            <dt>腾讯 QQ：<input size="50" id="t0" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['qq'];?>
" name="qq" type="text" class="input" maxlength="50" notnull="true" rule="/^[0-9]{5,12}$/" info="腾讯QQ"/><span> 必填</span></dt>
            <dt>微信账号：<input size="50" id="t0" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['weixin'];?>
" name="weixin" type="text" class="input" maxlength="50" notnull="true" rule="/^[\w+]{2,30}$/" info="微信账号"/><span> 必填</span></dt>
            <dt>产品大类：<select class="item-blur" id="productCat" name="productCat" notnull="true" info="产品大类" onchange="changeProductCat2()">
                            <option value=''>--请选择所属行业--</option>

                        </select><span> 必选</span></dt>
            <dt>产品小类：<select class="item-blur" id="productCat2" name="productCat2"  notnull="true" info="产品小类">
                            <option value=''>--请选择所属行业--</option>
                        </select><span> 必选</span></dt>
            <dt>详细产品：<input size="50" id="t0"  value="<?php echo $_smarty_tpl->tpl_vars['info']->value['defineCatName'];?>
" name="defineCatName" type="text" class="input" maxlength="50" /></dt>
            <dt><input class="vote_bnt" value="保存" type="button" id="saveBtn" /></dt>
            </form>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/home_ad.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<script type="text/javascript">
var productCat = <?php echo $_smarty_tpl->tpl_vars['product_cat']->value;?>
;
setProductCat(productCat,<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['productCatId'])===null||$tmp==='' ? 0 : $tmp);?>
,<?php echo (($tmp = @$_smarty_tpl->tpl_vars['info']->value['productCatId2'])===null||$tmp==='' ? 0 : $tmp);?>
);
$(function(){
    $("#saveBtn").click(function(){
        $("#form_info").ajaxSubmit({
            callback:function(msg){
                if(msg.status==0){
                    alert("修改成功")
                    location.reload(false);
                }else{
                    alert("修改失败,请重试!!");
                }
            }
        });
    });
})
</script><?php }} ?>
