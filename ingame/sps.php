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
$nameArray = array('', 'steen', 'papier', 'schaar');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['choice'])) {
        $error[] = 'Er is geen steen, papier of schaar opgegeven';
    }
    
    elseif ($_POST['choice'] < 1 OR $_POST['choice'] > 3) {
        $error[] = 'Er is niet gekozen tussen steen, papier of schaar.';
    }
    
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        $userChoice = (int) $_POST['choice'];
        $compChoice = rand(1,3);
        
        // User won
        if (($userChoice == 1 AND $compChoice == 3) OR ($userChoice == 2 AND $compChoice == 1) OR ($userChoice == 3 AND $compChoice == 2)) {
                $dbCon->query('UPDATE users SET cash = (cash + 500) WHERE id = "' . $userData['id'] . '"');
                $tpl->assign('success', 'Je hebt gewonnen! Jij had ' . $nameArray[$userChoice] . ' gekozen en de computer ' . $nameArray[$compChoice]. '! Je wint 500 cash!');
        }
        // Computer won
        elseif  (($userChoice == 3 AND $compChoice = 1) OR ($userChoice == 1 AND $compChoice == 2) OR ($userChoice == 2 AND $compChoice == 3)) {
                $dbCon->query('UPDATE users SET cash = (cash - 500) WHERE id = "' . $userData['id'] . '"');
                $tpl->assign('form_error', 'Je hebt verloren! Jij had ' . $nameArray[$userChoice] . ' gekozen en de computer ' . $nameArray[$compChoice]. '! Je verliest 500 cash!');
        } else {
        // Nobody won
                $tpl->assign('form_error', 'Je wint en verliest niet je had het zelfde als de computer! Jullie hadden beiden ' . $nameArray[$userChoice] . '!');
        }    
    }
}

$tpl->display('ingame/sps.tpl');