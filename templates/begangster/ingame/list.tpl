{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Gebruikerlijst</div>
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
        
        <div class="tekstvak center">
            <table width="100%" border="0">
                <tr>
                    <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=username">Gebruikersnaam:</a></td>
                    <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=type">Type:</a></td>
                    <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=cash">Contant:</a></td>
                    <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=bank">Bank:</a></td>
                    <td class="coll"><a href="{$ROOT_URL}ingame/list.php?order=power">Power:</a></td>
                    <td class="coll">Aanvallen:</td>
                    <td class="coll">Bericht:</td>
                    <td class="coll"> </td>
                </tr>

                {foreach from=$list item=item}
                <tr>
                    <td class="coll">{$item['username']}</td>
                    <td class="coll">{$item['type']}</td>
                    <td class="coll">{$item['cash']}</td>
                    <td class="coll">{$item['bank']}</td>
                    <td class="coll">{$item['attack_power']}</td>
                    <td class="coll">{if $type == 3 && $item['type_id'] == 3}Niet moglijk
                                     {elseif $username == $item['username']}Niet mogelijk
                                     {else}<a href="{$ROOT_URL}ingame/attack.php?id={$item['id']}">Aanvallen</a>{/if}</td>
                    <td class="coll">{if $username == $item['username']}Niet mogelijk{else}<a href="{$ROOT_URL}ingame/message.php?page=new&id={$item['id']}">Verstuur bericht</a>{/if}</td>
                    <td class="coll"><a href="{$ROOT_URL}ingame/profiel.php?id={$item['id']}">x</a></td>
                </tr>
                {/foreach}

            </table>
            <div class="center">
                <br />
                Pagina: {for $i=1 to $pagination['tPage']}
                    {if $i == $pagination['cPage']}
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
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}