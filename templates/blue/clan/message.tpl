{include '../header.tpl'}
<div class="content">
    <p><h1>Clan - Massa bericht</h1></p>
    {if isset($error)}
    <div class="error">
        {$error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Verstuur elke clan lid vanuit hier een bericht</p>
    <form method="post">
        <label>Onderwerp</label><input class="normal" name="subject" type="text">
        <label>bericht</label><textarea name="message" class="normal" cols=40 rows=10></textarea>
        <input class="button" name="massMsg" type="submit" value="Verstuur bericht">
    </form>
</div>
{include '../footer.tpl'}