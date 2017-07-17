<!Doctype HTML>
<?php
session_start();
if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
    header('Location: /index.php');
}
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
?>


<!DOCTYPE html>
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
    <body style='background-image: url(/logo_1.png);  background-size: cover;'>
        <div style='background-color: #24292e; padding-top: 12px; padding-bottom: 12px; line-height: 1.5 ;'>
            <div class='head' style='width: 960px; margin-left: auto; margin-right: auto; line-height: 1.5; font-size: 14px'>
                <ul style='margin-top: 0; list-style: none; float: left; padding-left: 0; margin-bottom: 0'>
                    <li><a href='/index.php'>Startseite</a></li>
                    <li><a href='/News/news.php'>News</a></li>
                    <li><a href=''>Games</a></li>
                    <li><a href=''>Ankündigungen</a></li>
                    <?php
                    if (isset($_COOKIE['benutzerdaten']) && isset($_SESSION["angemeldet" . $username]) && $_SESSION["angemeldet" . $username] == true) {
                        echo "</ul><ul style='margin: 0; list-style: none; float: right;'>
                    <li style='float: left'><a class='einloggenCss' onclick='userMenue()'>" . $username . "</a></li>
                    </ul></div></div>";
                        echo "<div style='width: 1080px; margin-left: auto; margin-right: auto; padding: 0;'>
                              <div style='position: absolute; z-index:2' id='login' class='drop2' align='center'>
                              <p><a style='color:black;' href='ControlInterface/controlinterface.php'>WebInterface</a></p>
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
                    <div style='width: 100px;  background-color: #24292e; padding-top: 12px; padding-bottom: 12px; line-height: 1.5 ;'>
                    <div class='head' style='height: 600px; margin-left: auto; margin-right: auto; line-height: 1.5; font-size: 14px'>
                    <ul style='margin-top: 0; width: auto; list-style:  none;  display: flex; float: left; padding-left: 0; margin-bottom: 0'>
                    <li><a href='/index.php'>Status / CMD</a></li>
                    <li><a href='/News/news.php'>Spiele</a></li>
                    <li><a href=''>Games</a></li>
                    <li><a href=''>Ankündigungen</a></li>
                    </div>
                    </div>
                    </body>
                    </html>
<html>
    <head>
        <link rel="stylesheet" href="css.css">
    </head>
    <frameset rows="100,*" frameborder="0" framespacing="0" border="0">
        <frame src="ci_top.php" scrolling="no" noresize="" name="top"/>
        <frameset cols="214,*" border="0" frameborder="0" framespacing="0">
        <frame src="ci_navigation.php" scrolling="auto" noresize=""/> 
        <frameset rows="50,*">
            <frame name="title" src="info.php"/>
            <frame name='content' src="status.php"/>
        </frameset>
        </frameset>
    </frameset>

</html>


