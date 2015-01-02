<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:10:08
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\messageRead.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1232854a698b04a6881-24101509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f45b06cfdeb1b9f8697c73c652d9ad51dd054429' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\messageRead.tpl',
      1 => 1420204191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1232854a698b04a6881-24101509',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'ROOT_URL' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a698b04fffa7_34780095',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a698b04fffa7_34780095')) {function content_54a698b04fffa7_34780095($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Berichten - bericht</div>
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
    
            <table width="50%" border="0">
                    <tr>
                        <td class="coll">Van:</td>
                        <td class="coll"><?php echo $_smarty_tpl->tpl_vars['message']->value['username'];?>
</td>
                    </tr>
                    <tr>
                        <td class="coll">Onderwerp: </td>
                        <td class="coll"><?php echo $_smarty_tpl->tpl_vars['message']->value['message_subject'];?>
</td>
                    </tr>
                    <tr>
                        <td class="coll">Datum: </td>
                        <td class="coll"><?php echo $_smarty_tpl->tpl_vars['message']->value['message_time'];?>
</td>
                    </tr>
                    <tr>
                        <td class="coll">Bericht: </td>
                        <td class="coll"><?php echo nl2br($_smarty_tpl->tpl_vars['message']->value['message_message']);?>
</td>
                    </tr>
                </table>
            
            <div class="center"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/message.php?page=new&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">Reageer op dit bericht</a></div>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
