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

// Check if user is not loggedin, if so no need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

$error = array();
$form_error = '';
$website = '';
$userInfo = '';
$password = $userData['password'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // user wants to change his password
    if (isset($_POST['passVerify']) AND !empty($_POST['passVerify'])) {
        if (isset($_POST['pass']) AND !empty($_POST['pass'])) {
            if ($_POST['pass'] !== $_POST['passVerify']) {
                $error[] = 'Wachtwoorden komen niet overeen!';
            } else {
                // Create safe hash for user password with blowfish algoritem
                $userSalt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
                $userSalt = sprintf("$2a$%02d$", 10) . $userSalt;
        
                $password = crypt($_POST['pass'], $userSalt);
            }
        } else {
            $error[] = 'Je hebt geen wachtwoord ingevoerd!';
        }
    }
    
    // Website check
    if (isset($_POST['website']) AND !empty($_POST['website'])) {
        if (!preg_match("/\b(?:(?:https?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['website'])) {
            $error[] = 'De ingevoerd website heeft een incorrect formaat!';
        } else {
            $website = addslashes($_POST['website']);
        }
    }
    
    // User info check
    if (isset($_POST['info']) AND !empty($_POST['info'])) {
        $userInfo = addslashes($_POST['info']);
    }
    
    
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        $dbCon->query('UPDATE users SET website = "' . $website . '", info = "' . $userInfo . '", password = "' . $password . '" WHERE id = "' . $userData['id'] . '"');
        $tpl->assign('success', 'Je gegevens zijn succesvol geupdate!');
        
        $tpl->assign('website', $website);
        $tpl->assign('info', $userInfo);
    }
}

$tpl->display('ingame/editProfiel.tpl');