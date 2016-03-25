<?php
require ("config.php");

if (!empty($_POST['vehicle_type']) && !empty($_POST['brand'])) {
	$vehicle_type = $_POST['vehicle_type'];
	$brand = $_POST['brand'];
    $query = "SELECT * FROM bengkel WHERE vehicle_type='$vehicle_type' AND brand='$brand'";
	$get_bengkel = mysql_query($query, $conn) or die(mysql_error());
	$bengkel = mysql_fetch_assoc($get_bengkel);
	$count = mysql_affected_rows();
	if($count!=0){
		$response["success"] = 1;
		$response["message"] = "Repair Shop Available!";
		$response["bengkel"] = array();
		do {
			array_push($response["bengkel"], $bengkel);
		} while ($bengkel = mysql_fetch_assoc($get_bengkel));
		echo json_encode($response);
	} else {
		$response["success"] = 0;
		$response["message"] = "No Result!";
		echo json_encode($response);
	}
} else {
?>
        <h1>Get Repair Shop</h1>
        <form action="get_bengkel.php" method="post">
            Vehicle Type:</br>
			<select class="form-control" id="vehicle_type" name="vehicle_type" onchange="document.getElementById('selected_type').value=this.options[this.selectedIndex].value">
				<option value=''>Select Vehicle Type</option>
				<option value='Car'>Car</option>
				<option value='Motorcycle'>Motorcycle</option>
			</select></br></br>
			<input type="hidden" name="selected_type" id="selected_type" value="" />
			Brand:</br>
            <input type="text" name="brand" placeholder="Brand" />
            </br></br>
            <input type="submit" value="Submit" />
        </form>
    <?php
}
?>