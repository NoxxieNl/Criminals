<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:40:24
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\editProfiel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1914954a691576ce3b0-87605133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '850a1af48f1aad42b9478640e5624ec124ac8514' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\editProfiel.tpl',
      1 => 1420202423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1914954a691576ce3b0-87605133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a69157712ff1_07581884',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'email' => 0,
    'website' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a69157712ff1_07581884')) {function content_54a69157712ff1_07581884($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Profiel wijzigen</div>
        </div>
        
        <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
        <div class="melding bad small icon">
            <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
        <div class="melding good small icon">
            <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

        </div>
        <?php }?>
        
        <div class="tekstvak">
            <form method="post">
                <fieldset>
                    <label>E-Mail:</label>
                     <input type="text" class="normal" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" disabled="true">
                </fieldset>

                <fieldset>
                    <label>Website:</label>
                    <input type="text" class="normal" name="website" value="<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
">
                </fieldset>

                <fieldset>
                    <label>Info:</label>
                    <textarea name="info" cols=60 rows=10 class="large"><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</textarea>
                </fieldset>

                <fieldset>
                    <label>Wachtwoord nieuw:</label> 
                    <input type="password" name="pass" class="normal">
                    
                    <label>Wachtwoord Herhaal:</label> 
                    <input type="password" name="passVerify" class="normal">
                </fieldset>
                  <input class="button good large" type="submit" name="submit" value="Verander gegevens" class="button">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
