<?php
require_once 'htmlbuildHelper.php';
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}
getNormalHeader();
getNormalBodyTop($username);
?>
<div style='padding-top: 2%; padding-bottom: 2%; margin: auto; width: 29%; padding-left: 2%; padding-right: 2% '>
<div style="background-color: darkblue; padding-top: 1%; padding-right: 2%; padding-left: 2%; padding-bottom: 2%">
<form action='' method='POST'>
<div style='background-color: white;'>
<p>Title:</p>
<input name='titel' type=text style='width: 100%; text-align: center; margin: auto; box-sizing: border-box'></input>
</div>
<div style='background-color: white; height: 700px;'>
<p>Text:</p>
<textarea maxlength="1000" name='content' style='width: 100%; height: 90%; margin: auto; box-sizing: border-box'>
</textarea>
<button type='submit'>Announcement anlegen</button>
</div>
</form>
</div>
</div>
</body>
</html>

<?php
$titel = $_POST['titel'];
$content = $_POST['content'];
if(isset($titel) && isset($content)){
$db = new PDO('mysql:host=localhost;dbname=news', 'root', '');
$db->query("INSERT INTO announcement (titel , content ) VALUES ('$titel','$content')");
}
?>
