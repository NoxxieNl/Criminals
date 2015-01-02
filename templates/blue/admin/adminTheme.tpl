{include '../header.tpl'}
<div class="content">
    <p><h1>Admin - basis</h1></p>
    {if isset($error)}
    <div class="error">
        {$error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {elseif isset($info)}
    <div class="info">
        {$info}
    </div>
    {/if}

     <p>Hier kan je het thema van de website wijzigen!</p>
     <form method="post" action="">
        <label>Thema:</label>
            <select name="theme" class="normal">
                {foreach $themes as $theme}
                    <option value="{$theme}">{$theme}</option>
                {/foreach}
            </select>
            <input class="button small good" name="submit" type="submit" value="Verander thema!">
        </form>
</div>
{include '../footer.tpl'}