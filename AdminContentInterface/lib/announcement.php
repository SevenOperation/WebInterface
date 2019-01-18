<?php
require_once "mysql.php";
	function getAnnouncements(){
 		return queryMYSQL("news","localhost","root","Select * from news");
	}

	function getComments($id){
 		return queryMYSQL("news","localhost","root","Select * from comments whered id=$id Order by id DESC");
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

	function getAnnouncement($id){
 		return queryMYSQL("news","localhost","root","Select * from announcement where id=$id");
	}
?>
