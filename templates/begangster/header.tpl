<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl"> 
    <head>
        <title>{$WEBSITE_NAME}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="{$TEMPLATE_URL}css/outgame.css" />
        <script type="text/javascript"src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="{$TEMPLATE_URL}js/jquery-1.7.1.min.js" type="text/javascript"></script> 
        
        <script>
            $(document).ready(function(){
                $("#button").click(function(){
                    $("#stats").toggle(1000);
                });
            });
        </script>
        
        <script src="{$TEMPLATE_URL}js/tabs2/jquery.easytabs.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="{$TEMPLATE_URL}js/tabs2/easy.notification.js"></script>
        <script type="text/javascript">
            $(document).ready( function() {
                $('#tab-container').easytabs();
            });
        </script>
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
                <div id="button" style="clear: both; color: #fff; float: right; margin-left: 714px;margin-top: 5px; z-index: 1; position: absolute"><img src="{$TEMPLATE_URL}images/hidebutton.png" alt="" /></div>

                <div id="stats" style="margin-top: -20px;">
                    
                </div>
                <div id="logo" style="overflow: hidden; float: right;"></div>
            </div>
            <div id="content" style="margin-top: -10px; margin-left: 30px;">
	    <div id="centercontent-outgame" style="margin-top: 7px;">
			
		<div class="titel">
		    <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icon" title="icon"/> </div>
		    <div class="titeltekst"> Welkom bij {$WEBSITE_NAME}!</div>
		</div>
	    
		<div class="tekstvak">
		    <div class="text">
			<div id="tab-container" class="tab-container">
			    <ul class='etabs'>
                                <li class='tab'><a href="{$ROOT_URL}index.php">Home</a></li>
				<li class='tab'><a href="{$ROOT_URL}login.php">Inloggen</a></li>
				<li class='tab'><a href="{$ROOT_URL}register.php">Aanmelden</a></li>
                                <li class='tab'><a href="{$ROOT_URL}wetboek.php">Regels</a></li>
                                <li class='tab'><a href="{$ROOT_URL}prijzen.php">Prijzen</a></li>
                                 <li class='tab'><a href="{$ROOT_URL}stats.php">Statistieken</a></li>
			    </ul>