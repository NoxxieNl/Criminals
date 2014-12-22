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
$listArray = array();

// user online list check
 if (isset($_POST['onlineList'])) {
    $result = $dbCon->query('UPDATE users SET showonline = "' . ($userData['showonline'] == 1 ? 0 : 1) . '" WHERE id = "' . $userData['id'] . '"');
    $tpl->assign('success', 'Online status is succesvol gewijzigd!');
        
    $userData['showonline'] = ($userData['showonline'] == 1 ? 0 : 1);
    $tpl->assign('showonline', $userData['showonline']);
}


// Check if user wants a diffirent sorting
if (!isset($_GET['order']) OR empty($_GET['order'])) {
    $orderBy = 'username';
} else {
    if ($_GET['order'] != 'username' OR $_GET['order'] != 'attack_power' OR $_GET['order'] != 'type' OR $_GET['order'] != 'cash' OR $_GET['order'] != 'bank') {
        $orderBy = 'username';
    } else {
        $orderBy = $_GET['order'];
    }
}

// check if pagination is active
if (!isset($_GET['start']) OR empty($_GET['start'])) {
    $start = 0;
} else {
    if (!is_numeric($_GET['start'])) {
        $start = 0;
    } else {
        $start = $_GET['start'];
    }
}
$listResult = $dbCon->query('SELECT id, username, attack_power, type, cash, bank, clicks FROM users WHERE activated = 1 AND showonline = 1 ORDER BY "' . addslashes($orderBy) . '" LIMIT ' . addslashes($start) . ',50');
while ($row = $listResult->fetch_assoc()) {
    $listArray[$row['id']]['id'] = $row['id'];
    $listArray[$row['id']]['username'] = $row['username'];
    $listArray[$row['id']]['type'] = $type[$row['type']]['name'];
    $listArray[$row['id']]['type_id'] = $row['type'];
    $listArray[$row['id']]['cash'] = $row['cash'];
    $listArray[$row['id']]['bank'] = $row['bank'];
    $listArray[$row['id']]['attack_power'] = ($row['attack_power'] + ($row['clicks'] * 5));
}
$tpl->assign('list', $listArray);

// Activate pagination
if (($start / 50) != 0) {
    $start = 0;
}

$pageResult = $dbCon->query('SELECT id FROM users')->num_rows;
$pageCount = ceil($pageResult / 50);

// Get current active page
$p = 1;
$pC = 0;
while ($p <= $pageCount) {
    if ($pC == $start) {
        break;
    }
    $pC = ($pC + 50);
    $p++;
}
$pagination = array();
$pagination['cPage'] = $p;
$pagination['tPage'] = $pageCount; 

for ($i = 1; $i <= $pageCount; $i++) {
    $pagination['pageBegin'][$i] = (($i - 1) * 50);
}
$tpl->assign('pagination', $pagination);

// Get current online users from view
$result = $dbCon->query('SELECT * FROM onlineUsers');
$onlineUsers = array();
while ($row = $result->fetch_assoc()) {
    $onlineUsers[$row['showonline']] = $row['Count'];
}
$tpl->assign('onlineusers', $onlineUsers);

// Output page
$tpl->assign('order', $orderBy);
$tpl->display('ingame/list.tpl');