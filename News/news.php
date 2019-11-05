
 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_name('WATGSESSID');
session_start();
require_once '../AdminContentInterface/htmlbuildHelper.php';
$script = "\n function resizeIFrame(){".
"\r\n var iFrame = document.getElementById('youtube');".
"\r\n iFrame.width = document.body.scrollWidth;".
"\r\n iFrame.height = window.screen.height;".
"\r\n }".
"\r\n content.addEventListener('load', function(e){".
"\r\n resizeIFrame();".
"\r\n });";
getHeaderExtraScript($script);
getNormalBodyTop(NULL);
$videourl=file_get_contents('../AdminContentInterface/lib/lastWATGVideourl');
echo '<iframe id="youtube" width="854" height="480" src="'.$videourl.'" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </body>
                    </html>'
?>



