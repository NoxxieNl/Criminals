<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:43:34
         compiled from "D:\webserver\root\blauw\templates\begangster\clan\cOwner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1804854a6a08696ca61-49070800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b6e49ad85932cc54a55f5489e9c96862de1934b' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\clan\\cOwner.tpl',
      1 => 1420205262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1804854a6a08696ca61-49070800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'changeUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6a0869ae255_64373551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a0869ae255_64373551')) {function content_54a6a0869ae255_64373551($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan owner wijzigen</div>
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
             <p>Geef hier de speler op die je als nieuwe owner van je clan wilt maken!</p>
            <form method="post">
                <fieldset>
                    <label>Clan naam:</label>
                    <input class="normal" name="name" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['changeUser']->value)) {
echo $_smarty_tpl->tpl_vars['changeUser']->value;
}?>">
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Owner wijzigen!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
