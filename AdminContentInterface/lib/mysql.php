<?php
function queryMYSQL($dbname,$hostname,$user,$command){
 $db = new PDO('mysql:host='.$hostname.';dbname='.$dbname.'', $user, '');
 $result = $db->query($command);
return $result;
}
?>
