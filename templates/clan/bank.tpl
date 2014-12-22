{include '../header.tpl'}
<div class="content">
    <p><h1>Cla bank</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Hier kan je geld storten of opnemen van de clan bank!</p>
    <div class="center">
        <p>Cash: {$cash} | Bank: {$bank}</p>
        <p>Je kan nog {$deposit_left} keer storten naar de clan bank</p>
    </div>
    <form method="post">
        <label>Bedrag</label>
        <input class="normal" name="amount" type="text" maxlength="10" value="100">
        <input class="button" name="withdraw" type="submit" value="Geld opnemen">
        <input class="button" name="deposit" type="submit" value="Geld storten">
    </form>
</div>
{include '../footer.tpl'}