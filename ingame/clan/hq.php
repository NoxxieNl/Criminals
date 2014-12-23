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

require_once('../init.php');

$error = array();
$form_error = '';

// Check if user is loggedin, if not need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

// Check if user is in an clan if not no need to be here...
if ($userData['clan_id'] == 0) { header('Location: ' . ROOT_URL . 'ingame/clan/index.php'); }


if (isset($_GET['page']) AND !empty($_GET['page'])) {
    
    // Owner wants to change owner
    if ($_GET['page'] == 'cOwner') {
        if ($userData['clan_level'] < 10) {
            $error[] = 'Je hebt geen autorisatie voor deze pagina';
        } else {
            
            // check if owner pressed submit
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (!isset($_POST['name']) OR empty($_POST['name'])) {
                    $error[] = 'Er is geen nieuwe owner opgegeven!';
                } else {
                    
                    // Check if enterd user exists
                    $uCheck = $dbCon->query('SELECT username, clan_id FROM users WHERE username = "' . addslashes($_POST['name']) . '"');
                    if ($uCheck->num_rows < 1) {
                        $error[] = 'De ingegeven gebruiker bestaat niet!';
                    } else {
                        $uFetch = $uCheck->fetch_assoc;
                        if ($uFetch['clan_id'] != $userData['clan_id']) {
                            $error[] = 'Je kan iemand buiten de clan geen owner maken!';
                        }
                    }
                }
                
                if (count($error) < 1) {
                    // No errors found, owner can be changed
                    $dbCon->query('UPDATE users SET clan_level = 1 WHERE id = "' . $userData['id'] . '"');
                    $dbCon->query('UPDATE users SET clan_level = 10 WHERE username = "' . addslashes($_POST['name']) . '"');
                    
                    // Redirect to main page, cause use does not have access to this page anymore...
                    header('Location: ' . $ROOT_URL . 'ingame/clan/hq.php');
                }
            }
            else {
                
                // check if id is filled if so user already given the user he wants to be the owner
                if (isset($_GET['id']) AND !empty($_GET['id'])) {
                    $user = $dbCon->query('SELECT username FROM users WHERE id = "' . addslashes($_GET['id']) . '"');
                    if ($user->num_rows > 0) {
                        $fetch = $user->fetch_assoc();
                        $tpl->assign('username', $fetch['username']);
                    }
                }
            }
        }
    }
    
    
    // Recruiter or owner wants to see appliance for the clan
    if ($_GET['page'] == 'recruits') {
        if ($userData['clan_level'] < 5) {
            $error[] = 'Je hebt geen autorisatie voor deze pagina';
        } else {
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $mCount = $dbCon->query('SELECT id FROM users WHERE clan_id = "' . $userData['clan_id'] . '"')->num_rows;
                // Hier moet nog aantal huizen * 5 komen
                $maxReq = 5 * 5;

                if ($maxReq >= $mCount) {
                    $error[] = 'Je hebt niet genoeg huizen voor nieuwe leden!';
                }
                
                if (count($error) < 1) {
                    // Recruits can join
                    
                }
            }
            
            // get members that want to join the clan
            $recArray = array();
            
            $recruits = $dbCon->query('SELECT * FROM temp WHERE area = "clan_join" AND variable = "' . $userData['clan_id']. '"');
            while ($row = $recruits->fetch_assoc()) {
                
                // Check if sorting is used
                if (isset($_GET['order']) AND !empty($_GET['order'])) {
                    if ($_GET['order'] != 'username' AND $_GET['order'] != 'attack_power') {
                        $sort = 'username';
                    }
                    else {
                        $sort = $_GET['order'];
                    }
                } else {
                    $sort = 'username';
                }
                
                // Get recruits
                $recruit = $dbCon->query('SELECT attack_power, clicks, id, username FROM users WHERE id = "' . $row['userid'] . '" ORDER BY "' . addslashes($sort) . '"')->fetch_assoc();
            
                $recArray[$row['id']]['username'] = $row['username'];
                $recArray[$row['id']]['attack_power'] = $row['attack_power'];
                $recArray[$row['id']]['clicks'] = $row['clicks'];
                $recArray[$row['id']]['id'] = $row['id'];
                $recArray[$row['id']]['total_attack_power'] = ($row['attack_power'] + ($row['clicks'] * 5));
            }
            
            $tpl->assign('recruits', $recArray);
        }
    }
    
    // Clan member wants to see the clan member page
    if ($_GET['page'] == 'members') {
        if ($userData['clan_level'] < 8) {
            $error[] = 'Je hebt geen autorisatie voor deze pagina';
        } else {
            
            // check if clan owner / general wants to change users
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                if (!isset($_POST['action']) OR empty($_POST['action'])) {
                    $error[] = 'Er is geen actie geselecteerd om uit te voeren!'; 
                }
                elseif ($_POST['action'] < 1 OR $_POST['action'] > 3) {
                    $error[] = 'Er is een invalide optie geselecteerd!';
                } else {
                    // Check if action can be on multiply persons at once
                    if ($_POST['action'] != 1 AND count($_POST['id']) > 1) {
                        $error[] = 'De actie die geselecteerd is kan je niet uitvoeren over meerdere clan members!';
                    } else {
                        
                        // ID = user ID
                        if (isset($_POST['id'])) {
                            foreach ($_POST['id'] as $id => $status) {
                                $user = $dbCon->query('SELECT * FROM users WHERE id = "' . addslashes($id) . '"');
                                if ($user->num_rows < 1) {
                                    $error[] = 'Gebruiker bestaat niet.';
                                } else {
                                    $uFetch = $user->fetch_assoc();
                                    
                                    // Clan member wants to remove users from clan
                                    if ($_POST['action'] == 1) {
                                        $dbCon->query('UPDATE users SET clan_level = 0, clan_id = 0 WHERE id = "' . $uFetch['id'] . '"');
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
            // Check if sorting is used
            if (isset($_GET['order']) AND !empty($_GET['order'])) {
                if ($_GET['order'] != 'username' AND $_GET['order'] != 'attack_power') {
                    $sort = 'username';
                }
                else {
                    $sort = $_GET['order'];
                }
            } else {
                $sort = 'username';
            }
            
            // Show member page
            $membersArray = array();
            
            $cMembers = $dbCon->query('SELECT username, attack_power, defence_power, clicks, id FROM users WHERE clan_id = "' . $userData['clan_id'] . '" ORDER BY "' . addslashes($sort) . '"');
            while ($row = $cMembers->fetch_assoc()) {
                $membersArray[$row['id']]['id'] = $row['id'];
                $membersArray[$row['id']]['username'] = $row['username'];
                $membersArray[$row['id']]['attack_power'] = $row['attack_power'];
                $membersArray[$row['id']]['defence_power'] = $row['defence_power'];
                $membersArray[$row['id']]['clicks'] = $row['clicks'];
                $membersArray[$row['id']]['total_attack_power'] = ($row['attack_power'] + ($row['clicks'] * 5));
            }
            
            $tpl->assign('members', $membersArray);
        }
    }
}

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