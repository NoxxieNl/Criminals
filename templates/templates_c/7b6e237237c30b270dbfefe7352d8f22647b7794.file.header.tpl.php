<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-02 13:13:16
         compiled from "D:\webserver\root\blauw\templates\begangster\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2512354a66902b03ae9-65711962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b6e237237c30b270dbfefe7352d8f22647b7794' => 
    array (
      0 => 'D:\\webserver\\root\\blauw\\templates\\begangster\\header.tpl',
      1 => 1420200795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2512354a66902b03ae9-65711962',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54a66902b0f992_59486191',
  'variables' => 
  array (
    'WEBSITE_NAME' => 0,
    'TEMPLATE_URL' => 0,
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a66902b0f992_59486191')) {function content_54a66902b0f992_59486191($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl"> 
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['WEBSITE_NAME']->value;?>
</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
css/outgame.css" />
        <?php echo '<script'; ?>
 type="text/javascript"src="http://code.jquery.com/jquery-1.10.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
js/jquery-1.7.1.min.js" type="text/javascript"><?php echo '</script'; ?>
> 
        
        <?php echo '<script'; ?>
>
            $(document).ready(function(){
                $("#button").click(function(){
                    $("#stats").toggle(1000);
                });
            });
        <?php echo '</script'; ?>
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
 type="text/javascript">
            $(document).ready( function() {
                $('#tab-container').easytabs();
            });
        <?php echo '</script'; ?>
>
    </head>

    <body>	
        <div id="wrapper">
            <div id="container" style="margin-top: 25px;">
                <div class="Lmenutop2" style="margin-left: 6px;margin-top: -28px;"></div>
	
                <div id="topbalk">
                    <div id="topbalkinfo">
                        
                    </div>
		</div>
		
            <div id="header">
                <div id="button" style="clear: both; color: #fff; float: right; margin-left: 714px;margin-top: 5px; z-index: 1; position: absolute"><img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/hidebutton.png" alt="" /></div>

                <div id="stats" style="margin-top: -20px;">
                    
                </div>
                <div id="logo" style="overflow: hidden; float: right;"></div>
            </div>
            <div id="content" style="margin-top: -10px; margin-left: 30px;">
	    <div id="centercontent-outgame" style="margin-top: 7px;">
			
		<div class="titel">
		    <div class="titelicoon"> <img src="<?php echo $_smarty_tpl->tpl_vars['TEMPLATE_URL']->value;?>
images/icons/title-icon.png" alt="icon" title="icon"/> </div>
		    <div class="titeltekst"> Welkom bij <?php echo $_smarty_tpl->tpl_vars['WEBSITE_NAME']->value;?>
!</div>
		</div>
	    
		<div class="tekstvak">
		    <div class="text">
			<div id="tab-container" class="tab-container">
			    <ul class='etabs'>
                                <li class='tab'><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
index.php">Home</a></li>
				<li class='tab'><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
login.php">Inloggen</a></li>
				<li class='tab'><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
register.php">Aanmelden</a></li>
                                <li class='tab'><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
wetboek.php">Regels</a></li>
                                <li class='tab'><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
prijzen.php">Prijzen</a></li>
                                 <li class='tab'><a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
stats.php">Statistieken</a></li>
			    </ul><?php }} ?>
