<!DOCTYPE html>
<head></head>
<body>
<?php
require_once __DIR__."/../AdminContentInterface/lib/announcement.php";
if(isset($_GET['id'])){
    $comments = queryMYSQL("news","localhost","root","Select * from comments WHERE annoucementID=". $_GET['id'] ." ORDER BY id DESC");
    if($comments != FALSE && $comments->rowCount() != 0){
    foreach ($comments as $comment){
        $creator = queryMYSQL("users","localhost","root","Select u.username , u.profilepicture, r.rangname from user u , rang r WHERE u.id=". $comment['userID'] ." AND u.rangID= r.id ORDER BY u.id DESC");
        $creatorS = "Unknown (Guest)";
        $picture = "";
        $rang = "";
	if(isset($creator) && $creator != false){
        foreach ($creator as $data){
        $creatorS = $data['username'];
        $picture = $data['profilepicture'];
        $rang = $data['rangname'];
        }
        }
        #echo $creator->fetch(PDO::FETCH_ASSOC)['profilepicture'];
        if(!isset($creatorS)) $creatorS="Unknown (Guest)";
        echo "<div name='".$comment['annoucementID']."C'style='background-color: white;'>\r\n".
              "\r\n <p style='font-size:16px'>".$creatorS." (".$rang.")</p>".
              "\r\n <img src='". $picture ."' height='48' width='48' style='position: absolute'></img>".
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
