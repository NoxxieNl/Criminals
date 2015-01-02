{include 'ingame/header.tpl'}
    <div id="centercontent" style="margin-top: 7px;">
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
	<div class="titel">
            <div class="titelicoon"> <img src="{$TEMPLATE_URL}images/icons/title-icon.png" alt="icoon" title="icoon"/> </div>
            <div class="titeltekst">Roulette</div>
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
            <p>Roulette is een zeer bekend spel. Het is ook heel makkelijk te leren.<br>
            Er wordt in een cilinder een balletje gerold en aan jouw de vraag waar dit balletje valt.<br>
            Je kunt inzetten op een kleur en een bepaald cijfer, bijvoorbeeld jouw geluksnummer,
            de dag van de maand of een gegokt cijfer.<br>
            Je kunt tot wel 35x maal je inzet terugwinnen!</p>

            <form method="post">
                <fieldset>
                    <label>Kleur</label>
                    <select name="color" class="normal color">
                        <option value="-1">Geen kleur gekozen</option>
                        <option value="1">Groen</option>
                        <option value="2">Zwart</option>
                        <option value="3">Rood</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Nummer</label>
                     <select name="number" class="normal number">
                        <option value="-1">Geen getal gekozen</option>
                        {$i = 0}
                        {while $i < 37}
                            <option value="{if ($i == 0)}cnul{else}{$i}{/if}">{$i}</option>
                            {$i++}
                        {/while}
                    </select>
                </fieldset>
                <fieldset>
                    <label>Inzet</label>
                    <input class="normal" name="gambleMoney" type="text" maxlength="10" value="100">
                </fieldset>
                <input class="button good small" name="submit" type="submit" value="Draai de roulette!">
            </form>
        </div>		
        <div class="titelfooter"></div>      
    </div>
{include 'ingame/footer.tpl'}