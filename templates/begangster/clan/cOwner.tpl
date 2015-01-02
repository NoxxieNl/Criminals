{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan owner wijzigen</div>
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
             <p>Geef hier de speler op die je als nieuwe owner van je clan wilt maken!</p>
            <form method="post">
                <fieldset>
                    <label>Clan naam:</label>
                    <input class="normal" name="name" type="text" value="{if isset($changeUser)}{$changeUser}{/if}">
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Owner wijzigen!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}