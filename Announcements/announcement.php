<!DOCTYPE html>
<?php
require_once '../testAdminContentInterface/htmlbuildHelper.php';
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
$extrascipt = "\r\n function showComments(id){".
        "if (document.getElementsByName(id + 'C').length != 0){".
         "var elemente = document.getElementsByName(id + 'C');".
         "for (var element of elemente){".
         "document.getElementById('' + id).removeChild(element);".
         "}".
         "}else{".
    "\r\n var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200){".
            "\r\n var div = document.getElementById('' + id);".
            " div.innerHTML += request.responseText;".
    "\r\n }".
    "\r\n }".
    "\r\n request.open('GET', 'getComments.php?id=' + id, true);".
    "\r\n request.send('');".
    "\r\n }} ".
    "function createComment(idCC , id){".
    "var request = new XMLHttpRequest();".
    "request.onreadystatechange = function() {".
    "if (request.readyState == 4 && request.status == 200){".
    "alert('Comment added')".
    "}".
    "request.open('GET', 'setComments.php?id=' + id +'&&content='+ document.getElementByID(idCC).value, true)".
    "}";
getHeaderExtraScript($extrascipt);
getNormalBodyTop($username);
$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
$announcements = $db->query("Select * from announcement ORDER BY id DESC");
if(isset($announcements)){
foreach( $announcements as $announcement ){
 echo "<div style='width: 52%; padding: 2%; margin: auto'><div id='".$announcement['id']."' style='padding: 2%; margin: auto; width: 100%; background-color: darkblue'>".
      "<div  style='background-color: white'><p style='width: 100%; text-align: center'>".$announcement['titel']."</p></div>".
      "<div style='background-color: white;'><p style='width: 100%;'>".nl2br($announcement['content'])."</p></div>";
 echo "<button name='".$announcement['id']."' onclick='showComments(".$announcement['id'].")'>Show Comments</button>".
      "<div style='background-color: white'>".
      "<p>Comment:</p>".
      "<textarea id='".$announcement['id']."CC' maxlength='1000' name='content' style='width: 100%; margin: auto; box-sizing: border-box'>".
      "</textarea>".
      "<button onclick='createComment(".$announcement['id']."CC,".$announcement['id'].")' >Add comment</button>".
      "</div>".
      "</div></div>";
}
}
?>

