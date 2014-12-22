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
if ($userData['clan_level'] < 6) { header('Location: ' . ROOT_URL . 'ingame/clan/index.php'); }

// Check if user has submitted the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Check if money is enterd and if it is valid
    if (!isset($_POST['amount']) OR empty($_POST['amount'])) {
        $error[] = 'Er is geen bedrag ingevuld!';
    }
    elseif (!is_numeric($_POST['amount'])) {
        $error[] = 'Het bedrag wat is ingegeven is niet numeriek!';
    } else {
        
        // Check if the clan got enough money to deposit / withdraw
        $result = $dbCon->query('SELECT bank, cash, bank_left FROM clans WHERE clan_id = "' . $userData['clan_id'] . '"')->fetch_assoc();
        // Clan member wants to deposit money
        if (isset($_POST['deposit'])) {
            if ($_POST['amount'] > $result['cash']) {
                $error[] = 'Zoveel heef de clan niet in cash!';
            }
            
            // Check if clan hasnt deposit enough times for one day
            if ($result['bank_left'] < 1) {
                $error[] = 'Je kan vandaag geen stortingen meer naar de clan bank doen!';
            }
        }
        // Clan member wants to withdraw money
        else {
            if ($_POST['amount'] > $result['bank']) {
                $error[] = 'Zoveel heef de clan niet op de bank staan!';
            }
        }
    }
    
    // Check for errors and show them if there are any
    if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        // Clan member may deposit / withdraw
        if (isset($_POST['deposit'])) {
            // Clan member is going to deposit money
            $dbCon->query('UPDATE clans SET cash = (cash - "' . (int) addslashes($_POST['amount']) . '"),
                                            bank = (bank + "' . (int) addslashes($_POST['amount']) . '"),
                                            bank_left = (bank_left - )
                                        WHERE clan_id = "' . $userData['clan_id'] . '" ');
            
            $tpl->assign('success', 'Je hebt succesvol geld op de clan bank gezet!');
        } else {
             // Clan member is going to withdraw money
            $dbCon->query('UPDATE clans SET cash = (cash + "' . (int) addslashes($_POST['amount']) . '"),
                                            bank = (bank - "' . (int) addslashes($_POST['amount']) . '")
                                        WHERE clan_id = "' . $userData['clan_id'] . '" ');
            
            $tpl->assign('success', 'Je hebt succesvol geld van de clan bank gehaald!');
        }
    }
}

// Give general information
$result = $dbCon->query('SELECT cash, bank, bank_left FROM clans WHERE clan_id = "' . $userData['clan_id'] . '"')->fetch_assoc();
$tpl->assign('cash', $result['cash']);
$tpl->assign('bank', $result['bank']);
$tpl->assign('deposit_left', $result['bank_left']);

// Display page
$tpl->display('clan/bank.tpl');