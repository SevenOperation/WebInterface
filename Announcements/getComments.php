<!DOCTYPE html>
<head></head>
<body>
<?php
if(isset($_GET['id'])){
    $db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
    $comments = $db->query("Select * from comments WHERE annoucementID=". $_GET['id'] ." ORDER BY id DESC");
    $db = new PDO('mysql:host=localhost;dbname=users', 'root', '');
    if($comments != FALSE && $comments->rowCount() != 0){
    foreach ($comments as $comment){
        $creator = $db->query("Select username from user WHERE id=". $comment['userID'] ." ORDER BY id DESC");
        $creatorS = $creator->fetch(PDO::FETCH_ASSOC)['username'];
        if(!isset($creatorS)) $creatorS="Unknown (Guest)";
        echo "<div name='".$comment['annoucementID']."C'style='background-color: white;'>\r\n".
              "\r\n <p style='font-size:16px'>".$creatorS."</p>".
              "\r\n <img src='' height='48' width='48' style='position: absolute'></img>".
              "<p style='margin-left: 50px; margin-right: 20px; font-size:16px; height: 96px; border-color: black; border-width: 1px; border-style: solid; box-sizing: border-box'>".nl2br(htmlspecialchars($comment['content']))."</p>\r\n".
              "<p style='font-size:16px; margin-top: 10px'>".$comment['created']."</p>\r\n</div>";
    }
    }else{
        echo "<div name='".$_GET['id']."C'style='background-color: white;'>\r\n<p style='width: 100%;'>No comments could be found</p>".
              "\r\n</div>";
    }
}
?>
</body>
