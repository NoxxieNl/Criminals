{include '../header.tpl'}
<div class="content">
    <p><h1>Hoger of lager</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

<p>Meedoen aan hoger of lager kost {$costMoney}. Er wordt een random getal t/m de 100 aangemaakt. Je kan het spel tussendoor stoppen en later verder gaan.</p>
<p>Je zit in ronde: {$hlround}, met een prijzenpot van {$winMoney}!</p>
     <form method="post" action="hogerlager.php?number={$hlNumber}"> 
       <label>Ik gok:</label>
        <select name="hl" class="normal">
            <option value="1">Hoger</option>
            <option value="2">Lager</option>
        </select>
        <input class="button" name="submit" type="submit" value="Gok">
     </form> 
</div>
{include '../footer.tpl'}