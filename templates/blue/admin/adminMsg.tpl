{include '../header.tpl'}
<div class="content">
    <p><h1>Admin - Massa bericht</h1></p>
    {if isset($error)}
    <div class="error">
        {$error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {elseif isset($info) AND $info|count_characters > 0}
        <div class="melding info small icon">
            {$info}
        </div>
    {/if}

    <p>Verstuur elke speler in het spel een bericht via deze pagina</p>
    <form method="post">
        <label>Onderwerp</label><input class="normal" name="subject" type="text">
        <label>bericht</label><textarea name="message" class="normal" cols=40 rows=10></textarea>
        <input class="button" name="massMsg" type="submit" value="Versuur mass bericht">
    </form>
</div>
{include '../footer.tpl'}