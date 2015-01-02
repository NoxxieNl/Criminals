{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Hoger & lager</div>
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
           <p>Meedoen aan hoger of lager kost {$costMoney}. Er wordt een random getal t/m de 100 aangemaakt. Je kan het spel tussendoor stoppen en later verder gaan.</p>
            <p>Je zit in ronde: {$hlround}, met een prijzenpot van {$winMoney}!</p>
                 <form method="post" action="hogerlager.php?number={$hlNumber}">
                    <fieldset>
                        <label>Ik gok:</label>
                         <select name="hl" class="normal">
                             <option value="1">Hoger</option>
                             <option value="2">Lager</option>
                         </select>
                   </fieldset>
                    <input class="button small good" name="submit" type="submit" value="Gok">
                 </form> 
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}