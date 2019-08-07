<?php
require_once __DIR__.'/../AdminContentInterface/config.php';
include_once $path.'/htmlbuildHelper.php';
//include_once $path.'/auslesen.php';
session_name('WATGSESSID');
session_start();
$username="";
$room ='global';
if(isset($_POST['streamer'])){
	$username=htmlspecialChars($_POST['streamer']);
	$room = "Stream".$username;
}

$chatSystem = str_replace('roomId',$room,str_replace('usernameId',session_id(),file_get_contents('chat.js')));
getHeaderExtraScript("</script><link href='node_modules/video.js/dist/video-js.min.css' rel='stylesheet'></script><link href='Style.css' rel='stylesheet'><script src='node_modules/video.js/dist/video.min.js'></script><script src='node_modules/videojs-flash/dist/videojs-flash.min.js'></script>".$chatSystem."");
getNormalBodyTop(NULL);
?>
<div style='width: 52%; padding: 2%; margin: auto; margin-left: 24%; float: left; padding-right:0; padding-left:0;'><div style='padding: 2%; margin: auto; width: 100%; background: hsla(0, 0%, 89%, 0.21); box-shadow: 0px 20px 20px 0px #00000029;'>
<Tidel>
<?php
$db = new PDO('mysql:host=localhost;dbname=users', 'root');
$result = $db->query("Select username, streamSettings.streamName from user Left Join streamSettings on user.id = streamSettings.user_id where streamSettings.streaming=1");
$streamName = "";
$otherStreams = "";
$resultOk = False;
if($result != False && $result->rowCount() != 0){
	$resultOk = True;
	if($username == ""){
		$rowOne = $result->fetch(PDO::FETCH_ASSOC);
  		$username = $rowOne['username'];
		$streamName = $rowOne['streamName'];
	}
        foreach($result as $row){
		if($username == $row['username']){
			$streamName = $row['streamName'];
		}else{
		$otherStreams .= "<section><form action='' method='POST'><input type='submit' name='streamer' value='".$row['username']."'/></form></section>";
		}
	}
echo "<User>$username</User>";
echo "<seperator> | </sperator>";	
echo "<StreamTitle>".$streamName."<StreamTitle>";
echo "</Tidel>";
}
?>

<?php
$playerSettings = ""; 
if($resultOk){
        echo '<video id="player" class="video-js stream" controls preload="auto" autoplay>';
  	echo " <source src='rtmp://wearethegamers.de:1935/source/".$username."'/>";
  	echo "</video></section><section><p>Comments</p><div id='chatBox' class='chatBoxCss'></div><input type='text' style='width:100%' onkeydown='sendChatMessage(this)'></input></section></main>";
 	echo "<main2><p style='color:white'>Other Streams:</p>";
 	echo $otherStreams;
 	echo "</main2>";
        $playerSettings = '<script>var player = videojs("player",{"fluid":true,"techorder" : ["flash"] },function(){this.volume(0.18);});</script>';
 }else{
 echo "<img width=100% height=100% src='NoStreams.png'/></div></div><div style='width:24%; float:right; padding: 2%; margin: auto'><section style='width:100%; background: hsla(0, 0%, 89%, 0.21); padding: 2%'><p>Comments</p><div id='chatBox' class='chatBoxCss'></div><input id='messageInput' type='text' class='chatBoxCss' onkeydown='sendChatMessage(this)'></input></section></div>";
 }
 echo $playerSettings;
?>
