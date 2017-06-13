<?php
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = $_COOKIE['benutzerdaten'] . explode("-")[0];
    $password = $_COOKIE['benutzerdaten'] . explode("-")[1];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title> titel </title>
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
    <body style='background-image: url(/logo_1.png);  background-size: cover;'>
        <div style='background-color: #24292e; padding-top: 12px; padding-bottom: 12px; line-height: 1.5 ;'>
            <div class='head' style='width: 960px; margin-left: auto; margin-right: auto; line-height: 1.5; font-size: 14px'>
                <ul style='margin-top: 0; list-style: none; float: left; padding-left: 0; margin-bottom: 0'>
                    <li><a href=''>Startseite</a></li>
                    <li><a href=''>News</a></li>
                    <li><a href=''>Games</a></li>
                    <li><a href=''>Ankündigungen</a></li>
                    <li><a href=''>WebInterface</a></li>
                    <?php
                    if (isset($_COOKIE['benutzerdaten'])) {
                        echo "</ul><ul style='margin: 0; list-style: none; float: right;'>
                    <li style='float: left'><a class='einloggenCss' onclick='userMenue()'>" . $username . "</a></li>
                    </ul></div></div>";
                    } else {
                        echo "</ul><ul style='margin: 0; list-style: none; float: right;'>
                    <li style='float: left'><a class='einloggenCss' onclick='userMenue()'>Einloggen</a></li>
                    <li style='float: left'><a class='einloggenCss' onclick='registerUser()'>Registrieren</a></li>
                    </ul></div></div>";
                    }
                    ?>
                    <div style='width: 960px; margin-left: auto; margin-right: auto;'>
                        <div id='login' style='width: 340px;' class='drop2' align='center'>
                            <form action='/JavaProjectRS/restful-services/FerienWohnungVerwaltung/einloggen' method='post'>
                                <p><input class='input' id='vn' name='vn' type='text' placeholder='Username'/></p>
                                <p><input class='input' id='nn' name='nn' type='text' placeholder='Password'/></p>
                                <p><button type='submit'>Einloggen</button></p>
                            </form>
                        </div>
                    </div>
                    <div id='register' style='width: 340px;' class='drop2' align='center'>
                        <form action='/JavaProjectRS/restful-services/FerienWohnungVerwaltung/registrieren' method='post'>
                            <p><input class='input' id='vn' name='vn' type='text' placeholder='Username'/></p>
                            <p><input class='input' id='nn' name='nn' type='text' placeholder='Password'/></p>
                            <p><input class='input' id='ad' name='ad' type='text' placeholder='Password Wiederholen' required='required'/></p>
                            <p><button type='submit'>Registrieren</button>
                            </p>
                        </form>
                    </div>
                    </body>
                    </html>
<?php
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

