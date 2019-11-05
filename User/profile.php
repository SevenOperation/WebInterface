<?php
require_once "../AdminContentInterface/lib/user.php";
require_once "../AdminContentInterface/htmlbuildHelper.php";
if(checkLoggedIn()){
$extrascript = "\r\n function upload(){". 
" \r\n var req = new XMLHttpRequest();".
" \r\n req.open('POST','upload');".
" \r\n var formData = new FormData();".
" \r\n var fileList = document.getElementById('fileToUpload');".
" \r\n formData.append('file',fileList.files[0] );".
" \r\n req.send(formData);".
" \r\n } ";
getHeaderExtraScript($extrascript);
getNormalBodyTop(getPicture());
$ps2AlertSettings=getAlertSetting($_SESSION['WATGSESSID']);
$streamSetting = getStreamSetting($_SESSION['WATGSESSID']);
$content = "<p>Username: <label>".getUsername()."</label></p>".
"<p>Password: <label>******</label></p>".
"<form action='changepassword' method='POST'>".
"<p>New Password: <input type='password' name='password'/></p>".
"<p>New Password repeat: <input type='password' name='passwordw' /></p>".
"<p><button>Change Password</button></p>".
"</form>".
"<form action='changeEmail' method='POST'>".
"<p>Email address: <input type='email' name='mailaddress' value='".getEmailAddress($_SESSION['WATGSESSID'])."' required/></p>".
"<p><button>Change mail address</button></p>".
"</form>".
"<form>".
"<p>Newsletter: <input type='checkbox' name='newsletter' value='1' checked /></p>".
"</form>".
"{$ps2AlertSettings->getAlertSettingUI()}".
"<form action='updateStreamSetting' method='POST'>".
"<p> Stream Settings:</p>".
"<p> Stream Name: <input type='text' name='streamName' value='{$streamSetting->getStreamName()}' /></p>".
"<p> StreamKey: <lable>{$streamSetting->getStreamKey()}</lable></p>".
"<p> OBS StreamingURL: <lable>rtmp://www.wearethegamers.de:1935/live/</lable></p>".
"<p><button>Submit stream settings</button></p>".
"</form>".
"<p><img style='border: 5px solid' width='256' height='256' src='".getPicture()."'></img></p>".
"<p>Select image to upload: <input type='file' name='fileToUpload' id='fileToUpload'></p>".
"<p><input onclick='upload()' type='submit' value='Upload Image' name='submit'></p>";
getForm("User Info",$content);
}else{
header('Location: /index');
}

?>
</div>
</div>
</body>
</html>
