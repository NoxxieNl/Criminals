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

// Check if protection is taken of or change in onlinelist has been requested
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['onlineList'])) {
        $result = $dbCon->query('UPDATE users SET showonline = "' . ($userData['showonline'] == 1 ? 0 : 1) . '" WHERE id = "' . $userData['id'] . '"');
        $tpl->assign('success', 'Online status is succesvol gewijzigd!');
        
        $userData['showonline'] = ($userData['showonline'] == 1 ? 0 : 1);
        $tpl->assign('showonline', $userData['showonline']);
    }
    
    if (isset($_POST['guard'])) {
        $result = $dbCon->query('UPDATE users SET protection = "0" WHERE id = "' . $userData['id'] . '"');
        $userData['protection'] = 0;
        $tpl->assign('protection', 0);
        $tpl->assign('success', 'Je bescherming is er nu vanaf gehaald, succes!');
    }
}

// Get current online users from view
$result = $dbCon->query('SELECT * FROM onlineUsers');
$onlineUsers = array();
while ($row = $result->fetch_assoc()) {
    $onlineUsers[$row['showonline']] = $row['Count'];
}
$tpl->assign('onlineusers', $onlineUsers);

// Get click count today
$result = $dbCon->query('SELECT COUNT(userid) AS Count FROm clicks WHERE userid = "' . $userData['id'] . '"');
$row = $result->fetch_assoc();
if($row['Count'] == null) {
    $row['Count'] = 0;
}

$tpl->assign('clicks_today', $row['Count']);

$tpl->display('ingame/index.tpl');