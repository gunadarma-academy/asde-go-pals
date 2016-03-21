<?php
include ("config.php");

if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$enkrip = "18051994";
	$password2 = md5($password.md5($enkrip));
	$query = "INSERT INTO admin (admin_username, admin_password) VALUES ('$username', '$password2')";
	$result = mysql_query($query,$conn) or die("Failed to Get Database!");
	if($result){
		echo '<script language="javascript">';
		echo 'alert("admin added")';
		echo '</script>';
	}
}
?>