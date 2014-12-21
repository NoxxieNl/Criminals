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
    if (!isset($_POST['number'])) {
        $error[] = 'Nummer niet gevonden.';
    }
    elseif ($_POST['number'] < 0 OR $_POST['number'] > 10) {
        $error[] = 'Nummer wat is ingegeven kan niet.';
    }
    
    if (!isset($_POST['gambleMoney'])) {
        $error[] = 'Je hebt geen inzet ingegeven.';
    }
    elseif(!ctype_digit($_POST['gambleMoney'])) {
        $error[] = 'Je inzet is niet numeriek..';
    } else {
        $result = $dbCon->query('SELECT cash FROM users WHERE session_id = "' . $userData['session_id'] . '"');
        $row = $result->fetch_assoc();
        
        if ($row['cash'] < $_POST['gambleMoney']) {
            $error[] = 'Je inzet is hoger dan je nu in cash hebt.';
        }
    }
     
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        // We got a number, now check if he won something...
        $number = (int) $_POST['number'];
        $gambleMoney = (int) $_POST['gambleMoney'];
        $wonNumber = (int) rand(0,10);
        
        // user won
        if ($number == $wonNumber) {
            $moneyWon = (int) ($gambleMoney * 8);
            $dbCon->query('UPDATE users SET cash = (cash + ' . $moneyWon . ') WHERE session_id = "' . $userData['session_id'] . '"');
            
            $tpl->assign('success', 'Je hebt het juist getal geraden! Je wint ' . $moneyWon . '!');
        } else {
            //user did not win
            $dbCon->query('UPDATE users SET cash = (cash - ' . $gambleMoney . ') WHERE session_id = "' . $userData['session_id'] . '"');
            $tpl->assign('form_error', 'Helaas... je hebt het juiste getal niet geraden... Je hebt ' . $gambleMoney . ' verloren!');
        }
    }
}

$tpl->display('ingame/getallenspel.tpl');