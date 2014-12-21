<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-20 10:36:03
         compiled from "D:\webserver\root\blauw\templates\stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15447549542f44e27b9-49769854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd00559aa49e7d6f0b663453ef7bcc7bc10689c43' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\stats.tpl',
      1 => 1419068154,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15447549542f44e27b9-49769854',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549542f454ead9_71220777',
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
<?php if ($_valid && !is_callable('content_549542f454ead9_71220777')) {function content_549542f454ead9_71220777($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Statistieken</h1></p>
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
