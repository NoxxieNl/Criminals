{include '../header.tpl'}
<div class="content">
    <p><h1>Clan recruits</h1></p>
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
            
            <br />
            <select class="large" name="action" class="normal">
                <option value="0">Met geslecteerde lid / leden...</option>
                <option value="1">Aanvraag weigeren</option>
                <option value="2">Aanvraag accepteren</option>
            </select>
            <input class="button" name="submit" type="submit" value="Actie uitvoeren">
        </form>
    </div>
</div>
{include '../footer.tpl'}