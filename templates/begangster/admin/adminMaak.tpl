{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Admin maken</div>
        </div>
        
        {if isset($form_error)}
        <div class="melding bad small icon">
            {$form_error}
        </div>
        {elseif isset($success)}
        <div class="melding good small icon">
            {$success}
        </div>
        {elseif isset($info) AND $info|count_characters > 0}
        <div class="melding info small icon">
            {$info}
        </div>
        {/if}
        
        <div class="tekstvak">
            <p>Als hoofd admin zijnde kan je hier nieuwe admins aanwijzen</p>
            <form method="post">
                <fieldset>
                    <label>Speler</label>
                    <input class="normal" name="user" type="text">
                </fieldset>
                    
                <fieldset>
                    <label>Toegangs niveau</label>
                    <select name="level" class="normal">
                        <option value="-1">Geen niveau gekozen</option>
                        {$i = 0}
                        {while $i < 11}
                            <option value="{if ($i == 0)}cnul{else}{$i}{/if}">{$i}</option>
                            {$i++}
                        {/while}
                    </select>
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Verander toegang">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}