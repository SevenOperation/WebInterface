
<?php
session_start();
include './rcon.php';
//if (!isset($_SESSION['angemeldet' . $_COOKIE['user']]) || $_SESSION['angemeldet' . $_COOKIE['user']] != true) {
  //  header('Location: /index.php');
 ///if(isset($_POST['command'])){
  $host = "tcp://127.0.0.1";
  $port = 7777;
  $passwort = "12";
  $timeout = 3;
  $rcon = fsockopen($host, $port, $errno, $errstr, $timeout);
  
  stream_set_timeout($rcon, 3, 0);
  
  $pack = pack("VV", 5, 3);
  $pack = $pack . $passwort . "\x00" . "\x00";
  $length = strlen($pack);
  $pack = pack("V", $length) . $pack;
  fwrite($rcon, $pack , strlen($pack) );
  $befehl = "" . filter_input(INPUT_POST, 'command');
  if ($befehl == ""){
      $befehl = "/say hi" ;
  }
  
  $pack = pack("VV", 6, 2);
  $pack = $pack . $befehl  . "\x00" . "\x00";
  $pack = pack("V", strlen($pack)) . $pack;
  fwrite($rcon, $pack , strlen($pack) );
 
  //fclose($rcon);
  //$response_packet = read_packet($rcon);
  //file_put_contents("test.txt", $response_packet['body'] . "\n" , FILE_APPEND);
  fclose($rcon);
  
 /*$rcon = new Rcon("tcp://127.0.0.1", 7777, "12", 3);
  $rcon->connect();
  $rcon->send_command("/say hi");
  echo preg_replace("/§./", "", $rcon->get_response());*/
 
 
 

        
