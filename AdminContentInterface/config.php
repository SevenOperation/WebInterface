<?php
$path="/var/www/html/WebInterface/AdminContentInterface";

$mysql_user = "root"; //User which is used to connect to mysql database
$mysql_user_password = "";//password form aboved mentioned user

$mysqlserver = "127.0.0.1"; //Specify your mysql ip address and port here
$mysql_user_database = "users"; //If you want a other mysql database to be used specify it here
$mysql_user_table = "user"; //Specify the name of your user table in the users database

$admin_account_username = "Admin"; //Specify the first account username in your mysql table
$admin_account_password = "password"; //Change this to your users password

//$mysql_rang_database = "users"; //Specify your rang database name Currently only the same as user_database is supported

$mysql_announcement_database = "news"; //Specify your announcement database
$mysql_announcement_table = "announcements"; // Specify the name of your announcement table
$mysql_comment_table = "comments"; //Specify the name of your comments table


?>
