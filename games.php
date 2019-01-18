
<?php 
include_once 'AdminContentInterface/htmlbuildHelper.php';
session_name('WATGSESSID'); 
session_start();
 
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
 getNormalHeader();
 getNormalBodyTop("/pictures/games.jpg");
 ?>
                    </body>
                    </html>
