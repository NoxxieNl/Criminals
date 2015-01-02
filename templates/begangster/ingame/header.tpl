<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl"> 
<head>
<title>{$WEBSITE_NAME}</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="{$TEMPLATE_URL}css/ingame.css" />
<script type="text/javascript" src="{$TEMPLATE_URL}js/tabs/jquery.js"></script>
<script type="text/javascript"src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="{$TEMPLATE_URL}js/jquery-1.7.1.min.js" type="text/javascript"></script> 
<script src="{$TEMPLATE_URL}js/tabs2/jquery.easytabs.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{$TEMPLATE_URL}js/tabs2/easy.notification.js"></script>
<script type="text/javascript" src="{$TEMPLATE_URL}ckeditor/ckeditor.js"></script>

<script>
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
</script>
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
		    <strong>{$WEBSITE_NAME}</strong>
		</div>
		
		<div id="topbalkloguit">
		    <a href="{$ROOT_URL}logout.php">Uitloggen</a>
		</div>
	    </div>
	    
	    <div id="header">
		
		<div id="button" style="clear: both; color: #fff; float: right; margin-left: 714px;margin-top: 5px; z-index: 1; position: absolute;  cursor: w-resize"><img src="{$TEMPLATE_URL}images/hidebutton.png" alt="" /></div>
		<div id="stats" style="margin-top: -20px;">
		    
		    <div id="statstitel">Welkom <span style="color: #e1b710;"><a href="#">{$username}</a></span></div>
		
		    <div class="statsicoon1"> <img src="{$TEMPLATE_URL}images/icons/cash.png" alt=""/> </div>
		    <div class="stats1"> <span id="header_contant">&euro; {$cash}</span></div>
		    
		    <div class="statsicoon1"> <img src="{$TEMPLATE_URL}images/icons/rang.png" alt=""/> </div>
		    <div class="stats1">  <span id="power">{$attack_power} power</span> </div>
		    
		    <div id="statsscheiding"></div>
		    
		    <div class="statsicoon2"> <img src="{$TEMPLATE_URL}images/icons/algemeen.png" alt=""/></div>	
		    <div class="stats2"> <span id="bank">&euro; {$bank}</span></div>
		    
		    <div class="statsicoon2"> <img src="{$TEMPLATE_URL}images/icons/icon6.png" alt=""/> </div>
		    <div class="stats2"><span id="berichten">{$unreadMessages} berichten</span></div>
			    
		</div>
            <div id="logo" style="overflow: hidden; float: right;"></div>
	</div>
        <div id="content" style="margin-top: -10px;">
		<div id="linkercontent" style="margin-left: 25px;">
		    <div class="Lmenutitel">
	    		<div class="Lmenutitelicoon"> <img src="{$TEMPLATE_URL}images/icons/persoonlijk-icon.png" alt="icoon" title="icoon"/> </div>
    			<div class="Lmenutiteltekst">Algemeen</div>
		    </div>
		    
		    <div class="lmenu">
	    		<ul>
			    <li><a href="{$ROOT_URL}{if $LOGGEDIN == TRUE}ingame/{/if}index.php">Home</a></li>
                            <li><a href="{$ROOT_URL}stats.php">Statistieken</a></li>
                            <li><a href="{$ROOT_URL}wetboek.php">Wetboek</a></li>
                            <li><a href="{$ROOT_URL}prijzen.php">Prijzen</a></li>
                            {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/list.php">Ledenlijst</a>{/if}
			</ul>
		    </div>
		    
		    <div class="lmenufooter"></div>
		    
		   
			
		    <div class="Lmenutitel">
			<div class="Lmenutitelicoon"> <img src="{$TEMPLATE_URL}images/icons/familie-icon.png" alt="icoon" title="icoon"/> </div>
			<div class="Lmenutiteltekst">Clan</div>
		    </div>
		    
		    <div class="lmenu">
			 <ul>
                            {if $clan_id == 0}<li><a href="{$ROOT_URL}ingame/clan/index.php?page=join">Join clan</a>{/if}
                            {if $clan_id == 0}<li><a href="{$ROOT_URL}ingame/clan/index.php?page=create">Maak clan</a>{/if}
                            <li><a href="{$ROOT_URL}ingame/clan/index.php?page=overview">Clan ovezicht</a>
                            {if $clan_id != 0}
                            <li><a href="{$ROOT_URL}ingame/clan/hq.php?page=members">Ledenlijst</a>
                            {if $clan_level != 10}<li><a href="{$ROOT_URL}ingame/clan/index.php?page=leave">Clan verlaten</a>{/if}
                            {if $clan_level > 5}<li><a href="{$ROOT_URL}ingame/clan/hq.php?page=recruits">Recruits</a>{/if}
                            {if $clan_level > 6}<li><a href="{$ROOT_URL}ingame/clan/shop.php">Clan shop</a>{/if}
                            {if $clan_level == 10}<li><a href="{$ROOT_URL}ingame/clan/hq.php?page=cOwner">Owner wijzigen</a>{/if}
                                {if $clan_level == 10}<li><a href="{$ROOT_URL}ingame/clan/index.php?page=delete">Clan verwijderen</a>{/if}
                            {/if}    
                        </ul>
		    </div>
		    
                    {if isset($level) AND $level > 0}
		    <div class="lmenufooter"></div>
		    
                     <div class="Lmenutitel">
	    		<div class="Lmenutitelicoon"> <img src="{$TEMPLATE_URL}images/icons/persoonlijk-icon.png" alt="icoon" title="icoon"/> </div>
    			<div class="Lmenutiteltekst">Admin</div>
		    </div>
		    
		    <div class="lmenu">
	    		<ul>
                            <li><a href="{$ROOT_URL}admin/adminBasic.php">Basis wijzigingen</a></li>
                            <li><a href="{$ROOT_URL}admin/adminMsg.php">Massa bericht</a></li>
                            {if $level > 9}<li><a href="{$ROOT_URL}admin/adminMaak.php">Admin maken</a></li>{/if}
                            {if $level > 9}<li><a href="{$ROOT_URL}admin/adminTheme.php">Thema wijzigen</a></li>{/if}
			</ul>
		    </div>
		    
		    <div class="lmenufooter"></div>
                    {/if}
		</div>
		
	   
	    
	    