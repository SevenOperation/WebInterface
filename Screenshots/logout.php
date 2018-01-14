<?php
session_start();
if(isset($_SESSION["screen_rights"])) {
session_destroy();
}
echo "
<html>
	<head>
	  <meta http-equiv=\"refresh\" content='3' URL=\"http://wearethegamers.de/Screenshots\">
		<title>Redirect</title>
	</head>
		
	<body>
	
	</body>
</html>
";
?>