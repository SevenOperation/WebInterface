<?php
require_once "../AdminContentInterface/config.php";
require_once "../AdminContentInterface/lib/user.php";
if(checkLoggedIn() && isset($_POST['from']) && isset($_POST['until']) && isset($_POST['eventTypes'])){
 $alert=getAlertSetting($_SESSION['WATGSESSID']);
 if(isset($_POST['ps2NotificationState'])){
  $alert->setNotificationEnabled(1);
 }else{
 $alert->setNotificationEnabled(0);
 }
 if(isset($_POST['ps2EndEventNotification'])){
 $alert->setEndNotification(1);
 }else{
 $alert->setEndNotification(0);
 }
 $alert->setNotificationStartHour($_POST['from']);
 $alert->setNotificationEndHour($_POST['until']);
 $alert->setAlertNotificationOnly($_POST['eventTypes']);
 
if(isset($_POST['indar'])){
	$alert->setIndarNotification(1);
 }else{
	$alert->setIndarNotification(0);
 }

 if(isset($_POST['amerish'])){
 	$alert->setAmerishNotification(1);
 }else{
	$alert->setAmerishNotification(0);
 }
 
 if(isset($_POST['esamir'])){
 	$alert->setEsamirNotification(1);
 }else{
 	$alert->setEsamirNotification(0);
 } 

 if(isset($_POST['hossin'])){
 	$alert->setHossinNotification(1);
 }else{
	$alert->setHossinNotification(0);
 }
 $pdo = new PDO("mysql:host=".$mysqlserver.";dbname=".$mysql_user_database."",$mysql_user,$mysql_user_password);
 $data = $pdo->query("Select * from planetside2Settings where userId='".$_SESSION['WATGSESSID']."'");
 echo var_dump($data->errorInfo());
 if ($data == false || $data->rowCount() == 0){
 $pdo->query("Insert into planetside2Settings (notificationEnabled,endNotification,notificationStartHour,notificationEndHour,alertNotificationOnly,userId,indarNotification,amerishNotification,esamirNotification,hossinNotification) Values ({$alert->getNotificationEnabled()},{$alert->getEndNotification()},{$alert->getNotificationStartHour()},{$alert->getNotificationEndHour()},{$alert->getAlertNotificationOnly()},".$_SESSION['WATGSESSID'].",{$alert->getIndarNotification()},{$alert->getAmerishNotification()},{$alert->getEsamirNotification()},{$alert->getHossinNotification()})");
 echo "1" . var_dump($pdo->errorInfo());
 }else{
 $pdo->query("Update planetside2Settings set notificationEnabled='{$alert->getNotificationEnabled()}',endNotification='{$alert->getEndNotification()}',notificationStartHour='{$alert->getNotificationStartHour()}',notificationEndHour='{$alert->getNotificationEndHour()}',alertNotificationOnly='{$alert->getAlertNotificationOnly()}',indarNotification='{$alert->getIndarNotification()}',amerishNotification='{$alert->getAmerishNotification()}',esamirNotification='{$alert->getEsamirNotification()}',hossinNotification='{$alert->getHossinNotification()}' where userId='".$_SESSION['WATGSESSID']."'");
 echo "2" . var_dump($pdo->errorInfo());
 }

}
header('Location: /User/profile');
?>
