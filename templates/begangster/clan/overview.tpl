{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Clan overzicht</div>
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
            <table width="100%" border="0">
                <tr>
                    <td class="coll">Clannaam:</td>
                    <td class="coll">Owner:</td>
                    <td class="coll">Leden:</td>
                    <td class="coll">Power:</td>
                    <td class="coll">Aanvallen:</td>
                </tr>

                {foreach from=$clanArray item=item}
                <tr>
                    <td class="coll">{$item['clan_name']}</td>
                    <td class="coll"><a href="{$ROOT_URL}ingame/profiel.php?id={$item['clan_owner_id']}">{$item['clan_owner']}</a></td>
                    <td class="coll">{$item['clan_member_count']}</td>
                    <td class="coll">{$item['clan_power']}</td>

                    <td class="coll">{if $clan_id == $item['clan_id']}Niet mogelijk
                                     {elseif $clan_level < 6}Niet mogelijk
                                     {else}<a href="{$ROOT_URL}ingame/clan/attack.php?id={$item['id']}">Aanvallen</a>{/if}</td>

                </tr>
                {/foreach}

            </table>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}