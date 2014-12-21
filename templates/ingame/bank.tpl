{include '../header.tpl'}
<div class="content">
    <p><h1>Bank</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Hier kan je geld veilig stellen op de bank of juist geld opnemen van de bank, zolang je geld op de bank staat kan je er niks mee kopen!</p>
    <form method="post">
        <label>Bedrag</label>
        <input class="normal" name="money" type="text" maxlength="10" value="100">
        <input class="button" name="withdraw" type="submit" value="Geld opnemen">
        <input class="button" name="deposit" type="submit" value="Geld storten">
    </form>
</div>
{include '../footer.tpl'}