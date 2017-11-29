<?php
function auslesenHTML(){
$db = new PDO("sqlite:/var/www/html/WebInterface/testAdminContentInterface/ts3server.sqlitedb");
$ts_rooms = $db->query("Select * from channel_properties Where ident='channel_name' Order by id");
$ts_names = $db->query("Select * from server_properties Where ident='virtualserver_name' AND id=1");
foreach($ts_names as $ts_name){
echo "<div style='color:white; width: 100%'>" . $ts_name["value"];
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
$r = "<div style='width:100%; margin: auto'>" . $buffer_new ;
}
elseif(strpos($room['value'], "spacer")){
$r = "<div style='width:100%; margin: auto; height:19px'>";
}
else{
$r = "<div style='width:100%; margin: auto'>" . explode("]",$room['value'])[1];
}
}
else{
$r = "<div style='width:100%; margin: auto'>" . $room["value"];
}
echo $r . "</div>";
}
}
