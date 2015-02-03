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
            <p>
                Welkom bij het vliegveld.<br />
                Selecteer hieronder een land waarheen je naartoe wilt reizen.<br /> <br />
                
                Je bent nu in <b>{$currentCountry}</b>! <br />
                <em>Je betaald 250,- per vlucht.</em>
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
                <input class="button small good" name="submit" type="submit" value="Vliegen!">
            </form>
        </div>      
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}