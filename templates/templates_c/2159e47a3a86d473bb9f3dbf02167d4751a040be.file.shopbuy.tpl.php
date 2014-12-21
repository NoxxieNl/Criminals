<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 11:53:22
         compiled from "D:\webserver\root\blauw\templates\ingame\shopbuy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19145495a5215c68e5-40168739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2159e47a3a86d473bb9f3dbf02167d4751a040be' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\shopbuy.tpl',
      1 => 1419159200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19145495a5215c68e5-40168739',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5495a52177b186_93354237',
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
    'items' => 0,
    'ROOT_URL' => 0,
    'item' => 0,
    'buy' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5495a52177b186_93354237')) {function content_5495a52177b186_93354237($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
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
    <p><h1>Shop</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['form_error']->value)) {?>
    <div class="error">
        <?php echo $_smarty_tpl->tpl_vars['form_error']->value;?>

    </div>
    <?php } elseif (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>

            <a href="shop.php?page=buy&id=1">Wapens</a> - 
            <a href="shop.php?page=buy&s=2">Bescherming</a> - 
            <a href="shop.php?page=buy&id=3">Verdediging</a> - 
            <a href="shop.php?page=buy&id=4">Accessoires</a> - 
            <a href="shop.php?page=buy&id=5"><b>Special</b></a> - 
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
                                 <input class="button maxSelect" name="submit" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="button" value="Koop maximaal">
                             </td>
                        </tr>
                    </table>
                <?php } ?>
                
                <input class="button" name="submit" type="submit" value="Koop!">
            </form>
            <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
