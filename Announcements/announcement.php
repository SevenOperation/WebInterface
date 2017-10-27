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
$announcements = $db->query("Select titel , content from announcement");
if(isset($announcements)){
foreach( $announcements as $announcement ){
 echo "<div style='padding: 1%; background-color: darkblue; width: 25%:w'><div style='padding-top: 2%; padding-bottom: 2%; margin: auto; width: 100%'>".
      "<div style='background-color: white'><p style='width: 100%; text-align: center'>".$announcement['titel']."</p></div>".
      "<div style='background-color: white; height: 500px;'><p style='width: 100%;'>".nl2br($announcement['content'])."</p></div></div></div>";
}
}
?>
