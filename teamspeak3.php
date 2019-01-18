
<?php
require_once 'AdminContentInterface/config.php'; 
include_once $path.'/htmlbuildHelper.php';
include_once $path.'/lib/teamspeak3/auslesen.php';
session_name('WATGSESSID');
session_start();
getNormalHeader();
getNormalBodyTop(NULL);
auslesenHTML();
?>
                        </body>
                    </html>
