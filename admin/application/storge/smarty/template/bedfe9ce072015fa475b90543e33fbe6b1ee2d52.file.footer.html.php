<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 21:40:56
         compiled from "F:\www\yfcms\admin\application\views\layout\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:262155ae4be8194a97-31041906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bedfe9ce072015fa475b90543e33fbe6b1ee2d52' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\layout\\footer.html',
      1 => 1436382363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '262155ae4be8194a97-31041906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4be81fcc81_82042012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4be81fcc81_82042012')) {function content_55ae4be81fcc81_82042012($_smarty_tpl) {?><!-- Modal 成功 -->
<div class="modal fade model_notice" id="model_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=" width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="model_success1Label"> 系统提示 </h5>
            </div>
            <div class="modal-body">
                <div class="system_words">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/icon_ok.png" class="imgleft" />
                    <div class=" divr">
                        <p> <strong class="font14 font_333 model_title"> 添加经纪人成功！ </strong> </p>
                        <p class=" mt10"> <span class="font_666 model_info"> “许海亮 ”经纪人添加成功  </span> </p>
                        <p class=" mt30 model_list"> <a class="uline "> 返回经纪人列表 </a>    <a class="uline ml20"> 继续添加经纪人 </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 失败 -->
<div class="modal fade model_notice" id="model_fail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=" width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" >&times;</button>
                <h5 class="modal-title" id="model_failLabel"> 系统提示 </h5>
            </div>
            <div class="modal-body">
                <div class="system_words">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/icon_error.png" class="imgleft" />
                    <div class=" divr">
                        <p> <strong class="font14 font_333 model_title"> 删除经纪人失败！ </strong> </p>
                        <p class=" mt10"> <span class="font_666 model_info"> “许海亮”经纪人修改失败  </span> </p>
                        <p class=" mt30  model_list"> <a class="uline"> 返回经纪人列表 </a>  <a class="uline ml20"> 继续修改经纪人 </a>     </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 删除提示 -->
<div class="arrow_tips" id="arrow_tips" style="display: none;">
    <!-- 删除弹出框 -->
    <div style="display:block;" class="arrow_tipsinner">
        <img width="11" height="8" class="arrow_t" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/arrow_t.png">
        <h5 class="tittle title">删除门店</h5>
        <a class="close_mylabel icon icon_xx"> </a>
        <div class="words">
            <p><em class="icon icon_gantan vm"></em>  <span class="wordsr widthm message"> 确认删除该门店吗？ </span></p>
            <p class="btnwrap">
                <button type="button" class="btn btn-primary btn-xs btn-yes">确认</button>
                <button type="button" class="btn btn-default btn-xs widthl2 btn-no">取消</button>
            </p>
        </div>
    </div>
</div>

<div class="arrow_tips" id="del_success_tips" style="display: none;">
    <!-- 删除成功的弹出框 -->
    <div  class="arrow_tipsinner">
        <img width="11" height="8" class="arrow_t" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/arrow_t.png">
        <h5 class="tittle">系统提示</h5>
        <a class="close_mylabel icon icon_xx"> </a>
        <div class="words">
            <p><em class="icon icon_sure vm"></em>  <span class="wordsr widthm message"> 删除门店成功 </span></p>
            <p class="btnwrap mt10"><a href="#"></a></p>
        </div>
    </div>
</div>

<div class="arrow_tips" id="del_fail_tips" style="display: none;">
    <!-- 删除错误的弹出框 -->
    <div  class="arrow_tipsinner">
        <img width="11" height="8" class="arrow_t" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
images/arrow_t.png">
        <h5 class="tittle">系统提示</h5>
        <a class="close_mylabel icon icon_xx"> </a>
        <div class="words">
            <p><em class="icon icon_error vm"></em>  <span class="wordsr widthm message"> 删除门店失败！ </span></p>
            <p class="btnwrap mt10"><a href="#"></a></p>
        </div>
    </div>
</div>
<div class="foot items">
    <hr />
    <div class="items totopwrap"> <a id="toTop"> </a> </div>
    Copyright &COPY; 2014 Sohu.com Inc. All rights reserved. 搜狐公司 版权所有 <br />
    增值电信业务经营许可证B2-20040144 京ICP证030367号 互联网新闻信息服务许可证
</div>
<?php }} ?>
