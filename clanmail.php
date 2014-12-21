<?php /* ------------------------- */

  $OMNILOG				= 1;
  include("_include-config.php");
  if(! check_login()) {
    header("Location: login.php");
    exit;
  }


  if(! ($data->clanlevel >= 8))
    exit;

  mysql_query("UPDATE `[users]` SET `online`=NOW() WHERE `login`='{$data->login}'");

/* ------------------------- */ ?>
<html>


<head>
<title>[( Criminals )]</title>
<link rel="stylesheet" type="text/css" href="<?php echo ($_COOKIE['v'] == 2) ? "css-v2.css" : "css-v1.css"; ?>">

</head>


<body style="background: black; margin: 0px;">
<table width=100%>
<?php /* ------------------------- */{
    print "  <tr><td class=\"subTitle\"><b>{$data->clan}: Clan Message</b></td></tr>\n";
    if(isset($_POST['message'])) {
      $dbres				= mysql_query("SELECT * FROM `[temp]` WHERE `id`='{$_POST['id']}' AND `code`='{$_POST['code']}' AND `area`='message'");
      if(($check = mysql_fetch_object($dbres)) && $check->IP == $clientIP) {
        $dbres				= mysql_query("SELECT `login` FROM `[users]` WHERE `Mobieltje`=1 AND `clan`='{$data->clan}'");
        while($member = mysql_fetch_object($dbres)) {
          $_POST['subject']		= preg_replace('/</','&#60;',$_POST['subject']);
          $_POST['message']		= preg_replace('/</','&#60;',$_POST['message']);

          mysql_query("INSERT INTO `[messages]`(`time`,`IP`,`from`,`to`,`subject`,`message`) values(NOW(),'{$_SERVER['REMOTE_ADDR']}','{$data->clan}','{$member->login}','{$_POST['subject']}','{$_POST['message']}')");
          mysql_query("DELETE FROM `[temp]` WHERE `id`='{$_POST['id']}' AND `code`='{$_POST['code']}' AND `area`='message'");
        }
      }
      print "  <tr><td class=\"mainTxt\">Clan Bericht verzonden</td></tr>\n";
    }

    $code				= rand(100000,999999);
    mysql_query("INSERT INTO `[temp]`(login,IP,code,area,time) values('{$data->login}','$clientIP','$code','message',NOW())");
    $id					= mysql_insert_id();

    print <<<ENDHTML
  <tr><td class="mainTxt">
	<form name="form1" method="POST" action="clan-message.php"><table>
	<input type="hidden" name="id" value="$id">
	<input type="hidden" name="code" value="$code">
	<tr><td width=100>Van:</td>		<td>{$data->clan}</td></tr>
	<tr><td width=100>Onderwerp:</td>	<td><input type="text" name="subject" value="{$_REQUEST['subject']}" maxlength=25></td></tr>
	<tr><td width=100 valign="top">Bericht:</td>
						<td><textarea name="message" cols=40 rows=10>{$_REQUEST['message']}</textarea></td></tr>
	<tr><td width=100></td>			<td align="right"><input type="submit" name="submit" value="Verzenden"></td></tr>
  </td></tr>
ENDHTML;
  }
   
/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>