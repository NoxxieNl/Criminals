{include '../header.tpl'}
<div class="content">
    <script language="javascript">
        $(function() {
            $( ".button.maxSelect" ).click(function() {
                buyId = $('input[name=buy' + $(this).attr('id') + ']');
                
                $(buyId).val($(buyId).attr('max'));
            });
        });
    </script>
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
            <a href="shop.php?page=sell">Verkoop</a>
            {if isset($items)}
            <form method="post">
                {foreach from=$items item=item}
                    <table width="50%" border="0">
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
                             <td class="coll subject" width="40%">Kosten:</td>
                             <td class="coll" width="40%">{$item['costs']}</td>
                        </tr>
                         <tr>
                             <td class="coll subject" width="40%">Koop aantal:</td>
                             <td class="coll" width="40%">
                                 <input class="normal" name="buy{$item['id']}" type="text" max={$item['max_buy']} value="{if isset($buy[$item['id']])}{$buy[$item['id']]}{/if}">
                                 <input class="button maxSelect" name="submit" id="{$item['id']}" type="button" value="Koop maximaal">
                             </td>
                        </tr>
                    </table>
                {/foreach}
                
                <input class="button" name="submit" type="submit" value="Koop!">
            </form>
            {/if}
</div>
{include '../footer.tpl'}