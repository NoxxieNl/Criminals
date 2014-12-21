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
if ($userData['level'] < 3) { header('Location: ' . ROOT_URL . '/ingame/index.php'); }

$error = array();
$form_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' OR $_SERVER['REQUEST_METHOD'] == 'GET') {
    
    // admin wants to reset user
    if (isset($_POST['reset']) OR isset($_GET['reset'])) {
        
        if (isset($_POST['player']) OR isset($_GET['player'])) {
            $player = (isset($_POST['player']) ? $_POST['player'] : $_GET['player']);
            
            $result = $dbCon->query('SELECT * FROM users WHERE username = "' . addslashes($player) . '" LIMIT 1');
            if ($result->num_rows != 1) {
                $tpl->assign('error', 'Speler is niet gevonden.');
            } else {
                if (isset($_GET['sureReset'])) {
                    $playerData = $result->fetch_assoc();
                    $dbCon->query('DELETE FROM users WHERE id = "' . $playerData['id'] . '"');
                    $dbCon->query('DELETE FROM temp WHERE userid = "' . $playerData['id'] . '"');
                    
                    $dbCon->query('INSERT INTO users (username, password, email, type)
                                   VALUES ("' . $playerData['username'] . '", "' . $playerData['password'] . '", "' . $playerData['email'] . '", "' . $playerData['type'] . '")');
                    
                    $tpl->assign('success', 'De speler ' . $player . ' is succesvol gereset!');
                } else {
                    $tpl->assign('info', 'Weet je het zeker dat je speler ' . $player . ' wilt resetten? Klik '
                            . ' <a href="' . ROOT_URL .'admin/adminBasic.php?reset=true&sureReset=true&player=' . $player . '">hier</a> als je het zeker weet!');
                    $tpl->assign('player', $player);
                }
            }
        } else {
            
            $tpl->assign('error', 'Geen spelernaam opgegeven');
        }
    }
    
    // admin wants to donate to user
    if (isset($_POST['donate']) OR (isset($_GET['donate']) AND isset($_GET['amount']))) {
        if (isset($_POST['player']) OR isset($_GET['player'])) {
            $player = (isset($_POST['player']) ? $_POST['player'] : $_GET['player']);
            
            $result = $dbCon->query('SELECT * FROM users WHERE username = "' . addslashes($player) . '" LIMIT 1');
            if ($result->num_rows != 1) {
                $tpl->assign('error', 'Speler is niet gevonden.');
            } else {
                if (isset($_POST['amount']) OR isset($_GET['amount'])) {
                    $amount = (isset($_POST['amount']) ? $_POST['amount'] : $_GET['amount']);
                    if (is_numeric($amount)) {
                        $dbCon->query('UPDATE users SET bank = (bank + "' . (int) $amount . '") WHERE username = "' . addslashes($player) . '"');
                        $tpl->assign('success', 'De speler ' . $player . ' heeft ' . $amount . ' op zijn bank erbij gekregen!');
                    } else {
                        $tpl->assign('error', 'Het ingegeven bedrag is niet numeriek.');
                        $tpl->assign('player', $player);
                        
                    }
                } else {
                    $tpl->assign('error', 'Geen bedrag ingevoerd voor donatie.');
                    $tpl->assign('player', $player);
                }
            }
        } else {
            $tpl->assign('error', 'Geen spelernaam opgegeven');
        }
    }
    
    // admin wants to delete user
    if (isset($_POST['delete']) OR isset($_GET['delete'])) {
        if (isset($_POST['player']) OR isset($_GET['player'])) {
            $player = (isset($_POST['player']) ? $_POST['player'] : $_GET['player']);
            
            $result = $dbCon->query('SELECT * FROM users WHERE username = "' . addslashes($player) . '" LIMIT 1');
            if ($result->num_rows != 1) {
                $tpl->assign('error', 'Speler is niet gevonden.');
            } else {
                if (isset($_GET['sureDelete'])) {
                    $playerData = $result->fetch_assoc();
                    $dbCon->query('DELETE FROM users WHERE id = "' . $playerData['id'] . '"');
                    $dbCon->query('DELETE FROM temp WHERE userid = "' . $playerData['id'] . '"');
                    
                    $tpl->assign('success', 'De speler ' . $player . ' is succesvol verwijderd!');
                } else {
                    $tpl->assign('error', 'Weet je het zeker dat je speler ' . $player . ' wilt verwijderen? Klik '
                                  . ' <a href="' . ROOT_URL .'admin/adminBasic.php?delete=true&sureDelete=true&player=' . $player . '">hier</a> als je het zeker weet!');
                    $tpl->assign('player', $player);
                }
            }
        } else {
            $tpl->assign('error', 'Geen spelernaam opgegeven');
        }
    }
}

$tpl->display('admin/adminBasic.tpl');