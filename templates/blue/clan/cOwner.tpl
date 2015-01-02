{include '../header.tpl'}
<div class="content">
    <p><h1>Clan owner wijzigen</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Geef hier de speler op die je als nieuwe owner van je clan wilt maken!</p>
    <form method="post">
        <label>Clan naam:</label>
        <input class="normal" name="name" type="text" value="{if isset($changeUser)}{$changeUser}{/if}">
        <input class="button" name="submit" type="submit" value="Owner wijzigen!">
    </form>
</div>
{include '../footer.tpl'}