{include '../header.tpl'}
<div class="content">
    <p><h1>Clan aanmaken</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Hier kan je een nieuwe clan aanmaken!</p>
    <form method="post">
        <label>Clan naam:</label>
        <input class="normal" name="name" type="text" maxlength="20">
        <input class="button" name="submit" type="submit" value="Clan aanmaken!">
    </form>
</div>
{include '../footer.tpl'}