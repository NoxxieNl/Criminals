{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Profiel wijzigen</div>
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
            <form method="post">
                <fieldset>
                    <label>E-Mail:</label>
                     <input type="text" class="normal" name="email" value="{$email}" disabled="true">
                </fieldset>

                <fieldset>
                    <label>Website:</label>
                    <input type="text" class="normal" name="website" value="{$website}">
                </fieldset>

                <fieldset>
                    <label>Info:</label>
                    <textarea name="info" cols=60 rows=10 class="large">{$info}</textarea>
                </fieldset>

                <fieldset>
                    <label>Wachtwoord nieuw:</label> 
                    <input type="password" name="pass" class="normal">
                    
                    <label>Wachtwoord Herhaal:</label> 
                    <input type="password" name="passVerify" class="normal">
                </fieldset>
                  <input class="button good large" type="submit" name="submit" value="Verander gegevens" class="button">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}