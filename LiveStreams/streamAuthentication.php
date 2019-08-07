<?php
$streamKey = htmlspecialchars($_POST['name']);
$username = isStreamKeyValid($streamKey);
if($username != False){
http_response_code(200);
registerNewStream($streamKey);
header("HTTP/1.0 302 Publish Here");
header("Location:rtmp://127.0.0.1:1935/source/$username");
#header("Location: $username");
}else{
http_response_code(404);
}

function isStreamKeyValid($streamKey){
 $db = new PDO('mysql:host=localhost;dbname=users', 'root');
 $result = $db->query("Select u.username, streamSettings.streamKey from user u Left Join streamSettings on u.id = streamSettings.user_id where streamSettings.streamKey='$streamKey' Limit 1");
 if($result != False){
 $username = $result->fetch(PDO::FETCH_ASSOC)['username'];
 if (!$result){
 return False;
 }
 else{
 return $username;
 }
 }
 return False;
}

function registerNewStream($streamKey){
$db = new PDO('mysql:host=localhost;dbname=users', 'root');
$result = $db->query("update streamSettings set streaming=1 where streamKey='$streamKey'");
}


?>
