{include '../header.tpl'}
<div class="content">
    <p><h1>Sollicitatie</h1></p>
    {if isset($success)}
    <div class="success">
        {$success}
    </div>
    {else}
        {if isset($form_error)}
            <div class="error">
                {$form_error}
            </div>
        {/if}
    
    <p>We zoeken Mensen die nieuwe dingen maken of toevoegen!</p>
        <form method="post">
            <label>Functie:</label> <input class="normal" type="text" name="function">
            <label>Uren online:</label> <input class="normal" type="text" name="onlineHours">
            <label>Goede eigenschappen:</label> <input class="normal" type="text" name="goodQuality">
            <label>Slecthe eigenschappen:</label> <input class="normal" type="text" name="badQuality">
            <label>Reden:</label> <input class="normal" type="text" name="reason">
            <input class="button" type="submit" name="submit" value="Solliciteer">
        </form>
    {/if}
</div>
{include '../footer.tpl'}