<?php
require ("config.php");

if (!empty($_POST['bengkel_name']) && !empty($_POST['vehicle_type']) && !empty($_POST['brand']) && !empty($_POST['bengkel_address']) && !empty($_POST['latitude']) && !empty($_POST['longitude'])) {
	$bengkel_name = $_POST['bengkel_name'];
	$vehicle = $_POST['vehicle_type'];
	$brand = $_POST['brand'];
	$address = $_POST['bengkel_address'];
	$phone = $_POST['bengkel_phone'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	$query = "INSERT INTO user_input_bengkel (bengkel_name, vehicle_type, brand, bengkel_address, telephone, latitude, longitude) VALUES ('$bengkel_name', '$vehicle', '$brand', '$address', '$phone', '$latitude', '$longitude')";
	$result = mysql_query($query, $conn) or die(mysql_error());
	$count = mysql_affected_rows();
	if($count!=0){
		$response["success"] = 1;
		$response["message"] = "Repair shop data sent to server, the data will be confirmed by Administrator before its can be shown in maps";
		echo json_encode($response);
	} else {
		$response["success"] = 0;
		$response["message"] = "Insert Failed";
		echo json_encode($response);
	}
}
?>