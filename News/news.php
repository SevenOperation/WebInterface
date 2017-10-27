
 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
?>


<html>
    <head>
        <meta charset='UTF-8'>
        <title>Herzlich Wilkommen bei WeAreTheGamers</title>
        <link rel='stylesheet' href='Style.css'>
        <script type='text/javascript'>
            function userMenue() {
                if (document.getElementById('register')) {
                    document.getElementById('register').classList.remove('show');
                }
                document.getElementById('login').classList.toggle('show');
            }
            function registerUser() {
                document.getElementById('login').classList.remove('show');
                document.getElementById('register').classList.toggle('show');
            }
            window.onclick = function (event) {
                if (!event.target.matches('.input') && !event.target.matches('.einloggenCss')) {
                    var dropdowns = document.getElementsByClassName('drop2');
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
    </head>
<?php
require_once '../testAdminContentInterface/htmlbuildHelper.php';
getNormalBodyTop($username);
?>
<iframe width="600" height="340" src="https://www.youtube.com/embed/latest?list=UChX1P_mHNWCcaa9oHvHiRAg" frameborder="0" allowfullscreen></iframe> 
<iframe width="600" height="340" src="https://www.youtube.com/channel/UChX1P_mHNWCcaa9oHvHiRAg/feed?activity_view=1" frameborder="0" allowfullscreen></iframe>
                    </body>
                    </html>
<?php
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


