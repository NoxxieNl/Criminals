{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Aanvallen</div>
        </div>
        
        {if isset($error)}
        <div class="melding bad small icon">
            {$error}
        </div>
        {elseif isset($success)}
        <div class="melding good small icon">
            {$success}
        </div>
        {/if}
        
        <div class="tekstvak">
            <form method="post">
                <fieldset>    
                    <label>Bedrag</label>
                    <input class="normal" name="money" type="text" maxlength="10" value="100">
                </fieldset>
                <input class="button good large" name="withdraw" type="submit" value="Geld opnemen">
                <input class="button good large" name="deposit" type="submit" value="Geld storten">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}