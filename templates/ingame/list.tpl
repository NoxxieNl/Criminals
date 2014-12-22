{include '../header.tpl'}
<div class="content">
    <p><h1>Gebruikerslijst</h1></p>
    <div class="ingameContainer">
        <table width="80%" border="0">
            <tr>
                <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=username">Gebruikersnaam:</a></td>
                <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=type">Type:</a></td>
                <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=cash">Contant:</a></td>
                <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=bank">Bank:</a></td>
                <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=power">Power:</a></td>
                <td class="coll">Aanvallen:</td>
            </tr>
            
            {foreach from=$list item=item}
            <tr>
                <td class="coll">{$item['username']}</td>
                <td class="coll">{$item['type']}</td>
                <td class="coll">{$item['cash']}</td>
                <td class="coll">{$item['bank']}</td>
                <td class="coll">{$item['power']}</td>
                <td class="coll">{if $userData['type'] == 3 && $item['type_id'] == 3}Aanval niet moglijk{else}<a href="{$ROOT_URL}ingame/attack.php?id={$item['id']}">Aanvallen</a>{/if}</td>
            </tr>
            {/foreach}
            
        </table>
        <div class="center">
            {for $i=1 to $pagination['tPage']}
                {if $i == $pagination['cPage'}
                    {$i}
                {else}
                    <a href="{$ROOT_URL}ingame/list.php?order={$order}&start={$pagination['pageBegin'][$i]}">{$i}</a>
                {/if}
            {/for}
        </div>
        
        <div class="center">
            <p class="headline important">{$onlineusers.1} {if $onlineusers.1 == 1}lid{else}leden{/if} online ({$onlineusers.0} anoniem)</p>
            <form method="post"><input class="button" type="submit" name="onlineList" value="{if $showonline == 0}Laat me NU zien op de online leden lijst{else}Ik wil NIET in de online leden lijst!{/if}"></form>
        </div>
        <br />
        <div class="center">
            <p class="headline important">Er {if $onlineusers.2 == 1}is{else}zijn{/if} {$onlineusers.2} admin{if $onlineusers.2 != 1}s{/if} online</p>
        </div>
    </div>
</div>
{include '../footer.tpl'}