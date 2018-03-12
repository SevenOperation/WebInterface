
<?php
require_once 'AdminContentInterface/config.php'; 
include_once $path.'/htmlbuildHelper.php';
include_once $path.'/auslesen.php';
session_name('WATGSESSID');
session_start();
getNormalHeader();
getNormalBodyTop();
$content = filter_input(INPUT_POST,'wishlistforwebsite',FILTER_SANITIZE_SPECIAL_CHARS);
file_put_contents('wishlist.txt',$content . "\n",FILE_APPEND);
?>
<div style='width:100%'>
<div style='width:33%; float: left;'>
<p><a href='https://www.youtube.com/channel/UChX1P_mHNWCcaa9oHvHiRAg'><img width='33%' src='youtube.png'></img></a></p>
<p><a href='https://www.twitch.tv/watg_we_are_the_gamers'><img width='33%' src='twitch.png'></img></a></p>
<a href='/News/news'><img src=''></img>Or watch our newest Video on our Website here</a>
</div>
<div style='width:34%; margin: auto;'>
<form method='POST' action''>
<p style='color: white'>This is the wishlist text area, if you have any ideas what the website should have, let me know it by simply writing it to the text area and press submit. This is totally anonym.</p>
<textarea name='wishlistforwebsite'style='width:100%; height: 350px'></textarea>
<button type='submit'>Submit</button>
</form>
</div>
<div style='width:33%'></div>
</div>
                        </body>
                    </html>
