#This code should generate a php page for account registration
<?php
generateRegistrationPage(0);
function generateRegistrationPage($userid){
 $randomid = "" .rand(850000,5000000);
 $pagename = "" .rand(500000000,999999999);
 $phpcode = "<?php \n require_once 'mysql.php'; queryMYSQL('user','localhost','root','Update user SET enabled = 1 where id = $userid '); \n if(\$_GET['id'] == '$randomid'){ \n echo 'done'; \n \n } \n ?>";
 file_put_contents($pagename.'.php',$phpcode);
 createRegistrationMail(getUserEmail($userid), $userid);
}

?>
