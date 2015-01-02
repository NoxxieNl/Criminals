<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:07:31
         compiled from "D:\webserver\root\blauw\templates\begangster\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3259454a66902a7c904-38366686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac07dbd88578edc591cdbb0656e29ce5012fbfcb' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\login.tpl',
      1 => 1420200123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3259454a66902a7c904-38366686',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a66902acb900_90119157',
  'variables' => 
  array (
    'LOGIN' => 0,
    'form_error' => 0,
    'login' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a66902acb900_90119157')) {function content_54a66902acb900_90119157($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			    <div class="tabs_paginas" data-persist="true">
				<?php if (isset($_smarty_tpl->tpl_vars['LOGIN']->value)) {?>
                                <div class="melding good small icon">
                                    <?php echo $_smarty_tpl->tpl_vars['LOGIN']->value;?>

                                    <?php echo '<script'; ?>
 language="javascript">
                                        setTimeout("location.href = 'ingame/index.php';",1500);
                                    <?php echo '</script'; ?>
>
                                </div>
                                <?php } else { ?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
                                        <div class="melding bad small icon"><i class="seperator"></i>
                                            <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

                                        </div>
                                    <?php }?>
                                <?php }?>
				<div id="inloggen">
				    <form method="POST">
				       <fieldset>
					<label>Gebruikersnaam</label>
					<input type="text" placeholder="Gebruikersnaam" name="login" value="<?php if (isset($_smarty_tpl->tpl_vars['login']->value)) {
echo $_smarty_tpl->tpl_vars['login']->value;
}?>" /> 
				       </fieldset>
				       
				       <fieldset>
					<label>Wachtwoord</label>
					<input type="password" placeholder="Wachtwoord" name="password" value="<?php if (isset($_smarty_tpl->tpl_vars['password']->value)) {
echo $_smarty_tpl->tpl_vars['password']->value;
}?>"/> 
				       </fieldset>
					<input type="submit" value="Login" name="submit" class="button good small" />
				    </form>

				</div>
			    </div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
