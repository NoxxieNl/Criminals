<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 15:21:49
         compiled from "D:\webserver\root\blauw\templates\blue\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2235054a67af7424742-22392902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e44f8b16e9201242ffdf5d73cc4e2272638acccf' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\blue\\header.tpl',
      1 => 1420208460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2235054a67af7424742-22392902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a67af74c9cb2_30443124',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'totalusers' => 0,
    'ROOT_URL' => 0,
    'LOGGEDIN' => 0,
    'clan_id' => 0,
    'clan_level' => 0,
    'level' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a67af74c9cb2_30443124')) {function content_54a67af74c9cb2_30443124($_smarty_tpl) {?><html>
    <head>
    <title>Criminals</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
css/style.css">
        <?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 language="javascript">
            $(document).ready(function(){
                getTime();
            });
            setInterval(getTime, 1000);
            
            function getTime() {
                curDate = new Date();
                $('.time').text(leadZero(curDate.getHours()) + ':' + leadZero(curDate.getMinutes()) + ':' +  leadZero(curDate.getSeconds()));
            }
            
            function leadZero(par) {
                if (par < 10) {
                    par = ("0" + par);
                }
                return par;
            }
        <?php echo '</script'; ?>
>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <p>Criminals</p>
            </div>

            <div class="menu">

                <div class="information">
                    <p>Members: <?php echo $_smarty_tpl->tpl_vars['totalusers']->value;?>
</p>
                    <p class="time"></p>
                </div>
                <div id="item">
                    <div id="header">Algemeen</div>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;
if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?>ingame/<?php }?>index.php">Home</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
stats.php">Statistieken</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
wetboek.php">Wetboek</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
prijzen.php">Prijzen</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/list.php">Ledenlijst</a><?php }?>
                    </ul>
                </div>
                <div id="item">
                    <div id="header">Gebruiker</div>
                    <ul>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==false) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
register.php">Aanmelden</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==false) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
login.php">Login</a></li><?php }?>
                        
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/message.php">Berichten</a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/editProfiel.php">Profiel aanpassen</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/typewijzigen.php">Type wijzigen</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/doneren.php">Doneren</a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/bank.php">Bank</a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
logout.php">Logout</a><?php }?>
                    </ul>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==true) {?>
                <div id="item">
                    <div id="header">Geld</div>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/shop.php">Shop</a>    
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/getallenspel.php">Getallenspel</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/roulette.php">Roulette</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/russischroulet.php">Russisch roulette</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/kopofmunt.php">Kop of munt</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/sps.php">Steen, papier & schaar</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/paardenrace.php">Paardenrace</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/hogerlager.php">Hoger of lager</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/bankroven.php">Bankroven</a></li>
                    </ul>
                </div>
                <?php }?>
                
                <?php if (isset($_smarty_tpl->tpl_vars['clan_id']->value)&&$_smarty_tpl->tpl_vars['clan_id']->value>0) {?>
                <div id="item">
                    <div id="header">Clan</div>
                    <ul>
                        <?php if ($_smarty_tpl->tpl_vars['clan_id']->value==0) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/index.php?page=join">Join clan</a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['clan_id']->value==0) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/index.php?page=create">Maak clan</a><?php }?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/index.php?page=overview">Clan ovezicht</a>
                        <?php if ($_smarty_tpl->tpl_vars['clan_id']->value!=0) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/hq.php?page=members">Ledenlijst</a>
                        <?php if ($_smarty_tpl->tpl_vars['clan_level']->value!=10) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/index.php?page=leave">Clan verlaten</a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['clan_level']->value>5) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/hq.php?page=recruits">Recruits</a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['clan_level']->value>6) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/shop.php">Clan shop</a><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['clan_level']->value==10) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/hq.php?page=cOwner">Owner wijzigen</a><?php }?>
                        <?php }?>    
                    </ul>
                </div>
                <?php }?>
                
                <?php if (isset($_smarty_tpl->tpl_vars['level']->value)&&$_smarty_tpl->tpl_vars['level']->value>0) {?>
                <div id="item">
                    <div id="header">Admin</div>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin/adminBasic.php">Basis wijzigingen</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin/adminMsg.php">Massa bericht</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['level']->value>9) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin/adminMaak.php">Admin maken</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['level']->value>9) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin/adminTheme.php">Thema wijzigen</a></li><?php }?>
                    </ul>
                </div>
                <?php }?>
            </div>        <?php }} ?>
