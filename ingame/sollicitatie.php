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

// Define website root dir
require_once('../init.php');

// Check if user is loggedin, if not no need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

$formError = '';
$error = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_POST['function']) OR empty($_POST['function'])) {
        $error[] = 'Je hebt geen functie aangegeven';
    }
    
    if (!isset($_POST['onlineHours']) OR empty($_POST['onlineHours'])) {
        $error[] = 'Je hebt niet aangegeven hoeveel uur je online bent';
    }
    
    if (!isset($_POST['goodQuality']) OR empty($_POST['goodQuality'])) {
        $error[] = 'Je hebt je goede eigenschappen niet aangegeven';
    }
    
    if (!isset($_POST['badQuality']) OR empty($_POST['badQuality'])) {
        $error[] = 'Je hebt je slechte eigenschappen niet aangegeven';
    }
    
    if (!isset($_POST['reason']) OR empty($_POST['reason'])) {
        $error[] = 'Je hebt geen reden waarom je teamlid wilt worden aangegeven';
    }
    
    if (count($error) > 0) {
        foreach ($error as $item) {
            $formError .= '- ' . $item . '<br />';
        }
        $tpl->assign('form_error', $formError);
    } else {
        
        //Prevent email injection
        foreach ($_POST as $data => $post) {
            $_POST[$post] = str_replace(array('\r', '\n', '%0a', '%0d'), '', stripslashes($data));
        }
       
        $to = ROOT_EMAIL;
        $subject = 'Sollicitatie';
        $message = $_POST['login'] . ' heeft gesolliciteerd via uw criminals.\n\n '
                   . 'Zijn e-mail adres is:\n ' . $userData['emai'] . ' \n\n Hij zou graag de functie hebben van:\n '
                   . '' . $_POST['function'] . '\n\n Hij is daarvoor zoveel uur per dag beschikbaar: \n '
                   . '' . $_POST['onlineHours'] . '\n\n Zijn goede eigenschappen zijn:\n '
                   . '' . $_POST['goodQuality'] . '\n\n En zijn slechte eigenschappen zijn:\n '
                   . '' . $_POST['badQuality'] . '\n\n Hij wil deze functie om deze reden:\n '
                   . '' . $_POST['reason'];

        $headers = 'From: noreply@noreply.nl\r\n';
        $headers .= 'Reply-To: noreply@noreply.nl\r\n';
        $headers .= 'Return-Path: noreply@noreply.nl\r\n';

        if (mail($to,$subject,$message,$headers) ) {
            $tpl->assign('success', 'Je hebt succesvol gesoliciteerd, het team neemt zo spoedig mogelijk contact met je op!');
        } else {
            $tpl->assign('form_error', 'Er is een technische storing ontstaan, je sollicitatie is niet verstuurd!');
        }
    }
}

$tpl->display('ingame/sollicitatie.tpl');