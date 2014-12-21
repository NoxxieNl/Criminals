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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['donate'])) {
        $error[] = 'Je hebt niemand ingevuld waarna je wilt doneren.';
    }
    else {
        $result = $dbCon->query('SELECT username, protection FROM users WHERE username = "' . addslashes($_POST['donate']) . '" LIMIT 1');
        $donateUser = $result->fetch_assoc();
        if ($result->num_rows < 1) {
            $error[] = 'De speler naar wie je wilt doneren bestaat niet!';
        }
        elseif ($donateUser['protection'] == 1) {
            $error[] = 'De speler naar wie je wilt doneren staat nog onder bescherming!';
        }
    }
    
    if ($userData['protection'] == 1) {
        $error[] = 'Je kan niet doneren, je staat zelf nog onder protectie';
    }
    
    if ($userData['username'] == $donateUser['username']) {
        $error[] = 'Je kan niet naar jezelf doneren!';
    }
    
    if (!isset($_POST['money'])) {
        $error[] = 'Je hebt geen donatie bedrag ingegeven.';
    }
    elseif(!ctype_digit($_POST['money'])) {
        $error[] = 'Je donatie bedrag is niet numeriek..';
    } else {
        $result = $dbCon->query('SELECT cash FROM users WHERE session_id = "' . $userData['session_id'] . '"');
        $row = $result->fetch_assoc();
        
        if ($row['cash'] < $_POST['money']) {
            $error[] = 'Je donatie bedrag is hoger dan je nu in cash hebt.';
        }
    }
     
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        // Well the user can donate, and the user who's get donated also exists... just do the donate...
        $DonateMoney = (int) $_POST['money'];
        
        $dbCon->query('UPDATE users SET cash = (cash - ' . $DonateMoney . ') WHERE session_id = "' . $userData['session_id'] . '"');
        $dbCon->query('UPDATE users SET cash = (cash + ' . $DonateMoney . ') WHERE username = "' . $donateUser['username'] . '"');

        $tpl->assign('success', 'Je hebt je donatie verstuurd!');
    }
}

//check if username is already filled
if (isset($_GET['donateTo'])) {
    $tpl->assign('donateUser', $_GET['donateTo']);
}
$tpl->display('ingame/doneren.tpl');