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
require_once('init.php');

$formError = array();
$error = '';

// Check if user is loggedin, if so no need to be here...
if (LOGGEDIN == TRUE) { header('Location: index.php'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if ($_POST['login'] == null) {
        $formError[] = 'Gebruikersnaam is niet ingevuld.';
    }
    
    if ($_POST['password'] == null) {
        $formError[] = 'Wachtwoord is niet ingevuld.';
    }
    if ($_POST['login'] != null AND $_POST['password'] != null) {
        
        $result = $dbCon->query('SELECT username FROM users WHERE username = "' . addslashes($_POST['login']) . '"');
        
        if (mysqli_error($dbCon)) {
             $sysError[] = 'Query failed...';
             $formError[] = 'Er is een technische fout ontstaan';
        } else {
            if ($result->num_rows == 0) {
                $formError[] = 'Gebruikersnaam of wachtwoord is incorrect.';
            } else {
                // check if user hash is correct
                $fetch = $result->fetch_assoc();
                if (!hash_equels($fetch['password'], crypt($_POST['password'], $fetch['password']))) {
                    $formError[] = 'Gebruikersnaam of wachtwoord is incorrect.';
                }
            }
        }
    }
    if (count($formError) > 0) {
        foreach ($formError as $key => $value) {
            $error .= '- ' . $value . '<br />';
        }
        $tpl->assign($_POST);
        $tpl->assign('form_error', $error);
    } else {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $sessionId = '';
        
        for ($i = 0; $i < 20; $i++) {
             $sessionId .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        $sessionId = sha1($sessionId);
        setcookie('game_session_id', $sessionId, time() + 86400, '/');
        
        $dbCon->query('UPDATE users SET session_id = "' . $sessionId . '" WHERE username = "' . addslashes($_POST['login']) . '"');
        if (mysqli_error($dbCon)) {
             $sysError[] = 'Query failed...';
        } else {
            $tpl->assign('LOGIN', 'U bent succesvol ingelogd.');
        }
    }
}

$tpl->display('login.tpl');