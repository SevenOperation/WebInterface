<?php
$streamKey = htmlspecialchars($_POST['name']);
unregisterStream($streamKey);
http_response_code(200);

function unregisterStream($streamKey){
$db = new PDO('mysql:host=localhost;dbname=users', 'root');
$result = $db->query("update streamSettings set streaming=0 where streamKey='$streamKey'");
}
?>
