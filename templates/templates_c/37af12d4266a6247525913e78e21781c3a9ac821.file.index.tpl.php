<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 12:03:19
         compiled from "D:\webserver\root\blauw\templates\blue\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1287354a67af738fcd2-64794807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37af12d4266a6247525913e78e21781c3a9ac821' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\blue\\index.tpl',
      1 => 1420187559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1287354a67af738fcd2-64794807',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LOGGEDIN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a67af7401e95_37222151',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a67af7401e95_37222151')) {function content_54a67af7401e95_37222151($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
