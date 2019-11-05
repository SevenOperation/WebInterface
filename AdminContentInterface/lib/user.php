<?php
require_once __DIR__."/../config.php";
require_once "mysql.php";
require_once "planetside2/alertSetting.php";
require_once "Stream/streamSetting.php";
session_name('WATGSESSID');
session_start();

function getUserEmail($id,$password,$username){
	$email = queryMYSQL('users','localhost','root',"Select email from user where id=$id and password = '$password' and username = '$username'");
	$email = $email->fetch(PDO::FETCH_ASSOC)['email'];
        return $email; 
}

function setProfilePicture($id){
       queryMYSQL('users','localhost','root',"Update user Set profilepicture = '$path'  where id=$id");
}

function createUser($username, $password, $email, $newsletter){

}

function enableAccount($id){

}

function disableAccount($id){


}

function deleteAccount($username, $password){

}

function getAlertSetting($id){
	global $mysqlserver,$mysql_user_database;
	$data = queryMYSQL("$mysql_user_database",$mysqlserver,"root","Select * from planetside2Settings where userId=$id");
	$data = $data->fetch(PDO::FETCH_ASSOC);
	$alertSetting = new AlertSetting($data['notificationEnabled'],$data['endNotification'],$data['notificationStartHour'],$data['notificationEndHour'],$data['alertNotificationOnly'],$data['indarNotification'],$data['amerishNotification'],$data['esamirNotification'],$data['hossinNotification']);
	return $alertSetting;
}

function getStreamSetting($id){
	global $mysqlserver,$mysql_user_database;
        $data = queryMYSQL("$mysql_user_database",$mysqlserver,"root","Select * from streamSettings where user_id=$id");
        $data = $data->fetch(PDO::FETCH_ASSOC);
        $streamSetting = new StreamSetting($data['streamName'],$data['streamKey']);
        return $streamSetting;
}

function deleteProfilePicture(){


}

function getEmailAddress($id){
	global $mysqlserver,$mysql_user_database;
	$data = queryMYSQL("$mysql_user_database",$mysqlserver,"root","Select email from user where id='".$id."'");
	$data = $data->fetch(PDO::FETCH_ASSOC);
	return $data['email'];
}

//checks if a user with the password and username exists and logs the user in
function logIn(){
	global $mysql_user_database, $mysqlserver, $mysql_user , $mysql_user_table, $mysql_user_password;
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$db = new PDO('mysql:host='.$mysqlserver.';dbname='.$mysql_user_database.'', $mysql_user, '');
		$db->query('Set names utf8');
		$db->query('Set names utf8');
		$daten = $db->query('Select password,id from '.$mysql_user_table.' where username="'.htmlspecialchars($_POST["username"]).'"');
		$user = $daten->fetch();
        	if ($user != false && password_verify($_POST['password'], $user['password'])) {
			session_destroy();
			session_start();
			session_name('WATGSESSID');
  			$_SESSION['WATGSESSID'] = $user['id'];
         		#returnToLastSite();
			return true;
        	}
    	}
        #returnToLastSite(); 
	return false;
}

//Set the cookies and Session if he was authenticated successfully
function returnToLastSite(){
	if(isset($_POST['lastSide'])){
  		header('Location: ' . $_POST['lastSide']);
	}else{
		header('Location: /index');
  	}
}


//Checks if he is already logged in don't try to exploit by just setting wrong data
function checkLoggedIn(){
	if(isset($_SESSION['WATGSESSID'])){
		return true;	
	}
	return false;
}

//Gets the user permission from mysql if user is logged in, else function returns False;
function getPermission(){
	if(checkLoggedIn()){
 		$db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
		$db->query('Set names utf8');
		$daten = $db->query("Select permission from user where id='".$_SESSION['WATGSESSID']."'" );
		return $daten->fetch()['permission'];
	}
 	return False;
}

//Returns the picture path from user
function getPicture(){
  	if(checkLoggedIn()){
  		global $mysql_user_database, $mysqlserver, $mysql_user , $mysql_user_table, $mysql_user_password ;
  		$db = new PDO('mysql:host='.$mysqlserver.';dbname='.$mysql_user_database.'', $mysql_user, $mysql_user_password);
        	$db->query('Set names utf8');
        	$daten = $db->query("Select profilepicture from user where id='".$_SESSION['WATGSESSID']."'" );
        	return $daten->fetch()['profilepicture'];
 	}
	return "";
}

function getUsername(){
	if(checkLoggedIn()){
		global $mysql_user_database, $mysqlserver, $mysql_user , $mysql_user_table, $mysql_user_password ;
  		$db = new PDO('mysql:host='.$mysqlserver.';dbname='.$mysql_user_database.'', $mysql_user, $mysql_user_password);
        	$db->query('Set names utf8');
        	$daten = $db->query("Select username from user where id='".$_SESSION['WATGSESSID']."'" );
        	return $daten->fetch()['username'];
 	}
	return "";
}


?>
