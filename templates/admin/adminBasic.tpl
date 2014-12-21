{include '../header.tpl'}
<div class="content">
    <p><h1>Admin - basis</h1></p>
    {if isset($error)}
    <div class="error">
        {$error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {elseif isset($info)}
    <div class="info">
        {$info}
    </div>
    {/if}

    <p>Als admin zijnde kan je op deze pagina een speler verwijderen, resetten of geld doneren!</p>
    <form method="post" action="adminBasic.php">
        <label>Speler</label><input class="normal" name="player" type="text" value="{if isset($player)}{$player}{/if}">
        <label>Bedrag (Donatie)</label><input class="normal" name="amount" type="text">
        <input class="button" name="reset" type="submit" value="Resetten">
        <input class="button" name="donate" type="submit" value="Doneren">
        <input class="button" name="delete" type="submit" value="Verwijderen">
    </form>
</div>
{include '../footer.tpl'}