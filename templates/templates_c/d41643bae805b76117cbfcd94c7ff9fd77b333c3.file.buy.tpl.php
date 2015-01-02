<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:44:26
         compiled from "D:\webserver\root\blauw\templates\begangster\clan\buy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1349754a6a08822d743-82797104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd41643bae805b76117cbfcd94c7ff9fd77b333c3' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\clan\\buy.tpl',
      1 => 1420206266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1349754a6a08822d743-82797104',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6a088298552_51589053',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'items' => 0,
    'item' => 0,
    'buy' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a088298552_51589053')) {function content_54a6a088298552_51589053($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
	<?php echo '<script'; ?>
 language="javascript">
            $(function() {
                $( ".button.maxSelect" ).click(function() {
                    buyId = $('input[name=buy' + $(this).attr('id') + ']');

                    $(buyId).val($(buyId).attr('max'));
                });
            });
        <?php echo '</script'; ?>
>		
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Winkel - Kopen</div>
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
            <a href="shop.php?page=sell">Verkoop</a>
            <?php if (isset($_smarty_tpl->tpl_vars['items']->value)) {?>
            <form method="post">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <table width="50%" border="0">
                        <tr>
                            <td class="coll" rowspan="10" colspan="2"><img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/items/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
                             <td class="coll subject" width="40%">Kosten:</td>
                             <td class="coll" width="40%"><?php echo $_smarty_tpl->tpl_vars['item']->value['costs'];?>
</td>
                        </tr>
                         <tr>
                             <td class="coll subject" width="40%">Koop aantal:</td>
                             <td class="coll" width="40%">
                                 <input class="normal" name="buy<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" max=<?php echo $_smarty_tpl->tpl_vars['item']->value['max_buy'];?>
 value="<?php if (isset($_smarty_tpl->tpl_vars['buy']->value[$_smarty_tpl->tpl_vars['item']->value['id']])) {
echo $_smarty_tpl->tpl_vars['buy']->value[$_smarty_tpl->tpl_vars['item']->value['id']];
}?>">
                                 <input class="button good small maxSelect" name="submit" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="button" value="Koop maximaal">
                             </td>
                        </tr>
                    </table>
                <?php } ?>
                
                <input class="button small good" name="submit" type="submit" value="Koop!">
            </form>
            <?php }?>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
