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

if (isset($_GET['player']) OR isset($_GET['id'])) {
    
    if (isset($_GET['player'])) {
        $result = $dbCon->query('SELECT * FROM users WHERE username = "' . addslashes($_GET['player']) . '" LIMIT 1');
    } else {
        $result = $dbCon->query('SELECT * FROM users WHERE id = "' . addslashes($_GET['id']) . '" LIMIT 1');
    }
    // check if the defender exists
    if ($result->num_rows > 0) {
        $defUser = $result->fetch_assoc();
        
        // If defender is under protection you cannot attack that person...
        if ($defUser['protection'] != 1) {
            
            // Players can not attack a person of the same type
            if ($defUser['type'] != $userData['type']) {
                
                // The player cannot attack himself...
                if ($defUser['username'] != $userData['username']) {
                    $temp = $dbCon->query('SELECT * FROM temp WHERE userid = "' . $userData['id'] . '" AND variable = "' . $defUser['id'] . '" AND area = "attack"');
                    
                    // You can attack the same player for max 5 times a day
                    if ($temp->num_rows < 5) {
                        
                        // With pitty, players below a 1000 cash cannot be attacked
                        if ($defUser['cash'] > '1000') {
                        
                            // Check if the cooldown for attacks has past
                            $cooldownCheck = $dbCon->query('SELECT * FROM temp WHERE userid = "' . $userData['id'] . '" AND area = "cooldown"
                                                                                     AND (UNIX_TIMESTAMP(NOW()) - variable) < 10');
                           
                            if ($cooldownCheck->num_rows < 1) {
                                // Insert into temp table for max attack count
                                $dbCon->query('INSERT INTO temp (userid, variable, area) VALUES("' . $userData['id'] . '", "' . $defUser['id'] . '", "attack")');

                                $outcome = ((($userData['attack_power'] + $userData['extra_attack_power']) * rand(90,115)) >= ($defUser['defence_power'] + $defUser['clicks'] * 5)* rand(90,115)) ? 1 : 0;
                                $moneyTaken = ($outcome == 1) ? (int)($defUser['cash'] * rand(40,75) / 100) : (int)($userData['cash'] * rand(25,40) / 100);

                                if ($outcome == 1) {
                                    // attacker won
                                    $dbCon->query('UPDATE users SET cash = (cash - "' . $moneyTaken . '"), attacks_lost = (attacks_lost + 1) WHERE id = "' . $defUser['id'] . '"');
                                    $dbCon->query('UPDATE users SET cash = (cash + "' . $moneyTaken . '"), attacks_won = (attacks_won + 1) WHERE id = "' . $userData['id'] . '"');

                                    $tpl->assign('success', 'Je valt ' . $defUser['username'] . ' aan en je wint het gevecht! Je wint ' . $moneyTaken . ' in harde cash!');
                                } else {
                                    // attacker loser
                                    $dbCon->query('UPDATE users SET cash = (cash + "' . $moneyTaken . '"), attacks_won = (attacks_won + 1) WHERE id = "' . $defUser['id'] . '"');
                                    $dbCon->query('UPDATE users SET cash = (cash - "' . $moneyTaken . '"), attacks_lost = (attacks_lost + 1) WHERE id = "' . $userData['id'] . '"');

                                    $tpl->assign('error', 'Je valt ' . $defUser['username'] . ' aan en je had niet verwacht dat hij zo sterk was! Je verliest ' . $moneyTaken . '!');
                                }

                                // slow down the fast clickers with a 5 second cooldown
                                $cooldown = $dbCon->query('SELECT * FROM temp WHERE userid = "'  . $userData['id'] . '" AND area = "cooldown"');
                                if ($cooldown->num_rows > 0) {
                                    $dbCon->query('UPDATE temp SET variable = UNIX_TIMESTAMP(NOW()) WHERE userid = "' . $userData['id'] . '" AND area = "cooldown"');
                                } else {
                                    $dbCon->query('INSERT INTO temp (userid, variable, area) VALUES("' . $userData['id'] . '", UNIX_TIMESTAMP(NOW()), "cooldown")');
                                }
                            } else {
                                $tpl->assign('error', 'Je bent nog moe van de vorige aanval!');
                            }
                        } else {
                            $tpl->assign('error',$defUser['username'] . ' heeft al weinig geld, uit medelijden val je niet aan!');
                        }
                    } else {
                        $tpl->assign('error', 'Je hebt ' . $defUser['username'] . ' al 5x aangevallen vandaag!');
                    }
                } else {
                    $tpl-assign('error', 'je slaat je zelf tegen je hoofd en valt flauw neer...');
                }
            } else {
                $tpl->assign('error', 'Je mag de zelfde type niet aanvallen, is een beetje cru, niet?');
            }
        } else {
            $tpl->assign('error', 'Deze speler staat nog onder bescherming!');
        }
    } else {
        $tpl->assign('error', 'Deze speler bestaat niet!');
    }
} else {
    $tpl->assign('error', 'Geen speler ingevoerd.');
}
$tpl->display('ingame/attack.tpl');