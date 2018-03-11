<?php
require_once 'htmlbuildHelper.php';
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
$extrascript = "\r\n function getAnnouncement(id){".
        "\r\n if (document.getElementById(id + 'C') != null){".
         "\r\n var element = document.getElementById(id + 'C');".
         "\r\n element.parentNode.removeChild(element);".
         "\r\n }else{".
    "\r\n var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200){".
            "\r\n var div = document.getElementById('' + id);".
            "\r\n div.outerHTML += request.responseText;".
    "\r\n }".
    "\r\n }".
    "\r\n request.open('POST', 'getAnnouncement', true);".
    "\r\n request.setRequestHeader('Content-type','application/x-www-form-urlencoded');".
    "\r\n request.send('id='+id);".
    "\r\n }".
    "\r\n} " .
    "\r\n function removeAnnouncement(id){".
    " var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200){".
            "\r\n var div = document.getElementById('' + id);".
            "\r\n div.outerHTML += request.responseText;".
            "\r\n location.reload();". 
    "\r\n }".
    "\r\n }".
    "\r\n request.open('POST', 'removeAnnouncements', true);".
    "\r\n request.setRequestHeader('Content-type','application/x-www-form-urlencoded');".
    "\r\n request.send('id='+id);".
    "}";
getHeaderExtraScript($extrascript);
getNormalBodyTop($username);
?>
<div style='padding-top: 2%; padding-bottom: 2%; margin: auto; width: 52%; padding-left: 2%; padding-right: 2% '>
<div style="background-color: darkblue; padding-top: 1%; padding-right: 2%; padding-left: 2%; padding-bottom: 2%">
<div style='background-color: white;'>
<table border='1'width='100%'>
<?php
$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
$announcement_list = $db->query("Select id, titel from announcement ");
foreach($announcement_list as $announcement){
echo "<tr id='$announcement[id]'><td>" .$announcement['id'] . "</td>";
echo "<td>" . $announcement['titel']. "</td>";
echo "<td><button onclick='getAnnouncement($announcement[id])'>Edit</button></td>";
echo "<td><button onclick='removeAnnouncement($announcement[id])'>Delete</button></td></tr>";
}
?>
</div>
</div>
</div>
</body>
</html>

<?php
$titel = $_POST['id'];
$content = $_POST['content'];
echo $title . "Bannane";
if(isset($titel) && isset($content)){
$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
}
?>
