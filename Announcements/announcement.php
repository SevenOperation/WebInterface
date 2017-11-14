<!DOCTYPE html>
<?php
require_once '../testAdminContentInterface/htmlbuildHelper.php';
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
$extrascipt = "\r\n function showComments(id){".
    "\r\n var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200)".
            "\r\n document.getElementById(id).innerhtml = request.responseXML;".
    "\r\n }".
    "\r\n ".
    "\r\n request.open('GET', 'getComments.php?id=' + id, true);".
    "\r\n request.send(null);".
    "\r\n }";
getHeaderExtraScript($extrascipt);
getNormalBodyTop($username);
$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
$announcements = $db->query("Select * from announcement ORDER BY id DESC");
if(isset($announcements)){
foreach( $announcements as $announcement ){
 echo "<div id='".$announcement['id']."' style='width: 52%; padding: 2%; margin: auto'><div style='padding: 2%; margin: auto; width: 100%; background-color: darkblue'>".
      "<div style='background-color: white'><p style='width: 100%; text-align: center'>".$announcement['titel']."</p></div>".
      "<div style='background-color: white;'><p style='width: 100%;'>".nl2br($announcement['content'])."</p></div>";
 echo "<button name='".$announcement['id']."' onclick='showComments(".$announcement['id'].")'>Show Comments</button></div></div>";
}
}
?>

