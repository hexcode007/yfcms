<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 23:42:29
         compiled from "F:\www\yfcms\admin\application\views\filelist\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1470055ae4beacfb9d4-53989528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b59934e166cbd5d8ce2546c4bcfc72caa88c8f8' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\filelist\\index.html',
      1 => 1437493328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1470055ae4beacfb9d4-53989528',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4beaeca4b6_86632946',
  'variables' => 
  array (
    'cur_url' => 0,
    'push_list' => 0,
    'value' => 0,
    'product_cat2' => 0,
    'audit_list' => 0,
    'analyze_list' => 0,
    'page' => 0,
    'product_cat' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4beaeca4b6_86632946')) {function content_55ae4beaeca4b6_86632946($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\www\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="maininner">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home" data-toggle="tab"> 文件列表 </a></li>
        <!--li><a href="#profile" data-toggle="tab">文件详情</a></li-->
    </ul>
    <div class="search_formwrap">
        <table class="search_form">
            <form method="get" id="form_company" name=""  action="<?php echo $_smarty_tpl->tpl_vars['cur_url']->value;?>
" >
                <tr>
                    <td width=180>
                        产品大类:
                        <select  class="form-control input-sm" name="productCatId" id="productCat" onchange="changeProductCat2()"> 
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
            <th style="width:150px">文件名称</th>
            <th style="width:120px">类别</th>
            <th style="width:160px">时间</th>
            <th style="min-width:60px">会员名称</th>
            <th style="min-width:100px">审核状态</th>
            <th style="min-width:100px">分析状态</th>
            <th style="min-width:50px">总条数</th>
            <th style="min-width:50px">得积分</th>
            <th style="min-width:60px">操作</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['push_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['push_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['push_id']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['fileName'];?>
<br><?php echo $_smarty_tpl->tpl_vars['value']->value['clientName'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['product_cat2']->value[$_smarty_tpl->tpl_vars['value']->value['productCatId']];?>
<br><?php echo $_smarty_tpl->tpl_vars['product_cat2']->value[$_smarty_tpl->tpl_vars['value']->value['productCatId2']];?>
</td>
            <td align="center">上传:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['createTime'],"%Y/%m/%d %H:%M");?>
<br>开始:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['startTime'],"%Y/%m/%d %H:%M");?>
<br>结束:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['endTime'],"%Y/%m/%d %H:%M");?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['memberName'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['audit_list']->value[$_smarty_tpl->tpl_vars['value']->value['isAudit']];?>
<?php if ($_smarty_tpl->tpl_vars['value']->value['isAudit']==2) {?><br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['auditTime'],"%m/%d %H:%M");?>
<br><a href="#" class="showReason">原因</a><span class="reason" style="display:none"><?php echo $_smarty_tpl->tpl_vars['value']->value['reason'];?>
</span><?php }?></td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['analyze_list']->value[$_smarty_tpl->tpl_vars['value']->value['isAnalyze']];?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['analyzeTime'],"%m/%d %H:%M");?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['nums'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['value']->value['score'];?>
</td>
            <td align="center" class="operate ">
                <a class=""  href="/filelist/detail/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">列表</a>
                <a class="auditBtn"  href="javascript:;"><?php if ($_smarty_tpl->tpl_vars['value']->value['isAudit']!=0) {?>重新<?php }?>审核</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <div class="modal fade" id="auditmodal">
        <div class="modal-dialog" style=" width:500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h5 class="modal-title" id="addnewLabel"> 审核文件 </h5>
                </div>
                <div class="modal-body">
                    <div class="edittable"> 
                        <p class="errortips"> <em class=" icon icon_tips"> </em><span></span></p>
                        <form id="form1" action="" method="post" form_tittle="审核文件" onsubmit="return false"  >
                        <table class="audittable">
                            <tr>
                                <td align="right" width="126">
                                    审核结果:
                                </td>
                                <td>
                                    <select class="form-control input-sm" name="isAudit">
                                        <option value='1'>通过</option>
                                        <option value='2'>未通过</option>
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
        $("#auditmodal").find("form")[0].reset();
    }
    $(function(){
        $(".auditBtn").click(function(){
            initModal();
            var push_id = $(this).parent("td").parent("tr").data('id');
            $("#auditmodal input[name=id]").val(push_id);
            $("#auditmodal").smodal({title:"文件审核",act:'audit'});
        });

            //提交修改
        $("#saveButton").click(function(){
            _do = $("#form1").find("input[name=act]").val();
            if(_do == 'audit'){
                $("#form1").ajaxSubmit({
                    "url":"/filelist/auditSave/",
                    "callback":function(msg){
                        if(msg.status==0){
                            $("#auditmodal").modal("hide");
                            $.successModal("文件审核成功","文件审核成功,即将进入分析状态");
                        }else{
                            $.error(msg.info);
                        }
                    }
                });
            }
        });
    });






</script><?php }} ?>
