{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
			
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Berichten - Inbox</div>
        </div>
        
        {if isset($form_error)}
        <div class="melding bad small icon">
            {$form_error}
        </div>
        {elseif isset($success)}
        <div class="melding good small icon">
            {$success}
        </div>
        {/if}
        
        <div class="tekstvak">
            <a href="{$ROOT_URL}ingame/message.php?page=inbox">Inbox</a> - <a href="{$ROOT_URL}ingame/message.php?page=outbox">Outbox</a> - <a href="{$ROOT_URL}ingame/message.php?page=new">Nieuw</a>
            <form method="post">
                <table width="100%" border="0">
                    <tr>
                        <td class="coll"  width="5%"><input type="checkbox" id="select_all" /></td>
                        <td class="coll">Van:</td>
                        <td class="coll">Onderwep:</td>
                        <td class="coll">Datum:</td>
                    </tr>

                    {foreach from=$message item=item}
                    <tr>
                        <td class="coll"><input type="checkbox" name="id[{$item['id']}]"></th></td>
                        <td class="coll" width="20%">{$item['from']}</td>
                        <td class="coll" width="40%">{if $item['read'] == 0}<b>{/if}<a href="{$ROOT_URL}ingame/message.php?page=read&id={$item['id']}">{$item['subject']}</a>{if $item['read'] == 0}</b>{/if}</td>
                        <td class="coll">{$item['time']}</td>
                    </tr>
                    {/foreach}

                </table>
                <input class="button small good" name="delMessagesInbox" type="submit" value="Verwijder geselecteerde berichten!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}