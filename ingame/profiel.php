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

// Check if user is loggedin, if not no need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

// check if id is given if not show own profile
if (!isset($_GET['id']) OR empty($_GET['id'])) {
    $userId = $userData['id'];
} else {
    if (is_numeric($_GET['id'])) {
        // check if user exists if not show own profile
        $numResults = $dbCon->query('SELECT username FROM users WHERE id = "' . addslashes($_GET['id']) . '" LIMIT 1')->num_rows;
        if ($numResults < 1) {
            $userId = 1;
        } else {
            // valid id
            $userId = (int) $_GET['id'];
        }
    } else {
        $userid = 1;
    }
}

$userProfile = $dbCon->query('SELECT * FROM users WHERE id = "' . addslashes($userId) . '" LIMIT 1')->fetch_assoc();
$itemsResult = $dbCon->query('SELECT * FROM user_items LEFT JOIN items ON user_items.item_id = items.item_id WHERE user_id = "' . addslashes($userId) . '"');

while ($items = $itemsResult->fetch_assoc()) {
    $itemArray[$items['item_id']]['id'] = $items['item_id'];
    $itemArray[$items['item_id']]['name'] = $items['item_name'];
    $itemArray[$items['item_id']]['attack_power'] = $items['item_attack_power'];
    $itemArray[$items['item_id']]['defence_power'] = $items['item_defence_power'];
    $itemArray[$items['item_id']]['costs'] = $items['item_costs'];
    $itemArray[$items['item_id']]['count'] = $items['item_count'];
    $itemArray[$items['item_id']]['total_attack_power'] = ($items['item_attack_power'] * $items['item_count']);
    $itemArray[$items['item_id']]['total_defence_power'] = ($items['item_defence_power']  * $items['item_count']);
}
if ($itemsResult->num_rows > 1) { 
    $tpl->assign('items', $itemArray);
}
        
$tpl->assign('user', $userProfile);
$tpl->display('ingame/profiel.tpl');