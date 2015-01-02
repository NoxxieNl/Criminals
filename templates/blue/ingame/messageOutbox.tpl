{include '../header.tpl'}
<div class="content">
    <script language="javascript">
        $(function() {
            $('#select_all').click(function(event) {
                if(this.checked) {
                    $(':checkbox').each(function() {
                        this.checked = true;
                    });
                } else {
                    $(':checkbox').each(function() {
                        this.checked = false;
                    });         
                }
            });
        });
    </script>
    <p><h1>Outbox</h1></p>
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
    <div class="ingameContainer">
        <form method="post">
        <table width="50%" border="0">
            <tr>
                <td class="coll"  width="5%"><input type="checkbox" id="select_all"></td>
                <td class="coll">Van:</td>
                <td class="coll">Onderwep:</td>
                <td class="coll">Datum:</td>
            </tr>
            
            {foreach from=$message item=item}
            <tr>
                <td class="coll"><input type="checkbox" name="id[{$item['id']}]"></th></td>
                <td class="coll" width="20%">{$item['from']}</td>
                <td class="coll" width="40%"><a href="{$ROOT_URL}ingame/message.php?page=read&id={$item['id']}">{$item['subject']}</a></td>
                <td class="coll">{$item['time']}</td>
            </tr>
            {/foreach}
            
        </table>
            
            <input class="button" name="delMessagesOutbox" type="submit" value="Verwijder geselecteerde berichten!">
        </form>
    </div>
</div>
{include '../footer.tpl'}