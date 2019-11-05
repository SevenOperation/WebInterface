<!DOCTYPE html>
<?php
require_once '../AdminContentInterface/htmlbuildHelper.php';
session_name('WATGSESSID');
session_start();
$extrascipt = "\r\n function showComments(id){".
        "\r\n if (document.getElementsByName(id + 'C').length != 0){".
         "\r\n var elemente = document.getElementsByName(id + 'C');".
         "\r\n var parent = document.getElementById('' + id);".
         "\r\n for (var i = elemente.length; i > 0 ; i--){".
         "\r\n parent.removeChild(elemente[0]);".
         "\r\n }".
         "\r\n }else{".
    "\r\n var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200){".
            "\r\n var div = document.getElementById('' + id);".
            "\r\n div.innerHTML += request.responseText;".
    "\r\n }".
    "\r\n }".
    "\r\n request.open('GET', 'getComments?id=' + id, true);".
    "\r\n request.send('');".
    "\r\n }\r\n} ".
    "\r\n function createComments(id){".
    "\r\n var idCC = document.getElementById('CC'+id);".
    "\r\n var request = new XMLHttpRequest();".
    "\r\n request.onreadystatechange = function() {".
    "\r\n if (request.readyState == 4 && request.status == 200){".
    "\r\n idCC.value = ''; ".
    "\r\n alert('Comment added');".
    "\r\n if(document.getElementsByName(id + 'C').length != 0){".
    "\r\n showComments(id);".
    "\r\n }".
    "\r\n showComments(id);".
    "\r\n }else if(request.readyState == 4 && request.status == 400){ ".
    "\r\n alert('Error: Comment field maybe emtpy' )".
    "\r\n }".
    "\r\n }".
    "\r\n request.open('GET', 'setComments?id=' + id +'&&content='+ idCC.value, true);".
    "\r\n request.send('');".
    "\r\n }";
getHeaderExtraScript($extrascipt);
getNormalBodyTop(NULL);
$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
$announcements = $db->query("Select * from announcement ORDER BY id DESC");
if(isset($announcements)){
foreach( $announcements as $announcement ){
 echo "<div style='width: 52%; padding: 2%; margin: auto'><div id='".$announcement['id']."' style='padding: 2%; margin: auto; width: 100%; background-color: darkblue'>".
      "<div  style='background-color: white'><p style='width: 100%; text-align: center'>".$announcement['titel']."</p></div>".
      "<div style='background-color: white;'><p style='width: 100%;'>".nl2br($announcement['content'])."</p></div>";
 echo "<button name='".$announcement['id']."' onclick='showComments(".$announcement['id'].");'>Show Comments</button>".
      "<div style='background-color: white'>".
      "<p>Comment:</p>".
      "<textarea id='CC".$announcement['id']."' maxlength='500' name='content' style='width: 100%; margin: auto; box-sizing: border-box; resize: none'>".
      "</textarea>".
      "<button name='button' onclick='createComments(".$announcement['id'].");' >Add comment</button>".
      "</div>".
     "</div></div>";
}
}
?>

