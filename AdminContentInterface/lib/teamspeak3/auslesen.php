<?php
require_once __DIR__."/../../config.php";
$resultN = "";
$resultC = "1";
$clid = "";
$clientArray = array(array());
$channelArray = array();
$position = 0;
function auslesenHTML(){
 popen("sh ".__DIR__."/getClients.sh","r");
	echo "<div id='teamspeak-overview' style='color:white; width: 100%'>";	
	global $channelArray, $clientArray , $resultC , $position, $resultN, $path, $clid;
  	while($resultC !== false){
                $clid = getClientInfo("clid=",$position);
                $resultC = getClientInfo("cid=",$position);
                $resultN = getClientInfo("client_nickname=",$position);
		if(strpos($resultN,"serveradmin") === false){
                	if(!isset($clientArray[$resultC])) $clientArray[$resultC] = array();
			array_push($clientArray[$resultC],$resultN);
			//array_push($clientArray[$resultC],$clid);
		}
        }
	$resultC = "1";	
	$position= 0;
	while($resultC !== false){
                $resultC = getChannelInfo("cid=",$position);
                $resultN = getChannelInfo("channel_name=",$position);
                $channelArray[$resultC] = $resultN;
		$spacer = explode("]",$resultN);
		if(strpos($resultN,"cspacer")){
		echo "<div id='$resultC'style='width:50%; margin: auto; text-align: center'><p>$spacer[1]</p>" .getClientsInChannel($resultC). "</div>";
		}
		elseif(strpos($resultN,"*spacer")){
		echo "<div id='$resultC'style='margin: auto;'><p class='repeated' style='font-family:Times New Roman'>";
		#for($i = 0; $i < 200; $i++){
		echo "$spacer[1]";
		#}
		echo "</p>" .getClientsInChannel($resultC). "</div>";
		}elseif(strpos($resultN,"spacer")){
                echo "<div id='$resultC'style='width:50%; margin: auto; height: 19px'>". getClientsInChannel($resultC) . "</div>";
		}else{
		echo "<div id='$resultC' style='color:white; width: 100%'><a href='ts3server://ts3.wearethegamers.de?port=9987&cid=$resultC'>$resultN</a>".getClientsInChannel($resultC)."</div>";
		}
        }
	echo "</div>";

	}



function getClientsInChannel($channelid){
 global $clientArray, $clid;
 $html = "";
 if(isset($clientArray[$channelid])){
 foreach ($clientArray[$channelid] as $client){
  popen("sh ".__DIR__."/getClients.sh " . $client ,"r");
  $client = preg_replace('/\\\\s/'," ",$client);
  $client = preg_replace('/\\\\p/',"|",$client);
  $client = preg_replace('/\\\\/',"",$client); 
  $html .= "<p style='font-size: 12px; margin-left: 1%'><img></img>".$client."</p>";
 }
 return $html;
}
}


function getChannelInfo($search,$start){
global $position;
$text = fread(fopen(__DIR__."/channels", 'r'),filesize(__DIR__."/channels"));
$posa = strpos($text, $search , $start);
if($posa === false){
return false;
}
$posa += strlen($search);
$posb = strpos($text, " ", $posa);
$len = $posb - $posa;
$position = $posb;
$test = substr($text , $posa , $len);
$test = preg_replace('/\\\\s/'," ",$test);
$test = preg_replace('/\\\\p/',"|",$test);
$test = preg_replace('/\\\\/',"",$test);
return preg_replace('/\\\\s/'," ",$test);
}

function getClientInfo($search,$start){
global $position;
$text = htmlspecialchars(fread(fopen("clients", 'r'),filesize("clients")));
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

function getClientMuteStatus($search){
global $position;
$text = htmlspecialchars(fread(fopen("clientInfo", 'r'),filesize("clientInfo")));
$posa = strpos($text, $search);
if($posa === false){
return false;
}
$posa += strlen($search);
$posb = strpos($text, " ", $posa);
$len = $posb - $posa;
$position = $posb;
return substr($text , $posa , $len);
}
