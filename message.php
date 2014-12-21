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

<script language="javascript">
var checked = 0;
function checkAll() {
  checked = !checked;
  for(i=0; i<document.form1.elements.length; i++)
    document.form1.elements[i].checked = checked;
}


function newBlock() {
  if(document.form1['block'].value != '')
    document.form2['blocklist[]'].options[document.form2['blocklist[]'].options.length] = new Option(document.form1['block'].value)
  return false;
}

function unBlock() {
  while(document.form2['blocklist[]'].selectedIndex >= 0)
    document.form2['blocklist[]'].options[document.form2['blocklist[]'].selectedIndex] = null;
  return false;
}

function submitList() {
  for(i=0; i<document.form2['blocklist[]'].options.length; i++)
    document.form2['blocklist[]'].options[i].selected = 1;
  return true;
}
</script>
</head>


<body style="background: #136E1D; margin: 0px;">
<table width=100%>
<?php /* ------------------------- */

  if($data->Mobieltje == 1) {
    if($_GET['p'] == "inbox") {
      print <<<ENDHTML
  <tr><td class="subTitle"><b>Inbox</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="message.php?p=inbox">Inbox</a><br>
	- <a href="message.php?p=outbox">Outbox</a><br>
	- <a href="message.php?p=new">Nieuw bericht</a><br>
	- <a href="message.php?p=block">Block list</a>
  </td></tr>
ENDHTML;
      print "  <tr><td><form name=\"form1\" method=\"post\" action=\"message.php?p=del\"><table width=100%>\n";
      print "    <tr><td width=10><input type=\"checkbox\" onClick=\"checkAll()\"></td>  <td class=\"mainTxt\" align=\"center\" width=150><i>Van:</i></td>  <td class=\"mainTxt\" align=\"center\" width=225><i>Onderwerp:</i></td>  <td class=\"mainTxt\" align=\"center\" width=175><i>Datum:</i></td></tr>\n";
      $dbres				= mysql_query("SELECT *,DATE_FORMAT(`time`,'%d-%m-%Y %H:%i') AS `time` FROM `[messages]` WHERE `to`='{$data->login}' AND `read`=0 AND `inbox`=1 ORDER BY `time` DESC");
      while($message = mysql_fetch_object($dbres)) {
        if(preg_match('/^\s*$/',$message->subject))
          $message->subject		= "(Geen)";
        print "    <tr><td width=10><input type=\"checkbox\" name=\"id[]\" value=\"{$message->id}\"></td>  <td class=\"mainTxt\" width=150><a href=\"profile.php?x={$message->from}\">{$message->from}</a></td>  <td class=\"mainTxt\"><a href=\"message.php?p=read&id={$message->id}\"><b>{$message->subject}</b></a></td>  <td class=\"mainTxt\" width=175>{$message->time}</td></tr>\n";
      }

      $dbres				= mysql_query("SELECT *,DATE_FORMAT(`time`,'%d-%m-%Y %H:%i') AS `time` FROM `[messages]` WHERE `to`='{$data->login}' AND `read`=1 AND `inbox`=1 ORDER BY `time` DESC");
      while($message = mysql_fetch_object($dbres)) {
        if(preg_match('/^\s*$/',$message->subject))
          $message->subject		= "(Geen)";
        print "    <tr><td width=10><input type=\"checkbox\" name=\"id[]\" value=\"{$message->id}\"></td>  <td class=\"mainTxt\" width=200><a href=\"profile.php?x={$message->from}\">{$message->from}</a></td>  <td class=\"mainTxt\"><a href=\"message.php?p=read&id={$message->id}\">{$message->subject}</a></td>  <td class=\"mainTxt\" width=175>{$message->time}</td></tr>\n";
      }

      print "    </table><input type=\"submit\" value=\"Delete\" style=\"font-size: 10pt\"></form></td></tr>\n";
    }
    else if($_GET['p'] == "outbox") {
      print <<<ENDHTML
  <tr><td class="subTitle"><b>Outbox</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="message.php?p=inbox">Inbox</a><br>
	- <a href="message.php?p=outbox">Outbox</a><br>
	- <a href="message.php?p=new">Nieuw bericht</a><br>
	- <a href="message.php?p=block">Block list</a>
  </td></tr>
ENDHTML;
      print "  <tr><td><form name=\"form1\" method=\"post\" action=\"message.php?p=del\"><table width=100%>\n";
      print "    <tr><td width=10><input type=\"checkbox\" onClick=\"checkAll()\"></td>  <td class=\"mainTxt\" align=\"center\" width=150><i>Naar:</i></td>  <td class=\"mainTxt\" align=\"center\" width=225><i>Onderwerp:</i></td>  <td class=\"mainTxt\" align=\"center\" width=175><i>Datum:</i></td></tr>\n";
      $dbres				= mysql_query("SELECT *,DATE_FORMAT(`time`,'%d-%m-%Y %H:%i') AS `time` FROM `[messages]` WHERE `from`='{$data->login}' AND `outbox`=1 ORDER BY `time` DESC");
      while($message = mysql_fetch_object($dbres)) {
        if(preg_match('/^\s*$/',$message->subject))
          $message->subject		= "(Geen)";
        if($message->read == 1)
          print "    <tr><td width=10><input type=\"checkbox\" name=\"id[]\" value=\"{$message->id}\"></td>  <td class=\"mainTxt\" width=200><a href=\"profile.php?x={$message->to}\">{$message->to}</a></td>  <td class=\"mainTxt\"><a href=\"message.php?p=read&id={$message->id}\">{$message->subject}</a></td>  <td class=\"mainTxt\" width=175>{$message->time}</td></tr>\n";
        else
          print "    <tr><td width=10><input type=\"checkbox\" name=\"id[]\" value=\"{$message->id}\"></td>  <td class=\"mainTxt\" width=200><a href=\"profile.php?x={$message->to}\"><b>{$message->to}</b></a></td>  <td class=\"mainTxt\"><a href=\"message.php?p=read&id={$message->id}\"><b>{$message->subject}</b></a></td>  <td class=\"mainTxt\" width=175>{$message->time}</td></tr>\n";
      }

      print "    </table><input type=\"submit\" value=\"Delete\" style=\"font-size: 10pt\"></form></td></tr>\n";
    }
    else if($_GET['p'] == "read" && is_numeric($_GET['id'])) {
      $dbres			= mysql_query("SELECT *,DATE_FORMAT(`time`,'%d-%m-%Y %H:%i') AS `time` FROM `[messages]` WHERE `id`='{$_GET['id']}' AND (`to`='{$data->login}' OR `from`='{$data->login}')");
      if($message = mysql_fetch_object($dbres)) {
        if($message->to == $data->login)
          mysql_query("UPDATE `[messages]` SET `read`=1 WHERE `id`='{$_GET['id']}'");

        $message->message		= preg_replace('/(http:\/\/\S+)/','<a href="$1" target=\"_blank\">$1</a>',$message->message);
        $message->message		= preg_replace('/\n/',"<br>\n",$message->message);
        print <<<ENDHTML
  <tr><td class="subTitle"><b>Bericht</b></td></tr>
  <tr><td class="subTitle" style="letter-spacing: normal;"><table width=100%>
    <tr><td width=100>Van:</td>     <td>{$message->from}</td></tr>
    <tr><td width=100>Naar:</td>       <td>{$message->to}</td></tr>
    <tr><td width=100>Onderwerp:</td>  <td>{$message->subject}</td></tr>
  </table></td></tr>
  <tr><td class="mainTxt">
{$message->message}
  </td></tr>
  <tr><td align="right"><table>
ENDHTML;

        if($message->from != $data->login)
          print "    <tr><td class=\"mainTxt\" align=\"center\" width=100><a href=\"message.php?p=block&add={$message->from}\">Block</a></td>  <td class=\"mainTxt\" align=\"center\" width=100><a href=\"message.php?p=new&to={$message->from}&subject=". urlencode("Re: {$message->subject}") ."\">Antwoord</a></td>  ";
        else
          print "    <tr>";

        print "<td class=\"mainTxt\" align=\"center\" width=100><a href=\"message.php?p=del&id[]={$message->id}\">Delete</a></td></tr>\n";
      }
    }
    else if($_GET['p'] == "del") {
      if(isset($_GET['id']))
        $_POST['id']			= $_GET['id'];
      foreach($_POST['id'] as $msgid) {
        $dbres				= mysql_query("SELECT `outbox`,`inbox`,`from`,`to` FROM `[messages]` WHERE `id`='$msgid' AND (`from`='{$data->login}' OR `to`='{$data->login}')");
        if($message = mysql_fetch_object($dbres)) {
          if($message->from == $data->login)
            mysql_query("UPDATE `[messages]` SET `outbox`=0 WHERE `id`='$msgid'");
          else
            mysql_query("UPDATE `[messages]` SET `inbox`=0 WHERE `id`='$msgid'");
        }
      }
      print <<<ENDHTML
  <tr><td class="subTitle"><b>Berichten</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="message.php?p=inbox">Inbox</a><br>
	- <a href="message.php?p=outbox">Outbox</a><br>
	- <a href="message.php?p=new">Nieuw bericht</a><br>
	- <a href="message.php?p=block">Block list</a>
  </td></tr>
  <tr><td class="mainTxt">Bericht(en) verwijderd</td></tr>
ENDHTML;
    }
    else if($_GET['p'] == "block") {
      print <<<ENDHTML
  <tr><td class="subTitle"><b>Block list</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="message.php?p=inbox">Inbox</a><br>
	- <a href="message.php?p=outbox">Outbox</a><br>
	- <a href="message.php?p=new">Nieuw bericht</a><br>
	- <a href="message.php?p=block">Block list</a>
  </td></tr>
ENDHTML;

      if(isset($_POST['update_list'])) {
        $newlist			= "";
        if(isset($_POST['blocklist'])) {
          foreach($_POST['blocklist'] as $blocked) {
            if($info = mysql_fetch_object(mysql_query("SELECT `login` FROM `[users]` WHERE `login`='{$blocked}'"))) {
              $newlist			= preg_replace("/,{$info->login},/i",'',$newlist);
              $newlist			.= ",{$info->login},";
            }
          }
        }
        mysql_query("UPDATE `[users]` SET `blocklist`='$newlist' WHERE `login`='{$data->login}'");
        print "  <tr><td class=\"mainTxt\">De block list is geupdate</td></tr>";
        $blocklist			= $newlist;
      }
      else {
        $dbres				= mysql_query("SELECT `blocklist` FROM `[users]` WHERE `login`='{$data->login}'");
        $blocklist			= mysql_fetch_object($dbres);
        $blocklist			= $blocklist->blocklist;
      }

      if(isset($_GET['add'])) {
        $dbres				= mysql_query("SELECT `login` FROM `[users]` WHERE `login`='{$_GET['add']}'");
        if($sender = mysql_fetch_object($dbres)) {
          $blocklist			= preg_replace("/,{$sender->login},/i",'',$blocklist);
          $blocklist			.= ",{$sender->login},";
          mysql_query("UPDATE `[users]` SET `blocklist`='$blocklist' WHERE `login`='{$data->login}'");
          print "  <tr><td class=\"mainTxt\">{$sender->login} is geblokt</td></tr>\n";
        }
      }
      print <<<ENDHTML
  <tr><td class="mainTxt" align="center"><table><form name="form1">
	<tr><td><input type="text" name="block" style="width: 100;"> <input type="button" value="Block" onClick="newBlock()" style="width: 100;"></form></td></tr>

	<form name="form2" method="post" action="message.php?p=block" onSubmit="submitList()">
	<tr><td><select name="blocklist[]" width=200 style="width: 200" size=10 MULTIPLE>
ENDHTML;

      $blocklist			= preg_replace('/(^,|,$)/','',$blocklist);
      if($blocklist != "") {
        $blocklist			= explode(',,',$blocklist);
        sort($blocklist);
        foreach($blocklist as $blocked)
          print "	<option value=\"$blocked\">$blocked</option>\n";
      }
      print "	</select></td>\n	<td><input type=\"button\" value=\"Unblock\" onClick=\"unBlock()\" style=\"width: 100;\"></td></tr>\n	<tr><td align=\"center\" width=210><input type=\"submit\" name=\"update_list\" value=\"Sla op\" style=\"width: 100\"><br>Altijd opslaan wanneer je iemand hebt geblockt/unblockt</td></tr>\n  </form></table></td></tr>\n";
    }
    else if($_GET['p'] == "new") {
      print <<<ENDHTML
  <tr><td class="subTitle"><b>Nieuw bericht</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="message.php?p=inbox">Inbox</a><br>
	- <a href="message.php?p=outbox">Outbox</a><br>
	- <a href="message.php?p=new">Nieuw bericht</a><br>
	- <a href="message.php?p=block">Block list</a>
  </td></tr>
ENDHTML;
      if(isset($_POST['to'],$_POST['message'])) {
        if(strtolower($_POST['to']) != strtolower($data->login)) {
          $dbres			= mysql_query("SELECT `login`,`Mobieltje`,`blocklist` FROM `[users]` WHERE `login`='{$_POST['to']}'");
          $info				= mysql_fetch_object($dbres);
          if($info == false)
            print "  <tr><td class=\"mainTxt\">'{$_POST['to']}' bestaat niet</td></tr>\n";
          else if($info->Mobieltje == 0)
            print "  <tr><td class=\"mainTxt\">{$info->login} heeft geen mobiel</td></tr>\n";
          else if(preg_match("/,{$data->login},/i",$info->blocklist))
            print "  <tr><td class=\"mainTxt\">{$info->login} heeft je geblockt</td></tr>\n";
          else {
            $_POST['subject']		= preg_replace('/</','&#60;',$_POST['subject']);
            $_POST['message']		= preg_replace('/</','&#60;',$_POST['message']);

            $dbres			= mysql_query("SELECT `login` FROM `[users]` WHERE `login`='{$_POST['to']}'");
            if($recp = mysql_fetch_object($dbres)) {
              $forwardedFor		= ($_SERVER['HTTP_X_FORWARDED_FOR'] != "") ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['HTTP_CLIENT_IP'];
              $forwardedFor		= preg_replace('/, .+/','',$forwardedFor);
              mysql_query("INSERT INTO `[messages]`(`time`,`IP`,`forwardedFor`,`from`,`to`,`subject`,`message`) values(NOW(),'{$_SERVER['REMOTE_ADDR']}','$forwardedFor','{$data->login}','{$recp->login}','{$_POST['subject']}','{$_POST['message']}')");
              mysql_query("DELETE FROM `[temp]` WHERE `id`='{$_POST['id']}' AND `code`='{$_POST['code']}' AND `area`='message'");
              print "  <tr><td class=\"mainTxt\">Bericht verzonden</td></tr>\n";
            }
          }
        }
        else
          print "  <tr><td class=\"mainTxt\">Je kan geen bericht naar jezelf sturen</td></tr>\n";
      }

      $_REQUEST['message']		= stripslashes($_REQUEST['message']);
      print <<<ENDHTML
  <tr><td class="mainTxt">
	<form name="form1" method="POST" action="message.php?p=new"><table>
	<tr><td width=100>Naar:</td>		<td><input type="text" name="to" value="{$_REQUEST['to']}" maxlength=16></td></tr>
	<tr><td width=100>Onderwerp:</td>	<td><input type="text" name="subject" value="{$_REQUEST['subject']}" maxlength=25></td></tr>
	<tr><td width=100 valign="top">Bericht:<br><br>
		<a href="javascript://" onClick="document.form1.message.value += 'http://www.crimewar2004.com/click.php?x={$data->login}'">Secret link</a><br>
ENDHTML;
      if($data->clanlevel > 0)
        print "		<a href=\"javascript://\" onClick=\"document.form1.message.value += 'http://www.crimewar2004.com/click.php?clan={$data->clan}'\">Clan link</a>\n";
      print <<<ENDHTML
	</td>					<td><textarea name="message" cols=40 rows=10>{$_REQUEST['message']}</textarea></td></tr>
	<tr><td width=100></td>			<td align="right"><input type="submit" name="submit" value="Verzenden"></td></tr>
ENDHTML;
    }
    else {
      print <<<ENDHTML
  <tr><td class="subTitle"><b>Berichten</b></td></tr>
  <tr><td class="mainTxt">
	- <a href="message.php?p=inbox">Inbox</a><br>
	- <a href="message.php?p=outbox">Outbox</a><br>
	- <a href="message.php?p=new">Nieuw bericht</a><br>
	- <a href="message.php?p=block">Block list</a>
  </td></tr>
ENDHTML;
    }
  }
  else
    print "  <tr><td class=\"mainTxt\">Je moet een mobiel hebben om berichten te kunnen versturen/ontvangen</td></tr>\n";

/* ------------------------- */ ?>
</table>

</body>


</html>
<CENTER><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript" src="http://www.dutchleader.com/php/banex/view.php?id=leonie"></script></CENTER>