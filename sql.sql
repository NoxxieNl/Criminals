SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `criminals` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `criminals`;

CREATE TABLE IF NOT EXISTS `clans` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `clan_items` (
  `clan_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_count` int(11) NOT NULL,
  KEY `clan_id` (`clan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `clicks` (
  `userid` int(11) NOT NULL,
  `clicked_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_attack_power` int(11) NOT NULL,
  `item_defence_power` int(11) NOT NULL,
  `item_area` int(11) NOT NULL,
  `item_costs` int(11) NOT NULL,
  `item_sell` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

INSERT INTO `items` (`item_id`, `item_name`, `item_attack_power`, `item_defence_power`, `item_area`, `item_costs`, `item_sell`) VALUES
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
(31, 'Aandeel', 0, 0, 11, 90000, 30000);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;


CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(200) NOT NULL,
  `setting_value` text NOT NULL,
  `setting_extra` varchar(200) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_value`, `setting_extra`) VALUES
(1, 'rules', 'Om het zo eerlijk en gezellig te houden,zijn er enkele regels waaraan de spelers zich moeten houden,<br>\r\n 	als ze dit niet doen krijgen ze de nodige straf.<br>\r\n	<br>\r\n	<br>\r\n	Dit zijn de regels:<br>\r\n	# Spammen is niet toegestaan.<br>\r\n	# Er wordt niet gedreigd.<br>\r\n	# Mensen met hetzelfde IP worden gereset behalve als hij/zij een verklaarbare reden heeft. (Zeg dit dan direct tegen een Admin, het is je eigen fout als je het niet doet)<br>\r\n	# Het gebruik van proxies, bots, etc. is verboden.<br>\r\n	# Het is niet toegestaan meerdere accounts te hebben om ermee te cheaten. (als wij dit zien word je verwijderd zonder pardon)<br>\r\n	# Scheld geen mensen uit via een sms.<br>\r\n	<br>\r\n	<br>\r\n	Als je wordt betrapt op overtreding van een van regels overleggen de admins wat voor straf je krijgt.<br>\r\n	<br>\r\n	Denk jij dat iemand cheat?<br>\r\n	Stuur dan een berichtje naar een admin en als die persoon inderdaad cheat, dan krijg je een beloning van 10.000! ', ''),
(2, 'price', '<strong>1ste   prijs : 2500 Dl''s + Criminal wargame<br></strong>\r\n	2de    prijs : 1500 Dl''s + Dealer Wargame<br>\r\n	3de    Prijs : 1000 Dl''s + 3de wereld oorlog wargame<br>\r\n	Troost Prijs : 750 Dl''s + exofusion Wargame<br>\r\n	<br>\r\n	<strong>( De Troost Prijs gaat naar een willekeurig account )<br></strong>\r\n	Je moet wel een Dutchleader account hebben om de prijzen te winnen.<br>\r\n	Heb je geen dutchleader account maak er dan een aan op www.dutchleader.com<br>\r\n	<strong>Admins doen niet mee!</strong>', '');
(3, 'layout', 'begangster', '');

CREATE TABLE IF NOT EXISTS `temp` (
  `userid` int(11) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `variable` varchar(200) DEFAULT NULL,
  `extra` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `user_items` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_count` int(11) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE VIEW `onlineUsers` AS select 0 AS `showonline`,count(`users`.`username`) AS `Count` from `users` where (((unix_timestamp(now()) - unix_timestamp(`users`.`online_time`)) < 300) and (`users`.`showonline` = 0)) union all select 1 AS `showonline`,count(`users`.`username`) AS `Count` from `users` where (((unix_timestamp(now()) - unix_timestamp(`users`.`online_time`)) < 300) and (`users`.`showonline` = 1)) union all select 2 AS `showonline`,count(`users`.`username`) AS `Count` from `users` where (((unix_timestamp(now()) - unix_timestamp(`users`.`online_time`)) < 300) and (`users`.`level` > 0));

CREATE TABLE IF NOT EXISTS `ranks` (
 `id` int(10) NOT NULL,
 `name` varchar(40) NOT NULL,
 `power_low` int(11) NOT NULL,
 `power_high` int(11) NOT NULL,
 KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `ranks` (`id`, `name`, `power_low`, `power_high`) VALUES
(1, 'Zwerver', 0, 100),
(2, 'Bedelaar', 100, 700),
(3, 'Crimineel', 700, 1300),
(4, 'Zakkenroller', 1300, 2000),
(5, 'Tuig', 2000, 2800),
(6, 'Geweldadig', 2800, 3700),
(7, 'Autodief', 3700, 4700),
(8, 'Drugsdealer', 4700, 5800),
(9, 'Gangster', 5800, 7000),
(10, 'Overvaller', 7000, 8800),
(11, 'Bendeleider', 8800, 12000),
(12, 'Godfather', 12000, 999999999);

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `building_land_id` int(11) NOT NULL,
  `building_name` varchar(200) NOT NULL,
  `building_owner_id` int(11) NOT NULL,
  `building_config` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `buildings` (`building_id`, `building_land_id`, `building_name`, `building_owner_id`, `building_config`) VALUES
(1, 6, 'Vliegveld', 1, '{\"costs\":2000}'),
(2, 1, 'Vliegveld', 1, '{\"costs\":2000}'),
(3, 2, 'Vliegveld', 1, '{\"costs\":2000}'),
(4, 3, 'Vliegveld', 1, '{\"costs\":2000}'),
(5, 4, 'Vliegveld', 1, '{\"costs\":2000}'),
(6, 5, 'Vliegveld', 1, '{\"costs\":2000}'),
(7, 2, 'Vliegveld', 7, '{\"costs\":2000}');

--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`building_id`),
  ADD UNIQUE KEY `building_id` (`building_id`);

--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
