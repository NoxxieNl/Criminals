<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 14:55:11
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1109154a68a6e3ee822-20655956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e0d1889063e2cc06217563d52436c4e27113cbb' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\footer.tpl',
      1 => 1420206911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1109154a68a6e3ee822-20655956',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a68a6e3f81d9_71397401',
  'variables' => 
  array (
    'TEMPLATE_URL' => 0,
    'LOGGEDIN' => 0,
    'ROOT_URL' => 0,
    'WEBSITE_NAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a68a6e3f81d9_71397401')) {function content_54a68a6e3f81d9_71397401($_smarty_tpl) {?>        <div id="rechtercontent" style="margin-left: 10px;">
		    <div class="Rmenutitel">
			<div class="Rmenutiteltekst">Gebruiker</div>
		        <div class="Rmenutitelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/misdaad-icon.png" alt="icoon" title="icoon"/> </div>
		    </div>
		    
		    <div class="rmenu">
			    <ul>
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
		    
		    <div class="rmenufooter"></div>
		    <div class="Rmenutitel">
			<div class="Rmenutop2"></div>
			<div class="Rmenutiteltekst">Geld</div>
		        <div class="Rmenutitelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/misdaad-icon.png" alt="icoon" title="icoon"/> </div>
		    </div>
		    
		    <div class="rmenu">
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
	    </div>
	    
	</div> <!-- einde container -->
    </div> <!-- einde wrapper -->
        <footer>
            <div id="footer">
                    <span style="float: left;">&copy; <?php echo date('Y');?>
 - <?php echo $_smarty_tpl->tpl_vars['WEBSITE_NAME']->value;?>
</span>
                    <span style="float: right; margin-right: 10px; margin-top: -2px;">Design: Frenzo Brouwer</span>
            </div>
        </footer>
    </body>
</html><?php }} ?>
