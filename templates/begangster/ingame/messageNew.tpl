{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Berichten - Nieuw bericht</div>
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
            <a href="{$ROOT_URL}ingame/message.php?page=inbox">Inbox</a> - <a href="{$ROOT_URL}ingame/message.php?page=outbox">Outbox</a> - <a href="{$ROOT_URL}ingame/message.php?page=new">Nieuw</a>
            <p>Verstuur hier een bericht naar een mede speler</p>
            <form method="post">
                <fieldset><label>Naar:</label><input class="normal" name="to" type="text" value="{if isset($toUser)}{$toUser}{/if}"></fieldset>
                <fieldset><label>Onderwerp:</label><input class="normal" name="subject" type="text"></fieldset>
                <fieldset><label>Bericht:</label><textarea name="message" class="normal" cols="80" rows=10></textarea></fieldset>
                <input class="button small good" name="massMsg" type="submit" value="Versuur bericht">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}