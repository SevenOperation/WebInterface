<?php
require_once '../ControlInterface/datenueberpruefung.php';
require_once __DIR__.'/../AdminContentInterface/lib/announcement.php';
if(isset($_GET['id']) && isset($_GET['content']) && $_GET['content'] != "" && $_GET['id']!=""){
    $date = date("Y-m-d H:i:s");
    session_name('WATGSESSID'); 
    session_start();
    $id = $_GET['id'];
    $contentGET = htmlspecialchars($_GET['content']);
    $userIDA=NULL;
    if (checkLoggedIn()) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
    $userIDA = queryMYSQL("users","localhost","root","Select id FROM user WHERE password='$password' and username='$username'");
    }
    if(isset($userIDA)){
    $userID = $userIDA->fetch(PDO::FETCH_ASSOC)['id'];
    echo "Deine USER ID " . $userID;
    queryMYSQL("news","localhost","root","INSERT INTO comments (userID , annoucementID , created , content) VALUES ('$userID','$id','$date','$contentGET')");
    }  else {
    queryMYSQL("news","localhost","root","INTO comments (userID , annoucementID ,created ,content) VALUES (NULL,'$id','$date','$contentGET')");
    echo var_dump($db->errorInfo());    
    }
}else{
    http_response_code(400);
}


