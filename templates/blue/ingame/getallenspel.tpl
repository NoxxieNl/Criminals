{include '../header.tpl'}
<div class="content">
    <p><h1>Getallenspel</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Bij dit getallenspel, word er een getal van tussen 1 en 10 gemaakt, en als jij het getal goed raad, win je 8x je inzet!</p>
    <form method="post">
        <label>Getal</label>
        <select name="number" class="normal">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <label>Inzet</label><input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
        <input class="button" name="submit" type="submit" value="Gok">
    </form>
</div>
{include '../footer.tpl'}