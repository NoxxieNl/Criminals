{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Bank</div>
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
             <p>We zoeken Mensen die nieuwe dingen maken of toevoegen!</p>
            <form method="post">
                <fieldset><label>Functie:</label> <input class="normal" type="text" name="function"></fieldset>
                <fieldset><label>Uren online:</label> <input class="normal" type="text" name="onlineHours"></fieldset>
                <fieldset><label>Goede eigenschappen:</label> <input class="normal" type="text" name="goodQuality"></fieldset>
                <fieldset><label>Slecthe eigenschappen:</label> <input class="normal" type="text" name="badQuality"></fieldset>
                <fieldset><label>Reden:</label> <input class="normal" type="text" name="reason"></fieldset>
                <input class="button good large" type="submit" name="submit" value="Solliciteer">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}