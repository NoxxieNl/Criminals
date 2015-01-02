{include 'header.tpl'}
    <div class="tabs_paginas" data-persist="true">
                {if isset($error)}
                   <div class="melding bad small icon">
                       {$error}
                   </div>
               {else}
               <p>{$text|replace:'%username%':$username}</p>

                   {if !isset($clicked)}
                   <form method="post">
                       <input class="button" type="submit" name="submit" value="Ga verder..">
                   </form>
                   {else}
                       <h2>{$username} heeft nu {($clicks + 1)} {$clickType}!</h2>
                   {/if}
               {/if}
    </div>
{include 'footer.tpl'}