{include '../header.tpl'}
<div class="content">
    <script lang="javascript">
         $(function() {
            $('select.color').change(function() {
                if ($(this).val() == 1) { $('.number').val('cnul').prop('disabled', true); }
                if ($(this).val() == 2) {
                    if ($('.number').prop('disabled') == true) { $('.number').val(0).prop('disabled', false); }
                    $(".number > option").each(function() {
                        if ((this.text % 2) != 0) { $(this).prop('disabled', true); }
                        else { $(this).prop('disabled', false); }
                    });
                    
                     $('.number').val(-1);
                }
                if ($(this).val() == 3) { 
                    if ($('.number').prop('disabled') == true) { $('.number').val(0).prop('disabled', false); }
                    $(".number > option").each(function() {
                        if ((this.text % 2) == 0) { $(this).prop('disabled', true); }
                        else { $(this).prop('disabled', false); }
                    });
                    
                    $('.number').val(-1);
                }
            });
         });
    </script>
    <p><h1>Roulette</h1></p>
    {if isset($form_error)}
    <div class="error">
        {$form_error}
    </div>
    {elseif isset($success)}
    <div class="success">
        {$success}
    </div>
    {/if}

    <p>Roulette is een zeer bekend spel. Het is ook heel makkelijk te leren.<br>
        Er wordt in een cilinder een balletje gerold en aan jouw de vraag waar dit balletje valt.<br>
        Je kunt inzetten op een kleur en een bepaald cijfer, bijvoorbeeld jouw geluksnummer,
        de dag van de maand of een gegokt cijfer.<br>
        Je kunt tot wel 35x maal je inzet terugwinnen!</p>
    <form method="post">
        <label>Kleur</label>
        <select name="color" class="normal color">
            <option value="-1">Geen kleur gekozen</option>
            <option value="1">Groen</option>
            <option value="2">Zwart</option>
            <option value="3">Rood</option>
        </select>
        <label>Nummer</label>
         <select name="number" class="normal number">
            <option value="-1">Geen getal gekozen</option>
            {$i = 0}
            {while $i < 37}
                <option value="{if ($i == 0)}cnul{else}{$i}{/if}">{$i}</option>
                {$i++}
            {/while}
        </select>
        
        <label>Inzet</label><input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
        <input class="button" name="submit" type="submit" value="Draai de roulette!">
    </form>
</div>
{include '../footer.tpl'}