<!DOCTYPE html>
<?php
session_start();
require_once '../AdminContentInterface/htmlbuildHelper.php';
require_once '../ControlInterface/datenueberpruefung.php';
$extrascipt=" \r\n function showImageBig(id){"
             ."\r\n window.location = document.getElementById(id).src;"
             ."\r\n }";
getHeaderExtraScript($extrascipt);
getNormalBodyTop();
if(checkLoggedIn() && getPermission() >= 1) {
// wo die screenshots sind
$dir_path = "."; 
// Welche Dateien angezeigt werden sollen
$extensions_array = array('jpg','png','jpeg','png');
echo "
		<form action=\"logout.php\" method=\"post\">
			<input id=\"logout\" type=\"submit\" value=\"Logout\">
		</form>

		<div class=\"picture\"> 
                <table border='1'>
";
if(is_dir($dir_path))
{
    $files = scandir($dir_path);

   echo "<tr>";
    $images = 0; 
    for($i = 0; $i < sizeof($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
           // echo "File Name -> $files[$i]<br>";
            
            // get file extension
            $file = pathinfo($files[$i]);
            if(isset($file['extension'])){
            $extension = $file['extension'];
            }
          //  echo "File Extension-> $extension<br>";
            
           // check file extension
            if(isset($extension) && in_array($extension, $extensions_array) && $extension != "")
            {
            $images ++;
            echo "
			<td width='".  getimagesize($files[$i])[0] / 100 * 10 ."px'><img id='$i' src='$files[$i]' style='width: 100%; height:10%;' onclick='showImageBig($i);'></button></td>";
            if(($images % 5) == 0) echo"</tr><tr>";
	     
            }
        }
    }echo "</tr>";
}
echo " </table>
		</div> 
	</body>
</html>";
}
else {
	echo "
		<div id=\"error\" style='color: white'>
			<h1>Du hast keinen Zugriff auf dieses Verzeichnis.</h1></br>
			<h2>Entweder du bist nicht angemeldet oder dein Account hat nicht die Berechtigung.</h2>
		</div>
	</body>
</html>


";
}
 ?>
