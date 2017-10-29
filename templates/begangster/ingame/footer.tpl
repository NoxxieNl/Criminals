        <div id="rechtercontent" style="margin-left: 10px;">
		    <div class="Rmenutitel">
			<div class="Rmenutiteltekst">Gebruiker</div>
		        <div class="Rmenutitelicoon"> <img src="{$TEMPLATE_URL}images/icons/misdaad-icon.png" alt="icoon" title="icoon"/> </div>
		    </div>
		    
		    <div class="rmenu">
			    <ul>
                                {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/message.php">Berichten</a>{/if}
                                {if $LOGGEDIN == TRUE} <li><a href="{$ROOT_URL}ingame/editProfiel.php">Profiel aanpassen</a></li>{/if}
                                {if $LOGGEDIN == TRUE} <li><a href="{$ROOT_URL}ingame/typewijzigen.php">Type wijzigen</a></li>{/if}
                                {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/doneren.php">Doneren</a>{/if}
                                {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/bank.php">Bank</a>{/if}
                                {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}logout.php">Logout</a>{/if}
			    </ul>
		    </div>
		    
		    <div class="rmenufooter"></div>
		    <div class="Rmenutitel">
			<div class="Rmenutop2"></div>
			<div class="Rmenutiteltekst">Geld</div>
		        <div class="Rmenutitelicoon"> <img src="{$TEMPLATE_URL}images/icons/misdaad-icon.png" alt="icoon" title="icoon"/> </div>
		    </div>
		    
		    <div class="rmenu">
			<ul>
                            <li><a href="{$ROOT_URL}ingame/shop.php">Shop</a>    
                            <li><a href="{$ROOT_URL}ingame/getallenspel.php">Getallenspel</a></li>
                            <li><a href="{$ROOT_URL}ingame/roulette.php">Roulette</a></li>
                            <li><a href="{$ROOT_URL}ingame/russischroulet.php">Russisch roulette</a></li>
                            <li><a href="{$ROOT_URL}ingame/kopofmunt.php">Kop of munt</a></li>
                            <li><a href="{$ROOT_URL}ingame/sps.php">Steen, papier & schaar</a></li>
                            <li><a href="{$ROOT_URL}ingame/paardenrace.php">Paardenrace</a></li>
                            <li><a href="{$ROOT_URL}ingame/hogerlager.php">Hoger of lager</a></li>
                            <li><a href="{$ROOT_URL}ingame/bankroven.php">Bankroven</a></li>
                            <li><a href="{$ROOT_URL}ingame/Vliegveld.php">Vliegveld</a></li>
                        </ul>
		    </div>
	    </div>
	    
	</div> <!-- einde container -->
    </div> <!-- einde wrapper -->
        <footer>
            <div id="footer">
                    <span style="float: left;">&copy; {'Y'|date} - {$WEBSITE_NAME}</span>
                    <span style="float: right; margin-right: 10px; margin-top: -2px;">Design: Frenzo Brouwer</span>
            </div>
        </footer>
    </body>
</html>