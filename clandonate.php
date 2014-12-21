<?php /* ------------------------- */

  $OMNILOG                                = 1;
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
<link rel="stylesheet" type="text/css" href="css-v1.css">
</head>

<body style="background: #136E1D; margin: 0px;">
<table width=100%>

<?php /* ------------------------- */

  if(round($data->signup/3600-time()/3600) + 12 <= 0) {
    $dbres                                = mysql_query("SELECT `name`,`cash`,UNIX_TIMESTAMP(`started`) AS `started` FROM `[clans]` WHERE `name`='$data->clan'");
    if(($to = mysql_fetch_object($dbres))) {
      if(round($to->started/3600-time()/3600) + 12 <= 0) {
        print "  <tr><td class="subTitle"><b>Clan Donatie</b></td></tr>\n";
        if(isset($_POST['amount']) && preg_match("/^[0-9]+\$/",$_POST['amount']) && $_POST['amount'] > 0) {
          $get_amount = preg_replace('#[^0-9]#', '', $_POST['amount']);
                  $amount                        = $get_amount;

          if($amount <= $data->cash) {
            mysql_query("SELECT GET_LOCK('donate_{$data->clan}',5)");
            $data->cash                        -= $amount;
            $to->cash                        += $amount;
            mysql_query("UPDATE `[users]` SET `cash`={$data->cash} WHERE `login`='{$data->login}'");
            mysql_query("UPDATE `[clans]` SET `cash`={$to->cash} WHERE `name`='{$data->clan}'");

            $forwardedFor                = ($_SERVER['HTTP_X_FORWARDED_FOR'] != "") ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['HTTP_CLIENT_IP'];
            $forwardedFor                = preg_replace('/, .+/','',$forwardedFor);
            mysql_query("INSERT INTO `[logs]`(`time`,`IP`,`forwardedFor`,`login`,`person`,`code`,`area`) values(NOW(),'{$_SERVER['REMOTE_ADDR']}','$forwardedFor','{$data->login}','Clan: {$data->clan}',$amount,'donate')");
            print "  <tr><td class="mainTxt">Het bedrag is overgemaakt</td></tr>\n";
            mysql_query("SELECT RELEASE_LOCK('donate_{$data->clan}')");
          }
          else
            print "  <tr><td class="mainTxt">Zoveel geld heb je niet</td></tr>\n";
        }
      }
      else
        print "  <tr><td class="mainTxt">{$data->clan} staat nog onder bescherming</td></tr>\n";
    }

    print <<<ENDHTML
  <tr><td class="mainTxt" align="center">
        <table align="center">
      <tr><td width=100>Contant:</td>    <td align="right">\${$data->cash}</td></tr>         
        </table>
        <form method="post"><table align="center">
          <tr><td width=60>Aan:</td>  <td> {$data->clan}</td></tr>
                <tr><td width=60>Bedrag:</td>  <td><input type="text" name="amount" maxlength="5"></td></tr>
                <tr><td></td>  <td align="right"><input type="submit" name="submit" value="Doneer"  style="width: 100;"></td></tr>
        </table></form>
  </td></tr>
ENDHTML;  }
  else
    print "  <tr><td class="mainTxt">Je kan niet doneren wanneer je onder bescherming staat</td></tr>\n";

/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>