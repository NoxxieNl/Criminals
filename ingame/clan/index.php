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

// Check if user is loggedin, if so no need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

$showPage = 'clanIndex.tpl';
$error = array();
$form_error = '';

// Check if specific page is called if not show default
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    
    // clan member wants to delete the clan
    if ($_GET['page'] == 'delete') {
        
        // check if user is clan owner
        if ($userData['clan_level'] < 10) {
            $tpl->assign('error', 'Je hebt geen autorisatie voor deze pagia.');
        } else {
            
            // check if confirmation is asked
            if (isset($_GET['confirmation'])) {
                
                // remove clan id from all users
                $result = $dbCon->query('SELECT * FROM clan WHERE clan_id = "' . $userData['clan_id'] . '"');
                while ($row = $result->fetch_assoc()) {
                    $dbCon->query('UPDATE users SET clan_id = 0 WHERE id = "' . $userData['id'] . '"');
                }
                
                // Delete the clan itself
                $dbCon->query('DELETE FROM clans WHERE clan_id = "' . $userData['id'] . '"');
                
                $tpl->assign('succes', 'De clan is succesvol verwijderd.');
            } else {
                // Show html page with confirmation option
                $tpl->assign('confirmation', true);
            }
        }
    }
    
    // User wants to create a clan
    if ($_GET['page'] == 'create') {
        
        // check if user is already in a clan
        if ($userData['clan_level'] > 0) {
            $tpl->assign('error', 'Je hebt al een clan of je zit in een clan, je kan niet nog een clan aanmaken!');
        } else {
            $showPage = 'clanCreate';

            // validate creation of clan
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // check if name is filled
                if (!isset($_POST['name']) OR empty($_POST['name'])) {
                    $error[] = 'Geen clan naam ingevuld';
                }

                // check if name is valid
                elseif (preg_match('/^[A-Za-z0-9_\- ]+$/', $_POST['name'])) {
                    $error[] = 'Clan naam mag alleen letters, spaties en _- tekens bevatten!';
                } else {

                    // check if clan name already exist
                    $result = $dbCon->query('SELECT clan_name FROM clans WHERE clan_name = "' . addslashes($_POST['name']) . '"');
                    if ($result->num_rows > 0) {
                        $error[] = 'Clan naam bestaat al!';
                    }
                }

                // check for errors if found, put them into error array
                if (count($error) > 0) {
                    foreach ($error as $item) {
                        $form_error .= '- ' . $item . '<br />';
                    }

                    $tpl->assign('clan_name', $_POST['name']);
                    $tpl->assign('form_error', $form_error);
                } else {

                    // finnaly we can create the clan itself...
                    $dbCon->query('INSERT INTO clans (clan_name, clan_owner_id, clan_type) VALUES (
                                                      "' . addslashes($_POST['name']) . '", "' . $userData['id'] . '", "' . $userData['type'] . '"');

                    $tpl->assign('success', 'De clan is aangemaakt!');
                }
            }
        }
    }
    
    // User wants to leave a clan
    if ($_GET['page'] == 'leave') {
        
        // check if user is in a clan
        if ($userData['clan_level'] < 1) {
            $tpl->assign('error', 'Je zit momenteel niet in een clan, dan kan je deze ook niet verlaten.');
        } else {
            $showPage = 'leaveClan';
            
              // check if confirmation is asked
            if (isset($_GET['confirmation'])) {
                
                // remove user form clan
                $dbCon->query('UPDATE users SET clan_id = 0 WHERE id = "' . $userData['id'] . '"');
                $tpl->assign('succes', 'Je bent succesvol uit de clan gestapt!');
            } else {
                // Show html page with confirmation option
                $tpl->assign('confirmation', true);
            }
        }
    }
    
    // User wants to join a clan
    if ($_GET['page'] == 'join') {
        
        //check if user is in a clan
        if ($userData['clan_level'] < 1) {
            $tpl->assign('error', 'Je zit momenteel niet in een clan, dan kan je deze ook niet verlaten.');
        } else {
            
            // validate enterd clan name
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                // check if name is enterd
                if (!isset($_POST['name']) OR empty($_POST['name'])) {
                    $error[] = 'Je hebt geen clan naam opgegeven!';
                } else {
                    
                    // check if clan exists
                    $result = $dbCon->query('SELECT clan_name, clan_type, clan_id FROM clans WHERE clan_name = "' . addslashes($_POST['name']) . '" LIMIT 1');
                    if ($result->num_rows < 1) {
                        $error[] = 'De clan naam opgegeven kan niet worden gevonden!';
                    } else {
                        
                        // check if the user is of the same type as the clan
                        $row = $result->fetch_assoc();
                        if ($userData['type'] != $row['clan_type']) {
                            $error[] = 'De clan heeft een andere type dan dat jij bent, je kan deze clan niet joinen!';
                        }
                    }
                }
                
                 // check for errors if found, put them into error array
                if (count($error) > 0) {
                    foreach ($error as $item) {
                        $form_error .= '- ' . $item . '<br />';
                    }
                    $tpl->assign('form_error', $form_error);
                } else {
                    
                    // and we can let the user apply for the clan
                    $dbCon->query('INSERT INTO temp (userid, area, variable) VALUES ("' . $userData['id'] .'", "clan_join", "' . $row['clan_id'] . '")');
                    $tpl->assign('success', 'Je bent succesvol aangemeld voor de clan ' . $row['clan_name'] . '! De mensen die er over gaan zullen je aanvraag zo spoedig mogelijk bekijken!');
                }
            }
        }
    }
    
    // We are going to show them the overview of the clans!
    if ($_GET['page'] == 'overview') {
        $clanArray = array();
        
        $clanResult = $dbCon->query('SELECT * FROM clans');
        while ($clanRow = $clanResult->fetch_assoc()) {
            
            $clanArray[$clanRow['clan_id']]['id'] = $clanRow['clan_id'];
            $clanArray[$clanRow['clan_id']]['clan_name'] = $clanRow['clan_name'];
            $clanArray[$clanRow['clan_id']]['clan_member_count'] = $clanResult->num_rows;
            
            // Retrieve total power of clan with seperated clan members
            $memberResult = $dbCon->query('SELECT attack_power, defence_power, clicks FROM users WHERE clan_id = "' . $clanRow['clan_id'] . '"');
            while ($memberRow = $memberResult->fetch_assoc()) {
                 $clanArray[$clanRow['clan_id']]['clan_power'] += ($memberRow['attack_power'] + ($memberRow['clicks'] * 5));
            }
        }
        $tpl->assign('clanArray', $clanArray);
        
    }
} else {
    if ($userData['clan_id'] == 0) {
        $showPage = 'clanOverview.tpl';
    } else {
        $showPage = 'clanIntern.tpl';
    }
}

$tpl->display('clan/' . $showPage . '.tpl');