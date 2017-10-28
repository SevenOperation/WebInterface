
<?php 
include_once 'testAdminContentInterface/htmlbuildHelper.php';
file_put_contents('user.txt', $_SERVER['REMOTE_ADDR'] ); 
session_start();
 
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
 getNormalHeader();
   getNormalBodyTop($username);
 ?>

                    
                    </body>
                    </html>


