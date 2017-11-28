<?php
session_name('WATGSESSID');
session_start();
$db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
var_dump($db->errorInfo());
$db->query('Set names utf8');
$daten = $db->query('Select username , password from user ');
echo $_POST["username"] . $_POST["password"];
var_dump($db->errorInfo());
$login = false;
if (isset($daten) && isset($_POST["username"]) && isset($_POST["password"])) {
    foreach ($daten as $user) {
        if ($user["username"] == $_POST["username"] && $user["password"] == $_POST['password']) {
       
   
           $login = true;
        }
    }
}
  
if ($login == true) {
  $_SESSION['angemeldet' . $_POST['username']] = true;
  setcookie('user', $_POST['username'], 0 , "/" );
  setcookie('benutzerdaten', $_POST['username'] . "-" . $_POST["password"], 0 , "/" );
  header('Location: /index');
} else {
  header('Location: /index');
}
?>
