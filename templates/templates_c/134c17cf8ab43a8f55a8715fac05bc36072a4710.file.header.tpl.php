<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-21 16:23:48
         compiled from "D:\webserver\root\blauw\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25412549542f4597841-76551869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '134c17cf8ab43a8f55a8715fac05bc36072a4710' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\header.tpl',
      1 => 1419175423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25412549542f4597841-76551869',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_549542f45e3474_20981198',
  'variables' => 
  array (
    'ROOT_URL' => 0,
    'totalusers' => 0,
    'LOGGEDIN' => 0,
    'level' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_549542f45e3474_20981198')) {function content_549542f45e3474_20981198($_smarty_tpl) {?><html>
    <head>
    <title>Criminals</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
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
                        <li><a href="#">Help/FAQ</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
stats.php">Statistieken</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
wetboek.php">Wetboek</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
prijzen.php">Prijzen</a></li>
                    </ul>
                </div>
                <div id="item">
                    <div id="header">Gebruiker</div>
                    <ul>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==false) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
register.php">Aanmelden</a></li><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['LOGGEDIN']->value==false) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
login.php">Login</a></li><?php }?>
                        
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
                    </ul>
                </div>
                
                <div id="item">
                    <div id="header">Misdaad</div>
                    <ul>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/bankroven.php">Bankroven</a></li>
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
                    </ul>
                </div>
                <?php }?>
            </div>        <?php }} ?>
