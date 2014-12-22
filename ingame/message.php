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

$error = array();
$form_error = '';

if (isset($_GET['page']) AND !empty($_GET['page'])) {
    
    // User wants to read a message
    if ($_GET['page'] == 'read') {
        $showPage = 'Read';
        
        if (!isset($_GET['id']) OR empty($_GET['id'])) {
            $error[] = 'Geen bericht ID gevonden...';
        } else {
            if (!is_numeric($_GET['id'])) {
                $error[] = 'ID is niet valide!';
            } else {
                $result = $dbCon->query('SELECT message_id, message_to_id FROM messages WHERE message_id = "' . addslashes($_GET['id']) . '"');
                if ($result->num_rows < 1) {
                    $error[] = 'Bericht is niet gevonden!';
                } else {
                    $fetch = $result->fetch_assoc();
                    
                    // User may online read messages from himself, or admins they can read everything
                    if ($userData['id'] != $fetch['message_to_id'] AND $level == 0) {
                        $error[] = 'Je hebt geen rechten om dit bericht te lezen!';
                    }
                }
            }
        }
        
        if (count($error) > 0) {
            foreach ($error as $item) {
                $form_error .= '- ' . $item . '<br />';
            }
            
            $tpl->assign('form_error', $form_error);
        } else {
            // User may read the message
            $message = $dbCon->query('SELECT message_subject, message_message, message_time, fromUser.username, fromUser.id
                                      FROM messages
                                      LEFT JOIN users AS fromUser ON messages.message_from_id = fromUser.id
                                      WHERE message_id = "' . addslashes($_GET['id']) . '" LIMIT 1')->fetch_assoc();
            
            // Update to read status
            $dbCon->query('UPDATE messages SET message_read = 1 WHERE message_id = "' . addslashes($_GET['id']) . '"');
            $tpl->assign('message', $message);
        }
    }
    
    // user wants to see his inbox
    if ($_GET['page'] == 'inbox') {
        $showPage = 'Inbox';
        
        $messageArray = array();
        $messages = $dbCon->query('SELECT message_id, message_subject, message_time, fromUser.username, message_read
                                   FROM messages
                                   LEFT JOIN users AS fromUser ON messages.message_from_id = fromUser.id
                                   WHERE message_to_id = "' . $userData['id'] . '" AND message_deleted_to = 0');
        
        while ($row = $messages->fetch_assoc()) {
            $messageArray[$row['message_id']]['id'] = $row['message_id'];
            $messageArray[$row['message_id']]['subject'] = $row['message_subject'];
            $messageArray[$row['message_id']]['from'] = $row['username'];
            $messageArray[$row['message_id']]['time'] = $row['message_time'];
            $messageArray[$row['message_id']]['read'] = $row['message_read'];
        }
        
        $tpl->assign('message', $messageArray);
    }
    
    // user wants to see his outbox
    if ($_GET['page'] == 'outbox') {
        $showPage = 'Outbox';
        
        $messageArray = array();
        $messages = $dbCon->query('SELECT message_id, message_subject, message_time, toUser.username
                                   FROM messages
                                   LEFT JOIN users AS toUser ON messages.message_from_id = toUser.id
                                   WHERE message_from_id = "' . $userData['id'] . '" AND message_deleted_from = 0');
        
        while ($row = $messages->fetch_assoc()) {
            $messageArray[$row['message_id']]['id'] = $row['message_id'];
            $messageArray[$row['message_id']]['subject'] = $row['message_subject'];
            $messageArray[$row['message_id']]['from'] = $row['username'];
            $messageArray[$row['message_id']]['time'] = $row['message_time'];
        }
        
        $tpl->assign('message', $messageArray);
    }
    
    // user wants to send a message
    if ($_GET['page'] == 'new') {
        $showPage = 'New';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['message']) OR empty($_POST['message'])) {
                $error[] = 'Er is geen bericht ingegeven!';
            }
            elseif (strlen($_POST['message']) > 1000) {
                $error[] = 'Het ingevoerde bericht is te lang!';
            }
            
            if (!isset($_POST['subject']) OR empty($_POST['subject'])) {
                $error[] = 'Er is geen onderwerp ingegeven!';
            }
            
            if (!isset($_POST['to']) OR empty($_POST['to'])) {
                $error[] = 'Er is geen speler ingegeven waar naartoe verzonden moet worden!';
            } else {
                $check = $dbCon->query('SELECT username FROM users WHERE username = "' . addslashes($_POST['to']) . '"')->num_rows;
                if ($check < 1) {
                    $error[] = 'De speler waar naartoe verzonden wilt worden bestaat niet!';
                }
            }
            
            if (count($error) > 0) {
                foreach ($error as $item) {
                    $form_error .= '- ' . $item . '<br />';
                }

                $tpl->assign('form_error', $form_error);
            } else {
                // User may send the message
                $recUser = $dbCon->query('SELECT id, username FROM users WHERE username = "' . addslashes($_POST['to']) . '" LIMIT 1')->fetch_assoc();
                
                $dbCon->query('INSERT INTO messages (message_from_id, message_to_id, message_subject, message_message) VALUES
                               ("' . $userData['id'] . '", "' . $recUser['id'] . '", "' . addslashes($_POST['subject']) . '", "' . addslashes($_POST['message']) . '")');
            
                $tpl->assign('success', 'Het bericht is succesvol verzonden naar ' . $recUser['username'] . '!');
            }
        }
        else {
            // check if user id is found if so check if user exists and if so fill send to with that user
            if (isset($_GET['id']) AND !empty($_GET['id'])) {
                $checkUser = $dbCon->query('SELECT username FROM users WHERE id = "' . addslashes($_GET['id']) . '" LIMIT 1');
                if ($checkUser->num_rows > 0) {
                    $fetchUser = $checkUser->fetch_assoc();
                    $tpl->assign('toUser', $fetchUser['username']);
                }
            }
        }
    }
} else {
    header('Location: ' . ROOT_URL . 'ingame/message.php?page=inbox');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    // Check if user wants to delete message, if so delete the given messages in $_POST['id']
    if (isset($_POST['delMessagesOutbox']) OR isset($_POST['delMessagesInbox'])) {
        
        if (isset($_POST['id'])) {
            foreach ($_POST['id'] as $id => $status) {
                
                $mDelete = $dbCon->query('SELECT message_deleted_from, message_deleted_to FROM messages WHERE message_id = "' . addslashes($id) . '"')->fetch_assoc();
                    
                // Check if user delete messages from inbox or outbox
                if (isset($_POST['delMessagesInbox'])) {
                        
                    // if sender already deleted the message delete the row
                    if ($mDelete['message_deleted_from'] == 1) {
                        $dbCon->query('DELETE FROM messages WHERE message_id = "' . addslashes($id) . '"');
                    } else {
                        $dbCon->query('UPDATE messages SET message_deleted_to = 1 WHERE message_id = "' . addslashes($id) . '"');
                    }
                } else {
                        
                    // if reciever already deleted the message delete the row
                    if ($mDelete['message_deleted_to'] == 1) {
                        $dbCon->query('DELETE FROM messages WHERE message_id = "' . addslashes($id) . '"');
                    } else {
                        $dbCon->query('UPDATE messages SET message_deleted_from = 1 WHERE message_id = "' . addslashes($id) . '"');
                    } 
                }
                $tpl->assign('success', (count($_POST['id']) > 1 ? 'De berichten zijn' : 'Het bericht is') . ' succesvol verwijderd!');
                header('Refresh: 0.5; url=' . $_SERVER['PHP_SELF']);
            }
        }
    }
}

$tpl->display('ingame/message' . $showPage . '.tpl');