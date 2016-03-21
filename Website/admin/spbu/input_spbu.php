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
						<h2>Input Gas Station Form</h2></br>
						<form role="form" action="" method="post">
							<div class="form-group">
								<label>Gas Station Name:</label>
								<input type="text" class="form-control form-effect" id="spbu_name" name="spbu_name" placeholder="Gas Station Name">
							</div>
							<div class="form-group">
								<label>Company:</label>
								<select class="form-control" id="company" name="company" onchange="document.getElementById('selected_company').value=this.options[this.selectedIndex].value">
									 <option value=''>Select Company</option>
									 <option value='Pertamina'>Pertamina</option>
									 <option value='Shell'>Shell</option>
								</select>
							</div>
							<input type="hidden" name="selected_company" id="selected_company" value="" />
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
							<button type="submit" class="btn btn-default btn-sub">Submit</button>
						</form>
						<?php
						if (isset($_POST['spbu_name']) && isset($_POST['company']) && isset($_POST['address']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
							$spbu_name = mysql_real_escape_string(stripslashes(trim($_POST['spbu_name'])));
							$company = mysql_real_escape_string(stripslashes(trim($_POST['company'])));
							$address = mysql_real_escape_string(stripslashes(trim($_POST['address'])));
							$latitude = mysql_real_escape_string(stripslashes(trim($_POST['latitude'])));
							$longitude = mysql_real_escape_string(stripslashes(trim($_POST['longitude'])));
							if( !empty($spbu_name) && !empty($company) && !empty($address) && !empty($latitude) && !empty($longitude) ){
								$query = "INSERT INTO spbu (spbu_name, company, spbu_address, latitude, longitude) VALUES ('$spbu_name', '$company', '$address', '$latitude', '$longitude')";
								$result = mysql_query($query, $conn) or die("Failed to Get Database!");
								if($result){
									echo '<script language="javascript">';
									echo 'alert("Gas Station Data Added")';
									echo '</script>';
								?> <meta http-equiv="refresh" content="0; url=http://localhost/gopals/admin/spbu/spbu_data.php">
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