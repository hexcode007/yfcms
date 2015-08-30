<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 15:23:34
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/login/reg.html" */ ?>
<?php /*%%SmartyHeaderCode:84693088655a60a763ab5b7-78947162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a55d7344f44e5a76e44b73886d25f81f4a64ef3' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/login/reg.html',
      1 => 1436924650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84693088655a60a763ab5b7-78947162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_cat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a60a764ab487_45901480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a60a764ab487_45901480')) {function content_55a60a764ab487_45901480($_smarty_tpl) {?><div class="zuobi">
    <a href="/">云扫除</a> > <a href="/reg.html">注册</a> <span>已经有账户？<a href="/login.html">点此登陆</a></span>
</div>

<div class="reg">
    <div class="reg_cer">
        <div class="reg_cer_l">
            <form action="" method="post" name="form_reg" id="form_reg">
                <ul>
                    <li class="name">会员账户名<span>*</span></li>
                    <li class="shu"><input class="item-blur" id="username" name="username" value="" maxlength="16" type="text"></li>
                    <li class="yq">必填</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw" style="display:none">账户名6-16位</li>
                    <li class="cw ck" id='ck' style="display:none">账户名重复</li>
                </ul>

                <ul>
                    <li class="name">密码<span>*</span></li>
                    <li class="shu"><input class="item-blur" id="password" name="password" value="" maxlength="16" type="password"></li>
                    <li class="yq">必填</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw"  style="display:none">用户密码6-16位</li>
                </ul>

                <ul>
                    <li class="name">确认密码<span>*</span></li>
                    <li class="shu"><input class="item-blur" id="repassword" name="repassword" value="" maxlength="16" type="password"></li>
                    <li class="yq">必填</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw" style="display:none">两次密码要一致</li>
                </ul>

                <ul class="line"></ul>
                <ul>
                    <li class="name">手机<span>*</span></li>
                    <li class="shu"><input class="item-blur" id="mobile" name="mobile" value="" maxlength="11" type="text"></li>
                    <li class="yq">必填</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw"  style="display:none">格式不正确</li>
                </ul>
                <ul>
                    <li class="name">邮箱<span>*</span></li>
                    <li class="shu"><input class="item-blur" id="email" name="email" value=""  type="text"></li>
                    <li class="yq">必填</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw"  style="display:none">格式不正确</li>
                </ul>
                <ul>
                    <li class="name">QQ<span>*</span></li>
                    <li class="shu"><input class="item-blur" id="qq" name="qq" value="" maxlength="12" type="text"></li>
                    <li class="yq">必填</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw"  style="display:none">格式不正确</li>
                </ul>
                <ul>
                    <li class="name">微信<span>*</span></li>
                    <li class="shu"><input class="item-blur" id="weixin" name="weixin" value="" maxlength="16" type="text"></li>
                    <li class="yq">必填</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw"  style="display:none">格式不正确</li>
                </ul>

                <ul>
                    <li class="name">公司<span>&nbsp;</span></li>
                    <li class="shu"><input class="item-blur" id="companyName" name="companyName" value="" type="text"></li>
                </ul>

                <ul>
                    <li class="name">所属行业<span>*</span></li>
                    <li class="shu">
                        <select class="item-blur" id="productCat" name="productCat"  onchange="changeProductCat2()">
                            <option value=''>--请选择所属行业--</option>
                        </select>
                    </li>
                    <li class="yq">必选</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw"  style="display:none">必选</li>
                </ul>

                <ul>
                    <li class="name">产品分类<span>*</span></li>
                    <li class="shu">
                        <select class="item-blur" id="productCat2" name="productCat2">
                            <option value=''>--请选择产品分类--</option>
                        </select>
                    </li>
                    <li class="yq">必选</li>
                    <li class="dui" style="display:none">对了</li>
                    <li class="cw"  style="display:none">必选</li>
                </ul>

                <ul>
                    <li class="name">详细分类<span>&nbsp;</span></li>
                    <li class="shu"><input class="item-blur" id="defineCatName" name="defineCatName" value="" type="text"></li>
                </ul>

                <ul class="tiaowen">您确认阅读并接受《云扫除网服务条款及协议》</ul>

                <ul class="ok"><button type="button" id="regbtn" onclick='register()'></button></ul>
            </form>
        </div>
        <div class="reg_cer_r">
            <ul>
                <li class="topinfo">云扫除—中国首家服务于网盟推广平台，致力于让所有网盟推广商家效果的提升！</li>
                <li class="shu">在您之前<br>已有<b>20,547,173</b>位用户成功注册。</li>
                <li class="cg">注册成功您即可：</li>
                <li class="xx">免费建站推广<br>不限量发布信息<br>查看海量商机<br>支持在线交易<br>申请慧聪信贷<br>注册成功您即可<br>申请慧聪信贷</li>
                <li class="dl">已经有账户？<a href="/login.html">点此登陆</a></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
var productCat = <?php echo $_smarty_tpl->tpl_vars['product_cat']->value;?>
;
</script><?php }} ?>
