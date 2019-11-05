<?php
require_once __DIR__.'/../AdminContentInterface/lib/announcement.php';
require_once __DIR__.'/../AdminContentInterface/lib/user.php';
if(isset($_GET['id']) && isset($_GET['content']) && $_GET['content'] != "" && $_GET['id']!=""){
    $date = date("Y-m-d H:i:s");
    session_name('WATGSESSID'); 
    session_start();
    $id = $_GET['id'];
    $contentGET = htmlspecialchars($_GET['content']);
    if (checkLoggedIn()) {
    queryMYSQL("news","localhost","root","INSERT INTO comments (userID , annoucementID , created , content) VALUES ('".$_SESSION['WATGSESSID']."','$id','$date','$contentGET')");
    }  else {
    $db = queryMYSQL("news","localhost","root","INSERT INTO comments (userID,annoucementID ,created ,content) VALUES (NULL,'$id','$date','$contentGET')");
    }
}else{
    http_response_code(400);
}


