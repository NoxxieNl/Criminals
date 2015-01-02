<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:46:29
         compiled from "D:\webserver\root\blauw\templates\begangster\clan\delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293054a6a135373421-00246224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ea4b7fa75f0fe219122521dd86803ce29c7fafe' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\clan\\delete.tpl',
      1 => 1420205379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293054a6a135373421-00246224',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'confirmation' => 0,
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6a1353b7760_25384213',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a1353b7760_25384213')) {function content_54a6a1353b7760_25384213($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan verwijderen</div>
        </div>
        
        <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
        <div class="melding bad small icon">
            <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
        <div class="melding good small icon">
            <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

        </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?>
        <div class="melding info small icon">
            Weet je het zeker dat je de clan wilt verwijderenb? Klik <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/index.php?page=delete&confirmation=true">hier</a> als je het zeker weet!
        </div>
        <?php }?>
        
        <div class="tekstvak">
             <p>Als je de clan wilt verwijderen kan dat hier, LET OP: Alles wat de clan heeft (cash / bank / items etc.) raken verloren!</p>
            <form method="post">
                <input class="button bad large" name="submit" type="submit" value="Verwijder de clan!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
