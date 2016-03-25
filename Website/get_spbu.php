<?php
require ("config.php");

if (!empty($_POST['company'])) {
	$company = $_POST['company'];
    $query = "SELECT * FROM spbu WHERE company='$company'";
	$get_spbu = mysql_query($query, $conn) or die(mysql_error());
	$spbu = mysql_fetch_assoc($get_spbu);
	$count = mysql_affected_rows();
	if($count!=0){
		$response["success"] = 1;
		$response["message"] = "Gas Stations Available!";
		$response["spbu"] = array();
		do {
			array_push($response["spbu"], $spbu);
		} while ($spbu = mysql_fetch_assoc($get_spbu));
		echo json_encode($response);
	} else {
		$response["success"] = 0;
		$response["message"] = "No Result!";
		echo json_encode($response);
	}
} else {
?>
        <h1>Get Gas Station</h1>
        <form action="get_spbu.php" method="post">
            Gas Station Company:</br>
			<select class="form-control" id="company" name="company" onchange="document.getElementById('selected_company').value=this.options[this.selectedIndex].value">
				<option value=''>Select Company</option>
				<option value='Pertamina'>Pertamina</option>
				<option value='Shell'>Shell</option>
			</select></br></br>
			<input type="hidden" name="selected_company" id="selected_company" value="" />
            <input type="submit" value="Submit" />
        </form>
    <?php
}
?>