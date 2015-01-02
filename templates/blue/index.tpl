{include 'header.tpl'}
<div class="content">
    {if $LOGGEDIN == FALSE}
        <p><h1>Welkom bij Criminals...</h1></p>
        <p>Meldt je aan en vecht met of tegen drugsdealers, wetenschappers en politie. Recruteer je vrienden en vreemden en laat
           ze voor je vechten. Koop de zwaarste wapens en domineer iedereen! Kan jij het aan?</p>
    {else}
        <script language="javascript">
            setTimeout("location.href = 'ingame/index.php';");
        </script>
    {/if}
</div>
{include 'footer.tpl'}