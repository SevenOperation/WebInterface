<?php
require_once 'htmlbuildHelper.php';
session_start();
$extrascript = "\r\n function getAnnouncement(id,database){".
        "\r\n if (document.getElementById(id+'C') != null){".
         "\r\n var element = document.getElementById(id+'C');".
         "\r\n element.parentNode.removeChild(element);".
         "\r\n }else{".
    "\r\n var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200){".
            "\r\n var div = document.getElementById(''+id);".
            "\r\n div.outerHTML += request.responseText;".
    "\r\n }".
    "\r\n }".
    "\r\n request.open('POST', 'getEditAnnouncement.php', true);".
    "\r\n request.setRequestHeader('Content-type','application/x-www-form-urlencoded');".
    "\r\n request.send('id='+id+'&database='+database);".
    "\r\n }".
    "\r\n} " .
    "\r\n function removeAnnouncement(id,database){".
    " var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200){".
            "\r\n var div = document.getElementById('' + id);".
            "\r\n div.outerHTML += request.responseText;".
            "\r\n location.reload();". 
    "\r\n }".
    "\r\n }".
    "\r\n request.open('POST', 'removeAnnouncements.php', true);".
    "\r\n request.setRequestHeader('Content-type','application/x-www-form-urlencoded');".
    "\r\n request.send('id='+id+'&database='+database);".
    "}".
    "\r\n function updateAnnouncement(id,database){".
        "\r\n if (document.getElementById(id + 'C') != null){".
    "\r\n var request = new XMLHttpRequest();".
     "\r\n request.onreadystatechange = function() {" .
        "\r\n if (request.readyState == 4 && request.status == 200){".
    	"\r\nalert('The Announcement has been updated.');".
    "\r\n }".
    "\r\n }".
    "\r\n request.open('POST', 'updateAnnouncement.php', true);".
    "\r\n request.setRequestHeader('Content-type','application/x-www-form-urlencoded');".
    "\r\n request.send('text='+encodeURIComponent(document.getElementById(id+'CC').value) + '&id='+id+'&database='+database)".
    "\r\n }".
    "\r\n} ";





getHeaderExtraScript($extrascript);
getNormalBodyTop(NULL);
?>
<div style='padding-top: 2%; padding-bottom: 2%; margin: auto; width: 52%; padding-left: 2%; padding-right: 2% '>
<div style="background-color: darkblue; padding-top: 1%; padding-right: 2%; padding-left: 2%; padding-bottom: 2%">
<div style='background-color: white;'>
<form method='POST'>
<select name='database'>
<?php
$db = new PDO('mysql:host=localhost;', 'root', '');
$r = $db->query("show databases");
foreach ($r as $d){
 echo "<option value='$d[Database]'>$d[Database]</option>";
 }
?>
</select>
<button type='submit'>Send</button>
</form>
<table border='1'width='100%'>
<?php
if($_POST['database']){
	$d = $_POST['database'];
	$db = new PDO('mysql:host=localhost;dbname='.$d.'', 'root', '');
	$announcement_list = $db->query("Select id, titel from announcement ");
	foreach($announcement_list as $announcement){
		echo "<tr id='$announcement[id]'><td>" .$announcement['id'] . "</td>";
		echo "<td>" . $announcement['titel']. "</td>";
		echo "<td><button onclick='getAnnouncement($announcement[id],".'"'.$d.'"'.")'>Edit</button></td>";
		echo "<td><button onclick='removeAnnouncement($announcement[id],".'"'.$d.'"'.")'>Delete</button></td>";
		echo "<td><button onclick='updateAnnouncement($announcement[id],".'"'.$d.'"'.")'>Update</button></td></tr>";
	}
}
?>
</div>
</div>
</div>
</body>
</html>

