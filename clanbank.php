<?php /* ------------------------- */

  mysql_query("UPDATE `[users]` SET `online`=NOW() WHERE `login`='{$clan->login}'");
  include("_include-config.php");
  if(! check_login()) {
    header("Location: login.php");
    exit;
  }

/* ------------------------- */ ?>
<html>


<head>
<title>[( Criminals )]</title>
<link rel="stylesheet" type="text/css" href="<?php echo ($_COOKIE['v'] == 2) ? "css-v2.css" : "css-v1.css"; ?>">

</head>


<body style="background: #136E1D; margin: 0px;">
<table width=100%>
<?php /* ------------------------- */

  if($data->clanlevel >= 8 || $data->clanlevel == 6) {
    print "  <tr><td class=\"subTitle\"><b>Clan - Bank</b></td></tr>\n";
    $dbres				= mysql_query("SELECT `name`,`cash`,`bank`,`bankleft`,`bankmax` FROM `[clans]` WHERE `name`='{$data->clan}'");
    $clan				= mysql_fetch_object($dbres);
    if(isset($_POST['out']) && preg_match('/^[0-9]+$/',$_POST['amount'])) {
      if($_POST['amount'] <= $clan->bank) {
        $clan->cash			+= $_POST['amount'];
        $clan->bank			-= $_POST['amount'];
        mysql_query("UPDATE `[clans]` SET `bank`={$clan->bank},`cash`={$clan->cash} WHERE `name`='{$clan->name}'");
      }
      else
        print "  <tr><td class=\"mainTxt\">Zoveel geld staat er niet op de bank</td></tr>\n";
    }
    else if(isset($_POST['in']) && preg_match('/^[0-9]+$/',$_POST['amount'])) {
      if($_POST['amount'] <= $clan->cash) {
        if($_POST['amount'] <= $clan->bankmax) {
          if($clan->bankleft > 0) {
            $clan->cash			-= $_POST['amount'];
            $clan->bank			+= $_POST['amount'];
            $clan->bankleft--;
            mysql_query("UPDATE `[clans]` SET `bank`={$clan->bank},`cash`={$clan->cash},`bankleft`={$clan->bankleft} WHERE `name`='{$clan->name}'");
          }
          else
            print "  <tr><td class=\"mainTxt\">Je kan niet meer storten vandaag</td></tr>\n";
        }
        else
          print "  <tr><td class=\"mainTxt\">Je mag maar \${$clan->bankmax},- per keer storten</td></tr>\n";
      }
      else
        print "  <tr><td class=\"mainTxt\">Zoveel geld heb je niet</td></tr>\n";
    }

    print <<<ENDHTML
  <tr><td class="mainTxt" align="center">
	Je mag nog {$clan->bankleft}x geld storten (max. \${$clan->bankmax} per keer)
	<table align="center">
	  <tr><td width=100>Contant:</td>	<td align="right">\${$clan->cash}</td></tr>
	  <tr><td width=100>Op de bank:</td>	<td align="right">\${$clan->bank}</td></tr>
	</table>
	<form method="post"><table align="center">
	  <tr><td align="center">\$<input type="text" name="amount">,-
		<input type="submit" name="out"  value="Uit" style="width: 100;">
		<input type="submit" name="in" value="In"  style="width: 100;"></td></tr>
	</table></form>
  </td></tr>
ENDHTML;
  }

/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>