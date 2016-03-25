<?php
require ("config.php");

if (!empty($_POST['bank_name'])) {
	$bank_name = $_POST['bank_name'];
    $query = "SELECT * FROM atm WHERE bank_name='$bank_name'";
	$get_atm = mysql_query($query, $conn) or die(mysql_error());
	$atm = mysql_fetch_assoc($get_atm);
	$count = mysql_affected_rows();
	if($count!=0){
		$response["success"] = 1;
		$response["message"] = "ATM Available!";
		$response["atm"] = array();
		do {
			array_push($response["atm"], $atm);
		} while ($atm = mysql_fetch_assoc($get_atm));
		echo json_encode($response);
	} else {
		$response["success"] = 0;
		$response["message"] = "No Result!";
		echo json_encode($response);
	}
} else {
?>
        <h1>Get ATM</h1>
        <form action="get_atm.php" method="post">
            Bank Name:</br>
			<select class="form-control" id="bank_name" name="bank_name" onchange="document.getElementById('selected_bank').value=this.options[this.selectedIndex].value">
				<option value=''>Select Bank</option>
				<option value='Bank BCA'>Bank BCA</option>
				<option value='Bank Mandiri'>Bank Mandiri</option>
				<option value='Bank BNI'>Bank BNI</option>
			</select>
			<input type="hidden" name="selected_bank" id="selected_type" value="" />
            </br></br>
            <input type="submit" value="Submit" />
        </form>
    <?php
}
?>