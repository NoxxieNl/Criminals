{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan leden</div>
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
                        <td class="coll"><a href="{$ROOT_URL}ingame/clan/hq.php?page=members&order=username">Gebruikersnaam:</a></td>
                        <td class="coll"><a href="{$ROOT_URL}ingame/clan/hq.php?page=members&order=attack_power">Power:</a></td>
                        <td class="coll">Verdeding:</a></td>
                        <td class="coll">Clicks:</a></td>
                        <td class="coll">Totaal aanvals kracht:</a></td>
                    </tr>

                    {foreach from=$members item=item}
                    <tr>
                        <td class="coll">{if $clan_level > $item['level']}<input type="checkbox" name="id[{$item['id']}]">{/if}</td>
                        <td class="coll">{$item['username']}</td>
                        <td class="coll">{$item['attack_power']}</td>
                        <td class="coll">{$item['defence_power']}</td>
                        <td class="coll">{$item['clicks']}</td>
                        <td class="coll">{$item['total_attack_power']}</td>
                    </tr>
                    {/foreach}
                </table>

                <br />
                {if $clan_level > 5}
                    
                <fieldset>    
                    <select class="large" name="action" class="normal">
                        <option value="0">Met geslecteerde lid / leden...</option>
                        {if $clan_level == 10}<option value="1">Owner maken</option>{/if}
                        {if $clan_level > 7}<option value="2">Uit clan gooien</option>{/if}
                        {if $clan_level > 5}<option value="3">Rechten wijzigen</option>{/if}
                    </select>
                </fieldset>
                    
                <fieldset>
                    <select class="large" name="rights" class="normal">
                        <option value="0">Rechten wijzigen naar...</option>
                        <option value="1">Member</option>
                        <option value="2">Recruiter</option>
                        {if $clan_level > 7}<option value="6">Manager</option>{/if}
                        {if $clan_level > 8}<option value="7">Generaal</option>{/if}
                        {if $clan_level > 9}<option value="8">Leader</option>{/if}
                    </select>
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Actie uitvoeren">
                {/if}
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}