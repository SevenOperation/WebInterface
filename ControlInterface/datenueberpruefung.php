<?php
include_once __DIR__."/../AdminContentInterface/config.php";
session_name('WATGSESSID');
session_start();


$daten;

if (isset($_POST['username']) && !checklogIn()){
  if(isset($_POST['lastSide'])){
  header('Location: ' . $_POST['lastSide']);
  }else{
  header('Location: /index');
  }
}
  

//Gets all data from every user for checking credentials
function getUserData(){
global $daten, $mysql_user_database, $mysqlserver, $mysql_user , $mysql_user_table, $mysql_user_password;
$db = new PDO('mysql:host='.$mysqlserver.';dbname='.$mysql_user_database.'', $mysql_user, '');
$db->query('Set names utf8');
$daten = $db->query('Select username , password from '.$mysql_user_table.'');
}


//Checks the login request
function checklogIn(){
getUserData();
global $daten;
if (isset($daten) && isset($_POST["username"]) && isset($_POST["password"])) {
    foreach ($daten as $user) {
        if ($user["username"] == $_POST["username"] && $user["password"] == $_POST['password']) {
         setLoggedIn($user["username"] , $user["password"], true); 
         return true;
        }
    }
}
return false;
}

//Set the cookies and Session if he was authenticated successfully
function setLoggedIn($username , $password, $logedIn){
session_name('WATGSESSID');
session_start();
  $base64_user = base64_encode("$username:$password");
  $_SESSION['WATGSESSID'] = $base64_user;
  setcookie('benutzerdaten', $username . "-" . $password, 0 , "/" );
   if(isset($_POST['lastSide'])){
  header('Location: ' . $_POST['lastSide']);
  echo "test";
  }else{
  header('Location: /index');
  }
}


//Checks if he is already logged in don't try to exploit by just setting wrong data
function checkLoggedIn(){
global $daten;
 if(isset($_COOKIE['benutzerdaten'])){
        getUserData();
 	$username = explode("-", $_COOKIE['benutzerdaten'])[0];
	$password = explode("-", $_COOKIE['benutzerdaten'])[1];
 foreach ($daten as $user){
   if($user["username"] == $username && $user['password'] == $password){
   return true;
 }
}
}
return false;
}
//Gets the user permission from mysql
function getPermission(){
        $username = explode("-", $_COOKIE['benutzerdaten'])[0];
        $password = explode("-", $_COOKIE['benutzerdaten'])[1];
 	$db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
	$db->query('Set names utf8');
	$daten = $db->query("Select permission from user where username = '$username' and password = '$password'" );
        foreach ($daten as $permission){
	return $permission['permission'];
	}
}
//Returns the picture path from user
function getPicture(){
  global $mysql_user_database, $mysqlserver, $mysql_user , $mysql_user_table, $mysql_user_password ;
  $username = explode("-", $_COOKIE['benutzerdaten'])[0];
  $password = explode("-", $_COOKIE['benutzerdaten'])[1];
  $db = new PDO('mysql:host='.$mysqlserver.';dbname='.$mysql_user_database.'', $mysql_user, $mysql_user_password);
        $db->query('Set names utf8');
        $daten = $db->query("Select profilepicture from user where username = '$username' and password = '$password'" );
        foreach ($daten as $path){
        return $path['profilepicture']; 
 }
}
?>
