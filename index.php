<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
file_put_contents('user.txt', $_SERVER['REMOTE_ADDR'] ); 

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Herzlich Wilkommen bei WeAreTheGamers</title>
    </head>
         <frameset rows="54,*" frameborder="0" framespacing="0" border="0">
        <frame src="ws_top_startS.php" scrolling="no" noresize="" name="top"/>
        <frameset cols="260,*" border="0" frameborder="0" framespacing="0">
        <frame src="ws_navigation.php" scrolling="auto" noresize=""/> 
        <frameset rows="*">
            <frame name='content' src="ws_content_stS.php"/>
        </frameset>
        </frameset>
    </frameset>
</html>
