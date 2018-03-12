<?php
require_once "../AdminContentInterface/config.php";
require_once "../ControlInterface/datenueberpruefung.php";
if(checkLoggedIn() && isset($_POST['password']) && isset($_POST['passwordw']) && $_POST['password'] == $_POST['passwordw']){
 $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
 $pdo = new PDO("mysql:host=".$mysqlserver.";dbname=".$mysql_user_database."",$mysql_user,$mysql_user_password);
 $username = explode("-",filter_input(INPUT_COOKIE,'benutzerdaten',FILTER_SANITIZE_SPECIAL_CHARS))[0];
 $pdo->query("Update ".$mysql_user_table." set password='".$password."' where username='$username'");
}
header('Location: /index');
?>
