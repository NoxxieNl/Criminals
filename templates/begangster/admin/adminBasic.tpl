{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Admin basis</div>
        </div>
        
        {if isset($form_error)}
        <div class="melding bad small icon">
            {$form_error}
        </div>
        {elseif isset($success)}
        <div class="melding good small icon">
            {$success}
        </div>
        {elseif isset($info) AND $info|count_characters > 0}
        <div class="melding info small icon">
            {$info}
        </div>
        {/if}
        
        <div class="tekstvak">
            <p>Als admin zijnde kan je op deze pagina een speler verwijderen, resetten of geld doneren!</p>
            <form method="post" action="adminBasic.php">
                <fieldset><label>Speler</label><input class="normal" name="player" type="text" value="{if isset($player)}{$player}{/if}"></fieldset>
                <fieldset><label>Bedrag (Donatie)</label><input class="normal" name="amount" type="text"></fieldset>
                
                
                <input class="button small good" name="reset" type="submit" value="Resetten">
                <input class="button small good" name="donate" type="submit" value="Doneren">
                <input class="button small bad" name="delete" type="submit" value="Verwijderen">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}