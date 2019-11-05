<?php
require_once "../AdminContentInterface/config.php";
require_once "../AdminContentInterface/lib/user.php";
$permission = getPermission();
if($permission != 99  && isset($_POST['streamName'])){
 #$streamSetting=getStreamSetting($_SESSION['WATGSESSID']);
 $pdo = new PDO("mysql:host=".$mysqlserver.";dbname=".$mysql_user_database."",$mysql_user,$mysql_user_password);
 $data = $pdo->query("Select * from streamSettings where user_id='".$_SESSION['WATGSESSID']."'");
 echo var_dump($data->errorInfo());
 $streamName = htmlspecialchars($_POST['streamName']);
 if (!$data || !$data->fetch(PDO::FETCH_ASSOC) ){
 	$key = md5(microtime().rand());
 	$pdo->query("Insert into streamSettings (user_id,streamName,streamKey) Values (".$_SESSION['WATGSESSID'].",'$streamName','$key')");
 }else{
 	$pdo->query("Update streamSettings set streamName='$streamName' where user_id='".$_SESSION['WATGSESSID']."'");
 }
}
header('Location: /User/profile');
?>
