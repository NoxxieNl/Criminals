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

require_once('../../init.php');

$error = array();
$form_error = '';

$showPage = 'hq';

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
            $showPage = 'cOwner';
            
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
                        $uFetch = $uCheck->fetch_assoc();
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
                    header('Location: ' . $ROOT_URL . 'hq.php');
                }
            }
            else {
                
                // check if id is filled if so user already given the user he wants to be the owner
                if (isset($_GET['id']) AND !empty($_GET['id'])) {
                    $user = $dbCon->query('SELECT username FROM users WHERE id = "' . addslashes($_GET['id']) . '"');
                    if ($user->num_rows > 0) {
                        $fetch = $user->fetch_assoc();
                        $tpl->assign('changeUser', $fetch['username']);
                    }
                }
            }
        }
    }
    
    
    // Recruiter or owner wants to see appliance for the clan
    elseif ($_GET['page'] == 'recruits') {
        if ($userData['clan_level'] < 5) {
            $error[] = 'Je hebt geen autorisatie voor deze pagina';
        } else {
            $showPage = 'recruits';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                if (!isset($_POST['action']) OR empty($_POST['action'])) {
                    $error[] = 'Je hebt geen actie aangegeven!';
                }
                
                elseif ($_POST['action'] < 1 OR $_POST['action'] > 2) {
                    $error[] = 'Je hebt een invalide actie aangegeven!';
                }
                else {
                    if (!isset($_POST['id']) OR empty($_POST['id'])) {
                        $error[] = 'Je hebt geen user aangevinkt!';
                    } else {
                     
                        // Recruits denied!
                        if ($_POST['action'] == 1) {
                             foreach ($_POST['id'] as $id => $status) {
                                 $member = $dbCon->query('SELECT id, clan_id FROM users WHERE id = "' . addslashes($id) . '"');
                                 if ($member->num_rows < 1) { 
                                     $error[] = 'Dit lid bestaat niet...';
                                 }
                                 
                                 $temp = $dbCon->query('SELECT * FROM temp WHERE userid = "' . addslashes($id) . '" AND area = "clan_join"');
                                 if ($temp->num_rows < 1) {
                                    $error[] = 'Dit lid heeft geen applicatie lopen voor een clan...';
                                 } else {
                                    $fTemp = $temp->fetch_assoc();
                                    if ($fTemp['variable'] != $userData['clan_id']) {
                                        $error[] = 'Je kan geen leden weigeren voor een andere clan...';
                                    } else {
                                        $dbCon->query('DELETE FROM temp WHERE userid = "' . addslashes($id) . '" AND area = "clan_join"');
                                    }
                                 }
                             }
                             
                             if (count($error) < 1) {
                                 $tpl->assign('success', 'De geselecteerde aanvragen zijn met succes afgewezen!');
                             }
                        }
                        else {
                            // Recruits accepted!
                            foreach ($_POST['id'] as $id => $status) {
                                 $member = $dbCon->query('SELECT id, clan_id FROM users WHERE id = "' . addslashes($id) . '"');
                                 if ($member->num_rows < 1) { 
                                     $error[] = 'Dit lid bestaat niet...';
                                 }
                                 
                                 $temp = $dbCon->query('SELECT * FROM temp WHERE userid = "' . addslashes($id) . '" AND area = "clan_join"');
                                 if ($temp->num_rows < 1) {
                                    $error[] = 'Dit lid heeft geen applicatie lopen voor een clan...';
                                 } else {
                                    $fTemp = $temp->fetch_assoc();
                                    if ($fTemp['variable'] != $userData['clan_id']) {
                                        $error[] = 'Je kan geen leden accepteren voor een andere clan...';
                                    } else {
                                        $dbCon->query('DELETE FROM temp WHERE userid = "' . addslashes($id) . '" AND area = "clan_join"');
                                        $dbCon->query('UPDATE users SET clan_id = "' . $userData['clan_id'] . '", clan_level = 1 WHERE id = "' . addslashes($id) . '"');
                                    }
                                 }
                             }
                             
                             if (count($error) < 1) {
                                 $tpl->assign('success', 'De geselecteerde aanvragen zijn met succes geaccepteerd!');
                             }
                        }
                    }
                }
            }
            
            // get members that want to join the clan
            $recArray = array();
            
            $recruits = $dbCon->query('SELECT * FROM temp WHERE area = "clan_join" AND variable = "' . $userData['clan_id']. '"');
            while ($row = $recruits->fetch_assoc()) {
                
                $member = $dbCon->query('SELECT username, id, attack_power, clicks FROM users WHERE id = "' . $row['userid'] . '"')->fetch_assoc();
                
                $recArray[$member['id']]['id'] = $member['id'];
                $recArray[$member['id']]['username'] = $member['username'];
                $recArray[$member['id']]['clicks'] = $member['clicks'];
                $recArray[$member['id']]['attack_power'] = $member['attack_power'];
                $recArray[$member['id']]['total_attack_power'] = ($member['attack_power'] + ($member['clicks'] * 5));
            }
            
            $tpl->assign('recruits', $recArray);
        }
    }
    
    // Clan member wants to see the clan member page
    elseif ($_GET['page'] == 'members') {
        if ($userData['clan_level'] < 1) {
            $error[] = 'Je hebt geen autorisatie voor deze pagina';
        } else {
            $showPage = 'members';
            
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
                        if ($_POST['action'] == 1 AND $userData['clan_level'] != 10) {
                            $error[] = 'Je hebt geen autorisatie om deze actie uit te voeren!';
                        } else {
                            // ID = user ID
                            
                            // if owner wants to change clan owner, redirect to other page
                            if ($_POST['action'] == 1) {
                                header('Location: ' . $ROOT_URL . 'hq.php?page=cOwner&id=' . key($_POST['id']));
                            }
                            if (isset($_POST['id'])) {
                                foreach ($_POST['id'] as $id => $status) {
                                    $user = $dbCon->query('SELECT * FROM users WHERE id = "' . addslashes($id) . '"');
                                    if ($user->num_rows < 1) {
                                        $error[] = 'Gebruiker bestaat niet.';
                                    } else {
                                        $uFetch = $user->fetch_assoc();

                                        // Clan member wants to remove users from clan
                                        if ($_POST['action'] == 2) {
                                            $dbCon->query('UPDATE users SET clan_level = 0, clan_id = 0 WHERE id = "' . $uFetch['id'] . '"');
                                        }
                                        
                                        // Clan member wants to change access rights of users
                                        if ($_POST['action'] == 3) {
                                            if (!isset($_POST['rights']) OR empty($_POST['rights'])) {
                                                $error[] = 'Je hebt geen wijzing rechten opgegeven!';
                                            } else {
                                                if (($_POST['rights'] + 1) >= $userData['clan_level']) {
                                                    $error[] = 'Je kan geen hogere rechten geven dan dat je zelf bent!';
                                                } else {
                                                    foreach ($_POST['id'] as $id => $status) {
                                                        $dbCon->query('UPDATE users SET clan_level = "' . addslashes($_POST['rights']) . '" WHERE id = "' . $uFetch['id'] . '"');
                                                        $tpl->assign('success', 'De rechten zijn gewijzigd!');
                                                    }
                                                }
                                            }
                                        }
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
            
            $cMembers = $dbCon->query('SELECT username, attack_power, defence_power, clicks, id, clan_level FROM users WHERE clan_id = "' . $userData['clan_id'] . '" ORDER BY "' . addslashes($sort) . '"');
            while ($row = $cMembers->fetch_assoc()) {
                $membersArray[$row['id']]['id'] = $row['id'];
                $membersArray[$row['id']]['username'] = $row['username'];
                $membersArray[$row['id']]['attack_power'] = $row['attack_power'];
                $membersArray[$row['id']]['defence_power'] = $row['defence_power'];
                $membersArray[$row['id']]['clicks'] = $row['clicks'];
                $membersArray[$row['id']]['total_attack_power'] = ($row['attack_power'] + ($row['clicks'] * 5));
                $membersArray[$row['id']]['level'] = $row['clan_level'];
            }
            
            $tpl->assign('members', $membersArray);
        }
    }
    else {
         header('Location: index.php?page=overview');
    }
} else {
     header('Location: index.php?page=overview');
}

if (count($error) > 0) {
    foreach ($error as $item) {
        $form_error .= '- ' . $item . '<br />';
    }
    $tpl->assign('form_error', $form_error);
}

$tpl->display('clan/' . $showPage . '.tpl');