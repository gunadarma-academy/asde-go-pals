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
						<h2>Repair Shop Form - Edit</h2>
						<?php
						if(isset($_GET['id'])) {
							$idbengkel = $_GET['id'];
							$getbengkel = "SELECT * FROM user_input_bengkel WHERE id_bengkel='$idbengkel'";
							$query = mysql_query($getbengkel, $conn) or die(mysql_error());
							$bengkel = mysql_fetch_assoc($query);
							$selected_type = $bengkel['vehicle_type'];
						?>
						<form role="form" action="edit_bengkel.php" method="post">
							<input type="hidden" name="id_bengkel" value="<?php echo $idbengkel; ?>"/>
							<div class="form-group">
								<label>Repair Shop Name:</label>
								<input type="text" class="form-control form-effect" id="bengkel_name" name="bengkel_name" value="<?php echo $bengkel['bengkel_name'];?>">
							</div>
							<div class="form-group">
								<label>Vehicle Type:</label>
								<select class="form-control" id="vehicle_type" name="vehicle_type" onchange="document.getElementById('selected_type').value=this.options[this.selectedIndex].value">
									 <option value='Car'>Car</option>
									 <option value='Motorcycle'>Motorcycle</option>
								</select>
							</div>
							<input type="hidden" name="selected_type" id="selected_type" value="<?php echo $selected_type?>">
							<div class="form-group">    
								<label>Brand:</label>
								<input type="text" class="form-control form-effect" id="brand" name="brand" value="<?php echo $bengkel['brand'];?>">
							</div>
							<div class="form-group">    
								<label>Address:</label>
								<input type="text" class="form-control form-effect" id="address" name="address" value="<?php echo $bengkel['bengkel_address'];?>">
							</div>
							<div class="form-group">    
								<label>Telephone:</label>
								<input type="number" class="form-control form-effect" id="telephone" name="telephone" onkeypress="return isNumberKey(event)" value="<?php echo $bengkel['telephone'];?>">
							</div>
							<div class="form-group">    
								<label>Latitude:</label>
								<input type="text" class="form-control form-effect" id="latitude" name="latitude" value="<?php echo $bengkel['latitude'];?>">
							</div>
							<div class="form-group">    
								<label>Longitude:</label>
								<input type="text" class="form-control form-effect" id="longitude" name="longitude" value="<?php echo $bengkel['longitude'];?>">
							</div>
							<div id="map-canvas" class="col-md-12" style="height:400px; margin-bottom:20px;"></div> 
							<button type="submit" class="btn btn-default btn-sub">Submit</button>
						</form>
						<?php
						} else if (isset($_POST['bengkel_name']) && isset($_POST['vehicle_type']) && isset($_POST['brand']) && isset($_POST['address']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
							$id_bengkel = mysql_real_escape_string(stripslashes(trim($_POST['id_bengkel'])));
							$bengkel_name = mysql_real_escape_string(stripslashes(trim($_POST['bengkel_name'])));
							$vehicle_type = mysql_real_escape_string(stripslashes(trim($_POST['vehicle_type'])));
							$brand = mysql_real_escape_string(stripslashes(trim($_POST['brand'])));
							$address = mysql_real_escape_string(stripslashes(trim($_POST['address'])));
							$telephone = mysql_real_escape_string(stripslashes(trim($_POST['telephone'])));
							$latitude = mysql_real_escape_string(stripslashes(trim($_POST['latitude'])));
							$longitude = mysql_real_escape_string(stripslashes(trim($_POST['longitude'])));
							
							if( !empty($bengkel_name) && !empty($vehicle_type) && !empty($brand) && !empty($address) && !empty($latitude) && !empty($longitude) ){
								$query = "UPDATE user_input_bengkel SET bengkel_name='$bengkel_name', vehicle_type='$vehicle_type', brand='$brand', bengkel_address='$address', telephone='$telephone', latitude='$latitude', longitude='$longitude' WHERE id_bengkel='$id_bengkel'";
								$result = mysql_query($query,$conn) or die("Failed to Get Database!");
								if($result){
									echo '<script language="javascript">';
									echo 'alert("Repair Shop Data Edited Successfully")';
									echo '</script>';
									?>
									<meta http-equiv="refresh" content="0; url=user_input_bengkel.php">
								<?php	
								}
							}
						} else { ?><meta http-equiv="refresh" content="0; url=http://localhost/gopals/admin/index.php">
						<?php 
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
	
	<script type='text/javascript'>
	  $(document).ready(function(){
		   $("#vehicle_type option:contains(" + '<?php echo $selected_type?>' + ")").attr('selected', 'selected');
	  });
	</script>
	
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgcWWEI6GTejGA-75klSEo_H7uEkrIWus&callback=initMap">
    </script>
	
	<script type="text/javascript">var latloc = "<?= $bengkel['latitude']; ?>";</script>
	<script type="text/javascript">var lngloc = "<?= $bengkel['longitude']; ?>";</script>
	<script src="../js/map.edit.form.js"></script>
	<script src="../js/isNumber"></script>
	
</body>

</html>
<?php
}
?>