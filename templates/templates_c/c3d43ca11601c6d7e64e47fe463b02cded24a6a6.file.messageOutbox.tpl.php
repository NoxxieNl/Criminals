<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:14:14
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\messageOutbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1812154a69989667567-79405980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3d43ca11601c6d7e64e47fe463b02cded24a6a6' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\messageOutbox.tpl',
      1 => 1420204453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1812154a69989667567-79405980',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a699896beaf2_78761373',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'ROOT_URL' => 0,
    'message' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a699896beaf2_78761373')) {function content_54a699896beaf2_78761373($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
	<?php echo '<script'; ?>
 language="javascript">
            $(function() {
                $('#select_all').click(function(event) {
                    if(this.checked) {
                        $(':checkbox').each(function() {
                            this.checked = true;
                        });
                    } else {
                        $(':checkbox').each(function() {
                            this.checked = false;
                        });         
                    }
                });
            });
        <?php echo '</script'; ?>
>
        
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Berichten - Outbox</div>
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
            <form method="post">
                <table width="100%" border="0">
                    <tr>
                        <td class="coll"  width="5%"><input type="checkbox" id="select_all"></td>
                        <td class="coll">Van:</td>
                        <td class="coll">Onderwep:</td>
                        <td class="coll">Datum:</td>
                    </tr>

                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <tr>
                        <td class="coll"><input type="checkbox" name="id[<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
]"></th></td>
                        <td class="coll" width="20%"><?php echo $_smarty_tpl->tpl_vars['item']->value['from'];?>
</td>
                        <td class="coll" width="40%"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/message.php?page=read&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['subject'];?>
</a></td>
                        <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['time'];?>
</td>
                    </tr>
                    <?php } ?>

                </table>

                    <input class="button good small" name="delMessagesOutbox" type="submit" value="Verwijder geselecteerde berichten!">
                </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
