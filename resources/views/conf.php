<?php
$host='localhost'; 
$database='u911040123_ki'; 
$user='u911040123_admin'; 
$pswd='olko111'; 
 
$dbh = mysql_connect($host, $user, $pswd) or die("MySQL.");
mysql_select_db($database) or die(".");

?>