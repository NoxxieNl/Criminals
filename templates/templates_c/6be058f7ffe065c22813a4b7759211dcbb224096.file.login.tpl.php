<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:40:09
         compiled from "D:\webserver\root\blauw\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8555549543f976fc65-78622650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6be058f7ffe065c22813a4b7759211dcbb224096' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\login.tpl',
      1 => 1418548852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8555549543f976fc65-78622650',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LOGIN' => 0,
    'form_error' => 0,
    'login' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549543f97bb371_07101390',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549543f97bb371_07101390')) {function content_549543f97bb371_07101390($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Inloggen</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['LOGIN']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['LOGIN']->value;?>

        <?php echo '<script'; ?>
 language="javascript">
            setTimeout("location.href = 'ingame/index.php';",1500);
        <?php echo '</script'; ?>
>
    </div>
    <?php } else { ?>
        <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
            <div class="error">
                <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

            </div>
        <?php }?>
        <form method="post">
            <label>Gebruikersnaam:</label> <input class="normal" type="text" name="login" maxlength=16 value="<?php if (isset($_smarty_tpl->tpl_vars['login']->value)) {
echo $_smarty_tpl->tpl_vars['login']->value;
}?>">
            <label>Wachtwoord:</label> <input class="normal" type="password" name="password" maxlength=16 value="<?php if (isset($_smarty_tpl->tpl_vars['password']->value)) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>">
            <input class="button" type="submit" name="submit" value="Inloggen">
        </form>
    <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
