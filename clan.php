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

  if(isset($_GET['x'])) {
    $dbres				= mysql_query("SELECT * FROM `[clans]` WHERE `name`='{$_GET['x']}'");
    if($clan = mysql_fetch_object($dbres)) {
      print "  <tr><td class=\"subTitle\"><b>{$clan->name}</b></td></tr>\n";
      print "  <tr><td class=\"mainTxt\"><i>{$clan->info}</i></td></tr>\n";
      print "  <tr><td class=\"mainTxt\"><table width=100%>\n";
      print "	<tr><td width=100>Owner:</td>  <td><a href=\"profile.php?x={$clan->owner}\">{$clan->owner}</a></td></tr>\n";

      $dbres				= mysql_query("SELECT `attack`,`defence`,`clicks`,`type` FROM `[users]` WHERE `clan`='{$clan->name}'");
      print "	<tr><td width=100>Members:</td>  <td>". (mysql_num_rows($dbres)) ."</td></tr>\n";
      while($member = mysql_fetch_object($dbres))
        $power				+= round(($member->attack+$member->defence)/2+$member->clicks*5);
      $power				+= ($clan->def_lvl1*1500)/2;
      print "	<tr><td width=100>Power:</td>  <td>$power</td></tr>\n";

      print "	<tr><td width=100>Land:</td>  <td>{$clan->land}m<sup>2</sup></td></tr>\n";
      print "	<tr><td width=100>Contant:</td>  <td>{$clan->cash}</td></tr>\n";
      print "	<tr><td width=100>Bank:</td>  <td>{$clan->bank}</td></tr>\n";
      print "  </table></td></tr>\n";
      print "  <tr><td><table width=100%>\n";
      $dbres				= mysql_query("SELECT `name`,`url` FROM `[weapons]` WHERE `area`=8 OR `area`=8+{$clan->type} ORDER BY `area`,`costs`");
      while($weapon = mysql_fetch_object($dbres)) {
        $name				= $weapon->name;
        $type				= Array("Huis"		=> "homes",
						"Muur"		=> "def_lvl1",
						"Coffeeshop"	=> "money_lvl1",
						"Chemie Lab"	=> "money_lvl1",
						"Aandeel"	=> "money_lvl1");
        $type				= $type[$weapon->name];
        print "  <tr><td class=\"mainTxt\"><table cellpadding=0 cellspacing=0><tr><td width=200 align=\"center\">{$weapon->name}<br><img src=\"images/{$weapon->url}.gif\" height=75 width=100></td>  <td>". ($clan->{"$type"}) ."</td></tr></table></td></tr>\n";
        $lastarea			= $weapon->area;
      }
      print "  <tr><td align=\"right\"><table><tr><td class=\"mainTxt\" width=100 align=\"center\"><a href=\"clan.php?p=join&clan={$clan->name}\">Join</a></td>";
      if($data->clanlevel >= 7)
        print "<td class=\"mainTxt\" width=100 align=\"center\"><a href=\"clanwar.php?x={$clan->name}\">Attack</a></td>";
      print "</tr></table></td></tr>\n  <tr><td><br></td></tr>\n\n";

      print <<<ENDHTML
  <tr><td><table width=100%>
  <tr><td align="center" class="subTitle" width=15><b>#</b></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center"><a href="clan.php?x={$clan->name}&s=login"><b>Nick</a></b></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=125><a href="clan.php?x={$clan->name}&s=rank"><b>Rank</b></a></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=100><a href="clan.php?x={$clan->name}&s=money"><b>Geld</b></a></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=75><a href="clan.php?x={$clan->name}&s=power"><b>Power</b></a></td></tr>
ENDHTML;

      $begin				= ($_GET['p'] >= 0) ? $_GET['p']*30 : 0;
      if($_GET['s'] == "login")
        $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`bank`,`cash`,`clanlevel`,`type` FROM `[users]` WHERE `clan`='{$clan->name}' AND `activated`=1 ORDER BY `login` LIMIT $begin,30");
      else if($_GET['s'] == "money")
        $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`bank`,`cash`,`clanlevel`,`type` FROM `[users]` WHERE `clan`='{$clan->name}' AND `activated`=1 ORDER BY `cash`+`bank` DESC,`login` ASC LIMIT $begin,30");
      else if($_GET['s'] == "power")
         $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`bank`,`cash`,`clanlevel`,`type` FROM `[users]` WHERE `clan`='{$clan->name}' AND `activated`=1 ORDER BY (`attack`+`defence`)/2+`clicks`*5 DESC,`login` ASC LIMIT $begin,30");
      else
        $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`bank`,`cash`,`clanlevel`,`type` FROM `[users]` WHERE `clan`='{$clan->name}' AND `activated`=1 ORDER BY `clanlevel` DESC,`login` ASC LIMIT $begin,30");

      for($j=$begin+1; $member = mysql_fetch_object($dbres); $j++) {
        $rank				= Array("","Member","Recruiter","","","","Manager","Generaal","Leader","Owner");
        $rank				= $rank[$member->clanlevel];
        $power				= round(($member->attack+$member->defence)/2+$member->clicks*5);
        $money				= $member->cash+$member->bank;

        print <<<ENDHTML
  <tr><td align="center" class="mainTxt">$j</td>
	<td class="mainTxt"><a href="profile.php?x={$member->login}">{$member->login}</a></td>
	<td align="center" class="mainTxt">$rank</td>
	<td align="center" class="mainTxt">\$$money</td>
	<td align="center" class="mainTxt">$power</td></tr>

ENDHTML;
      }

      $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE `clan`='{$clan->name}' AND `activated`=1");
      print "</table>\n\n<table width=100%>\n  <tr><td class=\"mainTxt\" align=\"center\">";
      if(mysql_num_rows($dbres) <= 30)
        print "&#60; 1 &#62;</td></tr></table>\n";
      else {
        if($begin/30 == 0)
          print "&#60;&#60; ";
        else
          print "<a href=\"clan.php?x={$clan->name}&s={$_GET['s']}&p=". ($begin/30-1) ."\">&#60;&#60;</a> ";

        for($i=0; $i<mysql_num_rows($dbres)/30; $i++) {
          print "<a href=\"clan.php?x={$clan->name}&s={$_GET['s']}&p=$i\">". ($i+1) ."</a> ";
        }

        if($begin+30 >= mysql_num_rows($dbres))
          print "&#62;&#62; ";
        else
          print "<a href=\"clan.php?x={$clan->name}&s={$_GET['s']}&p=". ($begin/30+1) ."\">&#62;&#62;</a>";

        print "  </table></td></tr>\n";
      }
    }
  }
  else if($_GET['p'] == "list") {
    print "  <tr><td><table width=100%>\n";
    print "	<tr><td class=\"subTitle\" style=\"letter-spacing: normal;\"><b>Clan</b></td>  <td class=\"subTitle\" style=\"letter-spacing: normal;\" width=125><b>Owner</b></td>  <td class=\"subTitle\" width=75 style=\"letter-spacing: normal;\"><b>Members</b></td>  <td class=\"subTitle\" width=75 style=\"letter-spacing: normal;\"><b>Power</b></td></tr>\n";
    $dbres				= mysql_query("SELECT `name`,`owner`,`type`,`def_lvl1` FROM `[clans]` ORDER BY `type`");
    while($clan = mysql_fetch_object($dbres)) {
      $power				= 0;
      $dbres2				= mysql_query("SELECT `attack`,`defence`,`clicks`,`type` FROM `[users]` WHERE `clan`='{$clan->name}'");
      while($member = mysql_fetch_object($dbres2))
        $power				+= round(($member->attack+$member->defence)/2+$member->clicks*5);
      $power				+= ($clan->def_lvl1*1500)/2;

      $clanpower[$clan->type][$clan->name] = $power;
    }

    $lasttype				= 1;
    foreach($clanpower as $type => $info) {
      if($type != $lasttype)
        print "  <tr><td><br></td></tr>\n";

      arsort($info);
      foreach($info as $name => $power) {
        $dbres				= mysql_query("SELECT `name`,`owner` FROM `[clans]` WHERE `name`='$name'");
        $clan					= mysql_fetch_object($dbres);
        $dbres			= mysql_query("SELECT `id` FROM `[users]` WHERE `clan`='$name'");
        $nummembers				= mysql_num_rows($dbres);
        print "	<tr><td class=\"mainTxt\"><a href=\"?x=$name\">$name</a></td>  <td class=\"mainTxt\" width=125><a href=\"profile.php?x={$clan->owner}\">{$clan->owner}</a></td>  <td class=\"mainTxt\" align=\"center\" width=75>$nummembers</td>  <td class=\"mainTxt\" align=\"right\" width=75>$power&nbsp;</td>";
        if($data->clanlevel >= 7)
          print "  <td align=\"center\" class=\"mainTxt\" width=75><a href=\"clanwar.php?x=$name\">Attack</a></td></tr>\n";
        else
          print "</tr>\n";
        $lasttype				= $type;
      }
    }
    print "  </table></td></tr>\n";
  }
  else if($_GET['p'] == "join") {
    if($data->clanlevel == 0) {
      print "  <tr><td class=\"subTitle\"><b>Join clan</b></td></tr>\n";
      if(isset($_POST['clan'])) {
        $clan					= substr($_POST['clan'],0,32);
        $dbres					= mysql_query("SELECT `name`,`owner`,`type` FROM `[clans]` WHERE `name`='{$_POST['clan']}'");
        if($clan = mysql_fetch_object($dbres)) {
          if($clan->type == $data->type) {
            $data->clan				= "{$clan->name}-[recruit]";
            mysql_query("UPDATE `[users]` SET `clan`='{$clan->name}-[recruit]' WHERE `login`='{$data->login}'");
            print "  <tr><td class=\"mainTxt\">Je hebt je aangemeld bij {$clan->name}</td></tr>\n";
          }
          else {
            $type				= Array("","drugsdealers","wetenschappers","agenten");
            $type				= $type[$clan->type];
            print "  <tr><td class=\"mainTxt\">Alleen $type kunnen zich aanmelden bij {$clan->name}</td></tr>\n";
          }
        }
        else
          print "  <tr><td class=\"mainTxt\">Die clan bestaat niet</td></tr>\n";
      }
      print "  <tr><td class=\"mainTxt\" align=\"center\"><form method=\"post\">Clan: <input type=\"text\" name=\"clan\" value=\"{$_GET['clan']}\" maxlength=32> <input type=\"submit\" value=\"Meld aan\"></td></tr>\n";
    }
    else
      print "  <tr><td class=\"mainTxt\">Je zit al in een clan</td></tr>\n";
  }
  else if($_GET['p'] == "new" && $data->level & 0x01 && $data->clanlevel == 0) {
    print "  <tr><td class=\"subTitle\"><b>Nieuwe clan</b></td></tr>\n";
    if(isset($_POST['name'])) {
      $_POST['name']				= substr($_POST['name'],0,16);
      if(preg_match('/^[A-Za-z0-9_\- ]+$/',$_POST['name'])) {
        $dbres					= mysql_query("SELECT `name` FROM `[clans]` WHERE `name`='{$_POST['name']}'");
        if(mysql_num_rows($dbres) == 0) {
          $dbres				= mysql_query("SELECT `land` FROM `[clans]`");
          $land					= 0;
          while($clan = mysql_fetch_object($dbres))
            $land				+= $clan->land;

          if(1000000 - $land >= 300) {
            $data->clan				= $_POST['name'];
            $data->clanlevel			= 9;
            mysql_query("UPDATE `[users]` SET `clan`='{$_POST['name']}',`clanlevel`=9 WHERE `login`='{$data->login}'");
            mysql_query("INSERT INTO `[clans]`(`name`,`owner`,`started`,`type`) values('{$_POST['name']}','{$data->login}',NOW(),$data->type)");
            print "  <tr><td class=\"mainTxt\">De clan is aangemaakt</td></tr>\n<script language=\"javascript\">\nsetTimeout(\"parent.window.location.reload()\",1000)\n</script>\n";
          }
          else
            print "  <tr><td class=\"mainTxt\">Er is niet genoeg grond om een clan te stichten</td></tr>\n";
        }
        else
          print "  <tr><td class=\"mainTxt\">Er is al een clan met die naam</td></tr>\n";
      }
      else
        print "  <tr><td class=\"mainTxt\">Er mogen alleen letters, nummers, _ - en spaties in de clan-name zitten</td></tr>\n";
    }
    print "  <tr><td class=\"mainTxt\" align=\"center\"><br><form method=\"post\">Naam: <input type=\"text\" name=\"name\" value=\"{$_POST['name']}\" maxlength=16> <input type=\"submit\" value=\"Ok\" style=\"width: 100\"></form><br></td></tr>\n";
  }
  else if($_GET['p'] == "quit" && $data->clanlevel > 0 && $data->clanlevel < 9) {
    print "  <tr><td class=\"subTitle\"><b>Stap uit de clan</b></td></tr>\n";
    if(isset($_POST['quit'])) {
      $data->clan				= "";
      $data->clanlevel				= 0;
      mysql_query("UPDATE `[users]` SET `clan`='',`clanlevel`=0 WHERE `login`='{$data->login}'");
      print <<<ENDHTML
  <tr><td class="mainTxt">Je bent uit de clan gestapt</td></tr>
<script language="javascript">
setTimeout("parent.window.location.reload()",2000);
</script>
ENDHTML;
    }
    else if(isset($_POST['cancel'])) {
      print <<<ENDHTML
<script language="javascript">
document.location = "hq.php";
</script>
ENDHTML;
    }
    else {
      print <<<ENDHTML
  <tr><td class="mainTxt" align="center"><form method="post">
	Weet je zeker dat je uit de clan wilt stappen?<br><br>
	<input type="submit" name="quit" value="Ja" style="width: 100px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="cancel" value="Nee" style="width: 100px;">
  </form></td></tr>
ENDHTML;
    }
  }
  else if($_GET['p'] == "delete" && $data->clanlevel == 9) {
    print "  <tr><td class=\"subTitle\"><b>Delete clan</b></td></tr>\n";
    if(isset($_POST['delete'])) {
      $dbres					= mysql_query("SELECT `login` FROM `[users]` WHERE `clan`='{$data->clan}' OR `clan`='{$data->clan}-[recruit]'");
      while($member = mysql_fetch_object($dbres))
      mysql_query("UPDATE `[users]` SET `clan`='',`clanlevel`=0 WHERE `clan`='{$data->clan}' OR `clan`='{$data->clan}-[recruit]'");
      mysql_query("DELETE FROM `[clans]` WHERE `name`='{$data->clan}'");
      $data->clan				= "";
      $data->clanlevel				= 0;
      print <<<ENDHTML
  <tr><td class="mainTxt">De clan is opgeheven</td></tr>
<script language="javascript">
setTimeout("parent.window.location.reload()",2000);
</script>
ENDHTML;
    }
    else if(isset($_POST['cancel'])) {
      print <<<ENDHTML
<script language="javascript">
document.location = "hq.php";
</script>
ENDHTML;
    }
    else {
      print <<<ENDHTML
  <tr><td class="mainTxt" align="center"><form method="post">
	Weet je zeker dat je de clan op wilt heffen?<br><br>
	<input type="submit" name="delete" value="Ja" style="width: 100px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="cancel" value="Nee" style="width: 100px;">
  </form></td></tr>
ENDHTML;
    }
  }

/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>