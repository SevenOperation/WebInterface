<!Doctype HTML>
<?php
session_start();
if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
    header('Location: /index.php');
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css.css">
    </head>
    <frameset rows="100,*" frameborder="0" framespacing="0" border="0">
        <frame src="ci_top.php" scrolling="no" noresize="" name="top"/>
        <frameset cols="214,*" border="0" frameborder="0" framespacing="0">
        <frame src="ci_navigation.php" scrolling="auto" noresize=""/> 
        <frameset rows="50,*">
            <frame name="title" src="info.php"/>
            <frame name='content' src="status.php"/>
        </frameset>
        </frameset>
    </frameset>

</html>

