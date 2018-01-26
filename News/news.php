
 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_name('WATGSESSID');
session_start();
if (isset($_COOKIE['benutzerdaten'])) {
    $username = explode("-", $_COOKIE['benutzerdaten'])[0];
    $password = explode("-", $_COOKIE['benutzerdaten'])[1];
}

require_once '../testAdminContentInterface/htmlbuildHelper.php';
$script = "\n function resizeIFrame(){".
"\r\n var iFrame = document.getElementById('youtube');".
"\r\n iFrame.width = document.body.scrollWidth;".
"\r\n iFrame.height = window.screen.height;".
"\r\n }".
"\r\n content.addEventListener('load', function(e){".
"\r\n resizeIFrame();".
"\r\n });";
getHeaderExtraScript($script);
getNormalBodyTop();
$id="UhkgBR6Sd6Q"

#echo GET https://www.googleapis.com/youtube/v3/search?part=snippet%2Cid&channelId=UChX1P_mHNWCcaa9oHvHiRAg&maxResults=1&order=date&key={YOUR_API_KEY};
?>
<iframe id="youtube" width="854" height="480" src="https://www.youtube.com/embed/UhKgBR6SD6Q" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </body>
                    </html>



