{include '../header.tpl'}
<div class="content">
    <p><h1>Bankroven</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Wat gebeurt er al je verliest? Dan ben je 10.000 kwijt! Maar als je wint win je 10.000!</p>
    <p>Wil je een bank beroven?</p>
    <form method="post">
        <input class="button" name="submit" type="submit" value="Beroof de bank!">
    </form>
</div>
{include '../footer.tpl'}