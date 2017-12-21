
<?php 
include_once 'testAdminContentInterface/htmlbuildHelper.php';
include_once 'testAdminContentInterface/auslesen.php';
session_name('WATGSESSID');
session_start();
getNormalHeader();
getNormalBodyTop();
auslesenHTML();
?>
                        </body>
                    </html>
