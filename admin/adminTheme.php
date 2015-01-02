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

$error = array();
$form_error = '';

// Check if user is loggedin, if so no need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }
if ($userData['level'] < 10) { header('Location: ' . ROOT_URL . '/ingame/index.php'); }

// Themes list
$themes = array('blue', 'begangster');
$tpl->assign('themes', $themes);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // admin wants to mass message players
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['theme']) OR empty($_POST['theme'])) {
            $error[] = 'Geen ander thema opgegeven!';
        } else {
            if (!in_array($_POST['theme'], $themes)) {
                $error[] = 'Dit thema bestaat niet!';
            }
        }
        
        // Check for errors, if there are any show them
        if (count($error) > 0) {
            foreach ($error as $item) {
                $form_error .= '- ' . $item . '<br />';
            }
            $tpl->assign('form_error', $form_error);
        } else {
           // admin is going to change the theme
           $dbCon->query('UPDATE settings SET setting_value = "' . addslashes($_POST['theme']) . '" WHERE setting_id = 3');
           $tpl->assign('success', 'Het thema is succesvol gewijzigd!');
        }
    }
}

$tpl->display('admin/adminTheme.tpl');