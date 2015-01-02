{include '../header.tpl'}
<div class="content">
    <p><h1>Clan gebruikerslijst</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
    <div class="ingameContainer">
        <form method="post">
            <table width="80%" border="0">
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
            <select class="large" name="action" class="normal">
                <option value="0">Met geslecteerde lid / leden...</option>
                {if $clan_level == 10}<option value="1">Owner maken</option>{/if}
                {if $clan_level > 7}<option value="2">Uit clan gooien</option>{/if}
                {if $clan_level > 5}<option value="3">Rechten wijzigen</option>{/if}
            </select>
            <select class="large" name="rights" class="normal">
                <option value="0">Rechten wijzigen naar...</option>
		<option value="1">Member</option>
		<option value="2">Recruiter</option>
		{if $clan_level > 7}<option value="6">Manager</option>{/if}
		{if $clan_level > 8}<option value="7">Generaal</option>{/if}
		{if $clan_level > 9}<option value="8">Leader</option>{/if}
            </select>
            <input class="button" name="submit" type="submit" value="Actie uitvoeren">
            {/if}
        </form>
    </div>
</div>
{include '../footer.tpl'}