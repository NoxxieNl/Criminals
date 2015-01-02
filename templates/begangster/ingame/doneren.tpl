{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Doneren</div>
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
            <p>Hier kan je naar andere spelers geld overmaken!</p>
            <form method="post">
                <fieldset>
                    <label>Speler</label>
                    <input class="normal" name="donate" type="text" value="{if isset($donateUser)}{$donateUser}{/if}">
                </fieldset>
                
                <fieldset>
                    <label>Bedrag</label>
                    <input class="normal" name="money" type="text" maxlength="10">
                </fieldset>
                
                <input class="button good large" name="submit" type="submit" value="Doneer">
            </form>
        </div>
                   
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}