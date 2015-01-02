{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan aanmaken</div>
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
            <p>Hier kan je een nieuwe clan aanmaken!</p>
            <form method="post">
                <fieldset>
                    <label>Clan naam:</label>
                    <input class="normal" name="name" type="text" maxlength="20">
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Clan aanmaken!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}