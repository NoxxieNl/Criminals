<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:22:51
         compiled from "D:\webserver\root\blauw\templates\begangster\admin\adminBasic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2541754a69b2a1e4329-27927549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4132a7cb46bfaae532b20904e87aff0e478271c0' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\admin\\adminBasic.tpl',
      1 => 1420204967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2541754a69b2a1e4329-27927549',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a69b2a22dcf8_96558225',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'info' => 0,
    'player' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a69b2a22dcf8_96558225')) {function content_54a69b2a22dcf8_96558225($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Admin basis</div>
        </div>
        
        <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
        <div class="melding bad small icon">
            <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
        <div class="melding good small icon">
            <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['info']->value)&&preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['info']->value, $tmp)>0) {?>
        <div class="melding info small icon">
            <?php echo $_smarty_tpl->tpl_vars['info']->value;?>

        </div>
        <?php }?>
        
        <div class="tekstvak">
            <p>Als admin zijnde kan je op deze pagina een speler verwijderen, resetten of geld doneren!</p>
            <form method="post" action="adminBasic.php">
                <fieldset><label>Speler</label><input class="normal" name="player" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['player']->value)) {
echo $_smarty_tpl->tpl_vars['player']->value;
}?>"></fieldset>
                <fieldset><label>Bedrag (Donatie)</label><input class="normal" name="amount" type="text"></fieldset>
                
                
                <input class="button small good" name="reset" type="submit" value="Resetten">
                <input class="button small good" name="donate" type="submit" value="Doneren">
                <input class="button small bad" name="delete" type="submit" value="Verwijderen">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
