{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan bank</div>
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
            <p>Hier kan je geld storten of opnemen van de clan bank!</p>
            <div class="center">
                <p>Cash: {$cash} | Bank: {$bank}</p>
                <p>Je kan nog {$deposit_left} keer storten naar de clan bank</p>
            </div>
            <form method="post">
                <fieldset>
                    <label>Bedrag</label>
                    <input class="normal" name="amount" type="text" maxlength="10" value="100">
                </fieldset>
                <input class="button good small" name="withdraw" type="submit" value="Geld opnemen">
                <input class="button good small" name="deposit" type="submit" value="Geld storten">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}