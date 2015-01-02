{include 'header.tpl'}
    <div class="tabs_paginas" data-persist="true">
       <table width="100%"  border="0" cellspacing="2" cellpadding="2"> 
        <tr>
            <td width="50%" height="53"><strong>Beste Spelers:</strong><br> 
                {if isset($bestPlayers)}
                    {foreach from=$bestPlayers item=player}
                        {$player} <br />
                    {/foreach}
                {/if}
            </td> 
            <td width="50%"><strong>Beste Clans: </strong><br> 
                {if isset($bestClans)}                
                    {foreach from=$bestClans item=clan}
                        {$clan} <br />
                    {/foreach}
                {/if}
            </td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%"><strong>Nieuwste Leden:<br></strong> 
                {if isset($newestMembers)}                
                    {foreach from=$newestMembers item=newMember}
                        {$newMember} <br />
                    {/foreach}
                {/if}
            </td> 
            <td width="50%"><strong>Meeste kliks:</strong> <br> 
                {if isset($mostClicks)}                
                    {foreach from=$mostClicks item=mostClick}
                        {$mostClick} <br />
                    {/foreach}
                {/if}
            </td> 
        </tr>
        <tr valign="top"> 
            <td width="50%">&nbsp;</td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%">Aantal drugsdealers: <b>{if isset($memberCount[1])}{$memberCount[1]}{else}0{/if}</b></td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%">Aantal wetenschappers: <b>{if isset($memberCount[2])}{$memberCount[2]}{else}0{/if}</b></td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
        <tr valign="top"> 
            <td width="50%">Aantal agenten: <b>{if isset($memberCount[3])}{$memberCount[3]}{else}0{/if}</b></td> 
            <td width="50%">&nbsp;</td> 
        </tr> 
</table> 
    </div>
{include 'footer.tpl'}