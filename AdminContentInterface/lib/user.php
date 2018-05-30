<?php 
require_once "mysql.php";

function getUserEmail($id,$password,$username){
	$email = queryMYSQL('user','localhost','root',"Select email from user where id=$id and password = '$password' and username = '$username'");
	$email = $email->fetch(PDO::FETCH_ASSOC)['email'];
        return $email; 
}

function setProfilePicture($path, $password , $username){
       queryMYSQL('user','localhost','root',"Update user Set profilepicture = '$path'  where username='$username' and password = '$password'");
}

function createUser($username, $password, $email, $newsletter){

}

function enableAccount($id){

}

function disableAccount($id){


}

function deleteAccount($username, $password){

}

function deleteProfilePicture(){


}


?>
