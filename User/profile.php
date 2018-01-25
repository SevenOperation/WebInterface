<?php
require_once "../testAdminContentInterface/htmlbuildHelper.php";
require_once "../ControlInterface/datenueberpruefung.php";
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
getNormalBodyTop();
$content = "<p>Username: <label>". explode('-',$_COOKIE['benutzerdaten'])[0] ."</label></p>".
"<p>Password: <label>******</label></p>".
"<form action='' method='POST'>".
"<p>New Password: <input type='password' name='password'/></p>".
"<p>New Password repeat: <input type='password' name='passwordw' /></p>".
"<p><button>Change Password</button></p>".
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
