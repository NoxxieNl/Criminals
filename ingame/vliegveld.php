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

// Verkrijg alle landen welke in de config staan
$country = $dbCon->query('SELECT setting_value FROM settings WHERE setting_id = 4 LIMIT 1')->fetch_assoc();
$countryArray = json_decode($country['setting_value'], true);

// Haal gebouw informatie op + eigenaar
$building = $dbCon->query(' SELECT
                                buildings.building_name,
                                buildings.building_config,
                                users.username
                            FROM
                                buildings
                            LEFT JOIN users ON buildings.building_owner_id = users.id
                            WHERE
                                buildings.building_land_id = ' . addslashes($userData['country_id']))->fetch_assoc();
$buildingConfig = json_decode($building['building_config'], true);


// Voeg deze toe aan template parser
$tpl->assign('countryArray', $countryArray);
$tpl->assign('currentCountry', $countryArray[$userData['country_id']]);

// Voeg variabel data toe over gebouw
$tpl->assign('building_costs', $buildingConfig['costs']);
$tpl->assign('building_owner', $building['username']);

print_r($buildingConfig);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if($userData['cash'] < (int) $buildingConfig['costs']) {
		$error[] = 'Een ticket kost &euro; ' . $buildingConfig['costs'] . ' cash';
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
                                        cash = (cash - ' . (int)  $buildingConfig['costs'] . '),
                                        country_id = "' . addslashes($_POST['country']). '"
                                    WHERE
                                        id= "'. $userData['id']. '"');
        
        $tpl->assign('currentCountry', $countryArray[$_POST['country']]);
        $tpl->assign('success', 'Je betaalde ' . $buildingConfig['costs'] . ' en bent nu in '. $countryArray[$_POST['country']] .'!');
    }
}
$tpl->display('ingame/vliegveld.tpl');