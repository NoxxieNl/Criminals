<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 15:21:40
         compiled from "D:\webserver\root\blauw\templates\begangster\ingame\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2848254a68a6e385b35-97687715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08b0bf886774e6af0663e887a03c202fcdf9392f' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\ingame\\header.tpl',
      1 => 1420208497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2848254a68a6e385b35-97687715',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a68a6e3ac788_84021569',
  'variables' => 
  array (
    'WEBSITE_NAME' => 0,
    'TEMPLATE_URL' => 0,
    'ROOT_URL' => 0,
    'username' => 0,
    'cash' => 0,
    'attack_power' => 0,
    'bank' => 0,
    'unreadMessages' => 0,
    'LOGGEDIN' => 0,
    'clan_id' => 0,
    'clan_level' => 0,
    'level' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a68a6e3ac788_84021569')) {function content_54a68a6e3ac788_84021569($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl"> 
<head>
<title><?php echo $_smarty_tpl->tpl_vars['WEBSITE_NAME']->value;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
css/ingame.css" />
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
js/tabs/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript"src="http://code.jquery.com/jquery-1.10.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
js/jquery-1.7.1.min.js" type="text/javascript"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
js/tabs2/jquery.easytabs.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
js/tabs2/easy.notification.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
ckeditor/ckeditor.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function() {
	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
	    $("ul.tabs li").removeClass("active");
	    $(this).addClass("active");
	    $(".tab_content").hide();
	    var activeTab = $(this).attr("rel"); 
	    $("#"+activeTab).fadeIn(); 
	});
    });
    
    $(document).ready(function(){
      $("#button").click(function(){
	$("#stats").toggle(1000);
      });
    });
    
    $(document).ready( function() {
      $('#tab-container').easytabs();
    });
<?php echo '</script'; ?>
>
<!--[if lt IE 7]>
    <style type="text/css">
	    #wrapper { height:100%; }
    </style>
<![endif]-->
</head>

<body>
	
    <div id="wrapper">
	<div id="container" style="margin-top: 25px;">
    
	    <div class="Lmenutop2" style="margin-left: 6px;margin-top: -28px;"></div>
	
	    <div id="topbalk">
		<div id="topbalkinfo">
		    <strong><?php echo $_smarty_tpl->tpl_vars['WEBSITE_NAME']->value;?>
</strong>
		</div>
		
		<div id="topbalkloguit">
		    <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
logout.php">Uitloggen</a>
		</div>
	    </div>
	    
	    <div id="header">
		
		<div id="button" style="clear: both; color: #fff; float: right; margin-left: 714px;margin-top: 5px; z-index: 1; position: absolute;  cursor: w-resize"><img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/hidebutton.png" alt="" /></div>
		<div id="stats" style="margin-top: -20px;">
		    
		    <div id="statstitel">Welkom <span style="color: #e1b710;"><a href="#"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a></span></div>
		
		    <div class="statsicoon1"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/cash.png" alt=""/> </div>
		    <div class="stats1"> <span id="header_contant">&euro; <?php echo $_smarty_tpl->tpl_vars['cash']->value;?>
</span></div>
		    
		    <div class="statsicoon1"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/rang.png" alt=""/> </div>
		    <div class="stats1">  <span id="power"><?php echo $_smarty_tpl->tpl_vars['attack_power']->value;?>
 power</span> </div>
		    
		    <div id="statsscheiding"></div>
		    
		    <div class="statsicoon2"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/algemeen.png" alt=""/></div>	
		    <div class="stats2"> <span id="bank">&euro; <?php echo $_smarty_tpl->tpl_vars['bank']->value;?>
</span></div>
		    
		    <div class="statsicoon2"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/icon6.png" alt=""/> </div>
		    <div class="stats2"><span id="berichten"><?php echo $_smarty_tpl->tpl_vars['unreadMessages']->value;?>
 berichten</span></div>
			    
		</div>
            <div id="logo" style="overflow: hidden; float: right;"></div>
	</div>
        <div id="content" style="margin-top: -10px;">
		<div id="linkercontent" style="margin-left: 25px;">
		    <div class="Lmenutitel">
	    		<div class="Lmenutitelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/persoonlijk-icon.png" alt="icoon" title="icoon"/> </div>
    			<div class="Lmenutiteltekst">Algemeen</div>
		    </div>
		    
		    <div class="lmenu">
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
		    
		    <div class="lmenufooter"></div>
		    
		   
			
		    <div class="Lmenutitel">
			<div class="Lmenutitelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/familie-icon.png" alt="icoon" title="icoon"/> </div>
			<div class="Lmenutiteltekst">Clan</div>
		    </div>
		    
		    <div class="lmenu">
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
                                <?php if ($_smarty_tpl->tpl_vars['clan_level']->value==10) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
ingame/clan/index.php?page=delete">Clan verwijderen</a><?php }?>
                            <?php }?>    
                        </ul>
		    </div>
		    
                    <?php if (isset($_smarty_tpl->tpl_vars['level']->value)&&$_smarty_tpl->tpl_vars['level']->value>0) {?>
		    <div class="lmenufooter"></div>
		    
                     <div class="Lmenutitel">
	    		<div class="Lmenutitelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/persoonlijk-icon.png" alt="icoon" title="icoon"/> </div>
    			<div class="Lmenutiteltekst">Admin</div>
		    </div>
		    
		    <div class="lmenu">
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
		    
		    <div class="lmenufooter"></div>
                    <?php }?>
		</div>
		
	   
	    
	    <?php }} ?>
