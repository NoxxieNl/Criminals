{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
            
    <div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Vliegveld</div>
        </div>
        
        {if isset($form_error)}
        <div class="melding bad small icon">
            {$form_error}
        </div>
        {elseif isset($success)}
        <div class="melding good small icon">
            {$success}
        </div>
        {elseif isset($info) AND $info|count_characters > 0}
        <div class="melding info small icon">
            {$info}
        </div>
        {/if}
        
        
        <div class="tekstvak">
            Je bent eigenaar van dit vliegveld! <br />
            Je kan de prijs aanpassen zodat men meer of juist minder hoeft te betalen voor een ticket. <br /> <br />

            Mocht je dit willen doen wijzig je hieronder het bedrag voor een ticket.

            <form method="post" action="">
                <fieldset>
                    <label>Ticket prijs:</label>
                    <input class="normal" name="building_costs" type="text" value="{$building_costs}">
                </fieldset>
                <input class="button small good" name="building_change" type="submit" value="Wijzig prijs!">
            </form>
        </div>
        <hr>
        <div class="tekstvak">
            <p>
                Welkom bij het vliegveld.<br />
                Selecteer hieronder een land waarheen je naartoe wilt reizen.<br /> <br />

                De directeur van dit vliegveld is <strong>{$building_owner}</strong> en om van dit vliegveld te kunnen vliegen betaal je {$building_costs}! <br /> <br />
                
                Je bent nu in <b>{$currentCountry}</b>! <br />
            </p>
            <form method="post" action="">
                <fieldset>
                    <label>Land:</label>
                        <select name="country" class="normal">
                            <option value="">Selecteer</option>
                            {foreach from=$countryArray key=country_id item=country_name}
                                <option value="{$country_id}">{$country_name}</option>
                            {/foreach}
                        </select>
                </fieldset>
                <input class="button small good" name="country_change" type="submit" value="Vliegen!">
            </form>
        </div>      
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}