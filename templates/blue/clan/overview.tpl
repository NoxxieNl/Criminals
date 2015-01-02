{include '../header.tpl'}
<div class="content">
    <p><h1>Clanlijst</h1></p>
    {if isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
    <div class="ingameContainer">
        <table width="80%" border="0">
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
</div>
{include '../footer.tpl'}