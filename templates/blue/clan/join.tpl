{include '../header.tpl'}
<div class="content">
    <p><h1>Clan joinen</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Geef de naam in van de clan die je wilt joinen, en ze zullen het wellicht overwegen je op te nemen!</p>
    <form method="post">
        <label>Clan naam:</label>
        <input class="normal" name="name" type="text" maxlength="20">
        <input class="button" name="submit" type="submit" value="Clan joinen!">
    </form>
</div>
{include '../footer.tpl'}