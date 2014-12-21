{include '../header.tpl'}
<div class="content">
    <p><h1>Aanvallen</h1></p>
    {if isset($error)}
    <div class="error">
        {$error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}
</div>
{include '../footer.tpl'}