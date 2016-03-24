<?php
require "../config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=http://gopals.netau.net/admin/index.php'>";
}else{
	$idatm = $_GET['id'];
	$getatm = "SELECT * FROM user_input_atm WHERE id_atm='$idatm'";
	$result = mysql_query($getatm, $conn) or die(mysql_error());
	$atm = mysql_fetch_assoc($result);
	$atm_name = $atm['atm_name'];
	$bank_name = $atm['bank_name'];
	$address = $atm['atm_address'];
	$latitude = $atm['latitude'];
	$longitude = $atm['longitude'];
	
	$queryinsert = "INSERT INTO atm (atm_name, bank_name, atm_address, latitude, longitude) VALUES ('$atm_name', '$bank_name', '$address', '$latitude', '$longitude')";
	$result2 = mysql_query($queryinsert,$conn) or die("Failed to Get Database!");
	
	$querydelete = "DELETE FROM user_input_atm WHERE id_atm='$idatm'";
	$result3 = mysql_query($querydelete,$conn) or die("Failed to Get Database!");
	if($result2){
		echo '<script language="javascript">';
		echo 'alert("ATM data has been confirmed")';
		echo '</script>';
		?>
		<meta http-equiv="refresh" content="0; url=user_input_atm.php">
		<?php	
	}
}
?>
