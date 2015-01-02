<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:07:24
         compiled from "D:\webserver\root\blauw\templates\begangster\prijzen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2516454a689fcac0ce7-37047669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5c3fef1caebed2af93dfc5ee7d4039a3517509b' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\prijzen.tpl',
      1 => 1420200361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2516454a689fcac0ce7-37047669',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'price' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a689fcaf13a3_92990440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a689fcaf13a3_92990440')) {function content_54a689fcaf13a3_92990440($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="tabs_paginas" data-persist="true">
        <?php echo $_smarty_tpl->tpl_vars['price']->value;?>

    </div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
