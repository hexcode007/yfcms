<?php /* Smarty version Smarty-3.1.17, created on 2015-07-18 23:06:19
         compiled from "F:\www\yfcms\www\application\views\analyze\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2803155a66e86195a30-94785292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a32351614c25f9e4fcc86c6dd0929c8804210a6e' => 
    array (
      0 => 'F:\\www\\yfcms\\www\\application\\views\\analyze\\index.html',
      1 => 1437231977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2803155a66e86195a30-94785292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a66e86200258_63750253',
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a66e86200258_63750253')) {function content_55a66e86200258_63750253($_smarty_tpl) {?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="#">作弊网站</a> > <a href="#">数据分析</a>
</div>

<div class="list">

    <div class="list_left">
        <div class="list_left_fenxi">
             <form action="/analyze/upload/" method="post" onsubmit="" id="form_upload" form_tittle="上传文件"  target="iframe1" enctype="multipart/form-data">
                <input type="hidden" name="startTime" value="2015-05-01"/>
                <input type="hidden" name="endTime" value="2015-06-01"/>
                <input type="hidden" name="productCatId" value="1"/>
                <input type="hidden" name="productCatId2" value="5"/>
                <input type="file" name="fileUpload" id="fileUpload" value="上传" onchange="return submitForm()" />
                <iframe id="iframe1" name="iframe1" style="display:none;"></iframe>
            <ul>
                <li class="sc"><a href="javascript;" click="$('#fileUpload').click()"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/ico_btn_public_upload.png"></a></li>
                <li class="tit">+ 上传文档即分析出建议您屏蔽的网站，最大的提升效果</li>
            </ul>
            </form>
        </div>
        <div class="list_left_sh" id="uploading" style="display:none"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/ing.gif"> 正在上传，请耐心等待几分钟</div>
        <div class="list_left_sh" id="uploaded" style="display:none"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/cus.gif"> 上传成功，请等待审核，预计明日中午12点出分析结果</div>
        <div class="list_left_down">
            <div class="list_left_down_left">
                <ul>
                    <li>星 级</li>
                    <li>条 数</li>
                    <li>下 载</li>
                </ul>
            </div>
            <div class="list_left_down_right">
                <ul>
                    <li class="xj"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/1.gif"><br>建议屏蔽</li>
                    <li class="xj"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/2.gif"><br>建议屏蔽</li>
                    <li class="xj"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/3.gif"><br>建议屏蔽</li>
                    <li class="xj"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/4.gif"><br>建议屏蔽</li>
                    <li class="xj"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/5.gif"><br>优质网站</li>
                </ul>
                <ul>
                    <li class="ts">31267 <em>条</em></li>
                    <li class="ts">31267 <em>条</em></li>
                    <li class="ts">31267 <em>条</em></li>
                    <li class="ts">31267 <em>条</em></li>
                    <li class="ts">31267 <em>条</em></li>
                </ul>
                <ul>
                    <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/04.gif"></li>
                    <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/04.gif"></li>
                    <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/04.gif"></li>
                    <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/04.gif"></li>
                    <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/04.gif"></li>
                </ul>
            </div>
        </div>

        <div class="list_left_sm">
            <ul>
                <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/1.gif"> 一星<br>≥100000展现量没有出一单，强烈建议您屏蔽这些网址！这些个文字有待描述</li>
                <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/2.gif"> 二星<br>≥1000展现量没有出一单，强烈建议您屏蔽这些网址！这些个文字有待描述</li>
                <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/3.gif"> 三星<br>≥100展现量没有出一单，强烈建议您屏蔽这些网址！这些个文字有待描述</li>
                <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/4.gif"> 四星<br>≥10展现量没有出一单，强烈建议您屏蔽这些网址！这些个文字有待描述</li>
                <li class="xz"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/5.gif"> 五星<br>≥1展现量没有出一单，强烈建议您屏蔽这些网址！这些个文字有待描述</li>
            </ul>
        </div>

    </div>

    <div class="list_right">

        <div class="login_right">
            <div class="login_right_top">
                <?php echo $_smarty_tpl->getSubTemplate ("modules/login.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
            <div class="login_right_cer"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/01.gif"></div>
            <div class="login_right_bot"><b>云扫除能为您做什么？</b><br>云扫除是收集网上所有关于作弊百度联盟的网站，网盟推广用户可以批量提交作弊网址;云扫除还可以为您批量分析您网盟推广里面的网址效果如何，给您分析出来建议您屏蔽的网址！</div>
        </div>

        <div class="main_right_top">活跃排行榜</div>
        <div class="main_right_tline"></div>
        <div class="main_right_name">
            <?php echo $_smarty_tpl->getSubTemplate ("modules/member_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="main_right_bline"></div>

        <div class="main_right_top">最新注册用户</div>
        <div class="main_right_tline"></div>
        <div class="main_right_new">
            <?php echo $_smarty_tpl->getSubTemplate ("modules/member_new.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="main_right_bline"></div>


    </div>
</div>

<script>
    function submitForm(){
        if(/^201[\d]\-[\d]{2}\-[\d]{2}$/.test($('input[name=startTime]').val())==false){
            alert("开始时间不正确");
            return false;
        }
        if(/^201[\d]\-[\d]{2}\-[\d]{2}$/.test($('input[name=endTime]').val())==false){
            alert("结束时间不正确");
            return false;
        }
        if(/^[\d]{1,}$/.test($('input[name=productCatId]').val())==false){
            alert("产品大类不正确");
            return false;
        }
        if(/^[\d]{1,}$/.test($('input[name=productCatId]').val())==false){
            alert("产品小类不正确");
            return false;
        }
        if($('input[name=fileUpload]').val()==""){
            alert("请选择要分析的文件");
            return false;
        }
        $("#uploading").show();
        $("#form_upload").submit();
    }
</script><?php }} ?>
