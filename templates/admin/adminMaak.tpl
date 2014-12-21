{include '../header.tpl'}
<div class="content">
    <p><h1>Admin - maak</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Als hoofd admin zijnde kan je hier nieuwe admins aanwijzen</p>
    <form method="post">
        <label>Speler</label><input class="normal" name="user" type="text">
        <label>Toegangs niveau</label>
        <select name="level" class="normal">
            <option value="-1">Geen niveau gekozen</option>
            {$i = 0}
            {while $i < 11}
                <option value="{if ($i == 0)}cnul{else}{$i}{/if}">{$i}</option>
                {$i++}
            {/while}
        </select>
        <input class="button" name="submit" type="submit" value="Verander toegang">
    </form>
</div>
{include '../footer.tpl'}