<?php
require "../config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=http://gopals.netau.net/admin/index.php'>";
}else{
?>

<!DOCTYPE html>
<html lang="en">

<?php include "../head.php"; ?>

<body>
	
    <div id="wrapper">

        <?php include "../menu.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
						<h2>Input ATM Form</h2></br>
						<form role="form" action="" method="post">
							<div class="form-group">
								<label>ATM Name:</label>
								<input type="text" class="form-control form-effect" id="atm_name" name="atm_name" placeholder="ATM Name">
							</div>
							<div class="form-group">
								<label>Bank Name:</label>
								<select class="form-control" id="bank_name" name="bank_name" onchange="document.getElementById('selected_bank').value=this.options[this.selectedIndex].value">
									 <option value=''>Select Bank</option>
									 <option value='Bank BCA'>Bank BCA</option>
									 <option value='Bank Mandiri'>Bank Mandiri</option>
									 <option value='Bank BNI'>Bank BNI</option>
									 <option value='Bank BRI'>Bank BRI</option>
									 <option value='Bank CIMB Niaga'>Bank CIMB Niaga</option>
									 <option value='Bank DKI'>Bank DKI</option>
									 <option value='Bank Bukopin'>Bank Bukopin</option>
									 <option value='Bank Danamon'>Bank Danamon</option>
									 <option value='Bank Mega'>Bank Mega</option>
									 <option value='Bank OCBC NISP'>Bank OCBC NISP</option>
									 <option value='Bank Panin'>Bank Panin</option>
									 <option value='Bank Permata'>Bank Permata</option>
								</select>
							</div>
							<input type="hidden" name="selected_bank" id="selected_bank" value="" />
							<div class="form-group">
								<label>Address:</label>							
								<input type="text" class="form-control form-effect" id="address" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<label>Latitude:</label>
								<input type="text" class="form-control form-effect" id="latitude" name="latitude" placeholder="Latitude">
							</div>
							<div class="form-group"> 
								<label>Longitude:</label>
								<input type="text" class="form-control form-effect" id="longitude" name="longitude" placeholder="Longitude">
							</div>
							<div id="map-canvas" class="col-md-12" style="height:400px; margin-bottom:20px;"></div>  
							<button type="submit" class="btn btn-primary btn-sub">Submit</button>
						</form>
						<?php
						if (isset($_POST['atm_name']) && isset($_POST['bank_name']) && isset($_POST['address']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
							$atm_name = mysql_real_escape_string(stripslashes(trim($_POST['atm_name'])));
							$bank_name = mysql_real_escape_string(stripslashes(trim($_POST['bank_name'])));
							$address = mysql_real_escape_string(stripslashes(trim($_POST['address'])));
							$latitude = mysql_real_escape_string(stripslashes(trim($_POST['latitude'])));
							$longitude = mysql_real_escape_string(stripslashes(trim($_POST['longitude'])));
							if( !empty($atm_name) && !empty($bank_name) && !empty($address) && !empty($latitude) && !empty($longitude) ){
								$query = "INSERT INTO atm (atm_name, bank_name, atm_address, latitude, longitude) VALUES ('$atm_name', '$bank_name', '$address', '$latitude', '$longitude')";
								$result = mysql_query($query, $conn) or die("Failed to Get Database!");
								if($result){
									echo '<script language="javascript">';
									echo 'alert("ATM Data Added")';
									echo '</script>';
								?> <meta http-equiv="refresh" content="0; url=http://gopals.netau.net/admin/atm/atm_data.php">
								<?php
								}
							}
						}
						?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgcWWEI6GTejGA-75klSEo_H7uEkrIWus&callback=initMap">
    </script>
	
	<script src="../js/map.input.form.js"></script>
	
</body>

</html>
<?php
}
?>