{include '../header.tpl'}
<div class="content">
    <p><h1>Clan verlaten</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {elseif isset($confirmation)}
        <div class="info">
            Weet je het zeker dat je de clan wilt verwijderenb? Klik <a href="{$ROOT_URL}ingame/clan/index.php?page=delete&confirmation=true">hier</a> als je het zeker weet!
        </div>
    {/if}

    <p>Als je de clan wilt verwijderen kan dat hier, LET OP: Alles wat de clan heeft (cash / bank / items etc.) raken verloren!</p>
    <form method="post">
        <input class="button" name="submit" type="submit" value="Verwijder de clan!">
    </form>
</div>
{include '../footer.tpl'}