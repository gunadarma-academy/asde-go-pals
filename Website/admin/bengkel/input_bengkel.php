<?php
require "../config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=http://localhost/gopals/admin/index.php'>";
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
						<h2>Input Repair Shop Form</h2></br>
						<form role="form" action="" method="post">
							<div class="form-group">
								<label>Repair Shop Name:</label>
								<input type="text" class="form-control form-effect" id="bengkel_name" name="bengkel_name" placeholder="Repair Shop Name">
							</div>
							<div class="form-group">
								<label>Vehicle Type:</label>
								<select class="form-control" id="vehicle_type" name="vehicle_type" onchange="document.getElementById('selected_type').value=this.options[this.selectedIndex].value">
									 <option value=''>Select Vehicle Type</option>
									 <option value='Car'>Car</option>
									 <option value='Motorcycle'>Motorcycle</option>
								</select>
							</div>
							<input type="hidden" name="selected_type" id="selected_type" value="" />
							<div class="form-group">
								<label>Brand:</label>							
								<input type="text" class="form-control form-effect" id="brand" name="brand" placeholder="Brand">
							</div>
							<div class="form-group">
								<label>Address:</label>							
								<input type="text" class="form-control form-effect" id="address" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<label>Telephone:</label>							
								<input type="number" class="form-control form-effect" id="telephone" name="telephone" onkeypress="return isNumberKey(event)" placeholder="Telephone">
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
							<button type="submit" class="btn btn-default btn-sub">Submit</button>
						</form>
						<?php
						if (isset($_POST['bengkel_name']) && isset($_POST['vehicle_type']) && isset($_POST['brand']) && isset($_POST['address']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
							$bengkel_name = mysql_real_escape_string(stripslashes(trim($_POST['bengkel_name'])));
							$vehicle_type = mysql_real_escape_string(stripslashes(trim($_POST['vehicle_type'])));
							$brand = mysql_real_escape_string(stripslashes(trim($_POST['brand'])));
							$address = mysql_real_escape_string(stripslashes(trim($_POST['address'])));
							$telephone = mysql_real_escape_string(stripslashes(trim($_POST['telephone'])));
							$latitude = mysql_real_escape_string(stripslashes(trim($_POST['latitude'])));
							$longitude = mysql_real_escape_string(stripslashes(trim($_POST['longitude'])));
							if( !empty($bengkel_name) && !empty($vehicle_type) && !empty($brand) && !empty($address) && !empty($latitude) && !empty($longitude) ){
								$query = "INSERT INTO bengkel (bengkel_name, vehicle_type, brand, bengkel_address, telephone, latitude, longitude) VALUES ('$bengkel_name', '$vehicle_type', '$brand', '$address', '$telephone', '$latitude', '$longitude')";
								$result = mysql_query($query, $conn) or die("Failed to Get Database!");
								if($result){
									echo '<script language="javascript">';
									echo 'alert("Repair Shop Data Added")';
									echo '</script>';
								?> <meta http-equiv="refresh" content="0; url=http://localhost/gopals/admin/bengkel/bengkel_data.php">
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
	<script src="../js/isNumber"></script>
	
</body>

</html>
<?php
}
?>