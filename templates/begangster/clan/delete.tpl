{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan verwijderen</div>
        </div>
        
        {if isset($form_error)}
        <div class="melding bad small icon">
            {$form_error}
        </div>
        {elseif isset($success)}
        <div class="melding good small icon">
            {$success}
        </div>
        {elseif isset($confirmation)}
        <div class="melding info small icon">
            Weet je het zeker dat je de clan wilt verwijderenb? Klik <a href="{$ROOT_URL}ingame/clan/index.php?page=delete&confirmation=true">hier</a> als je het zeker weet!
        </div>
        {/if}
        
        <div class="tekstvak">
             <p>Als je de clan wilt verwijderen kan dat hier, LET OP: Alles wat de clan heeft (cash / bank / items etc.) raken verloren!</p>
            <form method="post">
                <input class="button bad large" name="submit" type="submit" value="Verwijder de clan!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}