<!Doctype HTML>
<?php
session_name("WATGSESSID");
session_start();
if (!isset($_SESSION['WATGSESSID'])) {
    header('Location: /index');
}
?>


                    <div style='width: 100px;  background-color: #24292e; padding-top: 12px; padding-bottom: 12px; line-height: 1.5 ;'>
                    <div class='head' style='height: 600px; margin-left: auto; margin-right: auto; line-height: 1.5; font-size: 14px'>
                    <ul style='margin-top: 0; width: auto; list-style:  none;  display: flex; float: left; padding-left: 0; margin-bottom: 0'>
                    <li><a href='/index'>Status / CMD</a></li>
                    <li><a href='/News/news'>Spiele</a></li>
                    <li><a href=''>Games</a></li>
                    <li><a href=''>Ankündigungen</a></li>
                    </div>
                    </div>
                    </body>
                    </html>-->
<html>
    <head>
        <link rel="stylesheet" href="css.css">
    </head>
    <frameset rows="100,*" frameborder="0" framespacing="0" border="0">
        <frame src="ci_top" scrolling="no" noresize="" name="top"/>
        <frameset cols="214,*" border="0" frameborder="0" framespacing="0">
        <frame src="ci_navigation" scrolling="auto" noresize=""/> 
        <frameset rows="50,*">
            <frame name="title" src="info"/>
            <frame name='content' src="status"/>
        </frameset>
        </frameset>
    </frameset>

</html>


