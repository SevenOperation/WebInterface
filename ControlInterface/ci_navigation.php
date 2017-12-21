<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
    header('Location: /index');
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css.css">
    </head>
    <body >
        <div class="navigation" style="background-color: black">
            <ul>
                <li class="nav-header"><a class="nav-title"> Einstellungen</a>
                    <ul>
                        <li><a href="status" target="content" ><img class="symbols" src="konsole_symbole.png">Status</a></li>
                        <li><a href="ci_konsole" target="content" ><img class="symbols" src="konsole_symbole.png">Konsole</a></li>
                        <li><a href="ci_start" target="content"><img class="symbols" src="konsole_symbole.png">Start</a></li>
                        <li><a href="ci_gameselection" target="content"><img class="symbols" src="konsole_symbole.png">Spiel Auswählen</a></li>
                        <li><a href=""><img class="symbols" src="konsole_symbole.png">Stop</a></li>
                        <li><a href=""><img class="symbols" src="konsole_symbole.png">Restart</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </body>
</html>



