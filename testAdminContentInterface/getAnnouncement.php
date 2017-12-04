<!DOCTYPE html>
<head></head>
<body>
<?php
if(isset($_POST['id'])){
    $db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    $announcements = $db->query("Select * from announcement WHERE id=". $_POST['id'] ." ORDER BY id DESC");
    if($announcements != FALSE && $announcements->rowCount() != 0){
    foreach ($announcements as $announcement){
        echo "<div id='".$announcement['id']."C'style='background-color: white;'>\r\n".
              "<p style='margin-left: 50px; margin-right: 20px; font-size:16px; border-color: black; border-width: 1px; border-style: solid; box-sizing: border-box'>".nl2br(htmlspecialchars($announcement['content']))."</p>\r\n".
              "<p style='font-size:16px; margin-top: 10px'>".$comment['created']."</p>\r\n</div>";
    
    }
}
}
?>
</body>
