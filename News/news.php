
 
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
getNormalHeader();
getNormalBodyTop();
?>
<iframe width="600" height="340" src="https://www.youtube.com/embed/latest?list=UChX1P_mHNWCcaa9oHvHiRAg" frameborder="0" allowfullscreen></iframe> 
<iframe width="600" height="340" src="https://www.youtube.com/channel/UChX1P_mHNWCcaa9oHvHiRAg/feed?activity_view=1" frameborder="0" allowfullscreen></iframe>
                    </body>
                    </html>



