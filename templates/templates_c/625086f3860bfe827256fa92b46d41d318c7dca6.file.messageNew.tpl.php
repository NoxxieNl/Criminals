<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:14:07
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\messageNew.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2634254a69939113627-08774066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '625086f3860bfe827256fa92b46d41d318c7dca6' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\messageNew.tpl',
      1 => 1420204435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2634254a69939113627-08774066',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a69939158822_05558452',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'ROOT_URL' => 0,
    'toUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a69939158822_05558452')) {function content_54a69939158822_05558452($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Berichten - Nieuw bericht</div>
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
            <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/message.php?page=inbox">Inbox</a> - <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/message.php?page=outbox">Outbox</a> - <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/message.php?page=new">Nieuw</a>
            <p>Verstuur hier een bericht naar een mede speler</p>
            <form method="post">
                <fieldset><label>Naar:</label><input class="normal" name="to" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['toUser']->value)) {
echo $_smarty_tpl->tpl_vars['toUser']->value;
}?>"></fieldset>
                <fieldset><label>Onderwerp:</label><input class="normal" name="subject" type="text"></fieldset>
                <fieldset><label>Bericht:</label><textarea name="message" class="normal" cols="80" rows=10></textarea></fieldset>
                <input class="button small good" name="massMsg" type="submit" value="Versuur bericht">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
