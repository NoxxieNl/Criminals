<?php /* ------------------------- */

  $_POST['omnilog']			= 1;
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

  if($_GET['p'] == "buy" && ($data->clanlevel >= 8 || $data->clanlevel == 6)) {
    print "  <tr><td class=\"subTitle\"><b>Clan - Bouwterrein</b></td></tr>\n";

    $dbres				= mysql_query("SELECT * FROM `[clans]` WHERE `name`='{$data->clan}'");
    $clan				= mysql_fetch_object($dbres);
    if(isset($_GET['x'])) {
      $dbres				= mysql_query("SELECT * FROM `[weapons]` WHERE `name`='{$_GET['x']}' AND (`area`=8 OR `area`=8+{$clan->type})");
      if($item = mysql_fetch_object($dbres)) {
        if($clan->type == 1)
          $item->costs			= round($item->costs*0.95);

        if($item->costs <= $clan->cash) {
          if(eval($item->eval) > 0) {
            $type			= Array("Huis"		=> "homes",
						"Muur"		=> "def_lvl1",
						"Coffeeshop"	=> "money_lvl1",
						"Chemie Lab"	=> "money_lvl1",
						"Aandeel"	=> "money_lvl1");
            $type			= $type[$item->name];
            $clan->cash			-= $item->costs;
            $clan->{"$type"}++;

            mysql_query("UPDATE `[clans]` SET `cash`={$clan->cash},`$type`=". ($clan->{"$type"}) ." WHERE `name`='{$clan->name}'");
            print "  <tr><td class=\"mainTxt\">Je hebt een nieuw {$item->name} gekocht</td></tr>\n";
          }
          else
            print "  <tr><td class=\"mainTxt\">{$item->error}</td></tr>\n";
        }
        else
          print "  <tr><td class=\"mainTxt\">Je hebt niet genoeg geld om een {$item->name} te bouwen</td></tr>\n";
      }
    }

    $dbres				= mysql_query("SELECT * FROM `[weapons]` WHERE `area`=8 OR `area`=8+{$clan->type}");
    while($weapon = mysql_fetch_object($dbres)) {
      if($clan->type == 1)
        $weapon->costs			= round($weapon->costs*0.95);
      else if($clan->type == 2)
        $weapon->defence		= round($weapon->defence*1.05);

      eval($weapon->eval);
      eval("\$weapon->max = \"{$weapon->max}\";");

      print <<<ENDHTML
  <tr><td class="mainTxt">
	<table width=100% height=100% cellpadding=0 cellspacing=0>
	  <tr><td>&nbsp;<i>{$weapon->name}</i><br><img src="images/{$weapon->url}.gif" width=200 height=150></td>

ENDHTML;

      eval("\$weapon->max = \"{$weapon->max}\";");
      print "	  <td valign=\"top\" align=\"right\"><table width=100% height=100%>\n";
      print "	    <tr><td valign=\"top\">{$weapon->extra}</td></tr>\n";
      print "	    <tr><td valign=\"bottom\"><table width=100%>\n";
      if($weapon->attack != NULL)
        print "	      <tr><td width=75>Attack:</td>		<td>{$weapon->attack}</td></tr>\n";
      if($weapon->defence != NULL)
        print "	      <tr><td width=75>Defence:</td>		<td>{$weapon->defence}</td></tr>\n";
      if($weapon->costs != NULL)
        print "	      <tr><td width=75>Kost:</td>		<td>\${$weapon->costs}</td></tr>\n";
      if($weapon->max != NULL)
        print "	      <tr><td width=75 valign=\"top\">Benodigdheden:</td>	<td>{$weapon->max}</td></tr>\n";
        print <<<ENDHTML
	    </table></td></tr>
	  </table></td></tr>
ENDHTML;
      if($clan->cash >= preg_replace("/,/","",$weapon->costs) && eval($weapon->eval) > 0)
        print "	  <tr><td></td>  <td height=5 align=\"right\"><a href=\"clanshop.php?p=buy&x={$weapon->name}\"><b>Koop</b></a></td></tr>\n";
      else
        print "	  <tr><td></td>  <td height=5 align=\"right\"><a href=\"clanshop.php?p=buy&x={$weapon->name}\" style=\"color: #000000;\">Koop</a></td></tr>\n";

      print <<<ENDHTML
	</table>
  </td></tr>

ENDHTML;
    }
  }
  else if($data->clanlevel >= 8 || $data->clanlevel == 6) {
    print <<<ENDHTML
  <tr><td class="subTitle"><b>Clan - Bouwterrein</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="clanshop.php?p=buy">Bouw</a>
  </td></tr>
ENDHTML;
  }

/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>