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

// load in default settings
require_once('config.inc.php');

// Init smarty class
require_once('lib/Smarty.class.php');
$tpl = new Smarty();

//define root path
DEFINE('BASE_DIR', dirname(__FILE__).'/');

$tpl->assign('BASE_DIR', BASE_DIR);
$tpl->assign('ROOT_URL', ROOT_URL);

// Debug mode
DEFINE('DEBUG_MODE', TRUE);
date_default_timezone_set("Europe/Amsterdam");
$sysError = array();

// set tpl options
$tpl->setTemplateDir(BASE_DIR . 'templates/')
      ->setCompileDir(BASE_DIR . 'templates/templates_c/')
      ->setCacheDir(BASE_DIR . 'cache');

// Init database
$dbCon = new mysqli(SQL_HOSTNAME, SQL_USERNAME, SQL_PASSWORD, SQL_DATABASE);
if (mysqli_connect_error($dbCon)) {
    if (DEBUG_MODE) { $sysError[] = 'Could not connect to database. ' . mysqli_connect_errno($dbCon); }
    else { $sysError[] = 'Could not connect to database'; }
}

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
$rank = array(
    array('Name' => 'Zwerver', 'power_low' => 0, 'power_high' => 100),
    array('Name' => 'Bedelaar', 'power_low' => 100, 'power_high' => 700),
    array('Name' => 'Crimineel', 'power_low' => 700, 'power_high' => 1300),
    array('Name' => 'Zakkenroller', 'power_low' => 1300, 'power_high' => 2000),
    array('Name' => 'Tuig', 'power_low' => 2000, 'power_high' => 2800),
    array('Name' => 'Geweldadig', 'power_low' => 2800, 'power_high' => 3700),
    array('Name' => 'Autodief', 'power_low' => 3700, 'power_high' => 4700),
    array('Name' => 'Drugsdealer', 'power_low' => 4700, 'power_high' => 5800),
    array('Name' => 'Gangster', 'power_low' => 5800, 'power_high' => 6000),
    array('Name' => 'Overvaller', 'power_low' => 6000, 'power_high' => 7300),
    array('Name' => 'Bendeleider', 'power_low' => 7300, 'power_high' => 1000),
    array('Name' => 'Godfather', 'power_low' => 10000, 'power_high' => 999999999)
);
$tpl->assign('ranks', $rank);

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
        if ($userData['attack_power'] >= $item['power_low'] && $userData['attack_power'] < $item['power_high']) {
            $userData['rank'] = $item['Name'];
            $tpl->assign('rank', $userData['rank']);
        }
    }
  
    // set user type
    $userData['typeName'] = $type[$userData['type']]['name'];
    $tpl->assign('typeName', $userData['typeName']);
}

// Get total players
$result = $dbCon->query('SELECT COUNT(username) AS Count FROM users WHERE activated != 0');
$row = $result->fetch_assoc();
$tpl->assign('totalusers', $row['Count']);

$tpl->assign('LOGGEDIN', LOGGEDIN);