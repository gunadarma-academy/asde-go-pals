<?php
$host = "mysql7.000webhost.com";
$user = "a6534145_gopals";
$pass = "pals2016";
$db = "a6534145_pals";

$conn = mysql_connect($host,$user,$pass) or die("Failed to Connect Database");

mysql_select_db($db);
$home = "http://gopals.netau.net/admin";
?>