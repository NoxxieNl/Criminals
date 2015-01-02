<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:56:40
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\shopSell.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1653554a694f5005860-02950298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fcf1262bb08162370cd5551140ca43836d8b954' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\shopSell.tpl',
      1 => 1420203259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1653554a694f5005860-02950298',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a694f5060b74_63143786',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'items' => 0,
    'ROOT_URL' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a694f5060b74_63143786')) {function content_54a694f5060b74_63143786($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Winkel - verkopen</div>
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
            <?php if (isset($_smarty_tpl->tpl_vars['items']->value)) {?>
            <form method="post">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <table width="100%" border="0">
                        <tr>
                            <td class="coll" rowspan="10" colspan="2"><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
images/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
.gif" width=150 height=150></td>
                             <td class="coll subject" width="40%">Naam:</td>
                             <td class="coll" width="40%"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Aanvalskracht:</td>
                             <td class="coll" width="40%"><?php echo $_smarty_tpl->tpl_vars['item']->value['attack_power'];?>
</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Verdedigingskracht:</td>
                             <td class="coll" width="40%"><?php echo $_smarty_tpl->tpl_vars['item']->value['defence_power'];?>
</td>
                        </tr>
                         <tr>
                             <td class="coll subject" width="40%">Aantal in bezit:</td>
                             <td class="coll" width="40%"><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Totaal aanvalskracht:</td>
                             <td class="coll" width="40%"><?php echo $_smarty_tpl->tpl_vars['item']->value['total_attack_power'];?>
</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Totaal verdedigingskracht:</td>
                             <td class="coll" width="40%"><?php echo $_smarty_tpl->tpl_vars['item']->value['total_defence_power'];?>
</td>
                        </tr>
                         <tr>
                             <td class="coll subject" width="40%">Verkoop aantal:</td>
                             <td class="coll" width="40%"><input class="button normal good" name="sell<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text"></td>
                        </tr>
                    </table>
                <?php } ?>
                
                <input class="button good large" name="submit" type="submit" value="Verkoop!">
            </form>
            <?php }?>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
