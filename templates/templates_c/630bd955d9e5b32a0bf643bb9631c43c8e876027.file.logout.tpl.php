<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:40:04
         compiled from "D:\webserver\root\blauw\templates\logout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13285549543f45b94b8-08833029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '630bd955d9e5b32a0bf643bb9631c43c8e876027' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\logout.tpl',
      1 => 1418549164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13285549543f45b94b8-08833029',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549543f4672132_61236502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549543f4672132_61236502')) {function content_549543f4672132_61236502($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Uitloggen</h1></p>
    <div class="success">
        Je bent succesvol uitgelogd!
        <?php echo '<script'; ?>
 language="javascript">
            setTimeout("location.href = 'index.php';",1500);
        <?php echo '</script'; ?>
>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
