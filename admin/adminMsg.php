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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // admin wants to mass message players
    if (isset($_POST['massMsg'])) {
        if (isset($_POST['message']) && !empty($_POST['message'])) {
            if (isset($_POST['subject']) && !empty($_POST['subject'])) {
                $result = $dbCon->query('SELECT id FROM users');
                while ($row = $result->fetch_assoc()) {
                    $dbCon->query('INSERT INTO messages (message_from_id , message_to_id, message_subject, message_message) VALUES (
                                                        "' . $userData['id'] . '", "' . $row['id'] . '", "' . addslashes($_POST['subject']) . '",
                                                        "' . nl2br(addslashes($_POST['message']) . '")')) or die(mysqli_error($dbCon));
                    
                    $tpl->assign('success', 'Het bericht is verstuurd naar alle spelers');
                }
            } else {
                $tpl->assign('error', 'Er is geen onderwerp ingegeven');
            }
        } else {
            $tpl->assign('error', 'Er is geen bericht ingegeven');
        }
    }
}

$tpl->display('admin/adminMsg.tpl');