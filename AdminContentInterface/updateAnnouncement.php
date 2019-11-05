<?php
$text = $_POST["text"];
$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);
if(isset($id) && isset($text) && isset($_POST['database'])){
	$db = new PDO('mysql:host=localhost;dbname='.$_POST['database'].'', 'root', '');
	$db->query("Update announcement Set content = '$text', titel=".$_POST['titel']." where id= $id");
	
}
?>
