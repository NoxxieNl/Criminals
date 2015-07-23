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

// Show errors even if host doenst want it...
ini_set('display_errors', 1);
error_reporting(-1);

// Debug mode
DEFINE('DEBUG_MODE', TRUE);
date_default_timezone_set("Europe/Amsterdam");
$sysError = array();

// load in default settings
require_once('config.inc.php');

// Init smarty class
require_once('lib/Smarty.class.php');
$tpl = new Smarty();

//define root path
DEFINE('BASE_DIR', dirname(__FILE__).'/');

// Init database
$dbCon = new mysqli(SQL_HOSTNAME, SQL_USERNAME, SQL_PASSWORD, SQL_DATABASE);
if (mysqli_connect_error($dbCon)) {
    if (DEBUG_MODE) { $sysError[] = 'Could not connect to database. ' . mysqli_connect_errno($dbCon); }
    else { $sysError[] = 'Could not connect to database'; }
}

// Get layout used
$layout = $dbCon->query('SELECT setting_value FROM settings WHERE setting_id = 3')->fetch_assoc();

// Check if theme exist if not use default
if (!file_exists(BASE_DIR . 'templates/' . $layout['setting_value'] . '/') OR $layout['setting_value'] == '') {
    $layout['setting_value'] = 'blue';
}
DEFINE('TEMPLATE_DIR', BASE_DIR . 'templates/' . $layout['setting_value'] . '/');

// set tpl options
$tpl->setTemplateDir(BASE_DIR . 'templates/' . $layout['setting_value'] . '/')
      ->setCompileDir(BASE_DIR . 'templates/templates_c/')
      ->setCacheDir(BASE_DIR . 'cache');

$tpl->assign('TEMPLATE_DIR', TEMPLATE_DIR);
$tpl->assign('TEMPLATE_URL', ROOT_URL . 'templates/' . $layout['setting_value'] . '/');

// Basic information to tpl
$tpl->assign('BASE_DIR', BASE_DIR);
$tpl->assign('ROOT_URL', ROOT_URL);
$tpl->assign('WEBSITE_NAME', WEBSITE_NAME);


// check hash_equal exist, if not php version lower then 5.6 create our own :-)
if (!function_exists('hash_equals')) {
    function hash_equals($known_string, $user_string) {
        if (func_num_args() !== 2) {
            // handle wrong parameter count as the native implentation
            trigger_error('hash_equals() expects exactly 2 parameters, ' . func_num_args() . ' given', E_USER_WARNING);
            return null;
        }
        if (is_string($known_string) !== true) {
            trigger_error('hash_equals(): Expected known_string to be a string, ' . gettype($known_string) . ' given', E_USER_WARNING);
            return false;
        }
        $known_string_len = strlen($known_string);
        $user_string_type_error = 'hash_equals(): Expected user_string to be a string, ' . gettype($user_string) . ' given'; // prepare wrong type error message now to reduce the impact of string concatenation and the gettype call
        if (is_string($user_string) !== true) {
            trigger_error($user_string_type_error, E_USER_WARNING);
            // prevention of timing attacks might be still possible if we handle $user_string as a string of diffent length (the trigger_error() call increases the execution time a bit)
            $user_string_len = strlen($user_string);
            $user_string_len = $known_string_len + 1;
        } else {
            $user_string_len = $known_string_len + 1;
            $user_string_len = strlen($user_string);
        }
        if ($known_string_len !== $user_string_len) {
            $res = $known_string ^ $known_string; // use $known_string instead of $user_string to handle strings of diffrent length.
            $ret = 1; // set $ret to 1 to make sure false is returned
        } else {
            $res = $known_string ^ $user_string;
            $ret = 0;
        }
        for ($i = strlen($res) - 1; $i >= 0; $i--) {
            $ret |= ord($res[$i]);
        }
        return $ret === 0;
    }
}

// Check login state
if (isset($_COOKIE['game_session_id'])) {
    $sessionId = addslashes($_COOKIE['game_session_id']);
    $result = $dbCon->query('SELECT * FROM users WHERE session_id = "' . $sessionId . '" LIMIT 1');
        
    if ($result->num_rows > 0) {
        setcookie('game_session_id', $sessionId, time() + 86400, '/');
        DEFINE('LOGGEDIN', TRUE);
        
        // move all the user info into tpl variables
        $userData = $result->fetch_assoc();
        $tpl->assign($userData);
        
        // Define calculated fields
        // Extra power (Clicks gives extra power to player
        $userData['extra_attack_power'] = ($userData['clicks'] * 5);
        $tpl->assign('extra_attack_power', $userData['extra_attack_power']);
        
        // Total power (power + extra power)
        $userData['total_power'] = ($userData['attack_power'] + $userData['extra_attack_power']);
        $tpl->assign('total_power', $userData['total_power']);
        
        // update online time
        $result = $dbCon->query('UPDATE users SET online_time = CURRENT_TIMESTAMP WHERE session_id = "' . $sessionId . '"');
    } else {
        setcookie('game_session_id', $sessionId, (time() - 1));
        DEFINE('LOGGEDIN', FALSE);
    }
} else {
    DEFINE('LOGGEDIN', FALSE);
}

// Rank array

$rank = $dbCon->query("SELECT * FROM ranks");
$rankArray = $rank->fetch_array();

$rankLast = $dbCon->query("SELECT * FROM ranks ORDER BY id DESC LIMIT 1")->fetch_array();

  $tpl->assign('ranks', $rankArray && $rankLast);  

// Type array
$type = array(
    array('', ''),
    array('id' => 1, 'name' => 'Drugsdealer'),
    array('id' => 2, 'name' => 'Wetenschapper'),
    array('id' => 3, 'name' => 'Politie')
);
$tpl->assign('type', $type);
// get Current rank & type of user if user is logged in
if (LOGGEDIN == TRUE) {
    foreach ($rank as $item) {
 //       var_dump($rankLast->fetch_row());
        if ($userData['attack_power'] >= $item['power_low'] && $userData['attack_power'] < $item['power_high']) 
        {      
            $userData['rank'] = $item['name'];
            $tpl->assign('rank', $userData['rank']);
        
        }
        elseif($userData['attack_power'] > $rankLast['power_high']) //compare current attack_power with the highest rank, if reached above highest rank, turned back into the last rank.
        {
            $tpl->assign('rank',$rankLast['name']);
        }
    }
  
    // set user type
    $userData['typeName'] = $type[$userData['type']]['name'];
    $tpl->assign('typeName', $userData['typeName']);
    
    // get unread messages
    $messageCount = $dbCon->query('SELECT message_id
                                   FROM messages
                                   LEFT JOIN users AS fromUser ON messages.message_from_id = fromUser.id
                                   WHERE message_to_id = "' . $userData['id'] . '" AND message_deleted_to = 0 AND message_read = 0')->num_rows;
    
    $tpl->assign('unreadMessages', $messageCount);
}

// Get total players
$result = $dbCon->query('SELECT COUNT(username) AS Count FROM users WHERE activated != 0');
$row = $result->fetch_assoc();
$tpl->assign('totalusers', $row['Count']);

$tpl->assign('LOGGEDIN', LOGGEDIN);