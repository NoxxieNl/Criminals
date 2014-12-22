{include '../header.tpl'}
<div class="content">
    <p><h1>Hoofdkwartier</h1></p>
    {if isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
    <div class="ingameContainer">
        <div class="center">
            <h2 class="headline">Uw persoonlijke link is:</h2>
            <p class="headline">{$ROOT_URL}click.php?id={$id}</p>
        </div>
        <table width="80%" border="0">
            <tr>
                <td colspan="2" class="coll headerCol">Persoonlijke Informatie</td>
                <td class="coll">&nbsp;</td>
                <td colspan="2" class="coll headerCol">Speler statistieken</td>
            </tr>
            <tr>
                <td class="coll subject" width="9%">Speler:</td>
                <td class="coll" width="27%">{$username}</td>
                <td class="coll" width="11%">&nbsp;</td>
                <td class="coll subject" width="14%">Attack Power:</td>
                <td class="coll" width="39%">{$attack_power}</td>
            </tr>
            <tr>
                <td class="coll subject">E-Mail:</td>
                <td class="coll">{$email}</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Defense Power:</td>
                <td class="coll">{$defence_power}</td>
            </tr>
            <tr>
                <td class="coll subject">Berichten:</td>
                <td class="coll"><a href="{$ROOT_URL}ingame/message.php">{$message_count}</a></td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Power Upgrade:</td>
                <td class="coll">{$extra_attack_power}</td>
            </tr>
            <tr>
                <td class="coll headerCol" colspan="2"><a href="{$ROOT_URL}/ingame/profiel.php">Bekijk je profiel!</a></td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Total Power:</td>
                <td class="coll">{$total_power}</td>
            </tr>
            <tr>
                <td class="coll" colspan="2">&nbsp;</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">ID:</td>
                <td  class="coll">{$id}</td>
            </tr>
            <tr>
                <td class="coll" colspan="2"></td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Status:</td>
                <td class="coll">{$rank}</td>
            </tr>
            <tr>
                <td class="coll" colspan="2">&nbsp;</td>
                <td class="coll">&nbsp;</td>
                <td class="coll" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="coll headerCol">Financiele Statistieken</td>
                <td class="coll">&nbsp;</td>
                <td colspan="2" class="coll headerCol">Personeel</td>
            </tr>
            <tr>
                <td class="coll subject">Cash:</td>
                <td class="coll">{$cash},-</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Clicks:</td>
                <td class="coll">{$clicks}</td>
            </tr>
            <tr>
                <td class="coll subject">Bank:</td>
                <td class="coll">{$bank},-</td>
                <td class="coll">&nbsp;</td>
                <td class="coll subject">Clicks Today:</td>
                <td class="coll">{$clicks_today}</td>
            </tr>
            <tr>
                <td class="coll subject">Inkomen:</td>
                <td class="coll">0,-</td>
            </tr>
            <tr>
                <td colspan="2"class="coll headerCol">Website statistieken</td>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td class="coll subject">Spelers:</td>
                <td class="coll subject">{$totalusers}</td>
            </tr>
            <tr>
                <td class="coll subject">Online:</td>
                <td class="coll">{$onlineusers.1} {if $onlineusers.1 == 1}lid{else}leden{/if} online ({$onlineusers.0} anoniem)</td>
            </tr>
        </table>
        
        {if $protection == 1}
            <div class="center">
                <p class="headline important">je staat nog 11 uur onder bescherming!</p>
                <form method="post"><input class="button" type="submit" name="guard" value="Haal mijn bescherming NU weg!"></form>
            </div>
            <br />
        {/if}
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