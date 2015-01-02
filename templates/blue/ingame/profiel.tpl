{include '../header.tpl'}
<div class="content">
    <p><h1>Profiel</h1></p>
    {if isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
    <div class="ingameContainer">
        <table width="50%" border="0">
            <tr>
                <td colspan="5" class="coll headerCol">Profiel van {$user['username']}</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Speler:</td>
                <td class="coll" width="30%">{$user['username']}</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="30%">Type:</td>
                <td class="coll" width="20%">{$user['type']}</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Clan:</td>
                <td class="coll" width="30%">{$user['clan_id']}</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Clicks:</td>
                <td class="coll" width="30%">{$user['clicks']}</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Kracht:</td>
                <td class="coll" width="30%">{$user['attack_power']}</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Verdediging:</td>
                <td class="coll" width="30%">{$user['defence_power']}</td>
            </tr>
            <tr>
                <td colspan="5" class="coll headerCol">Geldzaken</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Cash:</td>
                <td class="coll" width="30%">{$user['cash']}</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Bank:</td>
                <td class="coll" width="30%">{$user['bank']}</td>
            </tr>
            <tr>
                <td colspan="5" class="coll headerCol">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5" class="coll headerCol">Extra</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Gevechten gewonnen:</td>
                <td class="coll" width="30%">{$user['attacks_won']}</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Gevechten verloren:</td>
                <td class="coll" width="30%">{$user['attacks_lost']}</td>
            </tr>
            {if $user['id'] != $id}
            <tr>
                <td class="coll subject" width="20%">Contacteer {$user['username']}:</td>
                <td class="coll headerCol" width="30%"><a href="{$ROOT_URL}ingame/bericht.php?id={$user['id']}">Contacteer nu!</a></td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Val {$user['username']} aan:</td>
                <td class="coll headerCol" width="30%"><a href="{$ROOT_URL}ingame/attack.php?id={$user['id']}">Val nu aan!</a></td>
            </tr>      
            {/if}
            {if $level > 2}
                 <tr>
                <td colspan="5" class="coll headerCol">Admin info</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Registratie datum:</td>
                <td class="coll" width="30%">{$user['signup_date']}</td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Resterende bank:</td>
                <td class="coll" width="30%">{$user['bank_left']}</td>
            </tr>
            <tr>
                <td class="coll subject" width="20%">Doneer speler:</td>
                <td class="coll" width="30%"><a href="{$ROOT_URL}admin/adminBasic.php?donate=true&player={$user['username']}">Doneer speler!</a></td>
                <td class="coll" width="2%">&nbsp;</td>
                <td class="coll subject" width="20%">Reset speler:</td>
                <td class="coll" width="30%"><a href="{$ROOT_URL}admin/adminBasic.php?reset=true&player={$user['username']}">Reset speler!</a></td>
            </tr>
            {/if}
        </table>
        
        {if isset($items)}
                {foreach from=$items item=item}
                    <table width="50%" border="0">
                        <tr>
                            <td colspan="5" class="coll headerCol">Items</td>
                        </tr>
                        <tr>
                            <td class="coll" rowspan="10" colspan="2"><img src="{$TEMPLATE_URL}images/{$item['id']}.gif" width=150 height=150></td>
                             <td class="coll subject" width="40%">Naam:</td>
                             <td class="coll" width="40%">{$item['name']}</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Aanvalskracht:</td>
                             <td class="coll" width="40%">{$item['attack_power']}</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Verdedigingskracht:</td>
                             <td class="coll" width="40%">{$item['defence_power']}</td>
                        </tr>
                         <tr>
                             <td class="coll subject" width="40%">Aantal in bezit:</td>
                             <td class="coll" width="40%">{$item['count']}</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Totaal aanvalskracht:</td>
                             <td class="coll" width="40%">{$item['total_attack_power']}</td>
                        </tr>
                        <tr>
                             <td class="coll subject" width="40%">Totaal verdedigingskracht:</td>
                             <td class="coll" width="40%">{$item['total_defence_power']}</td>
                        </tr>
                    </table>
                {/foreach}
            {/if}
    </div>
</div>
{include '../footer.tpl'}