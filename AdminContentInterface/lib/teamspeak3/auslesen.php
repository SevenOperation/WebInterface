<?php
require_once __DIR__."/../../config.php";
$resultN = "";
$resultC = "1";
$clientArray = array();
$channelArray = array();
$position = 0;
function auslesenHTML(){
	echo "<div style='color:white; width: 100%'>";	
	global $channelArray, $clientArray , $resultC , $position, $resultN, $path;
  	while($resultC !== false){
                $resultC = getClientInfo("cid=",$position);
                $resultN = getClientInfo("client_nickname=",$position);
		if(strpos($resultN,"SevenOperation\sfrom\s[::1]")){
		$clientArray[$resultC] = $resultN;
		}else{
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
		echo "<div id='$resultC'style='width:50%; margin: auto; text-align: center'><p>$spacer[1]</p>" .(( isset($clientArray[$resultC]) )? "<p>" .$clientArray[$resultC]." </p>": "")  . "</div>";
		}
		elseif(strpos($resultN,"*spacer")){
		echo "<div id='$resultC'style='margin: auto;'><p>";
		for($i = 0; $i < 200; $i++){
		echo "$spacer[1]";
		}
		echo "</p>" .(( isset($clientArray[$resultC]) )? "<p>" .$clientArray[$resultC]." </p>": "")  . "</div>";
		}elseif(strpos($resultN,"spacer")){
                echo "<div id='$resultC'style='width:50%; margin: auto; height: 19px'>" .(( isset($clientArray[$resultC]) )? "<p>" .$clientArray[$resultC]." </p>": "")  . "</div>";
		}else{
		echo "<div id='$resultC' style='color:white; width: 100%'><p>$resultN</p>" .(( isset($clientArray[$resultC]) )? "<p>" .$clientArray[$resultC]." </p>": "")  . "</div>";
		}
        }
	echo "</div>";

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
$text = fread(fopen(__DIR__."/clients", 'r'),filesize(__DIR__."/clients"));
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
