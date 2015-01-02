<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:43:22
         compiled from "D:\webserver\root\blauw\templates\begangster\clan\overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1478154a6a07a759db2-75541326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1bf9e4df2a45615a4bddff1f8c9dafb7ea0047b' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\clan\\overview.tpl',
      1 => 1420205888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1478154a6a07a759db2-75541326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'clanArray' => 0,
    'item' => 0,
    'ROOT_URL' => 0,
    'clan_id' => 0,
    'clan_level' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6a07a7bca16_70705887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6a07a7bca16_70705887')) {function content_54a6a07a7bca16_70705887($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan overzicht</div>
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
            <table width="100%" border="0">
                <tr>
                    <td class="coll">Clannaam:</td>
                    <td class="coll">Owner:</td>
                    <td class="coll">Leden:</td>
                    <td class="coll">Power:</td>
                    <td class="coll">Aanvallen:</td>
                </tr>

                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clanArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <tr>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['clan_name'];?>
</td>
                    <td class="coll"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/profiel.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['clan_owner_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['clan_owner'];?>
</a></td>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['clan_member_count'];?>
</td>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['clan_power'];?>
</td>

                    <td class="coll"><?php if ($_smarty_tpl->tpl_vars['clan_id']->value==$_smarty_tpl->tpl_vars['item']->value['clan_id']) {?>Niet mogelijk
                                     <?php } elseif ($_smarty_tpl->tpl_vars['clan_level']->value<6) {?>Niet mogelijk
                                     <?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/attack.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Aanvallen</a><?php }?></td>

                </tr>
                <?php } ?>

            </table>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('../ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
