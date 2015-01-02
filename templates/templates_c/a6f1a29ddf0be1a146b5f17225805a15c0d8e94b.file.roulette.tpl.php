<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:04:13
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\roulette.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2141854a6974d9e4da0-25294837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6f1a29ddf0be1a146b5f17225805a15c0d8e94b' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\roulette.tpl',
      1 => 1420203849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2141854a6974d9e4da0-25294837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6974da3c196_24201689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6974da3c196_24201689')) {function content_54a6974da3c196_24201689($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
	<?php echo '<script'; ?>
 lang="javascript">
            $(function() {
               $('select.color').change(function() {
                   if ($(this).val() == 1) { $('.number').val('cnul').prop('disabled', true); }
                   if ($(this).val() == 2) {
                       if ($('.number').prop('disabled') == true) { $('.number').val(0).prop('disabled', false); }
                       $(".number > option").each(function() {
                           if ((this.text % 2) != 0) { $(this).prop('disabled', true); }
                           else { $(this).prop('disabled', false); }
                       });

                        $('.number').val(-1);
                   }
                   if ($(this).val() == 3) { 
                       if ($('.number').prop('disabled') == true) { $('.number').val(0).prop('disabled', false); }
                       $(".number > option").each(function() {
                           if ((this.text % 2) == 0) { $(this).prop('disabled', true); }
                           else { $(this).prop('disabled', false); }
                       });

                       $('.number').val(-1);
                   }
               });
            });
        <?php echo '</script'; ?>
>		
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Roulette</div>
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
            <p>Roulette is een zeer bekend spel. Het is ook heel makkelijk te leren.<br>
            Er wordt in een cilinder een balletje gerold en aan jouw de vraag waar dit balletje valt.<br>
            Je kunt inzetten op een kleur en een bepaald cijfer, bijvoorbeeld jouw geluksnummer,
            de dag van de maand of een gegokt cijfer.<br>
            Je kunt tot wel 35x maal je inzet terugwinnen!</p>

            <form method="post">
                <fieldset>
                    <label>Kleur</label>
                    <select name="color" class="normal color">
                        <option value="-1">Geen kleur gekozen</option>
                        <option value="1">Groen</option>
                        <option value="2">Zwart</option>
                        <option value="3">Rood</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Nummer</label>
                     <select name="number" class="normal number">
                        <option value="-1">Geen getal gekozen</option>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                        <?php while ($_smarty_tpl->tpl_vars['i']->value<37) {?>
                            <option value="<?php if (($_smarty_tpl->tpl_vars['i']->value==0)) {?>cnul<?php } else {
echo $_smarty_tpl->tpl_vars['i']->value;
}?>"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                            <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>

                        <?php }?>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Inzet</label>
                    <input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
                </fieldset>
                <input class="button good small" name="submit" type="submit" value="Draai de roulette!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
