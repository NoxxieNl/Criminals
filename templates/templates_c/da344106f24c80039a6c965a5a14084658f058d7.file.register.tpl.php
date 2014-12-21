<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 16:16:24
         compiled from "D:\webserver\root\blauw\templates\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136245496e448a01233-86045135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da344106f24c80039a6c965a5a14084658f058d7' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\register.tpl',
      1 => 1418486484,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136245496e448a01233-86045135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'REGISTERD' => 0,
    'form_error' => 0,
    'login' => 0,
    'password' => 0,
    'passconfirm' => 0,
    'emailCheck' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5496e448a9c418_76021498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5496e448a9c418_76021498')) {function content_5496e448a9c418_76021498($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Registreren</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['REGISTERD']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['REGISTERD']->value;?>

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
            <label>Herhaal:</label> <input class="normal" type="password" name="passconfirm" maxlength=64 value="<?php if (isset($_smarty_tpl->tpl_vars['passconfirm']->value)) {
echo $_smarty_tpl->tpl_vars['passconfirm']->value;
}?>">
            <label>e-Mail:</label> <input class="normal" type="text" name="emailCheck" maxlength=64 value="<?php if (isset($_smarty_tpl->tpl_vars['emailCheck']->value)) {
echo $_smarty_tpl->tpl_vars['emailCheck']->value;
}?>">
            <label>Type:</label> <select class="normal" name="type">
                                    <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==1) {?>selected="true"<?php }?>>Drugsdealer</option>
                                    <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==2) {?>selected="true"<?php }?>>Wetenschapper</option>
                                    <option value="3" <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==3) {?>selected="true"<?php }?>>Politie</option>
                                 </select>
            <input class="button" type="submit" name="submit" value="Aanmelden">
        </form>
    <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
