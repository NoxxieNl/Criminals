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

$error = array();
$form_error = '';

$country = $dbCon->query('SELECT setting_value FROM settings WHERE setting_id = 4 LIMIT 1')->fetch_assoc();
$countryArray = json_decode($country['setting_value'], true);

$tpl->assign('countryArray', $countryArray);
$tpl->assign('currentCountry', $countryArray[$userData['country_id']]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if($userData['cash'] < 250) {
		$error[] = 'Een ticket kost &euro; 250,- cash';
	}
	if(empty($_POST['country']) OR !isset($_POST['country'])) {
		$error[] = 'Selecteer een land om waar je heen wilt vliegen.';
	} else {
		if(!isset($countryArray[$_POST['country']])) {
			$error[] = 'Dit land bestaat niet!';
		} else {
			if($userData['country_id'] == $_POST['country']) {
				$error[] = 'Je bent al in ' . $countryArray[$_POST['country']] . '!';
			}
		}
	}
	if (count($error) > 0) {
        foreach ($error as $item) {
            $form_error .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $form_error);
    } else {
        $result = $dbCon->query(' UPDATE
                                        users
                                    SET
                                        cash = (cash - 250),
                                        country_id = "' . addslashes($_POST['country']). '"
                                    WHERE
                                        id= "'. $userData['id']. '"');
        
        $tpl->assign('currentCountry', $countryArray[$_POST['country']]);
        $tpl->assign('success', 'Je betaald 250 en bent nu in '. $countryArray[$_POST['country']] .'!');
    }
}
$tpl->display('ingame/vliegveld.tpl');