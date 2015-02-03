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

// Check if user is loggedin, if so no need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ($userData['cash'] < '10000') {
        $error[] = 'Niet genoeg cash om een bank te kunnen roven!';
    }
    
    if (count($error) > 0) {
            foreach ($error as $item) {
                $form_error .= '- ' . $item . '<br />';
            }
            $tpl->assign('form_error', $form_error);
    } else {    
        $luckyNumber = (int) rand(0,15);

        // user is lucky
        if ($luckyNumber == 13) {
            $dbCon->query('UPDATE users SET cash = (cash + 10000) WHERE session_id = "' . $userData['session_id'] . '"');

            $tpl->assign('success','De overval is gelukt! Je wint 10.000!');
        } else {
            //user is not lucky
            $dbCon->query('UPDATE users SET cash = (cash - 10000) WHERE session_id = "' . $userData['session_id'] . '"');
            $tpl->assign('form_error','De politie snapt je en je moet een dwangsom van 10.000 betalen om vrij te komen!');
        }
    }
}

$tpl->display('ingame/bankroven.tpl');