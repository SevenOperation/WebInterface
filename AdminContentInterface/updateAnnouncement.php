<?php
$text = $_POST["text"];
$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);
if(isset($id) && isset($text)){
	$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
	$db->query("Update announcement Set content = '$text' where id= $id");
}
?>
