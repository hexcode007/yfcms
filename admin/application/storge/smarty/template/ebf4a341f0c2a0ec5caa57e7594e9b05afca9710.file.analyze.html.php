<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 23:42:26
         compiled from "F:\www\yfcms\admin\application\views\domains\analyze.html" */ ?>
<?php /*%%SmartyHeaderCode:1769655ae4d40591617-91581699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf4a341f0c2a0ec5caa57e7594e9b05afca9710' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\domains\\analyze.html',
      1 => 1437493344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1769655ae4d40591617-91581699',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4d406c9625_61721045',
  'variables' => 
  array (
    'cur_url' => 0,
    'domain_list' => 0,
    'dl' => 0,
    'page' => 0,
    'product_cat' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4d406c9625_61721045')) {function content_55ae4d406c9625_61721045($_smarty_tpl) {?><div class="maininner">
    <div class="search_formwrap">
        <h5 class="maintt clearfix"> <s></s> <strong> 数据总览 </strong></h5>
    </div>
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
            <th style="width:150px">Url</th>
            <th style="width:60px">出价</th>
            <th style="width:60px">展现次数</th>
            <th style="min-width:60px">点击次数</th>
            <th style="min-width:60px">平均价格</th>
            <th style="min-width:60px">千次成本</th>
            <th style="min-width:80px">总费用</th>
            <th style="min-width:60px">平均访问时长</th>
            <th style="min-width:60px">直接转化</th>
            <th style="min-width:60px">间接转化</th>
            <th style="min-width:150px">分析状态/时间/得分</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['dl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dl']->_loop = false;
 $_smarty_tpl->tpl_vars['domain_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['domain_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dl']->key => $_smarty_tpl->tpl_vars['dl']->value) {
$_smarty_tpl->tpl_vars['dl']->_loop = true;
 $_smarty_tpl->tpl_vars['domain_id']->value = $_smarty_tpl->tpl_vars['dl']->key;
?>
        <tr push_id="<?php echo $_smarty_tpl->tpl_vars['dl']->value['id'];?>
">
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['dl']->value['siteUrl'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['price'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['srchs'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['clks'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['ctr'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['acp'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['cpm'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['resTimeStr'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['transfer'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['transfer2'];?>
</td>
            <td align="center"><?php echo $_smarty_tpl->tpl_vars['dl']->value['isAnalyze'];?>
 / <?php echo $_smarty_tpl->tpl_vars['dl']->value['analyzeTime'];?>
 / <?php echo $_smarty_tpl->tpl_vars['dl']->value['resultScore'];?>
</td>
        </tr>
        <?php } ?>
    </table>
   
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>


</div>

<script>
    var catstr = <?php echo $_smarty_tpl->tpl_vars['product_cat']->value;?>
;
    setProductCat(catstr,'#productCat',<?php echo (($tmp = @$_smarty_tpl->tpl_vars['params']->value['productCatId'])===null||$tmp==='' ? 0 : $tmp);?>
,'#productCat2',<?php echo (($tmp = @$_smarty_tpl->tpl_vars['params']->value['productCatId2'])===null||$tmp==='' ? 0 : $tmp);?>
);   
</script><?php }} ?>
