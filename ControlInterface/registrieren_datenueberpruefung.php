<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
$db->query('Set names utf8');
$daten = $db->query('Select username , password from user ');
echo $_POST["username"] . $_POST["password"] . $_POST ["passwordw"];
var_dump($db->errorInfo());
$login = false;
$userexsits = false;
$usern = htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['password']);
if (isset($daten) && isset($usern) && isset($pass) && isset($_POST["passwordw"])) {
   if($_POST["password"] == $_POST["passwordw"]){
    foreach ($daten as $user) {
        if ($user["username"] == $usern ) {
           $userexsits = true;
        }
    }
    if($userexsits == false){
      $daten = $db->query("INSERT INTO user (username , password , permission) VALUES ( '$usern'  , '$pass', '0')");
      $login = true;
    }
   }
}
  
if ($login == true) {
  $_SESSION['angemeldet' . $usern] = true;
  setcookie('user', $usern, 0 , "/" );
  header('Location: controlinterface');
} else {
header('Location: registrieren');
}
?>
