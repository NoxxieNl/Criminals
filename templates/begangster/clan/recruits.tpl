{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan recruits</div>
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
            <form method="post">
                <table width="100%" border="0">
                    <tr>
                        <td class="coll"  width="5%"><input type="checkbox" id="select_all"></td>
                        <td class="coll">Gebruikersnaam:</a></td>
                        <td class="coll">Power:</a></td>
                        <td class="coll">Clicks:</a></td>
                        <td class="coll">Totaal power:</a></td>
                    </tr>

                    {foreach from=$recruits item=item}
                    <tr>
                        <td class="coll"><input type="checkbox" name="id[{$item['id']}]"></td>
                        <td class="coll">{$item['username']}</td>
                        <td class="coll">{$item['attack_power']}</td>
                        <td class="coll">{$item['clicks']}</td>
                        <td class="coll">{$item['total_attack_power']}</td>
                    </tr>
                    {/foreach}
                </table>

                <fieldset>
                    <select class="large" name="action" class="normal">
                        <option value="0">Met geslecteerde lid / leden...</option>
                        <option value="1">Aanvraag weigeren</option>
                        <option value="2">Aanvraag accepteren</option>
                    </select>
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Actie uitvoeren">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}