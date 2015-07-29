# Criminals Blauw - Revamped

Criminals blauw is an reprogrammed & redesigned version of the old criminals that has been availible as opensource for a long time. The goal of this project is to allow beginning programmers to understand how some assets of the programming world works and how you can use them.

The programming is <b>NOT</b> intended to be the newest and the most advanced programming. The programming is written like it is because it is easy to read with no (to) advanced features.

As a few people said:
> The programming is easy to read and joyfull to read, because of its simplicity.  The programming is a good way to get into the programming world and learn in the right way.

This text you see here is *actually* written in Markdown! To get a feel for Markdown's syntax, type some text into the left window and watch the results in the right.

### Version
Currently we are still running a <b>stable</b> beta version, but this will change in time.

### Contributors

The criminals blauw - revamped group would like to thank the following people for the contribution to this projeect.

* Programming: Patrick (Vii)
* Security checks: Koen (k.rens)
* Begangster design: Frenzo (Frenzo.Brouwer)

> Without you guys the project would see a whole other daylight if there would be any daylight at all! Thanks for the work, donations and everything else!

### Features

* Template parser (Including 2 layouts!)
* Fully rebuild clan system
* Fully rebuild core code system
* Using latest programming for password protection
* Fully intergrated user system
* All the basics you need to run a online game

### Setup

Just run the installer in the folder /install and you are on your way!

#### Run the setup manually

To install the game manually you are free to do so. The following steps must be taking:
* Import sql.sql file into your database
* Change the config.inc.php file to match your data. 
* Register yourself on the website
* Change your user row and put "level" to "10" and you are all done!
Or run the following SQL command:
```
UPDATE users SET level = 10 WHERE id = 1
```
<i><b>Caution:</b> The sql query shown above will grant admin rights to the users with ID 1, if you register first on the website you are safe to use this command, if you are not sure I dont recommand to use this query!</i>

### Development

Want to contribute? Great!

We are always searching for great edits + plugins for our source if you got any please inform us! If you just go an idea of the make our project better don't hassitate and just tell the idea, we are always happy with people that think for us so we don't have to! :-)

### How to create a simple page
So you want add your own programming to the source... GREAT! Here is a template you can use for your php file:

```
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

// Include needed init file
require_once('../init.php');

// Check if the user is logged in, if not no need to be here...
if (LOGGEDIN == FALSE) { header('Location: ' . ROOT_URL . 'index.php'); }

// Your PHP code

// Change the ingame/index.tpl to your created template file
$tpl->display('ingame/index.tpl');
```

And a basic template file you can use:

```
{include 'header.tpl'}
    <p>Your html code</p>
{include 'footer.tpl'}
```

Special thanks to:
Ferhat Remory & Frenzo Brouwer(gave the rights of the Begangster layout)
