<?php
require_once "../AdminContentInterface/config.php";
require_once "../AdminContentInterface/lib/user.php";
if(checkLoggedIn() && isset($_POST['password']) && isset($_POST['passwordw']) && $_POST['password'] == $_POST['passwordw']){
 $pdo = new PDO("mysql:host=".$mysqlserver.";dbname=".$mysql_user_database."",$mysql_user,$mysql_user_password);
 $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
 $pdo->query("Update ".$mysql_user_table." set password='".$password."' where id='".$_SESSION['WATGSESSID']."'");
}
header('Location: /index');
?>
