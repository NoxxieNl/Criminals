{include '../header.tpl'}
<div class="content">
    <p><h1>Type wijzigen</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Wissel hier van type!</p>
    <form method="post">
        <label>Type</label>
        <select name="type" class="normal">
            {foreach from=$type item=item}
                <option value="{if isset($item['id'])}{$item['id']}">{$item['name']}{else}0">{/if}</option>
            {/foreach}
            <input class="button" name="submit" type="submit" value="Wijzig">
        </select>
    </form>
</div>
{include '../footer.tpl'}