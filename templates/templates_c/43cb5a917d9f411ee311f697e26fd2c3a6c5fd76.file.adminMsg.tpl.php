<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:23:13
         compiled from "D:\webserver\root\blauw\templates\begangster\admin\adminMsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1309454a69bc19294a5-53147872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43cb5a917d9f411ee311f697e26fd2c3a6c5fd76' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\admin\\adminMsg.tpl',
      1 => 1420204798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1309454a69bc19294a5-53147872',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a69bc1966c56_31092153',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a69bc1966c56_31092153')) {function content_54a69bc1966c56_31092153($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Admin - Massa bericht</div>
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
              <p>Verstuur elke speler in het spel een bericht via deze pagina</p>
                <form method="post">
                    <fieldset><label>Onderwerp</label><input class="normal" name="subject" type="text"></fieldset>
                    <fieldset><label>bericht</label><textarea name="message" class="normal" cols=40 rows=10></textarea></fieldset>
                    <input class="button small good" name="massMsg" type="submit" value="Versuur mass bericht">
                </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
