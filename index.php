
<?php 
include_once './logs/logger.php';
include_once 'testAdminContentInterface/htmlbuildHelper.php';
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
getNormalHeader();
getNormalBodyTop($username);
?>
                    <iframe id='ts3' allowtransparency='true' src='https://server.nitrado.net//teamspeak/view/382448/?fgcolor=ffffff' style='width: 100%;height: 500px ' scrolling='auto' frameborder='0'>Your Browser will not show Iframes</iframe>
                        </body>
                    </html>
