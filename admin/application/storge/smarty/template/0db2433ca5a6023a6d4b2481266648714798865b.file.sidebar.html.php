<?php /* Smarty version Smarty-3.1.17, created on 2015-07-21 21:40:56
         compiled from "F:\www\yfcms\admin\application\views\layout\sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:1750755ae4be8149910-50012631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0db2433ca5a6023a6d4b2481266648714798865b' => 
    array (
      0 => 'F:\\www\\yfcms\\admin\\application\\views\\layout\\sidebar.html',
      1 => 1436382363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1750755ae4be8149910-50012631',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menus' => 0,
    'm' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55ae4be8187253_98349897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ae4be8187253_98349897')) {function content_55ae4be8187253_98349897($_smarty_tpl) {?><div class=" sidebar">
    <?php if ($_smarty_tpl->tpl_vars['menus']->value) {?>
    <ul class="sidebar_inner">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <li>
            <span> <s class="icon  icon_card menu_<?php echo $_smarty_tpl->tpl_vars['m']->value['menu_id'];?>
"></s> <strong><?php echo $_smarty_tpl->tpl_vars['m']->value['menu_name'];?>
</strong> </span>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['moudles']) {?>
            <ul>
                <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['m']->value['moudles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['moudle_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['moudle_name'];?>
</a></li>
                <?php } ?>
            </ul>
            <?php }?>
        </li>
        <?php } ?>
    </ul>
    <?php }?>
</div><?php }} ?>
