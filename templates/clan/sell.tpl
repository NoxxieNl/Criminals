{include '../header.tpl'}
<div class="content">
    <p><h1>Shop</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
            {if isset($items)}
            <form method="post">
                {foreach from=$items item=item}
                    <table width="50%" border="0">
                        <tr>
                            <td class="coll" rowspan="10" colspan="2"><img src="{$ROOT_URL}images/{$item['id']}.gif" width=150 height=150></td>
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
                         <tr>
                             <td class="coll subject" width="40%">Verkoop aantal:</td>
                             <td class="coll" width="40%"><input class="normal" name="sell{$item['id']}" type="text"></td>
                        </tr>
                    </table>
                {/foreach}
                
                <input class="button" name="submit" type="submit" value="Verkoop!">
            </form>
            {/if}
</div>
{include '../footer.tpl'}