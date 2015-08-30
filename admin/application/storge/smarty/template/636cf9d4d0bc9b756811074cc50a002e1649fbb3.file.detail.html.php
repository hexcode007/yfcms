<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 23:28:01
         compiled from "F:\www\yfcms\admin\application\views\article\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:915955ae5804cc9e41-44791883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '636cf9d4d0bc9b756811074cc50a002e1649fbb3' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\article\\detail.html',
      1 => 1437492469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '915955ae5804cc9e41-44791883',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae5804e05948_18565196',
  'variables' => 
  array (
    'article' => 0,
    'article_type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae5804e05948_18565196')) {function content_55ae5804e05948_18565196($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'F:\\www\\yfcms\\framework\\librarys\\Smarty\\libs\\plugins\\function.html_options.php';
?><div class="maininner">
    <ul class="nav nav-tabs" id="myTab">
        <li><a href="/article/" > 文章列表 </a></li>
        <li  class="active"><a href="#profile" data-toggle="tab">文章详情</a></li>
    </ul>
    <form id="form1" action="" method="post" form_tittle="保存文章信息" onsubmit="return false"  >
        <table class='edittable'>
            <tr>
                <td align="right" width="126">
                    文章标题:
                </td>
                <td>
                    <input type="text" class="form-control" required=true info="文章标题" id="title" name="title" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
" /> 
                </td>
            </tr>
            <tr>
                <td align="right" width="126">
                    分类:
                </td>
                <td>
                     <select  class="form-control input-sm" name="catId" id="catId"> 
                            <option value=''>--请选择积分类型--</option> 
                            <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['article']->value['catId'];?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['article_type']->value,'selected'=>$_tmp1),$_smarty_tpl);?>

                        </select>
                </td>
            </tr>
            <tr>
                <td align="right" width="126">
                    文章内容:
                </td>
                <td>
                    <textarea type="text" class="form-control" required="true" info="文章内容" id="content" name="content" cols ="100" rows="10">
                        <?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

                    </textarea>
                </td>
            </tr>
            <tr>
                <td align="right" > </td>
                <td style=" padding-left:3px; padding-top:20px;">
                    <div class=" innerdiv"> 
                        <input type="hidden" name="act" value="edit" />
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" />
                        <button type="button" id="saveButton" class="btn btn-primary">修 改</button>
                    </div>
                </td>
            </tr>
        </table>

    </form>

</div>

<script>

</script><?php }} ?>
