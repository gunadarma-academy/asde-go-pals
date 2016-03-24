<?php
require "../config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=http://gopals.netau.net/admin/index.php'>";
}else{
	$idbengkel = $_GET['id'];
	$getbengkel = "SELECT * FROM user_input_bengkel WHERE id_bengkel='$idbengkel'";
	$result = mysql_query($getbengkel, $conn) or die(mysql_error());
	$bengkel = mysql_fetch_assoc($result);
	$bengkel_name = $bengkel['bengkel_name'];
	$vehicle_type = $bengkel['vehicle_type'];
	$brand = $bengkel['brand'];
	$address = $bengkel['bengkel_address'];
	$telephone = $bengkel['telephone'];
	$latitude = $bengkel['latitude'];
	$longitude = $bengkel['longitude'];
	
	$queryinsert = "INSERT INTO bengkel (bengkel_name, vehicle_type, brand, bengkel_address, telephone, latitude, longitude) VALUES ('$bengkel_name', '$vehicle_type', '$brand', '$address', '$telephone', '$latitude', '$longitude')";
	$result2 = mysql_query($queryinsert,$conn) or die("Failed to Get Database!");
	
	$querydelete = "DELETE FROM user_input_bengkel WHERE id_bengkel='$idbengkel'";
	$result3 = mysql_query($querydelete,$conn) or die("Failed to Get Database!");
	if($result2){
		echo '<script language="javascript">';
		echo 'alert("Repair shop data has been confirmed")';
		echo '</script>';
		?>
		<meta http-equiv="refresh" content="0; url=user_input_bengkel.php">
		<?php	
	}
}
?>
