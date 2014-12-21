<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 18:34:40
         compiled from "D:\webserver\root\blauw\templates\ingame\profiel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195395496da0d0b18f8-91250541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc874575df38186c77d9b4820399eb1450b66fd3' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\profiel.tpl',
      1 => 1419183278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195395496da0d0b18f8-91250541',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5496da0d216243_31312264',
  'variables' => 
  array (
    'success' => 0,
    'user' => 0,
    'id' => 0,
    'ROOT_URL' => 0,
    'level' => 0,
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5496da0d216243_31312264')) {function content_5496da0d216243_31312264($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Profiel</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>
    <div class="ingameContainer">
        <table width="50%" border="0">
            <tr>
                <td colspan="5" class="coll headerCol">Profiel van <?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Speler:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="30%">Type:</td>
                <td class="coll" width="20%"><?php echo $_smarty_tpl->tpl_vars['user']->value['type'];?>
</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Clan:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['clan_id'];?>
</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Clicks:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['clicks'];?>
</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Kracht:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['attack_power'];?>
</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Verdediging:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['defence_power'];?>
</td>
            </tr>
            <tr>
                <td colspan="5" class="coll headerCol">Geldzaken</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Cash:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['cash'];?>
</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Bank:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['bank'];?>
</td>
            </tr>
            <tr>
                <td colspan="5" class="coll headerCol">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5" class="coll headerCol">Extra</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Gevechten gewonnen:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['attacks_won'];?>
</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Gevechten verloren:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['attacks_lost'];?>
</td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['id']->value) {?>
            <tr>
                <td class="coll subject" width="20%">Contacteer <?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
:</td>
                <td class="coll headerCol" width="30%"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/bericht.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Contacteer nu!</a></td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Val <?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
 aan:</td>
                <td class="coll headerCol" width="30%"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/attack.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Val nu aan!</a></td>
            </tr>      
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['level']->value>2) {?>
                 <tr>
                <td colspan="5" class="coll headerCol">Admin info</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Registratie datum:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['signup_date'];?>
</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Resterende bank:</td>
                <td class="coll" width="30%"><?php echo $_smarty_tpl->tpl_vars['user']->value['bank_left'];?>
</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Doneer speler:</td>
                <td class="coll" width="30%"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin/adminBasic.php?donate=true&player=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">Doneer speler!</a></td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Reset speler:</td>
                <td class="coll" width="30%"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin/adminBasic.php?reset=true&player=<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">Reset speler!</a></td>
            </tr>
            <?php }?>
        </table>
        
        <?php if (isset($_smarty_tpl->tpl_vars['items']->value)) {?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <table width="50%" border="0">
                        <tr>
                            <td colspan="5" class="coll headerCol">Items</td>
                        </tr>
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
                    </table>
                <?php } ?>
            <?php }?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
