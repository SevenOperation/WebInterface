<?php

$out;

session_start();

 /*file_put_contents('test7.txt', $_POST['function']);
switch ($_POST['function']) {
    case "StarMade":
        startStarmade();
        break;
    case "7DaysToDie":
        start7Days();
        break;
    default:
        break;
}

function startStarmade() {
  if(file_get_contents("status.txt") == "offline"){
    file_put_contents('console.txt', "");
    file_put_contents('error.txt', "");
    $env = array('some_option' => 'aeiou');
    global $other_options, $pipes;
   
    $descriptorspec = array(
        0 => array("pipe", "r"), // STDIN ist eine Pipe, von der das Child liest
        1 => array("pipe", "w"), // STDOUT ist eine Pipe, in die das Child schreibt
        2 => array("file", "error.txt",a) // STDERR ist eine Datei,
            // in die geschrieben wird
       
    );
   //StarMade-dedicated-server-windows.bat
   // $out = proc_open('path C:\ProgramData\Oracle\Java\javapath; & pushd E:\SteamLibrary\steamapps\common\StarMade\StarMade & E:\SteamLibrary\steamapps\common\StarMade\StarMade\StarMade-dedicated-server-windows.bat 2&>1 ' , $descriptorspec, $pipes, NULL, NULL, $other_options);
   $out = proc_open('pushd E:\SteamLibrary\steamapps\common\StarMade\StarMade & java -Xms2048m -Xmx6144m -Xincgc -Xshare:off -jar StarMade.jar -server  2>&1' , $descriptorspec, $pipes, NULL, NULL, $other_options);
   session_start();
   file_put_contents("pipes.txt",""+stream_set_blocking($pipes[0], FALSE),FILE_APPEND);
   // file_put_contents("status.txt", "online");
    while (!feof($pipes[1])) {
      //if("" != "".file_get_contents("Kommando.txt", 30)){
       fwrite($pipes[0], file_get_contents("Kommando.txt", 30), FILE_APPEND);
       fwrite($pipes[0],"min \r\n", FILE_APPEND);
       //$b = fwrite($pipes[0],"SevenOperation \r\n", FILE_APPEND);
       fflush($pipes[0]);
       file_put_contents('commandtest2.txt', file_get_contents("Kommando.txt", 30) , FILE_APPEND);
       //fclose($pipes[0]); 2
       file_put_contents('Kommando.txt', "" );
       //  file_put_contents('stream.txt', stream_select($pipes[1]), FILE_APPEND);
        //}
       //elseif(0 !== stream_select($pipes[1] ,$t = null, $z= null,0)){
        file_put_contents('console.txt', "".fread($pipes[1],1024), FILE_APPEND);
        //}*/
       // file_put_contents('stream.txt', "". stream_select($pipes[1], $t = null, $z= null,0), FILE_APPEND);
    /*}
    fclose($pipes[1]);
    fclose($pipes[2]);
    file_put_contents('test.txt', "ne oder" . proc_close($out) , FILE_APPEND);
   
    file_put_contents("status.txt", "offline");
   

    /* $out = popen('pushd E:\SteamLibrary\steamapps\common\StarMade\StarMade & E:\SteamLibrary\steamapps\common\StarMade\StarMade\StarMade-dedicated-server-windows.bat 2>&1 ', 'r');
      while (!feof($out)) {
      file_put_contents('console.txt', $out);
      }
      pclose($out); */
  /* }
}

/*function start7days() {
 if(file_get_contents("status.txt") == "offline"){
    file_put_contents('console.txt', "");
    $env = array('some_option' => 'aeiou');
    global $other_options, $pipes;
    $descriptorspec = array(
        0 => array("pipe", "r"), // STDIN ist eine Pipe, von der das Child liest
        1 => array("pipe", "w"), // STDOUT ist eine Pipe, in die das Child schreibt
        2 => array("file", "error.txt", "a") // STDERR ist eine Datei,
            // in die geschrieben wird
    );
    $out = proc_open('path C:\ProgramData\Oracle\Java\javapath; & pushd "H:\Steam\steamapps\common\7 Days to Die Dedicated Server" & "H:\Steam\steamapps\common\7 Days to Die Dedicated Server\startdedicated.bat"', $descriptorspec, $pipes, NULL, NULL, $other_options);
    //session_start();
    //$_SESSION['zeiger'] = $out;
    stream_set_blocking($pipes[0], FALSE);
    stream_set_blocking($pipes[1], FALSE);
    stream_set_blocking($pipes[2], FALSE);
    while (!feof($pipes[1])) {
        fwrite($pipes[1], "test \n");
        file_put_contents('console.txt', fread($pipes[1], 1024), FILE_APPEND);
    }
    file_put_contents('test.txt', "ne oder", FILE_APPEND);
    file_put_contents("status.txt", "offline");
    fclose($pipes[0]);
    proc_close($out);
 }
}
?>


