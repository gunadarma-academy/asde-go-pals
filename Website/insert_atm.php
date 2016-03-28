<?php
require ("config.php");

if (!empty($_POST['atm_name']) && !empty($_POST['bank_name']) && !empty($_POST['atm_address']) && !empty($_POST['latitude']) && !empty($_POST['longitude'])) {
	$atm_name = $_POST['atm_name'];
	$bank_name = $_POST['bank_name'];
	$address = $_POST['atm_address'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	$query = "INSERT INTO user_input_atm (atm_name, bank_name, atm_address, latitude, longitude) VALUES ('$atm_name', '$bank_name', '$address', '$latitude', '$longitude')";
	$result = mysql_query($query, $conn) or die(mysql_error());
	$count = mysql_affected_rows();
	if($count!=0){
		$response["success"] = 1;
		$response["message"] = "ATM data sent to server, the data will be confirmed by Administrator before its can be shown in maps";
		echo json_encode($response);
	} else {
		$response["success"] = 0;
		$response["message"] = "Insert Failed";
		echo json_encode($response);
	}
}
?>