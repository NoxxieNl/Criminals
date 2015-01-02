{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Getallenspel</div>
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
            <p>Bij dit getallenspel, word er een getal van tussen 1 en 10 gemaakt, en als jij het getal goed raad, win je 8x je inzet!</p>
            <form method="post">
                <fieldset>
                    <label>Getal</label>
                    <select name="number" class="normal">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                </select>
                </fieldset>
                
                <fieldset>
                    <label>Inzet</label>
                    <input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
                </fieldset>
                <input class="button good large" name="submit" type="submit" value="Gok">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}