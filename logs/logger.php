<?php
function logIP(){
    file_put_contents('logs/user.txt', 'IP: ' . $_SERVER['REMOTE_ADDR'] . " | OS: " . $_SERVER["HTTP_USER_AGENT"] . " | Datum: ".date("d.m.Y"). " | Zeit: " .date("H:i:sa") . "\n", FILE_APPEND ); 
}
