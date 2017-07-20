<?php

$out;

session_start();
$minecarft_cmd = 'pushd C:\Users\SevenOperation\Downloads\FTBInfinityServer_2.7.0 & java -server -Xms4096M -Xmx4096M -XX:PermSize=512M -XX:+UseG1GC -XX:+CMSIncrementalPacing -XX:+CMSClassUnloadingEnabled -XX:ParallelGCThreads=4 -XX:MinHeapFreeRatio=5 -XX:MaxHeapFreeRatio=10 -jar FTBServer-1.7.10-1614.jar nogui  2>&1 >> H:\xampp\htdocs\WebInterface\ControlInterface\console.txt';
$daystodie_cmd = 'pushd "H:\Steam\steamapps\common\7 Days to Die Dedicated Server" & "H:\Steam\steamapps\common\7 Days to Die Dedicated Server\startdedicated.bat 2>&1 >> H:\xampp\htdocs\WebInterface\ControlInterface\console.txt"';
$starmade_cmd =  'pushd E:\SteamLibrary\steamapps\common\StarMade\StarMade & java -Xms2048m -Xmx6144m -Xincgc -Xshare:off -jar StarMade.jar -server  2>&1 >> H:\xampp\htdocs\WebInterface\ControlInterface\console.txt';
$descriptorspec = array(
        0 => array("pipe", "r"), // STDIN ist eine Pipe, von der das Child liest
        1 => array("pipe", "w"), // STDOUT ist eine Pipe, in die das Child schreibt
        2 => array("file", "error.txt",a) // STDERR ist eine Datei,
            // in die geschrieben wird
       
    );

 file_put_contents('test7.txt', $_POST['function']);
switch ($_POST['function']) {
    case "StarMade":
        startStarmade();
        break;
    case "7DaysToDie":
        start7Days();
        break;
    case "Minecraft":
        startMinecraft();
        break;
    default:
        break;
}


function startStarmade() {
     logfileexists();
     global $other_options, $pipes , $descriptorspec , $starmade_cmd , $out;
  if(file_get_contents("status.txt") == "offline"){
   $out = proc_open($starmade_cmd , $descriptorspec, $pipes, NULL, NULL, $other_options);
   session_start();
   file_put_contents("pipes.txt",""+stream_set_blocking($pipes[0], FALSE),FILE_APPEND);
   file_put_contents("status.txt", "online");
   }
}

function start7days() {
     logfileexists();
 if(file_get_contents("status.txt") == "offline"){
    $env = array('some_option' => 'aeiou');
    global $other_options, $pipes, $descriptorspec , $daystodie_cmd;
   
    $out = proc_open($daystodie_cmd, $descriptorspec, $pipes, NULL, NULL, $other_options);
    stream_set_blocking($pipes[0], FALSE);
    stream_set_blocking($pipes[1], FALSE);
    stream_set_blocking($pipes[2], FALSE);
 
      file_put_contents("status.txt", "online");
 }
}

function startMinecraft() {
    global $minecarft_cmd;
    logfileexists();
 if(file_get_contents("status.txt") == "offline"){
    $env = array('some_option' => 'aeiou');
    global $other_options, $pipes, $descriptorspec ,$out;
    
    $out = proc_open($minecarft_cmd, $descriptorspec, $pipes, NULL, NULL, $other_options);
    stream_set_blocking($pipes[0], FALSE);
    stream_set_blocking($pipes[1], FALSE);
    stream_set_blocking($pipes[2], FALSE);
    file_put_contents("status.txt", "online");
     
 }
}

function logfileexists(){
    if(file_exists("console.txt")){
        rename("console.txt", "console" . getdate());  
    }
}
?>


