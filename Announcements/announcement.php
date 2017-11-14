<!DOCTYPE html>
<?php
require_once '../testAdminContentInterface/htmlbuildHelper.php';
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
getNormalHeader();
getNormalBodyTop($username);
$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
$announcements = $db->query("Select titel , content from announcement ORDER BY id DESC");
if(isset($announcements)){
foreach( $announcements as $announcement ){
 echo "<div style='width: 52%; padding: 2%; margin: auto'><div style='padding: 2%; margin: auto; width: 100%; background-color: darkblue'>".
      "<div style='background-color: white'><p style='width: 100%; text-align: center'>".$announcement['titel']."</p></div>".
      "<div style='background-color: white;'><p style='width: 100%;'>".nl2br($announcement['content'])."</p></div>";
 echo "<button name='".$announcement['id']."' onclick='showComments()'>Show Comments</button></div></div>";
}
}
?>
