
<?php
require_once 'AdminContentInterface/config.php'; 
include_once $path.'/htmlbuildHelper.php';
include_once $path.'/auslesen.php';
session_name('WATGSESSID');
session_start();
getNormalHeader();
getNormalBodyTop();
auslesenHTML();
?>
                        </body>
                    </html>
