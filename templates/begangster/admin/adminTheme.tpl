{include '../ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Admin basis</div>
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
            <p>Hier kan je het thema van de website wijzigen!</p>
            <form method="post" action="">
                <fieldset>
                    <label>Thema:</label>
                         <select name="theme" class="normal">
                             {foreach $themes as $theme}
                                  <option value="{$theme}">{$theme}</option>
                             {/foreach}
                         </select>
                </fieldset>
                <input class="button small good" name="submit" type="submit" value="Verander thema!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include '../ingame/footer.tpl'}