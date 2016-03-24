<?php
require "../config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=http://gopals.netau.net/admin/index.php'>";
}else{
	$idspbu = $_GET['id'];
	$getspbu = "SELECT * FROM user_input_spbu WHERE id_spbu='$idspbu'";
	$result = mysql_query($getspbu, $conn) or die(mysql_error());
	$spbu = mysql_fetch_assoc($result);
	$spbu_name = $spbu['spbu_name'];
	$company = $spbu['company'];
	$address = $spbu['spbu_address'];
	$latitude = $spbu['latitude'];
	$longitude = $spbu['longitude'];
	
	$queryinsert = "INSERT INTO spbu (spbu_name, company, spbu_address, latitude, longitude) VALUES ('$spbu_name', '$company', '$address', '$latitude', '$longitude')";
	$result2 = mysql_query($queryinsert,$conn) or die("Failed to Get Database!");
	
	$querydelete = "DELETE FROM user_input_spbu WHERE id_spbu='$idspbu'";
	$result3 = mysql_query($querydelete,$conn) or die("Failed to Get Database!");
	if($result2){
		echo '<script language="javascript">';
		echo 'alert("Gas Station data has been confirmed")';
		echo '</script>';
		?>
		<meta http-equiv="refresh" content="0; url=user_input_spbu.php">
		<?php	
	}
}
?>
