<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:37:48
         compiled from "D:\webserver\root\blauw\templates\ingame\roulette.tpl" */ ?>
<?php /*%%SmartyHeaderCode:222365495436ce81881-39929839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17aa6224c0477e97b36ae10400ca3922a3a00657' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\roulette.tpl',
      1 => 1419065071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '222365495436ce81881-39929839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5495436ced6c55_71934756',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495436ced6c55_71934756')) {function content_5495436ced6c55_71934756($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
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
    <p><h1>Roulette</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

    <p>Roulette is een zeer bekend spel. Het is ook heel makkelijk te leren.<br>
        Er wordt in een cilinder een balletje gerold en aan jouw de vraag waar dit balletje valt.<br>
        Je kunt inzetten op een kleur en een bepaald cijfer, bijvoorbeeld jouw geluksnummer,
        de dag van de maand of een gegokt cijfer.<br>
        Je kunt tot wel 35x maal je inzet terugwinnen!</p>
    <form method="post">
        <label>Kleur</label>
        <select name="color" class="normal color">
            <option value="-1">Geen kleur gekozen</option>
            <option value="1">Groen</option>
            <option value="2">Zwart</option>
            <option value="3">Rood</option>
        </select>
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
        
        <label>Inzet</label><input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
        <input class="button" name="submit" type="submit" value="Draai de roulette!">
    </form>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
