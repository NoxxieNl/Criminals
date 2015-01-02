<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:11:15
         compiled from "D:\webserver\root\blauw\templates\begangster\logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2680854a68ae3035131-17934835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f76ab901c122997df8dcbeedfbdf510da96e419a' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\logout.tpl',
      1 => 1420200295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2680854a68ae3035131-17934835',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a68ae30621b3_06433700',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a68ae30621b3_06433700')) {function content_54a68ae30621b3_06433700($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="tabs_paginas" data-persist="true">
            <div class="melding good small icon">
                Je bent succesvol uitgelogd!
            </div>
        
            <?php echo '<script'; ?>
 language="javascript">
                setTimeout("location.href = 'index.php';",1500);
            <?php echo '</script'; ?>
>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
