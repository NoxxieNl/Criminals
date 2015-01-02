{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Steen, papier & schaar</div>
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
             <p>Het allom bekende steen, papier & schaar! Gok jij goed? Als je wint win je 500 verlies je, verlies je 500!</p>
            <form method="post">
                <fieldset>
                    <label>Type</label>
                    <select name="choice" class="normal">

                        <option value="0"></option>
                        <option value="1">Steen</option>
                        <option value="2">Papier</option>
                        <option value="3">Schaar</option>
                    </select>
                </fieldset>
                <fieldset>
                    <input class="button good large" name="submit" type="submit" value="Speel">
                </fieldset>
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}