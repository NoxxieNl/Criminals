<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:07:28
         compiled from "D:\webserver\root\blauw\templates\begangster\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1294954a68a00500b67-17494676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c46708c6550cb6c3e28bced02c398c26f85afecb' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\register.tpl',
      1 => 1420200134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1294954a68a00500b67-17494676',
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
  'unifunc' => 'content_54a68a00564fc9_39664050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a68a00564fc9_39664050')) {function content_54a68a00564fc9_39664050($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			    
			    <div class="tabs_paginas" data-persist="true">
                                <?php if (isset($_smarty_tpl->tpl_vars['REGISTERD']->value)) {?>
                                <div class="melding good small icon">
                                    <?php echo $_smarty_tpl->tpl_vars['REGISTERD']->value;?>

                                </div>
                                <?php } else { ?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
                                        <div class="melding bad small icon">
                                            <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

                                        </div>
                                    <?php }?>
                                <?php }?>
				<div id="aanmelden">
                                    <form method="post">
                                        <fieldset>
                                            <label>Gebruikersnaam:</label> 
                                            <input class="normal" type="text" name="login" maxlength=16 value="<?php if (isset($_smarty_tpl->tpl_vars['login']->value)) {
echo $_smarty_tpl->tpl_vars['login']->value;
}?>">
                                        </fieldset>
                                        <fieldset>
                                            <label>Wachtwoord:</label> 
                                            <input class="normal" type="password" name="password" maxlength=16 value="<?php if (isset($_smarty_tpl->tpl_vars['password']->value)) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>">
                                        </fieldset>
                                        <fieldset>
                                            <label>Herhaal:</label> 
                                            <input class="normal" type="password" name="passconfirm" maxlength=64 value="<?php if (isset($_smarty_tpl->tpl_vars['passconfirm']->value)) {
echo $_smarty_tpl->tpl_vars['passconfirm']->value;
}?>">
                                        </fieldset>
                                        <fieldset>
                                            <label>e-Mail:</label> 
                                            <input class="normal" type="text" name="emailCheck" maxlength=64 value="<?php if (isset($_smarty_tpl->tpl_vars['emailCheck']->value)) {
echo $_smarty_tpl->tpl_vars['emailCheck']->value;
}?>">
                                        </fieldset>
                                        <fieldset>
                                            <label>Type:</label> 
                                            <select class="normal" name="type">
                                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==1) {?>selected="true"<?php }?>>Drugsdealer</option>
                                                <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==2) {?>selected="true"<?php }?>>Wetenschapper</option>
                                                <option value="3" <?php if (isset($_smarty_tpl->tpl_vars['type']->value)&&$_smarty_tpl->tpl_vars['type']->value==3) {?>selected="true"<?php }?>>Politie</option>
                                            </select>
                                        </fieldset>
                                        <input class="button good small" type="submit" name="submit" value="Aanmelden">
                                    </form>
				</div>
			    </div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
