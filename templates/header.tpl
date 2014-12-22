<html>
    <head>
    <title>Criminals</title>
        <link rel="stylesheet" type="text/css" href="{$ROOT_URL}css/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script language="javascript">
            $(document).ready(function(){
                getTime();
            });
            setInterval(getTime, 1000);
            
            function getTime() {
                curDate = new Date();
                $('.time').text(leadZero(curDate.getHours()) + ':' + leadZero(curDate.getMinutes()) + ':' +  leadZero(curDate.getSeconds()));
            }
            
            function leadZero(par) {
                if (par < 10) {
                    par = ("0" + par);
                }
                return par;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <p>Criminals</p>
            </div>

            <div class="menu">

                <div class="information">
                    <p>Members: {$totalusers}</p>
                    <p class="time"></p>
                </div>
                <div id="item">
                    <div id="header">Algemeen</div>
                    <ul>
                        <li><a href="{$ROOT_URL}{if $LOGGEDIN == TRUE}ingame/{/if}index.php">Home</a></li>
                        <li><a href="#">Help/FAQ</a></li>
                        <li><a href="{$ROOT_URL}stats.php">Statistieken</a></li>
                        <li><a href="{$ROOT_URL}wetboek.php">Wetboek</a></li>
                        <li><a href="{$ROOT_URL}prijzen.php">Prijzen</a></li>
                        {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/list.php">Ledenlijst</a>{/if}
                    </ul>
                </div>
                <div id="item">
                    <div id="header">Gebruiker</div>
                    <ul>
                        {if $LOGGEDIN == FALSE}<li><a href="{$ROOT_URL}register.php">Aanmelden</a></li>{/if}
                        {if $LOGGEDIN == FALSE} <li><a href="{$ROOT_URL}login.php">Login</a></li>{/if}
                        
                        {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/message.php">Berichten</a>{/if}
                        {if $LOGGEDIN == TRUE} <li><a href="{$ROOT_URL}ingame/editProfiel.php">Profiel aanpassen</a></li>{/if}
                        {if $LOGGEDIN == TRUE} <li><a href="{$ROOT_URL}ingame/typewijzigen.php">Type wijzigen</a></li>{/if}
                        {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/doneren.php">Doneren</a>{/if}
                        {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}ingame/bank.php">Bank</a>{/if}
                        {if $LOGGEDIN == TRUE}<li><a href="{$ROOT_URL}logout.php">Logout</a>{/if}
                    </ul>
                </div>
                {if $LOGGEDIN == TRUE}
                <div id="item">
                    <div id="header">Geld</div>
                    <ul>
                        <li><a href="{$ROOT_URL}ingame/shop.php">Shop</a>    
                        <li><a href="{$ROOT_URL}ingame/getallenspel.php">Getallenspel</a></li>
                        <li><a href="{$ROOT_URL}ingame/roulette.php">Roulette</a></li>
                        <li><a href="{$ROOT_URL}ingame/russischroulet.php">Russisch roulette</a></li>
                        <li><a href="{$ROOT_URL}ingame/kopofmunt.php">Kop of munt</a></li>
                        <li><a href="{$ROOT_URL}ingame/sps.php">Steen, papier & schaar</a></li>
                        <li><a href="{$ROOT_URL}ingame/paardenrace.php">Paardenrace</a></li>
                        <li><a href="{$ROOT_URL}ingame/hogerlager.php">Hoger of lager</a></li>
                    </ul>
                </div>
                
                <div id="item">
                    <div id="header">Misdaad</div>
                    <ul>
                        <li><a href="{$ROOT_URL}ingame/bankroven.php">Bankroven</a></li>
                    </ul>
                </div>
                {/if}
                
                {if isset($level) AND $level > 0}
                 <div id="item">
                    <div id="header">Admin</div>
                    <ul>
                        <li><a href="{$ROOT_URL}admin/adminBasic.php">Basis wijzigingen</a></li>
                        <li><a href="{$ROOT_URL}admin/adminMsg.php">Massa bericht</a></li>
                        {if $level > 9}<li><a href="{$ROOT_URL}admin/adminMaak.php">Admin maken</a></li>{/if}
                    </ul>
                </div>
                {/if}
            </div>        