{include 'header.tpl'}
<div class="content">
    <p><h1>Inloggen</h1></p>
    {if isset($LOGIN)}
    <div class="success">
        {$LOGIN}
        <script language="javascript">
            setTimeout("location.href = 'ingame/index.php';",1500);
        </script>
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
            <input class="button" type="submit" name="submit" value="Inloggen">
        </form>
    {/if}
</div>
{include 'footer.tpl'}