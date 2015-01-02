<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:35:56
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\doneren.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1200454a690ac7abf06-45356826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d07fbfaef8dc91a1f50e34cc89f62b30d13404f' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\doneren.tpl',
      1 => 1420202152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1200454a690ac7abf06-45356826',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'donateUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a690ac7ef511_37335475',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a690ac7ef511_37335475')) {function content_54a690ac7ef511_37335475($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Bank</div>
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
            <p>Hier kan je naar andere spelers geld overmaken!</p>
            <form method="post">
                <fieldset>
                    <label>Speler</label>
                    <input class="normal" name="donate" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['donateUser']->value)) {
echo $_smarty_tpl->tpl_vars['donateUser']->value;
}?>">
                </fieldset>
                
                <fieldset>
                    <label>Bedrag</label>
                    <input class="normal" name="money" type="text" maxlength="10">
                </fieldset>
                
                <input class="button good large" name="submit" type="submit" value="Doneer">
            </form>
        </div>
                   
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
