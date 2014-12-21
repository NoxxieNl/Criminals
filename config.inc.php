<?php

/*
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */

DEFINE('SQL_HOSTNAME', 'localhost');
DEFINE('SQL_USERNAME', 'root');
DEFINE('SQL_PASSWORD', 'usbw');
DEFINE('SQL_DATABASE', 'blauw_2');

DEFINE('ROOT_URL', 'http://localhost:8080/blauw/');

DEFINE('ROOT_EMAIL', 'info@website.nl');

  /*session_start();
  include("_include-funcs.php");
  if(isset($_SESSION['login'])) {
    $dbres              = mysql_query("SELECT *,UNIX_TIMESTAMP(`signup`) AS `signup`,UNIX_TIMESTAMP(`online`) AS `online` FROM `[users]` WHERE `login`='{$_SESSION['login']}'");
    $data               = mysql_fetch_object($dbres);
  }

  if(((count($_POST) > 0 && !isset($_POST['omnilog'])) || ($_POST['omnilog'] == 1 && count($_GET) > 1)) && isset($OMNILOG)) {
    $forwardedFor           = ($_SERVER['HTTP_X_FORWARDED_FOR'] != "") ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['HTTP_CLIENT_IP'];
    $forwardedFor           = preg_replace('/, .+/','',$forwardedFor);
    $postVars               = addslashes(var_export($_POST,TRUE));
    if($postVars == "array (\n)" || (count($_POST) == 1 && isset($_POST['omnilog'])))
      $postVars             = "";
    $getVars                = addslashes(var_export($_GET,TRUE));
    if($getVars == "array (\n)")
      $getVars              = "";
    mysql_query("INSERT INTO `[omnilog]` VALUES(NOW(),'{$_COOKIE['login']}','{$_SERVER['REMOTE_ADDR']}','$forwardedFor','{$_SERVER['PHP_SELF']}','$postVars','$getVars')");
  }

  foreach($_POST as $key => $value) {
    if(gettype($_POST[$key]) == "array")
      foreach($_POST[$key] as $key2 => $value2)
        $_POST[$key][$key2]     = addslashes($_POST[$key][$key2]);
    else
      $_POST[$key]          = addslashes($_POST[$key]);
  }
  foreach($_GET as $key => $value) {
    if(gettype($_GET[$key]) == "array")
      foreach($_GET[$key] as $key2 => $value2)
        $_GET[$key][$key2]      = addslashes($_GET[$key][$key2]);
    else
      $_GET[$key]           = addslashes($_GET[$key]);
  }
  foreach($_COOKIE as $key => $value) {
    if(gettype($_COOKIE[$key]) == "array")
      foreach($_COOKIE[$key] as $key2 => $value2)
        $_COOKIE[$key][$key2]       = addslashes($_COOKIE[$key][$key2]);
    else
      $_COOKIE[$key]            = addslashes($_COOKIE[$key]);
  }



  $clientIP             = $_SERVER['REMOTE_ADDR'];
  $forwardedFor             = ($_SERVER['HTTP_X_FORWARDED_FOR'] != "") ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['HTTP_CLIENT_IP'];
  $forwardedFor             = preg_replace('/, .+/','',$forwardedFor);
  $dbres                = mysql_query("SELECT `id` FROM `[users]` WHERE `level`='-1' AND (`IP`='$clientIP' OR `IP`='$forwardedFor')");
  if(mysql_num_rows($dbres) != 0) {
    print <<<ENDHTML
<html>


<head>
<title>[( Criminals )]</title>
<link rel="stylesheet" type="text/css" href="css-v1.css">

</head>


<body style="background: #AA3C3C; margin: 0px;">
  <table width=100% height=100%>
    <tr><td class="subTitle"><b>Ban</b></td></tr>
    <tr><td class="mainTxt">
    Het IP waarmee je speelt is geband
    </td></tr>
  </table>
</body>

</html>
ENDHTML;
    exit;
  }



  if(isset($UPDATE_DB)) {
    $dbres              = mysql_query("SELECT UNIX_TIMESTAMP(`time`) AS `time`,`name` FROM `[cron]`");
    while($x = mysql_fetch_object($dbres))
      $update[$x->name]     = $x->time;

    if(floor($update['hour']/3600) != floor(time()/3600)) {
      $dbres                = mysql_query("SELECT GET_LOCK('hour_update',0)");
      if(mysql_result($dbres,0) == 1) {
        $cron_pass          = "secretcronpassword";
        mysql_query("UPDATE `[cron]` SET `time`=NOW() WHERE `name`='hour'");
        include("_cron_hour.php");
        mysql_query("SELECT RELEASE_LOCK('hour_update')");
      }
    }

    if(floor($update['day']/86400) != floor(time()/86400)) {
      $dbres                = mysql_query("SELECT GET_LOCK('day_update',0)");
      if(mysql_result($dbres,0) == 1) {
        $cron_pass          = "secretcronpassword";
        mysql_query("UPDATE `[cron]` SET `time`=NOW() WHERE `name`='day'");
        include("_cron_day.php");
        mysql_query("SELECT RELEASE_LOCK('day_update')");
      }
    }

    if(floor($update['week']/604800) != floor(time()/604800)) {
      $dbres                = mysql_query("SELECT GET_LOCK('week_update',0)");
      if(mysql_result($dbres,0) == 1) {
        $cron_pass          = "secretcronpassword";
        mysql_query("UPDATE `[cron]` SET `time`=NOW() WHERE `name`='week'");
        include("_cron_week.php");
        mysql_query("SELECT RELEASE_LOCK('week_update')");
      }
    }

    if(date('n',$update['month']) != date('n',time())) {
      $dbres                = mysql_query("SELECT GET_LOCK('month_update',0)");
      if(mysql_result($dbres,0) == 1) {
        $cron_pass          = "secretcronpassword";
        mysql_query("UPDATE `[cron]` SET `time`=NOW() WHERE `name`='month'");
        include("_cron_month.php");
        mysql_query("SELECT RELEASE_LOCK('month_update')");
      }
    }

    if((date('G',time()) >= 16 && date('z',time()) != date('z',$update['horserace'])) || (date('G',time()) >= 21 && date('G',$update['horserace']) < 21)) {
      $dbres                = mysql_query("SELECT GET_LOCK('horserace_update',0)");
      if(mysql_result($dbres,0) == 1) {
        $cron_pass          = "secretcronpassword";
        mysql_query("UPDATE `[cron]` SET `time`=NOW() WHERE `name`='horserace'");
        include("_cron_horserace.php");
        mysql_query("SELECT RELEASE_LOCK('horserace_update')");
      }
    }
  }

/* ------------------------- */ ?>