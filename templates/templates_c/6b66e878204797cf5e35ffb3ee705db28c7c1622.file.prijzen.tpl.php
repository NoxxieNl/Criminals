<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:50:56
         compiled from "D:\webserver\root\blauw\templates\prijzen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31080549546801f89d3-88832012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b66e878204797cf5e35ffb3ee705db28c7c1622' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\prijzen.tpl',
      1 => 1419069046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31080549546801f89d3-88832012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5495468022a630_70380809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495468022a630_70380809')) {function content_5495468022a630_70380809($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Prijzen</h1></p>
 
    <?php echo $_smarty_tpl->tpl_vars['price']->value;?>

</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
