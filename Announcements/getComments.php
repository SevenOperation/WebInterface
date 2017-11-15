<!DOCTYPE html>
<head></head>
<body>
<?php
if(isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    $comments = $db->query("Select * from comments WHERE annoucementID=". $_GET['id'] ." ORDER BY id DESC");
    if(isset($comments)){
    foreach ($comments as $comment){
        echo "<textarea maxlength='1000' name='content' style='width: 100%; height: 90%; margin: auto; box-sizing: border-box'>".$comment['content']."</textarea>\r\n".
              "<p>$comment['created']</p>";
    }
    }else{
        echo "<p>No Comments could be found</p>";
    }
}else{
        echo "<p>No Comments could be found</p>";
    }
?>
</body>
