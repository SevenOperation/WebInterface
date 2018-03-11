<?php

$resultN = "";
$resultC = "1";
$array = array();
$position = 0;
function auslesenHTML(){
global $array , $resultC , $position, $resultN;
$db = new PDO("sqlite:testAdminContentInterface/ts3server.sqlitedb");
$ts_rooms = $db->query("Select * from channel_properties Where ident='channel_name' Order by id");
$ts_names = $db->query("Select * from server_properties Where ident='virtualserver_name' AND id=1");
foreach($ts_names as $ts_name){
echo "<div style='color:white; width: 100%'>" . $ts_name["value"];
}
while($resultC !== false){
$resultN = getClientInfo("client_nickname=",$position);
$resultC = getClientInfo("cid=",$position);
$array[$resultC] = $resultN;
}
#var_dump($db->errorInfo());
foreach($ts_rooms as $room){
$r = "";
if(strpos($room["value"],"]")){
 if(strpos($room["value"],"cspacer")){
 $r = "<div style='width:50%; margin: auto; text-align: center'>" . explode("]",$room['value'])[1];
 }elseif(strpos($room["value"],"*spacer")){
$buffer = explode("]",$room['value'])[1];
$buffer_new = "";
for($i = 0; $i < 77; $i++){
$buffer_new .= $buffer;
}
$r = "<div id='".$room['id']."' style='width:100%; margin: auto'>" . $buffer_new ;
}
elseif(strpos($room['value'], "spacer")){
$r = "<div id='".$room['id']."' style='width:100%; margin: auto; height:19px'>";
}
else{
$r = "<div id='".$room['id']."' style='width:100%; margin: auto'>" . explode("]",$room['value'])[1];
}
}
else{
$r = "<div id='".$room['id']."' style='width:100%; margin: auto'>" . $room["value"];
if(isset($array[''.$room['id']])){
$r = $r . $array[''.$room['id']];
}
}
echo $r . "</div>";
}
}

function getClientInfo($search,$start){
global $position;
$text = fread(fopen("testAdminContentInterface/clients", 'r'),filesize("testAdminContentInterface/clients"));
$posa = strpos($text, $search , $start);
if($posa === false){
return false;
}
$posa += strlen($search);
$posb = strpos($text, " ", $posa);
$len = $posb - $posa;
$position = $posb;
return substr($text , $posa , $len);
}
#$text = "haha client_nickname=SevenOperation ";
#echo strpos($text, "client_nickname=");
#echo strpos($text, " ",5);
