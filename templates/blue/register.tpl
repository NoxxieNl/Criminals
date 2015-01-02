{include 'header.tpl'}
<div class="content">
    <p><h1>Registreren</h1></p>
    {if isset($REGISTERD)}
    <div class="success">
        {$REGISTERD}
    </div>
    {else}
        {if isset($form_error)}
            <div class="error">
                {$form_error}
            </div>
        {/if}
        <form method="post">
            <label>Gebruikersnaam:</label> <input class="normal" type="text" name="login" maxlength=16 value="{if isset($login)}{$login}{/if}">
            <label>Wachtwoord:</label> <input class="normal" type="password" name="password" maxlength=16 value="{if isset($password)}{$password}{/if}">
            <label>Herhaal:</label> <input class="normal" type="password" name="passconfirm" maxlength=64 value="{if isset($passconfirm)}{$passconfirm}{/if}">
            <label>e-Mail:</label> <input class="normal" type="text" name="emailCheck" maxlength=64 value="{if isset($emailCheck)}{$emailCheck}{/if}">
            <label>Type:</label> <select class="normal" name="type">
                                    <option value="1" {if isset($type) and $type == 1}selected="true"{/if}>Drugsdealer</option>
                                    <option value="2" {if isset($type) and $type == 2}selected="true"{/if}>Wetenschapper</option>
                                    <option value="3" {if isset($type) and $type == 3}selected="true"{/if}>Politie</option>
                                 </select>
            <input class="button" type="submit" name="submit" value="Aanmelden">
        </form>
    {/if}
</div>
{include 'footer.tpl'}