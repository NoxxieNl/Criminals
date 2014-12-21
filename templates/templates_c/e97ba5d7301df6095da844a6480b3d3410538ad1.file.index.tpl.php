<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 16:01:49
         compiled from "D:\webserver\root\blauw\templates\ingame\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21412549543ff404725-04665082%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e97ba5d7301df6095da844a6480b3d3410538ad1' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\ingame\\index.tpl',
      1 => 1419174107,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21412549543ff404725-04665082',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549543ff479a02_75058586',
  'variables' => 
  array (
    'success' => 0,
    'ROOT_URL' => 0,
    'id' => 0,
    'username' => 0,
    'attack_power' => 0,
    'email' => 0,
    'defence_power' => 0,
    'extra_attack_power' => 0,
    'total_power' => 0,
    'rank' => 0,
    'cash' => 0,
    'clicks' => 0,
    'bank' => 0,
    'clicks_today' => 0,
    'totalusers' => 0,
    'onlineusers' => 0,
    'protection' => 0,
    'showonline' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549543ff479a02_75058586')) {function content_549543ff479a02_75058586($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="content">
    <p><h1>Hoofdkwartier</h1></p>
    <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
    <div class="success">
        <?php echo $_smarty_tpl->tpl_vars['success']->value;?>

    </div>
    <?php }?>
    <div class="ingameContainer">
        <div class="center">
            <h2 class="headline">Uw persoonlijke link is:</h2>
            <p class="headline"><?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
click.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</p>
        </div>
        <table width="80%" border="0">
            <tr>
                <td colspan="2" class="coll headerCol">Persoonlijke Informatie</td>
                <td class="coll">&nbsp;</td>
                <td colspan="2" class="coll headerCol">Speler statistieken</td>
            </tr>
            <tr>
                <td class="coll subject" width="9%">Speler:</td>
                <td class="coll" width="27%"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</td>
                <td class="coll" width="11%">&nbsp;</td>
                <td class="coll subject" width="14%">Attack Power:</td>
                <td class="coll" width="39%"><?php echo $_smarty_tpl->tpl_vars['attack_power']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll subject">E-Mail:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Defense Power:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['defence_power']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll subject">Berichten:</td>
                <td class="coll">0</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Power Upgrade:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['extra_attack_power']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll headerCol" colspan="2"><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
/ingame/profiel.php">Bekijk je profiel!</a></td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Total Power:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['total_power']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll" colspan="2">&nbsp;</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">ID:</td>
                <td  class="coll"><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll" colspan="2"></td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Status:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['rank']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll" colspan="2">&nbsp;</td>
                <td class="coll">&nbsp;</td>
                <td class="coll" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="coll headerCol">Financiele Statistieken</td>
                <td class="coll">&nbsp;</td>
                <td colspan="2" class="coll headerCol">Personeel</td>
            </tr>
            <tr>
                <td class="coll subject">Cash:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['cash']->value;?>
,-</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Clicks:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['clicks']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll subject">Bank:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['bank']->value;?>
,-</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Clicks Today:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['clicks_today']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll subject">Inkomen:</td>
                <td class="coll">0,-</td>
            </tr>
            <tr>
                <td colspan="2"class="coll headerCol">Website statistieken</td>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td class="coll subject">Spelers:</td>
                <td class="coll subject"><?php echo $_smarty_tpl->tpl_vars['totalusers']->value;?>
</td>
            </tr>
            <tr>
                <td class="coll subject">Online:</td>
                <td class="coll"><?php echo $_smarty_tpl->tpl_vars['onlineusers']->value[1];?>
 <?php if ($_smarty_tpl->tpl_vars['onlineusers']->value[1]==1) {?>lid<?php } else { ?>leden<?php }?> online (<?php echo $_smarty_tpl->tpl_vars['onlineusers']->value[0];?>
 anoniem)</td>
            </tr>
        </table>
        
        <?php if ($_smarty_tpl->tpl_vars['protection']->value==1) {?>
            <div class="center">
                <p class="headline important">je staat nog 11 uur onder bescherming!</p>
                <form method="post"><input class="button" type="submit" name="guard" value="Haal mijn bescherming NU weg!"></form>
            </div>
            <br />
        <?php }?>
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
</div>
<?php echo $_smarty_tpl->getSubTemplate ('../footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
