<?php
include_once __DIR__.'/../AdminContentInterface/lib/user.php';
if(checkLoggedIn()){
echo getUsername();
http_response_code(200);
#header(200);
}else{
http_response_code(404);
echo "Tada";
}
?>
