<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 21:40:56
         compiled from "F:\www\yfcms\admin\application\views\members\index.html" */ ?>
<?php /*%%SmartyHeaderCode:529555ae4be80426b2-97129682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dc04e54afef7a50c83b917978784d460499523b' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\members\\index.html',
      1 => 1437404807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '529555ae4be80426b2-97129682',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cur_url' => 0,
    'member_list' => 0,
    'ml' => 0,
    'product_cat2' => 0,
    'page' => 0,
    'product_cat' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4be8130de3_10232285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4be8130de3_10232285')) {function content_55ae4be8130de3_10232285($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\www\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="maininner">
    <div class="search_formwrap">
        <h5 class="maintt clearfix"> <s></s> <strong> 会员列表 </strong>
        </h5>
        <table class="search_form">
            <form method="get" id="form_company" name=""  action="<?php echo $_smarty_tpl->tpl_vars['cur_url']->value;?>
" >
                <tr>
                    <td width=180>
                        产品大类:
                        <select  class="form-control input-sm" name="productCatId" id="productCat"> 
                        <option value=''>--请选择所属行业--</option> 
                        </select>
                    </td>
                    <td width=200>
                        <select  class="form-control input-sm" name="productCatId2" id="productCat2"> 
                        <option value=''>--请选择产品分类--</option> 
                        </select>
                    </td>
                    <td width=250>
                        会员名称:
                        <input value="" name="siteurl" type="text" class="form-control"  />
                    </td>
                    <td>
                        <button class="btn btn-default btn-sm" type="submit" >筛选</button>
                        <a class="widthm vm" onclick="clear_all()">清空</a>
                    </td>
                    <td colspan=4></td>
                </tr>
            </form>

        </table>
    </div>

    <table class="table table-striped table-hover ">
        <tr>
            <th style="width:120px">会员账号</th>
            <th style="width:80px">真实姓名</th>
            <th style="width:120px">产品分类</th>
            <th style="width:120px">联系方式</th>
            <th style="width:100px">QQ/微信</th>
            <th style="min-width:50px">积分</th>
            <th style="min-width:50px">创建时间</th>
            <th style="min-width:60px">操作</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['ml'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ml']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['member_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ml']->key => $_smarty_tpl->tpl_vars['ml']->value) {
$_smarty_tpl->tpl_vars['ml']->_loop = true;
?>
        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['ml']->value['id'];?>
">
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['ml']->value['username'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['ml']->value['truename'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['product_cat2']->value[$_smarty_tpl->tpl_vars['ml']->value['productCatId']];?>
<br><?php echo $_smarty_tpl->tpl_vars['product_cat2']->value[$_smarty_tpl->tpl_vars['ml']->value['productCatId2']];?>
</td>
            <td align="left">M：<?php echo $_smarty_tpl->tpl_vars['ml']->value['mobile'];?>
<br>E：<?php echo $_smarty_tpl->tpl_vars['ml']->value['email'];?>
</td>
            <td align="left">Q：<?php echo $_smarty_tpl->tpl_vars['ml']->value['qq'];?>
<br>W：<?php echo $_smarty_tpl->tpl_vars['ml']->value['weixin'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['ml']->value['totalScore'];?>
</td>
            <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['ml']->value['createTime'],"%Y/%m/%d %H:%M");?>
</td>
            <td align="center">
                <a class="editBtn"  href="javascript:;">修改</a>
            </td>
        </tr>
        <?php } ?>
    </table>
     <div class="modal fade" id="commonmodal">
        <div class="modal-dialog" style=" width:500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="addnewLabel"> 暂停/启用用户 </h5>
                </div>
                <div class="modal-body">
                    <div class="edittable"> 
                        <p class="errortips"> <em class=" icon icon_tips"> </em><span></span></p>
                        <form id="form1" action="" method="post" form_tittle="修改用户信息" onsubmit="return false"  >
                        <table>
                            <tr>
                                <td align="right" width="126">
                                    用户账号:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" required=true info="用户账号" id="username" name="username"  readonly /> 
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    真实姓名:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" required=true info="真实姓名" id="truename" name="truename" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    手机号码:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" required=true info="手机号码" id="mobile" name="mobile" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    QQ:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" required=true info="QQ" id="qq" name="qq" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    微信:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" required=true info="微信" id="weixin" name="weixin" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    Email:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" required=true info="email" id="email" name="email" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    积分:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" required=true info="积分" id="totalScore" name="totalScore" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    产品大类:
                                </td>
                                <td>
                                    <select  class="form-control input-sm" name="productCatId" required="true" info="产品大类"> 
                                    <option value=''>--请选择所属行业--</option> 
                                    </select>
                                </td>
                            <tr>
                                <td align="right" width="126">
                                    产品小类:
                                </td>
                                <td>
                                    <select  class="form-control input-sm" name="productCatId2" required="true" info="产品小类" > 
                                    <option value=''>--请选择产品分类--</option> 
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    自定义类:
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="" id="defineCatName" name="defineCatName" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    修改状态:
                                </td>
                                <td>
                                    <select class="form-control input-sm" name="status">
                                        <option value='1'>启用</option>
                                        <option value='2'>停用</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="126">
                                    填写原因:
                                </td>
                                <td>
                                    <textarea class='form-control input-sm' name='reason' id='reason' cols="50" rows="3"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td align="right" > </td>
                                <td style=" padding-left:3px; padding-top:20px;">
                                    <div class=" innerdiv"> 
                                        <input type="hidden" name="act" value="" />
                                        <input type="hidden" name="id" value="" />
                                        <button type="button" id="saveButton" class="btn btn-primary">确 认</button>
                                        <button type="button" class="btn btn-default widthl2" data-dismiss="modal">取 消</button> 
                                    </div>
                                </td>
                            </tr>
                        </table>
                        
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>


</div>

<script>
    var catstr = <?php echo $_smarty_tpl->tpl_vars['product_cat']->value;?>
;
    setProductCat(catstr,'#productCat',<?php echo (($tmp = @$_smarty_tpl->tpl_vars['params']->value['productCatId'])===null||$tmp==='' ? 0 : $tmp);?>
,'#productCat2',<?php echo (($tmp = @$_smarty_tpl->tpl_vars['params']->value['productCatId2'])===null||$tmp==='' ? 0 : $tmp);?>
);
    function initModal() {
        $("#commonmodal").find("form")[0].reset();
    }
    $(function(){
        $(".editBtn").click(function(){
            initModal();
            var member_id = $(this).parent("td").parent("tr").data('id');
            $("#commonmodal input[name=id]").val(member_id);
            $("#commonmodal").smodal({title:"修改用户状态",act:'edit'});
            $.request({
                data: "",
                url: "/members/edit/"+member_id,
                callback: function(msg) {
                    if (msg.status == 0) {
                        $("input[name=truename]").val(msg.data.truename);
                        $("input[name=username]").val(msg.data.username);
                        $("input[name=mobile]").val(msg.data.mobile);
                        $("input[name=qq]").val(msg.data.qq);
                        $("input[name=weixin]").val(msg.data.weixin);
                        $("input[name=email]").val(msg.data.email);
                        $("input[name=totalScore]").val(msg.data.totalScore);
                        $("textarea[name=reason]").html(msg.data.reason);
                        $("select[name=status]").val(msg.data.status);
                        $("input[name=defineCatName]").val(msg.data.defineCatName);
                        setProductCat(catstr,'.edittable select[name=productCatId]',msg.data.productCatId,'.edittable select[name=productCatId2]',msg.data.productCatId2);
                    }
                    return false;
                }
            });
        });

        //提交修改
        $("#saveButton").click(function(){
            _do = $("#form1").find("input[name=act]").val();
            if(_do == 'edit'){
                $("#form1").ajaxSubmit({
                    "url":"/members/editSave/",
                    "callback":function(msg){
                        if(msg.status==0){
                            $("#auditmodal").modal("hide");
                            $.successModal("修改用户状态成功","");
                        }else{
                            $.error(msg.info);
                        }
                    }
                });
            }
        });
    });
</script><?php }} ?>
