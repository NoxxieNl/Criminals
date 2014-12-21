{include '../header.tpl'}
<div class="content">
    <p><h1>Steen, papier & schaar</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Het allom bekende steen, papier & schaar! Gok jij goed? Als je wint win je 500 verlies je, verlies je 500!</p>
    <form method="post">
        <label>Type</label>
        <select name="choice" class="normal">
            
            <option value="0"></option>
            <option value="1">Steen</option>
            <option value="2">Papier</option>
            <option value="3">Schaar</option>
            
            <input class="button" name="submit" type="submit" value="Speel">
        </select>
    </form>
</div>
{include '../footer.tpl'}