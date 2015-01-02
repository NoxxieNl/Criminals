<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 12:03:23
         compiled from "D:\webserver\root\blauw\templates\blue\ingame\bank.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1075754a67afb04e925-95616620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d3aab4cdd40bcae013067dcf8efd51ad9609ddc' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\blue\\ingame\\bank.tpl',
      1 => 1418563802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1075754a67afb04e925-95616620',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a67afb08e2c7_36926672',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a67afb08e2c7_36926672')) {function content_54a67afb08e2c7_36926672($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Bank</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

    <p>Hier kan je geld veilig stellen op de bank of juist geld opnemen van de bank, zolang je geld op de bank staat kan je er niks mee kopen!</p>
    <form method="post">
        <label>Bedrag</label>
        <input class="normal" name="money" type="text" maxlength="10" value="100">
        <input class="button" name="withdraw" type="submit" value="Geld opnemen">
        <input class="button" name="deposit" type="submit" value="Geld storten">
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
