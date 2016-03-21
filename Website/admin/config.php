<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "gopals";

$conn = mysql_connect($host,$user,$pass) or die("Failed to Connect Database");

mysql_select_db($db);
$home = "http://localhost/gopals/admin";
?>