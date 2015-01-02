{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Kop of munt</div>
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
            <p>Dit is kop of munt een makkelijk spelletje om geld te verdienen het werkt zo: als je wint krijg je 150% van je inzet erbij!</p>
            <form method="post">
                <fieldset>
                    <label>Kop of munt</label>
                    <select class="normal" name="kom" size="1">
                        <option value="0">Kop</option>
                        <option value="1">Munt</option>
                    </select>
                </fieldset>
                
                <fieldset>
                    <label>Inzet</label>
                    <select class="normal" name="gambleMoney" class="normal">
                        <option value="0">Select</option>
                        <option value="250">250,-</option>
                        <option value="500">500,-</option>
                        <option value="1000">1000,-</option>
                    </select>
                </fieldset>
                <input class="button good large" name="submit" type="submit" value="Gok">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}