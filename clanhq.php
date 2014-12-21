<?php /* ------------------------- */

  $_GET['_clan']			= $data->clan;
  $OMNILOG				= 1;
  include("_include-config.php");
  if(! check_login()) {
    header("Location: login.php");
    exit;
  }

  if($data->clanlevel == 9) {
    if(isset($_POST['change_owner']) && $_POST['owner'] != $data->login) {
      $dbres			= mysql_query("SELECT `login`,`level`,`clan` FROM `[users]` WHERE `login`='{$_POST['owner']}'");
      if(($owner = mysql_fetch_object($dbres)) && $owner->clan == $data->clan && $owner->level & 0x01) {
        mysql_query("UPDATE `[users]` SET `clanlevel`=1 WHERE `login`='{$data->login}'");
        mysql_query("UPDATE `[users]` SET `clanlevel`=9 WHERE `login`='{$owner->login}'");
        mysql_query("UPDATE `[clans]` SET `owner`='{$owner->login}' WHERE `name`='{$data->clan}'");
        header("Location: /criminals/clan.php?x={$data->clan}\n");
      }
    }
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

  if($_GET['p'] == "recruits" && ($data->clanlevel >= 8 || $data->clanlevel == 2)) {
    print "  <tr><td class=\"subTitle\"><b>{$data->clan}: Aanmeldingen</b></td></tr>\n";
    $dbres				= mysql_query("SELECT `homes` FROM `[clans]` WHERE `name`='{$data->clan}'");
    $clan				= mysql_fetch_object($dbres);

    $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE `clan`='{$data->clan}'");
    $members				= mysql_num_rows($dbres);
    $maxrecruits			= $clan->homes*5 - $members;

    if(isset($_POST['recruit'])) {
      $dbres				= mysql_query("SELECT `login` FROM `[users]` WHERE `clan`='{$data->clan}-[recruit]'");
      while($recruit = mysql_fetch_object($dbres)) {
        if(isset($_POST[$recruit->login]) && $_POST[$recruit->login] == 1 && $maxrecruits-- > 0)
          mysql_query("UPDATE `[users]` SET `clan`='{$data->clan}',`clanlevel`=1 WHERE `login`='{$recruit->login}'");
        else if(isset($_POST[$recruit->login]) && $_POST[$recruit->login] == 0)
          mysql_query("UPDATE `[users]` SET `clan`='',`clanlevel`=0 WHERE `login`='{$recruit->login}'");
      }
    }

    print "  <tr><td class=\"mainTxt\">Je kunt nog <b>$maxrecruits</b> mensen aannemen</td></tr>\n";
    print "  <tr><td><form method=\"post\"><table width=100%>\n";
    print <<<ENDHTML
	<tr><td class="subTitle" style="letter-spacing: normal;" align="center"><a href="clanhq.php?p=recruits&s=login"><b>Nickname</a></b></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=75><a href="clanhq.php?p=recruits&s=power"><b>Power</b></a></td></tr>
ENDHTML;

    if($_GET['s'] == "power")
      $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`type` FROM `[users]` WHERE `clan`='{$data->clan}-[recruit]' ORDER BY (`attack`+`defence`)/2+`clicks`*5");
    else
      $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`type` FROM `[users]` WHERE `clan`='{$data->clan}-[recruit]' ORDER BY `login`");
    while($recruit = mysql_fetch_object($dbres)) {
      $power				= round(($recruit->attack+$recruit->defence)/2+$recruit->clicks*5);
      print "	<tr><td class=\"mainTxt\"><a href=\"profile.php?x={$recruit->login}\">{$recruit->login}</a></td>  <td class=\"mainTxt\">$power</td>  <td width=200><input type=\"radio\" name=\"{$recruit->login}\" value=\"0\"> Weigeren <input type=\"radio\" name=\"{$recruit->login}\" value=\"1\"> Aannemen</td></tr>\n";
    }

    print "	<tr><td></td>  <td></td>  <td align=\"center\" width=200><input type=\"submit\" name=\"recruit\" value=\"Ok\" style=\"width: 75\"></td></tr>\n";
    print "  </table></form></td></tr>\n";
  }
  else if($_GET['p'] == "members" && $data->clanlevel >= 8) {
    if(isset($_POST['members'])) {
      $dbres				= mysql_query("SELECT `login` FROM `[users]` WHERE `clan`='{$data->clan}'");
      while($member = mysql_fetch_object($dbres)) {
        if(isset($_POST[$member->login])) {
          if($_POST[$member->login] == 0)
            mysql_query("UPDATE `[users]` SET `clan`='',`clanlevel`=0 WHERE `login`='{$member->login}'");
          else if($_POST[$member->login] >= 1 && $_POST[$member->login] <= 8)
            mysql_query("UPDATE `[users]` SET `clanlevel`='{$_POST[$member->login]}' WHERE `login`='{$member->login}'");
        }
      }
    }

    print "  <tr><td class=\"subTitle\"><b>{$data->clan}: Members</b></td></tr>\n";
    if($data->clanlevel == 9) {
      print "  <tr><td align=\"center\"><form method=\"post\">Owner: <select name=\"owner\">\n";
      $dbres				= mysql_query("SELECT `login` FROM `[users]` WHERE `clan`='{$data->clan}' AND (`level` & 0x01)=1 ORDER BY `login`");
      while($member = mysql_fetch_object($dbres)) {
        if($member->login == $data->login)
          print "	<option value=\"{$member->login}\" selected>{$member->login}</option>\n";
        else
          print "	<option value=\"{$member->login}\">{$member->login}</option>\n";
      }
      print "  </select> <input type=\"submit\" name=\"change_owner\" value=\"Update\"></form></td></tr>\n\n";
    }

    print <<<ENDHTML
  <tr><td><form method="post"><table width=100%>
  <tr><td align="center" class="subTitle" width=15><b>#</b></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center"><a href="clanhq.php?p=members&s=login"><b>Nickname</a></b></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=75><a href="clanhq.php?p=members&s=power"><b>Power</b></a></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=100><a href="clanhq.php?p=members&s=rank"><b>Rank</b></a></td></tr>
ENDHTML;

    if($_GET['s'] == "login")
      $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`bank`,`cash`,`clanlevel`,`type` FROM `[users]` WHERE `clan`='{$data->clan}' AND `activated`=1 ORDER BY `login`");
    else if($_GET['s'] == "power")
      $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`bank`,`cash`,`clanlevel`,`type` FROM `[users]` WHERE `clan`='{$data->clan}' AND `activated`=1 ORDER BY (`attack`+`defence`)/2+`clicks`*5 DESC,`login` ASC");
    else
      $dbres				= mysql_query("SELECT `login`,`attack`,`defence`,`clicks`,`bank`,`cash`,`clanlevel`,`type` FROM `[users]` WHERE `clan`='{$data->clan}' AND `activated`=1 ORDER BY `clanlevel` DESC,`login` ASC");

    for($j=1; $member = mysql_fetch_object($dbres); $j++) {
      $rank				= Array("","Member","Recruiter","","","","Manager","Generaal","Leader","Owner");
      ${"select{$member->clanlevel}"}	= " selected";
      $power				= round(($member->attack+$member->defence)/2+$member->clicks*5);

      print <<<ENDHTML
  <tr><td align="center" class="mainTxt">$j</td>
	<td class="mainTxt"><a href="profile.php?x={$member->login}">{$member->login}</a></td>
	<td align="center" class="mainTxt">$power</td>
	<td align="center" class="mainTxt" width=100>
ENDHTML;
      if($member->clanlevel < 9) {
        print <<<ENDHTML
		<select name="{$member->login}">
		<option value="0">Verwijder</option>
		<option value="1"$select1>Member</option>
		<option value="2"$select2>Recruiter</option>
		<option value="6"$select6>Manager</option>
		<option value="7"$select7>Generaal</option>
		<option value="8"$select8>Leader</option>
		</select>
	</td></tr>

ENDHTML;
      }
      else
        print "Owner</td></tr>\n";

     ${"select{$member->clanlevel}"} = "";
    }

    print <<<ENDHTML
  <tr><td></td>  <td></td>  <td></td>  <td></td>  <td width=125 align="center"><input type="submit" name="members" value="Update"></td></tr>
</table></form></td></tr>
ENDHTML;
  }
  else if($_GET['p'] == "info" && $data->clanlevel >= 8) {
    $dbres				= mysql_query("SELECT `name`,`info` FROM `[clans]` WHERE `name`='{$data->clan}'");
    $clan				= mysql_fetch_object($dbres);

    print "  <tr><td class=\"subTitle\"><b>{$data->clan}: Clan info</b></td></tr>\n";
    print "  <tr><td class=\"mainTxt\"><a href=\"clan.php?x={$data->clan}\">Bekijk je profiel</a></td></tr>\n";

    if(isset($_POST['info'])) {
      $clan->info			= preg_replace('/</','&#60;',substr($_POST['info'],0,500));
      mysql_query("UPDATE `[clans]` SET `info`='{$clan->info}' WHERE `name`='{$data->clan}'");
      print "  <tr><td class=\"mainTxt\">Clan info is veranderd</td></tr>\n";
    }

    print <<<ENDHTML
  <tr><td class="mainTxt"><form method="post"><table>
	<tr><td valign="top" width=100>Info:</td>  <td><textarea name="info" cols=30 rows=10>{$clan->info}</textarea></td></tr>
	<tr><td></td>  <td align="right"><input type="submit" value="Update"></td></tr>
  </table></td></tr>
ENDHTML;
  }

/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>