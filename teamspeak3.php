
<?php
require_once 'AdminContentInterface/config.php'; 
include_once $path.'/htmlbuildHelper.php';
session_name('WATGSESSID');
session_start();
$script ="\r\n window.onload = function() {
loadTsOverview();

}
function loadTsOverview(){
    var request = new XMLHttpRequest();
     request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200){
            var div = document.getElementById('body');
            div.innerHTML += request.responseText;
	    repeat_char();
	}
       }
    request.open('GET', 'TSOverlay', true);
    request.send('');
}
 
function repeat_char(){ 
var to_repeat = document.getElementsByClassName('repeated');
var finalstring = '';
for(var x = 0; x < to_repeat.length; x++) {
var size = parseFloat(window.getComputedStyle(to_repeat[x],null).getPropertyValue('font-size')) * 2; 
var repeat = parseInt(document.getElementById('teamspeak-overview').offsetWidth / size);
finalstring = '';
var char = to_repeat[x].innerHTML;
for (var y = 0; y < repeat; y++) { 
finalstring += char; } 
to_repeat[x].innerHTML = finalstring }
}"; 
getHeaderExtraScript($script);
getNormalBodyTop(NULL);
?>
                        </body>
                    </html>
