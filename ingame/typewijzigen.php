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

$form_error = '';
$error = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['type'])) {
        $error[] = 'Er is geen type opgegeven';
    }
    
    elseif ($_POST['type'] < 1 OR $_POST['type'] > 3) {
        $error[] = 'Er is niet een correcte type opgegeven.';
    }
    elseif ($_POST['type'] == $userData['type']) {
        $error[] = 'Je kan niet naar het type veranderen wat je al bent.';
    }
    
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        // User wanne change his type, sure lets do this!
        $result = $dbCon->query('UPDATE users SET type = "' . (int) addslashes($_POST['type']) . '" WHERE id = "' . $userData['id'] . '"');
        $tpl->assign('success', 'Je bent succesvol overgestapt naar ' . $type[$_POST['type']]['name'] . '!');
    }
}

$tpl->display('ingame/typewijzigen.tpl');