{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Paardenrace</div>
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
             <p> Uitleg </p>
                <p>Er zijn 50 paarden waar je op kan wedden, en per keer mag je maar op ��n paard wedden.<br>
                Er zijn drie soorten loten:<br><br>
                        <table>
                        <tr><td width=100>250</td>  <td>25% van het bedrag per winnaar</td></tr>
                        <tr><td width=100>500</td>  <td>50% van het bedrag per winnaar</td></tr>
                        <tr><td width=100>1,000</td>  <td>100% van het bedrag per winnaar</td></tr>
                        </table><br>
                Stel er zit 200,000 in de pot en er zijn 4 winnaars, dus dan is de prijs per winnaar 50,000. Als je nu een lot
                van 250 hebt dan krijg je <i>50000*0.25=12500</i>, met een lot van \$500 krijg je <i>50000*0.5=25000</i> en met
                een lot van 1,000 krijg je gewoon het hele bedrag: 50,000.<br><br>
                Je kan het paard dat je hebt gekozen veranderen of een duurder lot kopen, maar niet je lot verkopen of een goedkoper
                lot kopen.</p>
                <form method="POST">
                    <fieldset>
                    <label>Paard (1-50):</label>
                    <select name="betHorse" class="normal">
                        <option vlaue="">Geen paard gekozen</option>
                        {$i = 1}
                        {while $i < 51}
                            <option vlaue="{$i}">{$i}</option>
                            {$i++}
                        {/while}
                    </select>
                    </fieldset>
                    
                    <fieldset>
                    <label>Lot:</label>
                        <select name="ticket" class="normal">
                            <option vlaue="0">Geen</option><br>
                            <option value="1"> 25%: 250</option><br>
                            <option value="2"> 50%: 500</option><br>
                            <option value="3">100%: 1,000</option>
                        </select>
                    </fieldset>
                <input class="button good small" name="submit" type="submit" value="Plaats weddenschap">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}