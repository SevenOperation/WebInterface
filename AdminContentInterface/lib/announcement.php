<?php
require_once "mysql.php";
	function getAnnouncements($database){
 		return queryMYSQL("news","localhost","root","Select * from ".$database."");
	}

	function getComments($id){
 		return queryMYSQL("news","localhost","root","Select * from comments whered id=$id Order by id DESC");
	}
	
	function createComment($id,$content,$announcementId){
		queryMYSQL("news","localhost","root","INTO comments (userID , annoucementID ,created ,content) VALUES (NULL,'$id','$date','$contentGET')");
	}

	function updateAnnouncement($id,$newText , $newTitel){
 		queryMYSQL("Update announcement Set content = '$newText', titel='$newTitel' where id= $id");
	}
	
	function removeAnnouncement($oldid){
		queryMYSQL("Drop announcement where id=$oldid");
	}

	function createAnnouncement($newTitel,$newText){
 		queryMYSQL("Insert INTO announcement (titel , content) VALUES ('$newTitel', '$newText')");
	}

	function getAnnouncement($id,$database){
 		return queryMYSQL($database,"localhost","root","Select * from announcement where id=$id");
	}
?>
