{include '../header.tpl'}
<div class="content">
    <p><h1>Russisch roulette</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>50 - 50 kans op 500 piek! Dat laat je toch niet liggen? Verlies je ga je er ieder geval niet dood aan!</p>
    <form method="post">
        <input class="button" name="submit" type="submit" value="Schiet">
    </form>
</div>
{include '../footer.tpl'}