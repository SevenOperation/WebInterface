<?php
require_once __DIR__."/../AdminContentInterface/config.php";
function logIP(){
    global $logpath;
    file_put_contents($logpath.'/user.txt', 'Requested URL: '. $_SERVER['REQUEST_URI'] .' IP: ' . $_SERVER['REMOTE_ADDR'] . " | OS: " . $_SERVER["HTTP_USER_AGENT"] . " | Datum: ".date("d.m.Y"). " | Zeit: " .date("H:i:sa") . "\n", FILE_APPEND ); 
}
