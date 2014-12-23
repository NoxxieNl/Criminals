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

// Define website root dir
require_once('init.php');

$formError = array();
$error = '';

// Check if user is loggedin, if so no need to be here...
if (LOGGEDIN == TRUE) { header('Location: ' . BASE_DIR . 'ingame/index.php'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ($_POST['login'] == null) {
        $formError[] = 'Gebruikernsama is niet ingevuld.';
    }
    elseif ($_POST['login'] != null) {
        $result = $dbCon->query('SELECT username FROM users WHERE username = "' . addslashes($_POST['login']) . '"');
        if (mysqli_error($dbCon)) {
             $sysError[] = 'Query failed...';
             $formError[] = 'Er is een technische fout ontstaan';
        } else {
            if ($result->num_rows > 0) {
                $formError[] = 'Gebruikersnaam is al in gebruik';
            }
        }
    }
    
    if ($_POST['password'] == null) {
        $formError[] = 'Wachtwoord is niet ingevuld.';
    }
    
    if ($_POST['passconfirm'] == null) {
        $formError[] = 'Controler wachtwoord is niet ingevuld.';
    }
    
    if ($_POST['emailCheck'] == null) {
        $formError[] = 'Email is niet ingevuld.';
    }
    elseif (!filter_var($_POST['emailCheck'], FILTER_VALIDATE_EMAIL)) {
        $formError[] = 'Email adres is niet volledig.';
    }
    
    if (count($formError) > 0) {
        foreach ($formError as $key => $value) {
            $error .= '- ' . $value . '<br />';
        }
        $tpl->assign($_POST);
        $tpl->assign('form_error', $error);
    } else {
        $dbCon->query('INSERT INTO users (username, password, email, type, activated)
                                   VALUES ("' . addslashes($_POST['login']) . '", "' . sha1($_POST['password']) . '",
                                           "' . addslashes($_POST['emailCheck']) . '", "' . addslashes($_POST['type']) . '",
                                          1)');
        if (mysqli_error($dbCon)) {
            $sysError[] = 'Query failed...';
        } else {
            $tpl->assign('REGISTERD', 'U bent succesvol geregistreerd, je kan nu inloggen!');
        }
    }
}

$tpl->display('register.tpl');
