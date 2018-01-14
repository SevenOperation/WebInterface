<!DOCTYPE html>
<head></head>
<body>
<?php
if(isset($_POST['id'])){
    $db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    $db->query("DELETE from announcement WHERE id=". $_POST['id'] ." ORDER BY id DESC");
    $db->query("DELETE from comments WHERE announcementID=".$_POST['id']);
}
?>
</body>
