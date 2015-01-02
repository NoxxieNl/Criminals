<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:31:47
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\bank.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319054a68f441226c5-53950687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e1bf1c76b8f7badcfd8617f7f709fd5992f57fe' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\bank.tpl',
      1 => 1420201904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319054a68f441226c5-53950687',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a68f44153c80_60153677',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a68f44153c80_60153677')) {function content_54a68f44153c80_60153677($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
            <form method="post">
                <fieldset>    
                    <label>Bedrag</label>
                    <input class="normal" name="money" type="text" maxlength="10" value="100">
                </fieldset>
                <input class="button good large" name="withdraw" type="submit" value="Geld opnemen">
                <input class="button good large" name="deposit" type="submit" value="Geld storten">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
