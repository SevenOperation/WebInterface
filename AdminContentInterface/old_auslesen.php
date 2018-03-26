<?php
require_once __DIR__."/config.php";
$resultN = "";
$resultC = "1";
$array = array();
$position = 0;
function auslesenHTML(){
global $array , $resultC , $position, $resultN, $path;
$db = new PDO("sqlite:".$path."/ts3server.sqlitedb");
$ts_rooms = $db->query("Select max(case when ident='channel_order' then value end) value_a ,max(case when ident='channel_name' then value end) value_b from channel_properties group by id order by cast(value_a as int)");
var_dump($db->errorInfo());
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
/**$sorted_array = array();
$ts_room = $ts_rooms->fetch(PDO::FETCH_BOTH);
for ($zahl = 0; $zahl < sizeof($ts_rooms) ; $zahl++){
 //$sorted_array[$ts_room["value"]] = $ts_room['value'];
 echo "".$ts_room[$zahl];
}**/
foreach($ts_rooms as $room){
$r = "";
if(strpos($room["value_b"],"]")){
 if(strpos($room["value_b"],"cspacer")){
 $r = "<div style='width:50%; margin: auto; text-align: center'>" . explode("]",$room['value_b'])[1];
 }elseif(strpos($room["value_b"],"*spacer")){
$buffer = explode("]",$room['value_b'])[1];
$buffer_new = "";
for($i = 0; $i < 77; $i++){
$buffer_new .= $buffer;
}
$r = "<div id='".$room['value_a']."' style='width:100%; margin: auto'>" . $buffer_new ;
}
elseif(strpos($room['value_a'], "spacer")){
$r = "<div id='".$room['value_a']."' style='width:100%; margin: auto; height:19px'>";
}
else{
$r = "<div id='".$room['value_a']."' style='width:100%; margin: auto'>" . explode("]",$room['value_b'])[1];
}
}
else{
$r = "<div id='".$room['value_a']."' style='width:100%; margin: auto'>" . $room["value_b"];
if(isset($array[''.$room['value_a']])){
$r = $r . $array[''.$room['value_a']];
}
}
echo $r . "</div>";
}
}

function getClientInfo($search,$start){
global $position;
$text = fread(fopen("AdminContentInterface/clients", 'r'),filesize("AdminContentInterface/clients"));
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
