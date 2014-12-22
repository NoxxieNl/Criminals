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

// Check if user is loggedin, if not need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

// Check if user is in an clan if not no need to be here...
if ($userData['clan_id'] == 0) { header('Location: ' . ROOT_URL . 'ingame/clan/index.php'); }

$error = array();
$form_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['amount']) OR empty($_POST['amount'])) {
        $error[] = 'Er is geen bedrag ingevuld!';
    }
    elseif (!is_numer($_POST['amount'])) {
        $error[] = 'Het bedrag wat is ingegeven is niet numeriek!';
    }
    else {
        $result = $dbCon->query('SELECT cash FROM users WHERE id = "' . $userData['id'] . '"')->fetch_assoc();
        if ($_POST['amount'] > $result['cash']) {
            $error[] = 'Het ingegeven bedrag heb je niet in cash!';
        }
    }
    
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        // User can donate
        $dbCon->query('UPDATE users SET cash = (cash - "' . (int) addslashes($_POST['amount']) . '") WHERE id = "' . $userData['id'] . '"');
        $dbCon->query('UPDATE clans SET cash = (cash + "' . (int) addslashes($_POST['amount']) . '") WHERE clan_id = "' . $userData['clan_id'] . '"');
    
        $tpl->assign('success', 'Je hebt succesvol gedoneerd naar je clan!');
    }
}

$tpl->display('clan/donate.tpl');