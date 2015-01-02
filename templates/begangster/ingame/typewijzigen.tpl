{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Type wijzigen</div>
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
            <p>Wissel hier van type!</p>
            <form method="post">
                <fieldset>
                <label>Type</label>
                    <select name="type" class="normal">
                        {foreach from=$type item=item}
                            <option value="{if isset($item['id'])}{$item['id']}">{$item['name']}{else}0">{/if}</option>
                        {/foreach}
                    </select>
                </fieldset>
                    <input class="button good large" name="submit" type="submit" value="Wijzig">
                </select>
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}