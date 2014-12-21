<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:40:05
         compiled from "D:\webserver\root\blauw\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3770549543f5f1e5c0-21749133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '300f65fe5e9b62ec5deb73b0e674685d4fcd323c' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\index.tpl',
      1 => 1418561164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3770549543f5f1e5c0-21749133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LOGGEDIN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549543f6016be9_66481835',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549543f6016be9_66481835')) {function content_549543f6016be9_66481835($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==false) {?>
        <p><h1>Welkom bij Criminals...</h1></p>
        <p>Meldt je aan en vecht met of tegen drugsdealers, wetenschappers en politie. Recruteer je vrienden en vreemden en laat
           ze voor je vechten. Koop de zwaarste wapens en domineer iedereen! Kan jij het aan?</p>
    <?php } else { ?>
        <?php echo '<script'; ?>
 language="javascript">
            setTimeout("location.href = 'ingame/index.php';");
        <?php echo '</script'; ?>
>
    <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
