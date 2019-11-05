<?php
include_once __DIR__.'/../logs/logger.php';
include_once __DIR__.'/lib/user.php';

function getNormalHeader(){
logIP();
getViewCounter();
echo '<!DOCTYPE html>';
echo "<html>" .
    "<head>" .
        "<meta charset='UTF-8'>".
        "<meta name='viewport' content='width=device-width, initial-scale=1' />".
        "<title>Herzlich Wilkommen bei WeAreTheGamers</title>".
        "<link rel='stylesheet' href='/styles/default.css'>".
        "<script type='text/javascript'>".
            "function userMenue() {".
                "if (document.getElementById('register')) {".
                "    document.getElementById('register').classList.remove('show');".
                "}".
                "document.getElementById('login').classList.toggle('show');".
            "}".
            "function registerUser() {".
            "    document.getElementById('login').classList.remove('show');".
            "    document.getElementById('register').classList.toggle('show');".
            "}".
            "window.onclick = function (event) {".
            "    if (!event.target.matches('.input') && !event.target.matches('.einloggenCss')) {".
            "        var dropdowns = document.getElementsByClassName('drop2');".
            "        var i;".
            "        for (i = 0; i < dropdowns.length; i++) {".
            "            var openDropdown = dropdowns[i];".
            "            if (openDropdown.classList.contains('show')) {".
            "                openDropdown.classList.remove('show');".
            "            }".
            "        }".
            "    }".
            "}".
       " </script>".
    "</head>";
}

function getUserMenu(){
	echo "</ul><ul style='margin: 0; list-style: none; float: right;'>
              <li style='float: left'><a class='einloggenCss' onclick='userMenue()'><img src='".getPicture()."' width='16' height='16'></img>" .getUsername(). "</a></li>
              </ul></div></div>";
        echo "<div style='width: 50%; margin-left: auto; margin-right: auto; padding: 0;'>
              <div style='position: absolute; z-index:2' id='login' class='drop2' align='center'>
              <p><a style='color:black;' href='/ControlInterface/controlinterface'>WebInterface</a></p>
              <p><a style='color:black;' href='/logout'>LogOut</a></p>
              <p><a style='color:black;' href='/User/profile'>Profile</a></p>
              <p><a style='color:black;' href='/Screenshots/gallerie.php'>Gallary</a></p>
              </div></div>";
}

function getHeaderExtraScript($extrascript){
logIP();
getViewCounter();
echo '<!DOCTYPE html>';
echo "<html>" .
    "<head>" .
        "<meta charset='UTF-8' >".
        "<meta name='viewport' content='width=device-width, initial-scale=1.0' />".
        "<title>Herzlich Wilkommen bei WeAreTheGamers</title>".
        "<link rel='stylesheet' href='/styles/default.css'>".
        "<script type='text/javascript'>".
            "function userMenue() {".
                "if (document.getElementById('register')) {".
                "    document.getElementById('register').classList.remove('show');".
                "}".
                "document.getElementById('login').classList.toggle('show');".
            "}".
            "function registerUser() {".
            "    document.getElementById('login').classList.remove('show');".
            "    document.getElementById('register').classList.toggle('show');".
            "}".
            "window.onclick = function (event) {".
            "    if (!event.target.matches('.input') && !event.target.matches('.einloggenCss')) {".
            "        var dropdowns = document.getElementsByClassName('drop2');".
            "        var i;".
            "        for (i = 0; i < dropdowns.length; i++) {".
            "            var openDropdown = dropdowns[i];".
            "            if (openDropdown.classList.contains('show')) {".
            "                openDropdown.classList.remove('show');".
            "            }".
            "        }".
            "    }".
            "}".
        $extrascript.
       " </script>".
        
    "</head>";
}

function getNormalBodyTop($background){
if(!isset($background)){
$background = "/pictures/Logo_1.png";
}
echo "<body id='body' style='background-image: url($background);  background-size: cover;'>".
        "<div style='background-color: #24292e; padding-top: 12px; padding-bottom: 12px; line-height: 1.5;'>".
            "<div class='head' style='width: 60%; margin-left: auto; margin-right: auto; line-height: 1.5;'>".
                "<ul style='margin-top: 0; list-style: none; float: left; padding-left: 0; margin-bottom: 0'>".
                    "<li><a href='/index'>Startseite</a></li>".
                    "<li><a href='/News/news'>News</a></li>".
                    "<li><a href='/games'>Games</a></li>".
                    "<li><a href='/Announcements/announcement'>Ankündigungen</a></li>".
		    "<li><a href='/teamspeak3'>Teamspeak3 Overview</a></li>".
		    "<li><a href='/LiveStreams/index'>LiveStreams</a></li>".
		    "<li><a href='http://phantomrecords.de'>Music Partner</a></li>";
                     if (checkLoggedIn() || logIn() ) {
			getUserMenu();
                    } else {
                        echo "</ul><ul style='margin: 0; list-style: none; float: right;'>
                    <li style='float: left'><a class='einloggenCss' onclick='userMenue()'>Einloggen</a></li>
                    <li style='float: left'><a class='einloggenCss' onclick='registerUser()'>Registrieren</a></li>
                    </ul></div><div style='width: 52%; margin-left: auto; margin-right: auto;'>
                        <div id='login' style='width: 340px;' class='drop2' align='center'>
                            <form action='' method='post'>
                                <p><input class='input' id='username' name='username' type='text' placeholder='Username'/></p>
                                <p><input class='input' id='password' name='password' type='password' placeholder='Password'/></p>
                                <p><button type='submit'>Einloggen</button></p>
                            </form>
                        </div>
                    </div>
                    <div id='register' style='width: 340px;' class='drop2' align='center'>
                        <form action='/ControlInterface/registrieren_datenueberpruefung' method='post'>
                            <p><input class='input' id='username' name='username' type='text' placeholder='Username'/></p>
                            <p><input class='input' id='password' name='password' type='password' placeholder='Password'/></p>
                            <p><input class='input' id='passwordw' name='passwordw' type='password' placeholder='Password Wiederholen' required='required'/></p>
                            <p><button type='submit'>Registrieren</button>
                            </p>
                        </form>
                    </div></div>";
                        echo "<div style='width: 960px; margin-left: auto; margin-right: auto;'>
                        <div id='login' style='width: 340px;' class='drop2' align='center'>
                            <form action='/ControlInterface/datenueberpruefung' method='post'>
                                <p><input class='input' id='username' name='username' type='text' placeholder='Username'/></p>
                                <p><input class='input' id='password' name='password' type='password' placeholder='Password'/></p>
                                <p><button type='submit'>Einloggen</button></p>
                            </form>
                        </div>
                    </div>
                    <div id='register' style='width: 340px;' class='drop2' align='center'>
                        <form action='/ControlInterface/registrieren_datenueberpruefung' method='post'>
                            <p><input class='input' id='username' name='username' type='text' placeholder='Username'/></p>
                            <p><input class='input' id='password' name='password' type='password' placeholder='Password'/></p>
                            <p><input class='input' id='passwordw' name='passwordw' type='password' placeholder='Password Wiederholen' required='required'/></p>
                            <p><button type='submit'>Registrieren</button>
                            </p>
                        </form>
                    </div>";
                    }
}


function getForm($titel , $content){
 echo "<div style='width: 52%; padding: 2%; margin: auto'><div style='padding: 2%; margin: auto; width: 100%; background-color: darkblue'>".
      "<div  style='background-color: white'><p style='width: 100%; text-align: center'>".$titel."</p></div>".
      "<div style='background-color: white;'><p style='width: 100%;'>".$content."</p></div>".
      "</div>";
}

function getViewCounter(){
$counter = file_get_contents(__DIR__."/views");
if(isset($counter)){
$counter ++;
}else{
$counter = 1;
}

file_put_contents(__DIR__."/views",$counter);
}
?>


