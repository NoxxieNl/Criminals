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
if ($_SERVER['REMOTE_ADDR'] != ALLOWED_IP) { die('No direct access...'); }

// Update users
$dbCon->query('UPDATE users SET cash = (cash + 100),
				bank = (bank + (
                                            	CASE 
                                                    WHEN type = 3 THEN 200
                                                    ELSE 0
                     				END
                     			)
                            WHERE activated = 1');

// Update clans
$result = $dbCon->query(' SELECT
                                clan_id,
                                item_count
                            FROM
                                clans
                                LEFT JOIN clan_items ON clans.clan_id = clan_items.clan_id
                            WHERE
                                clan_items.item_id IN (29,30,31)');

while ($row = $result->fetch_assoc()) {
    $dbCon->query(' UPDATE
                        clans
                    SET
                        cash = (cash + ((
                                            CASE 
                                                WHEN type = 1 THEN 50
                                                WHEN type = 2 THEN 100
                                                WHEN type = 3 THEN 250
                                            END
                                        ) 
                                        * "' . $row['item_count'] . '"),
                         bank = (bank + ((
                                            CASE 
                                                WHEN type = 1 THEN 150
                                                WHEN type = 2 THEN 100
                                                WHEN type = 3 THEN 0
                                            END
                                            ) 
                                        * "' . $row['item_count'] . '"),
                         WHERE
                        clan_id = "' . $rpw['clan_id'] . '"');
}