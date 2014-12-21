<?php /* ------------------------- */

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
  <tr><td align="center">
	<form action="list.php" method="get">
	Voorbeeld: "<b>a*</b>" zal een lijst geven van namen die beginnen met een A<br>
	<input type="hidden" name="s" value="search"><input type="text" name="q" value="<?php echo $_REQUEST['q']; ?>"> <input type="submit" value="Zoek!"><br>
Admins worden aangegeven als <b><font color=blue>Naam</b></font><br>
Drugsdealers worden aangegeven als <font color=purple>Naam</font><br>
Wetenschappers worden aangegeven als <font color=yellow>Naam</font><br>
Agenten worden aangegeven als <font color=green>Naam</font><br>
	</form>
  </td></tr>
</table>
<table width=100%>
  <tr><td align="center" class="subTitle" style="letter-spacing: normal;" width=20><b>#</b></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center"><a href="list.php?s=login"><b>Nickname</a></b></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=150><a href="list.php?s=type"><b>Type</b></a></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=100><a href="list.php?s=money"><b>Contant</b></a></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=100><a href="list.php?s=money"><b>Bank</b></a></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=100><a href="list.php?s=power"><b>Power</b></a></td>
	<td class="subTitle" style="letter-spacing: normal;" align="center" width=100><b>Clicks</b></a></td></tr>
<?php /* ------------------------- */

  $begin				= ($_GET['p'] >= 0) ? $_GET['p']*30 : 0;
  if($_GET['s'] == "login")
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level` FROM `[users]` WHERE `activated`=1 ORDER BY `login` LIMIT $begin,30");
  else if($_GET['s'] == "money")
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level` FROM `[users]` WHERE `activated`=1 ORDER BY `cash`+`bank` DESC,`login` ASC LIMIT $begin,30");
  else if($_GET['s'] == "type")
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level` FROM `[users]` WHERE `activated`=1 ORDER BY `type`,`login` LIMIT $begin,30");
  else if($_GET['s'] == "online" && $data->level & 0x80)
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level`,`showonline` FROM `[users]` WHERE `activated`=1 AND UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 ORDER BY `login` LIMIT $begin,30");
  else if($_GET['s'] == "online")
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level` FROM `[users]` WHERE `activated`=1 AND UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `showonline`=1 ORDER BY `login` LIMIT $begin,30");
  else if($_GET['s'] == "admin")
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level`FROM `[users]` WHERE `level` & 0x80 AND UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 ORDER BY `login` LIMIT $begin,30");
  else if($_GET['s'] == "search") {
    $_GET['q']				= preg_replace('/\*/','%',$_GET['q']);
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level`FROM `[users]` WHERE `activated`=1 AND `login` LIKE '{$_GET['q']}' ORDER BY `login` LIMIT $begin,30");
  }
  else
    $dbres				= mysql_query("SELECT `login`,UNIX_TIMESTAMP(`signup`) AS `signup`,`attack`,`defence`,`clicks`,`cash`,`bank`,`type`,`level` FROM `[users]` WHERE `activated`=1 ORDER BY (`attack`+`defence`)/2+`clicks`*5 DESC,`login` ASC LIMIT $begin,30");

  for($j=$begin+1; $info = mysql_fetch_object($dbres); $j++) {
    $login				= ($info->showonline == 0 && $data->level & 0x80 && $_GET['s'] == "online") ? "{$info->login} *" : $info->login;
    $login				= ($info->level & 0x80) ? "<font color=blue><b>$login</b></font>" : $login;
    $login				= ($info->hlevel & 0x80) ? "<i>$login</i>" : $login;
    $type				= Array("","<font color=purple>Drugsdealer</font>","<font color=yellow>Wetenschapper</font>","<font color=green>Agent</font>");
    $type				= $type[$info->type];
    $power				= round(($info->attack+$info->defence)/2+$info->clicks*5);
    $money				= $info->cash+$info->bank;

    print <<<ENDHTML
  <tr><td align="center" class="mainTxt" width=20>$j</td>
	<td class="mainTxt"><a href="profile.php?x={$info->login}">$login</a></td>
	<td align="center" class="mainTxt" width=150>$type</td>
	<td align="center" class="mainTxt" width=100>\${$info->cash}</td>
	<td align="center" class="mainTxt" width=100>\${$info->bank}</td>
	<td align="center" class="mainTxt" width=100>$power</td>
	<td align="center" class="mainTxt" width=100>{$info->clicks}</td>
ENDHTML;

    if(($data->type != 3 || ($data->type == 3 && $info->type != 3)) && round($data->signup/3600-time()/3600) + 12 <= 0 && round($info->signup/3600-time()/3600) + 12 <= 0 && ($info->clan != $data->clan || $info->clan == ""))
      print "	<td align=\"center\" class=\"mainTxt\"><a href=\"attack.php?x={$info->login}\">Attack</a></td></tr>\n\n";
    else
      print "	</tr>\n\n";
  }

  if($_GET['s'] == "online" && $data->level & 0x80)
    $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300");
  else if($_GET['s'] == "online")
    $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `showonline`=1");
  else if($_GET['s'] == "admin")
    $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE `level` & 0x80 AND UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 ORDER BY `login` LIMIT $begin,30");
  else if($_GET['s'] == "search") {
    $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE `activated`=1 AND `login` LIKE '{$_GET['q']}' ORDER BY `login`");
    $_GET['q']				= preg_replace('/%/','*',$_GET['q']);
  }
  else
    $dbres				= mysql_query("SELECT id FROM `[users]` WHERE `activated`=1");
  print "</table>\n\n<table width=100%>\n  <tr><td class=\"mainTxt\" align=\"center\">";
  if(mysql_num_rows($dbres) <= 30)
    print "&#60; 1 &#62;</td></tr></table>\n";
  else {
    if($begin/30 == 0)
      print "&#60;&#60; ";
    else
      print "<a href=\"list.php?s={$_GET['s']}&q={$_GET['q']}&p=". ($begin/30-1) ."\">&#60;&#60;</a> ";

    for($i=0; $i<mysql_num_rows($dbres)/30; $i++) {
      print "<a href=\"list.php?s={$_GET['s']}&q={$_GET['q']}&p=$i\">". ($i+1) ."</a> ";
    }

    if($begin+30 >= mysql_num_rows($dbres))
      print "&#62;&#62; ";
    else
      print "<a href=\"list.php?s={$_GET['s']}&q={$_GET['q']}&p=". ($begin/30+1) ."\">&#62;&#62;</a>";
  }

  $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300");
  $online				= mysql_num_rows($dbres);
  $dbres				= mysql_query("SELECT `id` FROM `[users]` WHERE UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(`online`) < 300 AND `showonline`=0");
  $anonymous				= mysql_num_rows($dbres);

/* ------------------------- */ ?>
</table>
<table width=100%>
  <tr><td align="center"><a href="list.php?s=online"><b><?php print $online; ?> leden online (waarvan <?php print $anonymous; ?> anoniem)</b></a></td></tr>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>