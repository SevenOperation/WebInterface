<?php
require_once "../AdminContentInterface/config.php";
require_once "../AdminContentInterface/lib/user.php";
if(checkLoggedIn() && isset($_POST['mailaddress'])){
 $pdo = new PDO("mysql:host=".$mysqlserver.";dbname=".$mysql_user_database."",$mysql_user,$mysql_user_password);
 $pdo->query("Update ".$mysql_user_table." set email='".$_POST['mailaddress']."' where id='".$_SESSION['WATGSESSID']."'");
}
header('Location: /User/profile');
?>
