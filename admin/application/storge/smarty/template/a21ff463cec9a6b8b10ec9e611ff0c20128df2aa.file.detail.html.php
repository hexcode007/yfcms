<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 21:41:10
         compiled from "F:\www\yfcms\admin\application\views\filelist\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:2240855ae4bf69744e8-66565202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a21ff463cec9a6b8b10ec9e611ff0c20128df2aa' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\filelist\\detail.html',
      1 => 1437299748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2240855ae4bf69744e8-66565202',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain_list' => 0,
    'dl' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4bf6a07ae9_53643287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4bf6a07ae9_53643287')) {function content_55ae4bf6a07ae9_53643287($_smarty_tpl) {?><div class="maininner">
    <ul class="nav nav-tabs" id="myTab">
        <li><a href="/filelist/" > 文件列表 </a></li>
        <li  class="active"><a href="#profile" data-toggle="tab">文件详情</a></li>
    </ul>
    
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
    
</script><?php }} ?>
