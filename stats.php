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

require_once('init.php');

// Get best players
$bestPlayers = array();

$typeResult = $dbCon->query('SELECT username FROM users ORDER BY attack_power DESC LIMIT 0,5');
while ($row = $typeResult->fetch_assoc()) {
    $bestPlayers[] = $row['username'];
}
$tpl->assign('bestPlayers', $bestPlayers);

// Get best clans
$bestClans = array();

$clanResult = $dbCon->query('SELECT clan_name FROM clans ORDER BY clan_clicks DESC LIMIT 0,5');
while ($row = $clanResult->fetch_assoc()) {
    $bestClans[] = $row['clan_name'];
}
$tpl->assign('bestClans', $bestClans);

// Get newest members
$newestMembers = array();

$newestResult = $dbCon->query('SELECT username FROM users WHERE activated = 1 ORDER BY id DESC LIMIT 0,5');
while ($row = $newestResult->fetch_assoc()) {
    $newestMembers[] = $row['username'];
}
$tpl->assign('newestMembers', $newestMembers);

// Get most clicks
$mostClicks = array();

$clicksResult = $dbCon->query('SELECT username FROM users ORDER BY clicks DESC LIMIT 0,5');
while ($row = $clicksResult->fetch_assoc()) {
    $mostClicks[] = $row['username'];
}
$tpl->assign('mostClicks', $mostClicks);

// get member count by type
$memberCount = array();

$countResult = $dbCon->query('SELECT COUNT(*) as aantal, type FROM users GROUP BY type');
while ($row = $countResult->fetch_assoc()) {
    $memberCount[$row['type']] = $row['aantal'];
}
$tpl->assign('memberCount', $memberCount);
$tpl->display('stats.tpl');