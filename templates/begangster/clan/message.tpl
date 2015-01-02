{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan massa bericht</div>
        </div>
        
        {if isset($form_error)}
        <div class="melding bad small icon">
            {$form_error}
        </div>
        {elseif isset($success)}
        <div class="melding good small icon">
            {$success}
        </div>
        {/if}
        
        <div class="tekstvak">
            <p>Verstuur elke clan lid vanuit hier een bericht</p>
            <form method="post">
                <fieldset><label>Onderwerp</label><input class="normal" name="subject" type="text"></fieldset>
                <fieldset><label>bericht</label><textarea name="message" class="normal" cols=40 rows=10></textarea></fieldset>
                <input class="button small good" name="massMsg" type="submit" value="Verstuur bericht">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}