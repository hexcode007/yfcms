<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 21:46:16
         compiled from "F:\www\yfcms\admin\application\views\score\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1817255ae4b985a2d78-09158954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e688e5b04db9bf8289c8115b92af81f6113845f6' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\score\\index.html',
      1 => 1437486374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1817255ae4b985a2d78-09158954',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4b985f8c63_48269894',
  'variables' => 
  array (
    'cur_url' => 0,
    'score_type' => 0,
    'score_list' => 0,
    'sl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4b985f8c63_48269894')) {function content_55ae4b985f8c63_48269894($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'F:\\www\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'F:\\www\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="maininner">
    <div class="search_formwrap">
        <h5 class="maintt clearfix"> <s></s> <strong> 积分列表 </strong>
        </h5>
        <table class="search_form">
            <form method="get" id="form_company" name=""  action="<?php echo $_smarty_tpl->tpl_vars['cur_url']->value;?>
" >
                <tr>
                    <td width=250>
                        会员名称:
                        <input value="" name="siteurl" type="text" class="form-control"  />
                    </td>
                    
                    <td width=250>
                        积分类型:
                        <select  class="form-control input-sm" name="scoreType" id="scoreType"> 
                        <option value=''>--请选择积分类型--</option> 
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['score_type']->value),$_smarty_tpl);?>

                        </select>
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
            <th style="width:120px">会员名称</th>
            <th style="width:100px">积分类型</th>
            <th style="width:100px">积分数量</th>
            <th style="width:120px">获取时间</th>
            <th style="min-width:200px">详情</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['sl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['score_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sl']->key => $_smarty_tpl->tpl_vars['sl']->value) {
$_smarty_tpl->tpl_vars['sl']->_loop = true;
?>
        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['sl']->value['id'];?>
">
            <td align="center"><div> <?php echo $_smarty_tpl->tpl_vars['sl']->value['member_name'];?>
 </div></td>
            <td align="center"><div> <?php echo $_smarty_tpl->tpl_vars['score_type']->value[$_smarty_tpl->tpl_vars['sl']->value['scoreType']];?>
 </div></td>
            <td align="center"><div> <?php echo $_smarty_tpl->tpl_vars['sl']->value['scoreNum'];?>
 </div></td>
            <td align="center"><div> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['sl']->value['createTime'],"%Y/%m/%d %H:%M");?>
 </div></td>
            <td align="center"><div> <?php echo $_smarty_tpl->tpl_vars['sl']->value['info'];?>
 </div></td>
        </tr>
        <?php } ?>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

</div>
<?php }} ?>
