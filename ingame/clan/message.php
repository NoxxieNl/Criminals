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

// Check if user has clan access to this page, if not no need to be here..
if ($userData['clan_level'] > 8) { header('Location: ' . ROOT_URL . 'ingame/clan/index.php'); }


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['subject']) OR empty($_POST['subject'])) {
        $error[] = 'Er is geen onderwerp ingegeven!';
    }
   
    if (!isset($_POST['message']) OR empty($_POST['message'])) {
        $error[] = ' Er is geen bericht ingegeven!';
    }
    
    // Check for errors and show them if there are any
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        $result = $dbCon->query('SELECT id FROM users WHERE clan_id = "' . $userData['clan_id'] . '"');
        while ($row = $result->fetch_assoc()) {
            $dbCon->query('INSERT INTO messages (message_from_id, message_to_id, message_subject, message_message) VALUES
                           ("' . $userData['id'] . '", "' . $row['id'] . '", 
                            "' . addslashes($_POST['subject']) . '", "' . addslashes($_POST['message']) . '"');
        }
        
        $tpl->assign('success', 'Het bericht is succesvol verstuur naar alle clan leden!');
    }
}

$tpl->display('clan/message.tpl');