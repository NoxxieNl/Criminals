<?php /* ------------------------- */

  $OMNILOG				= 1;
  include("_include-config.php");
  if(! check_login()) {
    header("Location: login.php");
    exit;
  }

  mysql_query("UPDATE `[users]` SET `online`=NOW() WHERE `login`='{$data->login}'");

/* ------------------------- */ ?>
<html>


<head>
<title>[( Criminals )]</title>
<link rel="stylesheet" type="text/css" href="<?php echo ($_COOKIE['v'] == 2) ? "css-v2.css" : "css-v1.css"; ?>">

</head>


<body style="background: #136E1D; margin: 0px;">
<table width=100%>
<?php /* ------------------------- */

  if($data->clanlevel >= 7) {
    if(isset($_GET['x'])) {
      print "  <tr><td class=\"subTitle\"><b>Clan war</b></td></tr>\n";
      $dbres				= mysql_query("SELECT *,UNIX_TIMESTAMP(`started`) AS `started`,0 AS `attack`,0 AS `members` FROM `[clans]` WHERE `name`='{$data->clan}'");
      $att				= mysql_fetch_object($dbres);

      $dbres				= mysql_query("SELECT *,UNIX_TIMESTAMP(`started`) AS `started`,0 AS `defence`,0 AS `members` FROM `[clans]` WHERE `name`='{$_GET['x']}'");
      if($def = mysql_fetch_object($dbres)) {
        if($att->started + 24*60*60 > time())
          print "  <tr><td class=\"mainTxt\">{$att->name} staat nog onder bescherming</td></tr>\n";
        else if($def->started + 24*60*60 > time())
          print "  <tr><td class=\"mainTxt\">{$def->name} staat nog onder bescherming</td></tr>\n";
        else if($def->name == $att->name)
          print "  <tr><td class=\"mainTxt\">Je kan je eigen clan niet aanvallen</td></tr>\n";
        else if($def->type == $att->type && $def->type == 3)
          print "  <tr><td class=\"mainTxt\">Agenten mogen elkaar niet aanvallen</td></tr>\n";
        else if(($numattacks = mysql_num_rows(mysql_query("SELECT * FROM `[logs]` WHERE `login`='{$att->name}' AND `person`='{$def->name}' AND FLOOR(UNIX_TIMESTAMP(`time`)/(60*60*24))=FLOOR(UNIX_TIMESTAMP(NOW())/(60*60*24)) AND `area`='clanwar'"))+1) >= 10)
          print "  <tr><td class=\"mainTxt\">{$att->name} heeft {$def->name} al 10x aangevallen vandaag</td></tr>\n";
        else if(mysql_num_rows(mysql_query("SELECT * FROM `[logs]` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`time`) < 10 AND `login`='{$att->name}' AND `area`='clanwar'")) > 0)
          print "  <tr><td class=\"mainTxt\">De clan-members zijn nog moe van de vorige aanval</td></tr>\n";
        else {
          mysql_query("SELECT GET_LOCK('clanattack_{$def->name}',5)");
          $dbres			= mysql_query("SELECT `clicks`,`defence` FROM `[users]` WHERE `clan`='{$def->name}'");
          while($member = mysql_fetch_object($dbres)) {
            $def->defence		+= $member->defence + 5;
            $def->members		+= $member->clicks;
          }
          $def->defence			+= $def->def_lvl1*1500;
          $def->defence			*= $def->members / $def->land;

          $dbres			= mysql_query("SELECT `clicks`,`attack` FROM `[users]` WHERE `clan`='{$att->name}'");
          while($member = mysql_fetch_object($dbres)) {
            $att->attack		+= $member->attack + 5;
            $att->members		+= $member->clicks;
          }
          $att->attack			*= $att->members / $def->land;

          $result			= ($att->attack*rand(90,115) >= $def->defence*rand(90,115)) ? 1 : 0;
          $money			= ($result == 1) ? (int)($def->cash*rand(round(15/(0.5*$numattacks)),round(30/(0.5*$numattacks)))/100) : (int)($att->cash*rand(round(12.5/(0.5*$numattacks)),round(15/(0.5*$numattacks)))/100);
          $land				= ($result == 1) ? (int)($def->land*rand(round(5/(0.5*$numattacks)),round(15/(0.5*$numattacks)))/100) : 0;
          $text				= ($result == 1) ? Array("{$att->name} heeft gewonnen!","{$att->name} heeft \$$money,- gestolen") : Array("{$def->name} heeft gewonnen...","Er is \$$money,- gestolen");

          if($result == 1) {
            $att->attwins++;
            $def->deflosses++;
          }
          else {
            $att->attlosses++;
            $def->defwins++;
          }

          $att->cash			= ($result == 1) ? $att->cash + $money : $att->cash - $money;
          $att->land			= ($result == 1) ? $att->land + $land  : $att->land;
          mysql_query("UPDATE `[clans]` SET `cash`={$att->cash},`attwins`={$att->attwins},`attlosses`={$att->attlosses},`land`={$att->land} WHERE `name`='{$att->name}'");

          $def->cash			= ($result == 1) ? $def->cash - $money : $def->cash + $money;
          $def->land			= ($result == 1) ? $def->land - $land  : $def->land;
          if($def->homes*100 + ($def->type == 3 ? 0 : $def->money_lvl1*100) + $def->def_lvl1*25 > $def->land) {
            $buildings			|= ($def->homes      > 0) ? 0x01 : 0x00;
            $buildings			|= ($def->money_lvl1 > 0) ? 0x02 : 0x00;
            $buildings			|= ($def->def_lvl1   > 0) ? 0x03 : 0x00;

            $lostbuildings		= 0;
            $landshort			= ($def->homes*100 + ($def->type == 3 ? 0 : $def->money_lvl1*100) + $def->def_lvl1*25) - $def->land;
            while($landshort > 0 && $buildings != 0) {
              if(($landshort <= 25 || !($buildings & 0x04)) && $def->def_lvl1 > 0) {
                $landshort		-= 25;
                $def->def_lvl1--;
                $lostbuildings		= $lostbuildings | 0x04;
                $buildings		= ($def->def_lvl1 <= 0) ? $buildings & 0x03 : $buildings;
              }
              else if(($landshort <= 100 || !($buildings & 0x02)) && $def->money_lvl1 > 0) {
                $landshort		-= 100;
                $def->money_lvl1--;
                $lostbuildings		= $lostbuildings | 0x02;
                $buildings		= ($def->money_lvl1 <= 0) ? $buildings & 0x05 : $buildings;
              }
              else if($def->homes > 0) {
                $landshort		-= 100;
                $def->homes--;
                $lostbuildings		= $lostbuildings | 0x01;
                $buildings		= ($def->homes <= 0) ? 0x00 : $buildings;
              }
            }
          }

          if($lostbuildings != 0) {
            if($buildings == 0) {
              mysql_query("DELETE FROM `[clans]` WHERE `name`='{$def->name}'");
              $dbres			= mysql_query("SELECT `login` FROM `[users]` WHERE `clan`='{$def->name}'");
              while($member = mysql_fetch_object($dbres)) {
                mysql_query("UPDATE `[users]` SET `clan`='',`clanlevel`=0 WHERE `login`='{$member->login}'");
                mysql_query("INSERT INTO `[messages]`(`time`,`from`,`to`,`subject`,`message`,`outbox`) values(NOW(),'** Criminals **','{$member->login}','Clan news: {$def->name}','Na een aanval door {$att->name} is {$def->name} gevallen...',0)");
              }
            }
            else {
              if($lostbuildings & 0x01 && ($max = mysql_num_rows(mysql_query("SELECT `id` FROM `[users]` WHERE `clan`='{$def->name}'")) - $def->homes*5) > 0) {
                $dbres			= mysql_query("SELECT `login`,`clanlevel`,(`attack`+`defence`)/2+`clicks`*5 AS `power` FROM `[users]` WHERE `clan`='{$def->name}' ORDER BY `clanlevel`,`power` LIMIT 0,$max");
                while($member = mysql_fetch_object($dbres))
                  mysql_query("UPDATE `[users]` SET `clan`='',`clanlevel`=0 WHERE `login`='{$member->login}'");
              }

              mysql_query("UPDATE `[clans]` SET `homes`={$def->homes},`money_lvl1`={$def->money_lvl1},`def_lvl1`={$def->def_lvl1} WHERE `name`='{$def->name}'");
            }
          }

          mysql_query("UPDATE `[clans]` SET `cash`={$def->cash},`defwins`={$def->defwins},`deflosses`={$def->deflosses},`land`={$def->land} WHERE `name`='{$def->name}'");
          mysql_query("INSERT INTO `[logs]`(`time`,`login`,`person`,`code`,`area`) values(NOW(),'{$att->name}','{$def->name}',((($money << 10)|$land) << 1)|$result,'clanwar')");

          $type				= Array("","junkies","klonen","agenten");
          print <<<ENDHTML
  <tr><td class="mainTxt">
	{$att->name} valt {$def->name} aan:<br>
	{$att->members} {$type[$att->type]} tegen {$def->members} {$type[$def->type]}<br>
	{$text[0]}<br>
	{$text[1]}
ENDHTML;
          if($result == 1)
            print "	en ${land}m<sup>2</sup> veroverd!\n";
          print "  </td></tr>\n";
        }
        mysql_query("SELECT RELEASE_LOCK('clanattack_{$def->name}')");
      }
      else
        print "  <tr><td class=\"mainTxt\">'{$_GET['x']}' is geen clan</td></tr>\n";
    }
    else {
          print <<<ENDHTML
  <tr><td class="subTitle"><b>{$data->clan}: War room</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="clan.php?p=list">Clan list</a><br>
  </td></tr>
ENDHTML;
   }
 }

/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>