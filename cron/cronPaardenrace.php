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
require_once('cron_config.php');


$winningHorse = rand(1,50);
$jackpot = 0;
$gamblers = 0;
$multiply = 0;

// Calculate total jackpot
$result = $dbCon->query('SELECT * FROM temp WHERE area = "horse"');
while ($row = $result->fetch_assoc()) {
    $jackpot += 20000;
    $gamblers++;
}

// Calculate gains and add them to the bank
$result = $dbCon->query('SELECT * FROM temp WHERE area = "horse"');
while ($row = $result->fetch_assoc()) {
    if ($row['extra'] == 3) { $multiply = 1; }
    if ($row['extra'] == 2) { $multiply = 0.5; }
    if ($row['extra'] == 1) { $multiply = 0.25; }
    
    $amount = floor($jackpot / $gamblers * (25 * pow(2, $multiply)));
    $dbCon->query('UPDATE users SET bank = (bank + "' . $amount . '" WHERE id = "' . $row['user_id'] . '"');
}

$dbCon->query('DELETE FROM temp WHERE area = "horse"');
