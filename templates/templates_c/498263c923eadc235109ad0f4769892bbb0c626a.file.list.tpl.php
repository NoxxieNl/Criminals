<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:46:15
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:801354a6931218b716-89587812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '498263c923eadc235109ad0f4769892bbb0c626a' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\list.tpl',
      1 => 1420202774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '801354a6931218b716-89587812',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a6931222d370_59321420',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'form_error' => 0,
    'success' => 0,
    'ROOT_URL' => 0,
    'list' => 0,
    'item' => 0,
    'type' => 0,
    'username' => 0,
    'pagination' => 0,
    'i' => 0,
    'order' => 0,
    'onlineusers' => 0,
    'showonline' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a6931222d370_59321420')) {function content_54a6931222d370_59321420($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('ingame/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Gebruikerlijst</div>
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
        
        <div class="tekstvak center">
            <table width="100%" border="0">
                <tr>
                    <td class="coll"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/list.php?order=username">Gebruikersnaam:</a></td>
                    <td class="coll"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/list.php?order=type">Type:</a></td>
                    <td class="coll"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/list.php?order=cash">Contant:</a></td>
                    <td class="coll"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/list.php?order=bank">Bank:</a></td>
                    <td class="coll"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/list.php?order=power">Power:</a></td>
                    <td class="coll">Aanvallen:</td>
                    <td class="coll">Bericht:</td>
                </tr>

                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <tr>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</td>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['cash'];?>
</td>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['bank'];?>
</td>
                    <td class="coll"><?php echo $_smarty_tpl->tpl_vars['item']->value['attack_power'];?>
</td>
                    <td class="coll"><?php if ($_smarty_tpl->tpl_vars['type']->value==3&&$_smarty_tpl->tpl_vars['item']->value['type_id']==3) {?>Niet moglijk
                                     <?php } elseif ($_smarty_tpl->tpl_vars['username']->value==$_smarty_tpl->tpl_vars['item']->value['username']) {?>Niet mogelijk
                                     <?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/attack.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Aanvallen</a><?php }?></td>
                    <td class="coll"><?php if ($_smarty_tpl->tpl_vars['username']->value==$_smarty_tpl->tpl_vars['item']->value['username']) {?>Niet mogelijk<?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/message.php?page=new&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Verstuur bericht</a><?php }?></td>
                </tr>
                <?php } ?>

            </table>
            <div class="center">
                <br />
                Pagina: <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value['tPage']+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value['tPage'])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                    <?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['pagination']->value['cPage']) {?>
                        <?php echo $_smarty_tpl->tpl_vars['i']->value;?>

                    <?php } else { ?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/list.php?order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&start=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['pageBegin'][$_smarty_tpl->tpl_vars['i']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
                    <?php }?>
                <?php }} ?>
            </div>

            <div class="center">
                <p class="headline important"><?php echo $_smarty_tpl->tpl_vars['onlineusers']->value[1];?>
 <?php if ($_smarty_tpl->tpl_vars['onlineusers']->value[1]==1) {?>lid<?php } else { ?>leden<?php }?> online (<?php echo $_smarty_tpl->tpl_vars['onlineusers']->value[0];?>
 anoniem)</p>
                <form method="post"><input class="button" type="submit" name="onlineList" value="<?php if ($_smarty_tpl->tpl_vars['showonline']->value==0) {?>Laat me NU zien op de online leden lijst<?php } else { ?>Ik wil NIET in de online leden lijst!<?php }?>"></form>
            </div>
            <br />
            <div class="center">
                <p class="headline important">Er <?php if ($_smarty_tpl->tpl_vars['onlineusers']->value[2]==1) {?>is<?php } else { ?>zijn<?php }?> <?php echo $_smarty_tpl->tpl_vars['onlineusers']->value[2];?>
 admin<?php if ($_smarty_tpl->tpl_vars['onlineusers']->value[2]!=1) {?>s<?php }?> online</p>
            </div>
        </div>		
        <div class="titelfooter"></div>      
    </div>
<?php echo $_smarty_tpl->getSubTemplate ('ingame/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
