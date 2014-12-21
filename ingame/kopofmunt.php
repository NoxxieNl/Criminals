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
    if (!isset($_POST['kom'])) {
        $error[] = 'Je hebt geen kop of munt aangegeven.';
    }
    elseif ($_POST['kom'] < 0 OR $_POST['kom'] > 1) {
        $error[] = 'Je hebt geen kop of munt gekozen.';
    }
    
    if (!isset($_POST['gambleMoney'])) {
        $error[] = 'Je hebt geen inzet ingegeven.';
    }
    elseif(!ctype_digit($_POST['gambleMoney'])) {
        $error[] = 'Je inzet is niet numeriek.';
    }
    elseif ($_POST['gambleMoney'] == '0') {
         $error[] = 'Je hebt geen inzet aangegeven.';
    }
    elseif ($_POST['gambleMoney'] != '250' AND $_POST['gambleMoney'] != '500' AND $_POST['gambleMoney'] != '1000') {
        $error[] = 'Je hebt de inzet gemanipuleerd.';
    } else {
        $result = $dbCon->query('SELECT cash FROM users WHERE session_id = "' . $userData['session_id'] . '"');
        $row = $result->fetch_assoc();
        
        if ($row['cash'] < $_POST['gambleMoney']) {
            $error[] = 'Je inzet is hoger dan dat je nu in cash hebt.';
        }
    }
     
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        // We got a kom, now check if he won something...
        $kom = (int) $_POST['kom'];
        $gambleMoney = (int) $_POST['gambleMoney'];
        $wonNumber = (int) rand(1,6);
        
        // user won
        if (($wonNumber == 1 OR $wonNumber == 3 OR $wonNumber == 5) AND $kom == 0) {
            $moneyWon = (int) ($gambleMoney * 1.5);
            $dbCon->query('UPDATE users SET cash = (cash + ' . $moneyWon . ') WHERE session_id = "' . $userData['session_id'] . '"');
            
            $tpl->assign('success', 'Je hebt kop aangegeven en dat was nog goed ook! Je wint ' . $moneyWon . '!');
        
        // user won again :-)
        } elseif (($wonNumber == 2 OR $wonNumber == 4 OR $wonNumber == 6) AND $kom == 1) {
            $moneyWon = (int) ($gambleMoney * 1.5);
            $dbCon->query('UPDATE users SET cash = (cash + ' . $moneyWon . ') WHERE session_id = "' . $userData['session_id'] . '"');
            
            $tpl->assign('success', 'Je hebt munt aangegeven en dat was nog goed ook! Je wint ' . $moneyWon . '!');
        } else {
            //user lost
            $dbCon->query('UPDATE users SET cash = (cash - ' . $gambleMoney . ') WHERE session_id = "' . $userData['session_id'] . '"');
            $tpl->assign('form_error', 'Awhhh.... je had het niet goed! Je verliest ' . $gambleMoney . '!');
        }
    }
}

$tpl->display('ingame/kopofmunt.tpl');