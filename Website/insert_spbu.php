<?php
require ("config.php");

if (!empty($_POST['spbu_name']) && !empty($_POST['company']) && !empty($_POST['spbu_address']) && !empty($_POST['latitude']) && !empty($_POST['longitude'])) {
	$spbu_name = $_POST['spbu_name'];
	$company = $_POST['company'];
	$address = $_POST['spbu_address'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	$query = "INSERT INTO user_input_spbu (spbu_name, company, spbu_address, latitude, longitude) VALUES ('$spbu_name', '$company', '$address', '$latitude', '$longitude')";
	$result = mysql_query($query, $conn) or die(mysql_error());
	$count = mysql_affected_rows();
	if($count!=0){
		$response["success"] = 1;
		$response["message"] = "Gas stations data sent to server, the data will be confirmed by Administrator before its can be shown in maps";
		echo json_encode($response);
	} else {
		$response["success"] = 0;
		$response["message"] = "Insert Failed";
		echo json_encode($response);
	}
}
?>