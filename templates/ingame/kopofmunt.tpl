{include '../header.tpl'}
<div class="content">
    <p><h1>Kop of munt</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Dit is kop of munt een makkelijk spelletje om geld te verdienen het werkt zo: als je wint krijg je 150% van je inzet erbij!</p>
    <form method="post">
        <label>Kop of munt</label>
        <select class="normal" name="kom" size="1">
            <option value="0">Kop</option>
            <option value="1">Munt</option>
        </select>
        <label>Inzet</label>
        <select class="normal" name="gambleMoney" class="normal">
            <option value="0">Select</option>
            <option value="250">250,-</option>
            <option value="500">500,-</option>
            <option value="1000">1000,-</option>
        </select>
        <input class="button" name="submit" type="submit" value="Gok">
    </form>
</div>
{include '../footer.tpl'}