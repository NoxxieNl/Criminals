{include '../header.tpl'}
<div class="content">
    <p><h1>Nieuw bericht</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
    <a href="{$ROOT_URL}ingame/message.php?page=inbox">Inbox</a> - <a href="{$ROOT_URL}ingame/message.php?page=outbox">Outbox</a> - <a href="{$ROOT_URL}ingame/message.php?page=new">Nieuw</a>
    
    <p>Verstuur hier een bericht naar een mede speler</p>
    <form method="post">
        <label>Naar:</label><input class="normal" name="to" type="text" value="{if isset($toUser)}{$toUser}{/if}">
        <label>Onderwerp:</label><input class="normal" name="subject" type="text">
        <label>Bericht:</label><textarea name="message" class="normal" cols="80" rows=10></textarea>
        <input class="button" name="massMsg" type="submit" value="Versuur bericht">
    </form>
</div>
{include '../footer.tpl'}