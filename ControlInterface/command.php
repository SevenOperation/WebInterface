<?php
session_start();
if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
    header('Location: /index.php');
}
 session_start();
 if(isset($_POST['command'])){
     file_put_contents("Kommando.txt", $_POST['command']);
    
 }


