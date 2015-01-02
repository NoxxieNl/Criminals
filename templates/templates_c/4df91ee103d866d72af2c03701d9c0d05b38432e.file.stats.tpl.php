<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:11:58
         compiled from "D:\webserver\root\blauw\templates\begangster\stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2216154a68ae660cac7-78486923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4df91ee103d866d72af2c03701d9c0d05b38432e' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\stats.tpl',
      1 => 1420200716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2216154a68ae660cac7-78486923',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a68ae6690997_28969364',
  'variables' => 
  array (
    'bestPlayers' => 0,
    'player' => 0,
    'bestClans' => 0,
    'clan' => 0,
    'newestMembers' => 0,
    'newMember' => 0,
    'mostClicks' => 0,
    'mostClick' => 0,
    'memberCount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a68ae6690997_28969364')) {function content_54a68ae6690997_28969364($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="tabs_paginas" data-persist="true">
       <table width="100%"  border="0" cellspacing="2" cellpadding="2"> 
        <tr>
            <td width="50%" height="53"><strong>Beste Spelers:</strong><br> 
                <?php if (isset($_smarty_tpl->tpl_vars['bestPlayers']->value)) {?>
                    <?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['player']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bestPlayers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value) {
$_smarty_tpl->tpl_vars['player']->_loop = true;
?>
                        <?php echo $_smarty_tpl->tpl_vars['player']->value;?>
 <br />
                    <?php } ?>
                <?php }?>
            </td> 
            <td width="50%"><strong>Beste Clans: </strong><br> 
                <?php if (isset($_smarty_tpl->tpl_vars['bestClans']->value)) {?>                
                    <?php  $_smarty_tpl->tpl_vars['clan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['clan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bestClans']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['clan']->key => $_smarty_tpl->tpl_vars['clan']->value) {
$_smarty_tpl->tpl_vars['clan']->_loop = true;
?>
                        <?php echo $_smarty_tpl->tpl_vars['clan']->value;?>
 <br />
                    <?php } ?>
                <?php }?>
            </td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%"><strong>Nieuwste Leden:<br></strong> 
                <?php if (isset($_smarty_tpl->tpl_vars['newestMembers']->value)) {?>                
                    <?php  $_smarty_tpl->tpl_vars['newMember'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newMember']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newestMembers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newMember']->key => $_smarty_tpl->tpl_vars['newMember']->value) {
$_smarty_tpl->tpl_vars['newMember']->_loop = true;
?>
                        <?php echo $_smarty_tpl->tpl_vars['newMember']->value;?>
 <br />
                    <?php } ?>
                <?php }?>
            </td> 
            <td width="50%"><strong>Meeste kliks:</strong> <br> 
                <?php if (isset($_smarty_tpl->tpl_vars['mostClicks']->value)) {?>                
                    <?php  $_smarty_tpl->tpl_vars['mostClick'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mostClick']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mostClicks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mostClick']->key => $_smarty_tpl->tpl_vars['mostClick']->value) {
$_smarty_tpl->tpl_vars['mostClick']->_loop = true;
?>
                        <?php echo $_smarty_tpl->tpl_vars['mostClick']->value;?>
 <br />
                    <?php } ?>
                <?php }?>
            </td> 
        </tr>
        <tr valign="top"> 
            <td width="50%">&nbsp;</td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%">Aantal drugsdealers: <b><?php if (isset($_smarty_tpl->tpl_vars['memberCount']->value[1])) {
echo $_smarty_tpl->tpl_vars['memberCount']->value[1];
} else { ?>0<?php }?></b></td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%">Aantal wetenschappers: <b><?php if (isset($_smarty_tpl->tpl_vars['memberCount']->value[2])) {
echo $_smarty_tpl->tpl_vars['memberCount']->value[2];
} else { ?>0<?php }?></b></td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%">Aantal agenten: <b><?php if (isset($_smarty_tpl->tpl_vars['memberCount']->value[3])) {
echo $_smarty_tpl->tpl_vars['memberCount']->value[3];
} else { ?>0<?php }?></b></td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
</table> 
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
