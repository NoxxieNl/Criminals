<?php
/*
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl"> 
    <head>
        <title>Installatie</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="../templates/begangster/css/outgame.css" />
        <script type="text/javascript"src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="../templates/begangster/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
        
        <script>
            $(document).ready(function(){
                $("#button").click(function(){
                    $("#stats").toggle(1000);
                });
            });
        </script>
    </head>

    <body>	
        <div id="wrapper">
            <div id="container" style="margin-top: 25px;">
                <div class="Lmenutop2" style="margin-left: 6px;margin-top: -28px;"></div>
	
                <div id="topbalk">
                    <div id="topbalkinfo">
                        
                    </div>
		</div>
		
            <div id="header">
                <div id="button" style="clear: both; color: #fff; float: right; margin-left: 714px;margin-top: 5px; z-index: 1; position: absolute"><img src="../templates/begangster/images/hidebutton.png" alt="" /></div>

                <div id="stats" style="margin-top: -20px;">
                    
                </div>
                <div id="logo" style="overflow: hidden; float: right;"></div>
            </div>
            <div id="content" style="margin-top: -10px; margin-left: 30px;">
	    <div id="centercontent-outgame" style="margin-top: 7px;">
			
		<div class="titel">
		    <div class="titelicoon"> <img src="../templates/begangster/images/icons/title-icon.png" alt="icon" title="icon"/> </div>
		    <div class="titeltekst">Crimenals blue - revamped!</div>
		</div>
	    
		<div class="tekstvak">
		    <div class="text">
			<div id="tab-container" class="tab-container">';

$errorArray = array();
$errorOutput = '';

// Check what step we are if not really sure just go to step 1
if (!isset($_GET['step']) or empty($_GET['step'])) {
    $step = 1;
} else {
    if (ctype_digit($_GET['step']) === false) {
        $step = 1;
    } else {
        if ($_GET['step'] < 1 OR $_GET['step'] > 2) {
            $step = 1;
        } else {
            $step = (int) $_GET['step'];
        }
    }
}

// Check if chmod is cool & config file is cool!
if ($step == 1) {
    $nStep = 1;
    
    // Check if folder are writeable
    if (!is_writeable('../templates/templates_c')) {
        $errorArray['template_c'] = 'Templace_c folder is niet schrijfbaar!';
    }
    
    if (!is_writeable('../cache')) {
        $errorArray['cache'] = 'Cache folder is niet schrijbaar!';
    }
    
    // Check if config.inc.php file exists if so if it writeable
    if (!file_exists('../config.inc.php')) {
        if (!fopen('../config.inc.php', 'w')) {
            $outputAnswer['config_created'] = true;
            $errorArray['config_no_create'] = 'Config file kon niet worden aangemaakt, folder is niet schrijfbaar!';
        } else {
            if (!is_writeable('../config.inc.php')) {
                $errorArray['config_no_write'] = 'Config file is niet schrijfbaar!';
            }
        }
    }
    
    if (!empty($errorArray['config_no_create'])) { $outputAnswer['config_exist'] = 'bad'; $nStep = 0; } else { $outputAnswer['config_exist'] = 'good'; }
    if (!empty($errorArray['template_c'])) { $outputAnswer['template_c'] = 'bad'; $nStep = 0; } else { $outputAnswer['template_c'] = 'good'; }
    if (!empty($errorArray['cache'])) { $outputAnswer['cache'] = 'bad'; $nStep = 0; } else { $outputAnswer['cache'] = 'good'; }
    if (!empty($errorArray['config_no_write'])) { $outputAnswer['config_no_write'] = 'bad'; $nStep = 0; } else { $outputAnswer['config_no_write'] = 'good'; }
    
    // Output html with answers!
    echo '<div class="tabs_paginas" data-persist="true">
            <fieldset>
            <legend>Schrijf & lees rechten</legend>
            <p>
                <div class="melding ' . $outputAnswer['template_c'] . ' small icon">
                    "template_c" folder schrijfbaar: ' . ($outputAnswer['template_c'] == 'good' ? 'Ja' : 'Nee') . '
                </div>
            </p>
            <p>
                <div class="melding ' . $outputAnswer['cache'] . ' small icon">
                    "cache" folder schrijfbaar: ' . ($outputAnswer['cache'] == 'good' ? 'Ja' : 'Nee') . '
                </div>
            </p>
            </fieldset>
            
            <fieldset>
            <legend>Config file</legend>    
            <p>
                <div class="melding ' . $outputAnswer['config_exist'] . ' small icon">
                    Config file aanwezig: ' . ($outputAnswer['config_exist'] == 'good' ? 'Ja' : 'Nee') . '
                    ' . ($outputAnswer['config_created'] == true ? '(Systeem aangemaakt)' : '') . '
                </div>
            </p>
            <p>
                <div class="melding ' . $outputAnswer['config_no_write'] . ' small icon">
                    Config file schrijfbaar: ' . ($outputAnswer['config_no_write'] == 'good' ? 'Ja' : 'Nee') . '
                </div>
            </p>
            </fieldset>
        ';
    
    if ($nStep == 1) {
        echo '<a href="index.php?step=2">Volgende stap</a>';
    }
    
    echo '</div>';
}

if ($step == 2) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {       
        // Check if sql Data has been enterd! Password can be empty so we allow that
        if (!isset($_POST['sql_username']) or empty($_POST['sql_username'])) {
            $errorArray[] = 'Er is geen username opgegeven!';
        }

        if (!isset($_POST['sql_database']) OR empty($_POST['sql_database'])) {
            $errorArray[] = 'Er is geen database opgegeven!';
        }

        if (!isset($_POST['sql_hostname']) OR empty($_POST['sql_hostname'])) {
            $errorArray[] = 'Er is geen hostname opgegeven!';
        }

        // Sql data is filled check if we can connect to the database
        if (count($errorArray) < 1) {
            $checkCon = mysqli_connect($_POST['sql_hostname'], $_POST['sql_username'], (isset($_POST['sql_password']) AND !empty($_POST['sql_password'])) ? $_POST['sql_password'] : '');
            if (!$checkCon) {
                $errorArray[] = 'Er kan geen verbinding worden gemaakt met de SQL server / database!';
            }
        }

        // Check if root data is filled
        if (!isset($_POST['root_url']) OR empty($_POST['root_url'])) {
            $errorArray[] = 'Er is geen website url opgegeven!';
        }

        if (!isset($_POST['root_email']) OR empty($_POST['root_email'])) {
            $errorArray[] = 'Er is geen algemeen email adres opgegeven!';
        }

        if (!isset($_POST['root_website']) OR empty($_POST['root_website'])) {
            $errorArray[] = 'Er is geen website naam opgegeven!';
        }
        
        // Check if admin data is filled
        if (!isset($_POST['admin_name']) OR empty($_POST['admin_name'])) {
            $errorArray[] = 'er is geen admin login naam opgegeven';
        }

        if (!isset($_POST['admin_password']) OR empty($_POST['admin_password'])) {
            $errorArray[] = 'er is geen admin wachtwoord opgegeven!';
        }
        elseif (!isset($_POST['admin_password_verify']) OR empty($_POST['admin_password_verify'])) {
            $errorArray[] = 'er is geen admin verificatie wachtwoord opgegeven!';
        } else {
            if ($_POST['admin_password'] != $_POST['admin_password_verify']) {
                $errorArray[] = 'Wachtwoorden komen niet overeen!';
            }
        }

        if (!isset($_POST['admin_email']) OR empty($_POST['admin_email'])) {
            $errorArray[] = 'Er is geen admin email adres opgegeven!';
        }

        // Check if errors found if so show them to the user :-)!
        if (count($errorArray) > 0) {
            foreach ($errorArray AS $error) {
                $errorOutput .= $error . '<br />';
            }
        } else {
            // Write config file
            if ($file = fopen('../config.inc.php', 'r+')) {
                $fileContent = "
<?php
/*
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */

DEFINE('SQL_HOSTNAME', '%hostname%');
DEFINE('SQL_USERNAME', '%username%');
DEFINE('SQL_PASSWORD', '%password%');
DEFINE('SQL_DATABASE', '%database%');

DEFINE('ROOT_URL', '%url%');
DEFINE('ROOT_EMAIL', '%email%');

DEFINE('WEBSITE_NAME', '%name%');";
                
                
                $fileContent = str_replace('%username%', $_POST['sql_username'], $fileContent);
                $fileContent = str_replace('%hostname%', $_POST['sql_hostname'], $fileContent);
                $fileContent = str_replace('%password%', $_POST['sql_password'], $fileContent);
                $fileContent = str_replace('%database%', $_POST['sql_database'], $fileContent);
                $fileContent = str_replace('%url%', $_POST['root_url'], $fileContent);
                $fileContent = str_replace('%email%', $_POST['root_email'], $fileContent);
                $fileContent = str_replace('%name%', $_POST['root_website'], $fileContent);
                
                fwrite($file, $fileContent);
                
            }
            else {
                echo '<div class="melding bad small icon">config.inc.php niet schrijfbaar!</div>';
            }
            
            // check if database exist if not create it
            if (!mysqli_select_db($checkCon, $_POST['sql_database'])) {
                
                // database doesnt exist create it
                mysqli_query('CREATE DATABASE IF NOT EXISTS `' . $_POST['sql_database'] . '` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;');
                mysqli_select_db($checkCon, $_POST['sql_database']);
            }
            
            // and now insert le sql
            
            // clans table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `clans` (
                                    `clan_id` int(11) NOT NULL AUTO_INCREMENT,
                                    `clan_name` varchar(200) NOT NULL,
                                    `clan_owner_id` int(11) NOT NULL,
                                    `clan_type` int(11) NOT NULL,
                                    `clan_clicks` int(11) NOT NULL,
                                    `attack_power` int(11) NOT NULL,
                                    `defence_power` int(11) NOT NULL,
                                    `cash` int(11) NOT NULL DEFAULT '0',
                                    `bank` int(11) NOT NULL DEFAULT '0',
                                    `bankleft` int(11) NOT NULL DEFAULT '10',
                                    `clicks_today` int(11) NOT NULL DEFAULT '0',
                                    PRIMARY KEY (`clan_id`)
                                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");

            // clan items table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `clan_items` (
                                    `clan_id` int(11) NOT NULL,
                                    `item_id` int(11) NOT NULL,
                                    `item_count` int(11) NOT NULL,
                                    KEY `clan_id` (`clan_id`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
            
            // clicks table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `clicks` (
                                    `userid` int(11) NOT NULL,
                                    `clicked_ip` varchar(50) NOT NULL
                                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
            
            // items table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `items` (
                                    `item_id` int(11) NOT NULL AUTO_INCREMENT,
                                    `item_name` varchar(200) NOT NULL,
                                    `item_attack_power` int(11) NOT NULL,
                                    `item_defence_power` int(11) NOT NULL,
                                    `item_area` int(11) NOT NULL,
                                    `item_costs` int(11) NOT NULL,
                                    `item_sell` int(11) NOT NULL,
                                    PRIMARY KEY (`item_id`)
                                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;");
            
            // fill the items table
            mysqli_query($checkCon, "INSERT INTO `items` (`item_id`, `item_name`, `item_attack_power`, `item_defence_power`, `item_area`, `item_costs`, `item_sell`) VALUES
                                (1, 'Mes', 20, 20, 1, 2000, 1500),
                                (2, 'Walter P99', 50, 50, 1, 5000, 3000),
                                (3, 'Uzi', 65, 65, 1, 6000, 4000),
                                (4, 'Flashbang', 110, 110, 1, 10000, 7500),
                                (5, 'Granaat', 170, 170, 1, 15000, 10000),
                                (6, 'MP5k', 80, 80, 1, 7500, 5000),
                                (7, 'Shotgun', 200, 200, 1, 17500, 10000),
                                (8, 'G36C', 270, 270, 1, 22500, 15000),
                                (9, 'SIG 552', 310, 310, 1, 25000, 20000),
                                (10, 'Ak47', 390, 390, 1, 30000, 20000),
                                (11, 'Ak Beta', 570, 570, 1, 40000, 20000),
                                (12, 'Scherpschut geweer', 670, 670, 1, 45000, 25000),
                                (13, 'M4', 780, 780, 1, 50000, 35000),
                                (14, 'Granaat Lanceerder', 1030, 1030, 1, 60000, 40000),
                                (15, 'Bazooka', 1490, 1490, 1, 75000, 50000),
                                (16, 'Kogelvrij vest', 140, 140, 2, 12500, 8000),
                                (17, 'Bulldog', 0, 30, 3, 2500, 1500),
                                (18, 'Camera', 0, 90, 3, 8000, 4000),
                                (19, 'Hek', 0, 170, 3, 15000, 10000),
                                (20, 'Muur', 0, 240, 3, 20000, 15000),
                                (21, 'Bunker', 0, 470, 3, 35000, 20000),
                                (22, 'Mobieltje', 0, 0, 4, 1000, 500),
                                (23, 'FN P90', 900, 900, 5, 50000, 20000),
                                (24, 'Chip', 400, 400, 6, 25000, 15000),
                                (25, 'Helm', 240, 240, 7, 20000, 10000),
                                (26, 'Politie wagen', 470, 470, 7, 35000, 15000),
                                (27, 'Huis', 0, 0, 8, 25000, 15000),
                                (28, 'Muur', 0, 3000, 8, 50000, 20000),
                                (29, 'Coffeeshop', 0, 0, 9, 90000, 30000),
                                (30, 'Chemie Lab', 0, 0, 10, 90000, 30000),
                                (31, 'Aandeel', 0, 0, 11, 90000, 30000);");
            
            // message table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `messages` (
                                    `message_id` int(11) NOT NULL AUTO_INCREMENT,
                                    `message_read` int(11) NOT NULL DEFAULT '0',
                                    `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `message_from_id` int(11) NOT NULL,
                                    `message_to_id` int(11) NOT NULL,
                                    `message_subject` varchar(250) NOT NULL,
                                    `message_message` text NOT NULL,
                                    `message_deleted_from` int(11) DEFAULT '0',
                                    `message_deleted_to` int(11) NOT NULL DEFAULT '0',
                                    PRIMARY KEY (`message_id`),
                                    KEY `message_id` (`message_id`)
                                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;");
            
            // settings table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `settings` (
                                    `setting_id` int(11) NOT NULL,
                                    `setting_name` varchar(200) NOT NULL,
                                    `setting_value` text NOT NULL,
                                    `setting_extra` varchar(200) NOT NULL,
                                    PRIMARY KEY (`setting_id`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

            // fill the settings table
            mysqli_query($checkCon, "INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_value`, `setting_extra`) VALUES
                                (1, 'rules', 'Om het zo eerlijk en gezellig te houden,zijn er enkele regels waaraan de spelers zich moeten houden,<br>\r\n 	als ze dit niet doen krijgen ze de nodige straf.<br>\r\n	<br>\r\n	<br>\r\n	Dit zijn de regels:<br>\r\n	# Spammen is niet toegestaan.<br>\r\n	# Er wordt niet gedreigd.<br>\r\n	# Mensen met hetzelfde IP worden gereset behalve als hij/zij een verklaarbare reden heeft. (Zeg dit dan direct tegen een Admin, het is je eigen fout als je het niet doet)<br>\r\n	# Het gebruik van proxies, bots, etc. is verboden.<br>\r\n	# Het is niet toegestaan meerdere accounts te hebben om ermee te cheaten. (als wij dit zien word je verwijderd zonder pardon)<br>\r\n	# Scheld geen mensen uit via een sms.<br>\r\n	<br>\r\n	<br>\r\n	Als je wordt betrapt op overtreding van een van regels overleggen de admins wat voor straf je krijgt.<br>\r\n	<br>\r\n	Denk jij dat iemand cheat?<br>\r\n	Stuur dan een berichtje naar een admin en als die persoon inderdaad cheat, dan krijg je een beloning van 10.000! ', ''),
                                (2, 'price', '<strong>1ste   prijs : 2500 Dl''s + Criminal wargame<br></strong>\r\n	2de    prijs : 1500 Dl''s + Dealer Wargame<br>\r\n	3de    Prijs : 1000 Dl''s + 3de wereld oorlog wargame<br>\r\n	Troost Prijs : 750 Dl''s + exofusion Wargame<br>\r\n	<br>\r\n	<strong>( De Troost Prijs gaat naar een willekeurig account )<br></strong>\r\n	Je moet wel een Dutchleader account hebben om de prijzen te winnen.<br>\r\n	Heb je geen dutchleader account maak er dan een aan op www.dutchleader.com<br>\r\n	<strong>Admins doen niet mee!</strong>', '');
                                (3, 'layout', 'begangster', '')");
            
            // temp table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `temp` (
                                    `userid` int(11) DEFAULT NULL,
                                    `area` varchar(200) DEFAULT NULL,
                                    `variable` varchar(200) DEFAULT NULL,
                                    `extra` varchar(200) DEFAULT NULL
                                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
            
            // users table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `users` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `username` varchar(200) NOT NULL,
                                    `password` varchar(250) NOT NULL,
                                    `email` varchar(100) NOT NULL,
                                    `type` int(11) NOT NULL,
                                    `level` int(11) NOT NULL DEFAULT '0',
                                    `session_id` varchar(100) NOT NULL,
                                    `activated` int(11) NOT NULL DEFAULT '0',
                                    `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                    `website` varchar(200) NOT NULL,
                                    `info` text NOT NULL,
                                    `online_time` timestamp NULL,
                                    `attack_power` int(11) NOT NULL,
                                    `defence_power` int(11) NOT NULL,
                                    `clicks` int(11) NOT NULL,
                                    `clicks_today` int(11) NOT NULL,
                                    `bank` int(11) NOT NULL,
                                    `cash` int(11) NOT NULL,
                                    `showonline` int(11) NOT NULL DEFAULT '1',
                                    `protection` int(11) NOT NULL DEFAULT '1',
                                    `hlround` int(11) NOT NULL DEFAULT '1',
                                    `clan_id` int(11) NOT NULL DEFAULT '0',
                                    `clan_level` int(2) NOT NULL DEFAULT '0',
                                    `attacks_won` int(11) NOT NULL DEFAULT '0',
                                    `attacks_lost` int(11) NOT NULL DEFAULT '0',
                                    `bank_left` int(1) NOT NULL DEFAULT '5',
                                    PRIMARY KEY (`id`),
                                    UNIQUE KEY `user_id` (`id`)
                                ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");

            // user items table
            mysqli_query($checkCon, "CREATE TABLE IF NOT EXISTS `user_items` (
                                    `user_id` int(11) NOT NULL,
                                    `item_id` int(11) NOT NULL,
                                    `item_count` int(11) NOT NULL,
                                    KEY `user_id` (`user_id`)
                                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
            
            // Create onlineusers view
            mysqli_query($checkCon, "CREATE VIEW `onlineUsers` AS select 0 AS `showonline`,count(`users`.`username`) AS `Count` from `users` where (((unix_timestamp(now()) - unix_timestamp(`users`.`online_time`)) < 300) and (`users`.`showonline` = 0)) union all select 1 AS `showonline`,count(`users`.`username`) AS `Count` from `users` where (((unix_timestamp(now()) - unix_timestamp(`users`.`online_time`)) < 300) and (`users`.`showonline` = 1)) union all select 2 AS `showonline`,count(`users`.`username`) AS `Count` from `users` where (((unix_timestamp(now()) - unix_timestamp(`users`.`online_time`)) < 300) and (`users`.`level` > 0));");
            
            
            // and now inser the given user data and insert as admin!
            $userSalt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
            $userSalt = sprintf("$2a$%02d$", 10) . $userSalt;

            $userHash = crypt($_POST['admin_password'], $userSalt);
            mysqli_query($checkCon, 'INSERT INTO users (username, password, email, type, activated, level)
                                   VALUES ("' . addslashes($_POST['admin_name']) . '", "' . $userHash . '",
                                           "' . addslashes($_POST['admin_email']) . '", 1,
                                          1, 10)');
        
            
            unset($_POST);
            echo '  <div class="melding good small icon">
                    De installatie is afgerond, vergeet niet de /install folder te verwijderen!
                </div>';
        }
    }
    
    echo '<div class="tabs_paginas" data-persist="true">';
    
    if (count($errorArray) > 0) {
        echo '  <div class="melding bad small icon">
                    ' . $errorOutput .  '
                </div>';
    }
    echo '<form method="post">
            <fieldset>
                <label>SQL hostnaam:</label> 
                <input class="normal" type="text" name="sql_hostname" value="' . (isset($_POST['sql_hostname']) ? $_POST['sql_hostname'] : '') . '">
                
                <label>SQL Database naam:</label> 
                <input class="normal" type="text" name="sql_database" value="' . (isset($_POST['sql_hostname']) ? $_POST['sql_database'] : '') . '">

                <label>SQL gebruikersnaam:</label> 
                <input class="normal" type="text" name="sql_username" value="' . (isset($_POST['sql_hostname']) ? $_POST['sql_username'] : '') . '">

                <label>SQL wachtwoord:</label> 
                <input class="normal" type="password" name="sql_password" value="' . (isset($_POST['sql_hostname']) ? $_POST['sql_password'] : '') . '">
            </fieldset>
            
            <fieldset>
                <label>Website naam:</label> 
                <input class="normal" type="text" name="root_website" value="' . (isset($_POST['sql_hostname']) ? $_POST['root_website'] : '') . '">

                <label>Website email adres:</label> 
                <input class="normal" type="text" name="root_email" value="' . (isset($_POST['sql_hostname']) ? $_POST['root_email'] : '') . '">

                <label>Website URL:</label> 
                <input class="normal" type="text" name="root_url" value="' . (isset($_POST['sql_hostname']) ? $_POST['root_url'] : '') . '">    
            </fieldset>
            
            <fieldset>
                <label>Admin gebruikersnaam:</label> 
                <input class="normal" type="text" name="admin_name" value="' . (isset($_POST['admin_name']) ? $_POST['admin_name'] : '') . '">

                <label>Admin wachtwoord:</label> 
                <input class="normal" type="password" name="admin_password" value="' . (isset($_POST['admin_password']) ? $_POST['admin_password'] : '') . '">

                <label>Admin wachtwoord (herhaal):</label> 
                <input class="normal" type="password" name="admin_password_verify" value="' . (isset($_POST['admin_password_verify']) ? $_POST['admin_password_verify'] : '') . '">
                    
                <label>Admin email adres:</label> 
                <input class="normal" type="text" name="admin_email" value="' . (isset($_POST['admin_email']) ? $_POST['admin_email'] : '') . '"> 
            </fieldset>
            
            <input class="button good small" type="submit" name="submit" value="verstuur">
        </form>';
    
    echo '</div>';
}
if ($step == 3) {
    echo '  <div class="tabs_paginas" data-persist="true">
                <p>De installatie is voltooid, vergeet niet de /install folder te verwijderen van je server!
            </div>';
}
echo '            			
			</div>
			
		    </div><!-- Einde text -->
		</div> <!-- Einde textvak -->
	    
	    <div class="titelfooter"></div>
	    </div> <!-- Einde content margin -->
	</div> <!-- Einde Content -->
            <footer>
                <div id="footer">
                    &copy; Criminals blue - revamped
                </div>
            </footer>

        </div> <!-- Einde wrapper -->
    </body>
</html>';