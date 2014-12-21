<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 11:53:26
         compiled from "D:\webserver\root\blauw\templates\ingame\shopsell.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2416754954f82615371-54778161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29c56cff61f788c3f768dae8afa18d132e9fa2d8' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\shopsell.tpl',
      1 => 1419094961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2416754954f82615371-54778161',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54954f82661310_40684025',
  'variables' => 
  array (
    'form_error' => 0,
    'success' => 0,
    'items' => 0,
    'ROOT_URL' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54954f82661310_40684025')) {function content_54954f82661310_40684025($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
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
                             <td class="coll" width="40%"><input class="normal" name="sell<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text"></td>
                        </tr>
                    </table>
                <?php } ?>
                
                <input class="button" name="submit" type="submit" value="Verkoop!">
            </form>
            <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
