<?php /* Smarty version Smarty-3.1.17, created on 2015-07-15 11:45:11
         compiled from "/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/report.html" */ ?>
<?php /*%%SmartyHeaderCode:84693088655a5d7475bbb51-69332227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5db1ed501cd7e98acfe751fa98f7831415a256d8' => 
    array (
      0 => '/a/domains/ys.vip8.org/public_html/yfcms/www/application/views/home/report.html',
      1 => 1436924649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84693088655a5d7475bbb51-69332227',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55a5d7476028d5_03786924',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5d7476028d5_03786924')) {function content_55a5d7476028d5_03786924($_smarty_tpl) {?><div class="zuobi">
    <a href="#">云扫除</a> > <a href="#">会员中心</a></span>
</div>


<!----------member---------->
<div class="member">
    <div class="member_left">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/home_top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <div class="member_left_tg">
            <form action="/home/reportSave/" method="post" onsubmit="" id="form_report" form_tittle="举报网址" target="iframe1" enctype="multipart/form-data">
                <iframe id="iframe1" name="iframe1" style="display:none;"></iframe>
                <dt>举报网址：<input size="50" id="t0" name="siteUrl" type="text" class="input" maxlength="50" value="http://" notnull="true" rule="/^http:\/\/([0-9a-zA-Z]{2,}\.)?[0-9a-zA-Z]{2,}\.[a-zA-Z]{1,4}$/" info="举报网址" /> <span>2-50个字符</span></dt>
                <dt>产品大类：<select class="item-blur" id="productCat" name="productCat" notnull="true" info="产品大类">
                    <option value=''>--请选择所属行业--</option>
                    <option value='1'>日常用品</option>
                    <option value='2'>医疗保健</option>
                    <option value='3'>化学化工</option>
                </select><span> 必选</span></dt>
                <dt>产品小类：<select class="item-blur" id="productCat2" name="productCat2"  notnull="true" info="产品小类">
                    <option value=''>--请选择所属行业--</option>
                    <option value='1'>日常用品</option>
                    <option value='2'>医疗保健</option>
                    <option value='3'>化学化工</option>
                </select><span> 必选</span></dt>
                <dt>上传图片：<input id="file_upload" name="photo" type="file" notnull="true" info="图片" /> <span>有图有真相，以确保真实性</span></dt>
                <dt>说说原因： <span>最少20个汉字</span><br><textarea id="content" name="reason" class="inputss" notnull="true" rule="/^[\s\S]{20,}$/" info="原因" ></textarea></dt>
                <dt>验证码：<input id="yzm" size="6" name="yzm" type="text"  class="input" maxlength="10"   notnull="true" rule="/^[0-9a-zA-Z]{4}$/" info="验证码" /><img align="absmiddle" src="/yzm.php" height="25" width="55" onClick="this.src = '/yzm.php?' + Math.random();" /></dt>
                <dt><input class="vote_bnt" value="举报" type="button"  id="saveBtn" /></dt>
            </form>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("modules/home_ad.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<script type="text/javascript">
    $(function() {
        $("#saveBtn").click(function() {
            if ($("#form_report").formCheck()) {
                $("#form_report").submit();
            }
        });
    })
    //  $("#form_report").ajaxSubmit({
    //      callback:function(msg){
    //          if(msg.status==0){
    //              alert("举报成功,审核通过后,积分将送至您的账户");
    //              location.reload(false);
    //         }else{
    //             alert(msg.info);
    //         }
    //     }
    // });
</script><?php }} ?>
