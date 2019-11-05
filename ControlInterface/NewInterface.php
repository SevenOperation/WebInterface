
<?php 
include_once '../logs/logger.php';
require_once '../AdminContentInterface/config.php'; 
include_once $path.'/htmlbuildHelper.php';
session_name('WATGSESSID');
session_start();
logIP();
//include_once $path.'/auslesen.php';
getNormalHeader();
getNormalBodyTop(NULL);
?>
<div class='navigation' style='background-color: #24292e'>
                <ul style='margin: 0px;'>
                	<li class='nav-header'><a class='nav-title'> Einstellungen</a>
                	<ul>
                	<li class='nav'><a href='status' target='content' ><img class='symbols' src='konsole_symbole.png'>Status</a></li>
                        <li class='nav'><a href='ci_konsole' target='content' ><img class='symbols' src='konsole_symbole.png'>Konsole</a></li>
                        <li class='nav'><a href='ci_start' target='content'><img class='symbols' src='konsole_symbole.png'>Start</a></li>
                        <li class='nav'><a href='ci_gameselection' target='content'><img class='symbols' src='konsole_symbole.png'>Spiel Auswählen</a></li>

                    	</ul>
                	</li>
           		</ul>
        </div>
                   </body>
                    </html>
