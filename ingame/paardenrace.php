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

$error = array();
$form_error = '';
$updateTicket = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    if (isset($_POST['betHorse']) AND !empty($_POST['betHorse'])) {
        if ($_POST['betHorse'] < 1 OR $_POST['betHorse'] > 50) {
            $error[] = 'Het paard waar je wilt wedden heeft bestaat niet!';
        }
    } else {
        $error[] = 'Je hebt geen paard aangegeven waarop je wilt wedden!';
    }
    
    if (isset($_POST['ticket']) AND !empty($_POST['ticket'])) {
        if ($_POST['ticket'] < 1 OR $_POST['ticket'] > 3) {
            $error[] = 'De ticket die je wilt kopen bestaat niet!';
        }
        
        if ($userData['cash'] < (250 * pow(2, $_POST['ticket'] - 1))) {
            $error[] = 'Je hebt niet genoeg cash voor de ticket!';
        }
    } else {
        $error[] = 'Je hebt geen ticket aangegeven!';
    }
    
    // Check if user already bought a ticket, if so he can only buy a higher ticket
    $result = $dbCon->query('SELECT * FROM temp WHERE userid = "' . $userData['id'] . '" AND area = "horse"');
    if ($result->num_rows > 0) {
        $fetch = $result->fetch_assoc();
        
        if ($fetch['extra'] == $_POST['ticket']) {
            $error[] = 'Je kan niet nogmaals hetzelfde ticket kopen!';
        }
        
        if ($fetch['extra'] > $_POST['ticket']) {
            $error[] = 'Je kan geen lager kostende ticket kopen dan dat je al gekocht hebt!';
        }
        
        $updateTicket = true;
    }
    
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        $ticketCosts = (250 * pow(2, $_POST['ticket'] - 1));
        
        if ($updateTicket == true) {
           $dbCon->query('UPDATE temp SET extra = "' . addslashes($_POST['ticket']) . '", variable = "' . addslashes($_POST['betHorse']) . '" WHERE userid = "' . $userData['id'] . '" AND area = "horse"');
        } else {
            $dbCon->query('INSERT INTO temp (userid, area, variable, extra) VALUES (
                                             "' . $userData['id'] . '", "horse", "' . addslashes($_POST['betHorse']) . '", "' . addslashes($_POST['ticket']) . '")');
        }
        $dbCon->query('UPDATE users SET cash = (cash - "' . (int) addslashes($ticketCosts) . '" WHERE id = "' . $userData['id'] . '"');
        $tpl->assign('success', 'De weddenschap is voltooid. Je hebt gewed op paard nummer ' . $_POST['betHorse'] . '!');
    }
}

$tpl->display('ingame/paardenrace.tpl');