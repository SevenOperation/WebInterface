<!DOCTYPE html>
<?php
<body style='background-image: url(/Logo_1.png);  background-size: cover;'>
        <div style='background-color: #24292e; padding-top: 12px; padding-bottom: 12px; line-height: 1.5 ;'>
            <div class='head' style='width: 960px; margin-left: auto; margin-right: auto; line-height: 1.5; font-size: 14px'>
                <ul style='margin-top: 0; list-style: none; float: left; padding-left: 0; margin-bottom: 0'>
                    <li><a href='/index.php'>Startseite</a></li>
                    <li><a href='/News/news.php'>News</a></li>
                    <li><a href='/games.php'>Games</a></li>
                    <li><a href='/Announcements/announcment.php'>Ankündigungen</a></li>
                    <?php
                    if (isset($_COOKIE['benutzerdaten']) && isset($_SESSION["angemeldet" . $username]) && $_SESSION["angemeldet" . $username] == true) {
                        echo "</ul><ul style='margin: 0; list-style: none; float: right;'>
                    <li style='float: left'><a class='einloggenCss' onclick='userMenue()'>" . $username . "</a></li>
                    </ul></div></div>";
                        echo "<div style='width: 1080px; margin-left: auto; margin-right: auto; padding: 0;'>
                              <div style='position: absolute; z-index:2' id='login' class='drop2' align='center'>
                              <p><a style='color:black;' href='/ControlInterface/controlinterface.php'>WebInterface</a></p>
                              <p><a style='color:black;' href='/logout.php'>LogOut</a></p>
                              </div></div>";
                    } else {
                        echo "</ul><ul style='margin: 0; list-style: none; float: right;'>
                    <li style='float: left'><a class='einloggenCss' onclick='userMenue()'>Einloggen</a></li>
                    <li style='float: left'><a class='einloggenCss' onclick='registerUser()'>Registrieren</a></li>
                    </ul></div></div>";
                        echo "<div style='width: 960px; margin-left: auto; margin-right: auto;'>
                        <div id='login' style='width: 340px;' class='drop2' align='center'>
                            <form action='/ControlInterface/datenueberpruefung.php' method='post'>
                                <p><input class='input' id='username' name='username' type='text' placeholder='Username'/></p>
                                <p><input class='input' id='password' name='password' type='text' placeholder='Password'/></p>
                                <p><button type='submit'>Einloggen</button></p>
                            </form>
                        </div>
                    </div>
                    <div id='register' style='width: 340px;' class='drop2' align='center'>
                        <form action='/ControlInterface/registrieren_datenueberpruefung.php' method='post'>
                            <p><input class='input' id='username' name='username' type='text' placeholder='Username'/></p>
                            <p><input class='input' id='password' name='password' type='text' placeholder='Password'/></p>
                            <p><input class='input' id='passwordw' name='passwordw' type='text' placeholder='Password Wiederholen' required='required'/></p>
                            <p><button type='submit'>Registrieren</button>
                            </p>
                        </form>
                    </div>";
                    }
                    ?>

                    </body>
                    </html>
<?php
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

