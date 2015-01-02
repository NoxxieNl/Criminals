{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Winkel - Verkopen</div>
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
            {if isset($items)}
            <form method="post">
                {foreach from=$items item=item}
                    <table width="50%" border="0">
                        <tr>
                            <td class="coll" rowspan="10" colspan="2"><img src="{$TEMPLATE_URL}images/items/{$item['id']}.gif" width=150 height=150></td>
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
                             <td class="coll" width="40%"><input class="normal normal small" name="sell{$item['id']}" type="text"></td>
                        </tr>
                    </table>
                {/foreach}
                
                <input class="button normal bad" name="submit" type="submit" value="Verkoop!">
            </form>
            {/if}
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}