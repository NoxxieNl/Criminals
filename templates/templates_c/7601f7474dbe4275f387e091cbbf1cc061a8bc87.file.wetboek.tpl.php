<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:45:12
         compiled from "D:\webserver\root\blauw\templates\wetboek.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26505495452806a5d6-73624614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7601f7474dbe4275f387e091cbbf1cc061a8bc87' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\wetboek.tpl',
      1 => 1419068642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26505495452806a5d6-73624614',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rules' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5495452809f900_40985439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495452809f900_40985439')) {function content_5495452809f900_40985439($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Wetboek</h1></p>
 
    <?php echo $_smarty_tpl->tpl_vars['rules']->value;?>

</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
