{include '../header.tpl'}
<div class="content">
    <p><h1>Doneren</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Hier kan je geld doneren aan je clan!</p>
    <form method="post">
        <label>Bedrag</label><input class="normal" name="amount" type="text" maxlength="10">
        <input class="button" name="submit" type="submit" value="Doneer!">
    </form>
</div>
{include '../footer.tpl'}