<?php
if(isset($_GET['id']) && isset($_GET['content']) && $_GET['content'] != "" && $_GET['id']!=""){
    $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
    $date = date("Y-m-d H:i:s");
    
    session_start();
    $id = $_GET['id'];
    $contentGET = htmlspecialchars($_GET['content']);
    $userIDA=NULL;
    if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
    $userIDA = $db->query("Select id FROM user WHERE password='$password' and username='$username'");
    }
    $db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
     
    if(isset($userIDA)){
    $userID = $userIDA->fetch(PDO::FETCH_ASSOC)[0]['id'];
    echo "Deine USER ID " . $userID;
    $db->query("INSERT INTO comments (userID , annoucementID , created , content) VALUES ('$userID','$id','$date','$contentGET')");
    }  else {
    $db->query("INSERT INTO comments (annoucementID ,created ,content) VALUES ('$id','$date','$contentGET')");    
    }
}else{
    http_response_code(400);
}


