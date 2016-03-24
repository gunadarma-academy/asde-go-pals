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
						<h2>Gas Stations Form - Edit</h2>
						<?php
						if(isset($_GET['id'])) {
							$idspbu = $_GET['id'];
							$getspbu = "SELECT * FROM user_input_spbu WHERE id_spbu='$idspbu'";
							$query = mysql_query($getspbu, $conn) or die(mysql_error());
							$spbu = mysql_fetch_assoc($query);
							$selected_company = $spbu['company'];
						?>
						<form role="form" action="edit_spbu.php" method="post">
							<input type="hidden" name="id_spbu" value="<?php echo $idspbu; ?>"/>
							<div class="form-group">
								<label>Gas Station Name:</label>
								<input type="text" class="form-control form-effect" id="spbu_name" name="spbu_name" value="<?php echo $spbu['spbu_name'];?>">
							</div>
							<div class="form-group">
								<label>Company:</label>
								<select class="form-control" id="company" name="company" onchange="document.getElementById('selected_company').value=this.options[this.selectedIndex].value">
									 <option value='Pertamina'>Pertamina</option>
									 <option value='Shell'>Shell</option>
								</select>
							</div>
							<input type="hidden" name="selected_company" id="selected_company" value="<?php echo $selected_company?>">
							<div class="form-group">    
								<label>Address:</label>
								<input type="text" class="form-control form-effect" id="address" name="address" value="<?php echo $spbu['spbu_address'];?>">
							</div>
							<div class="form-group">    
								<label>Latitude:</label>
								<input type="text" class="form-control form-effect" id="latitude" name="latitude" value="<?php echo $spbu['latitude'];?>">
							</div>
							<div class="form-group">    
								<label>Longitude:</label>
								<input type="text" class="form-control form-effect" id="longitude" name="longitude" value="<?php echo $spbu['longitude'];?>">
							</div>
							<div id="map-canvas" class="col-md-12" style="height:400px; margin-bottom:20px;"></div> 
							<button type="submit" class="btn btn-default btn-sub">Submit</button>
						</form>
						<?php
						} else if (isset($_POST['spbu_name']) && isset($_POST['company']) && isset($_POST['address']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
							$id_spbu = mysql_real_escape_string(stripslashes(trim($_POST['id_spbu'])));
							$spbu_name = mysql_real_escape_string(stripslashes(trim($_POST['spbu_name'])));
							$company = mysql_real_escape_string(stripslashes(trim($_POST['company'])));
							$address = mysql_real_escape_string(stripslashes(trim($_POST['address'])));
							$latitude = mysql_real_escape_string(stripslashes(trim($_POST['latitude'])));
							$longitude = mysql_real_escape_string(stripslashes(trim($_POST['longitude'])));
							
							if( !empty($spbu_name) && !empty($company) && !empty($address) && !empty($latitude) && !empty($longitude) ){
								$query = "UPDATE user_input_spbu SET spbu_name='$spbu_name', company='$company', spbu_address='$address', latitude='$latitude', longitude='$longitude' WHERE id_spbu='$id_spbu'";
								$result = mysql_query($query,$conn) or die("Failed to Get Database!");
								if($result){
									echo '<script language="javascript">';
									echo 'alert("Gas Station Data Edited Successfully")';
									echo '</script>';
									?>
									<meta http-equiv="refresh" content="0; url=user_input_spbu.php">
								<?php	
								}
							}
						} else { ?><meta http-equiv="refresh" content="0; url=http://gopals.netau.net/admin/index.php">
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
		   $("#company option:contains(" + '<?php echo $selected_company?>' + ")").attr('selected', 'selected');
	  });
	</script>
	
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgcWWEI6GTejGA-75klSEo_H7uEkrIWus&callback=initMap">
    </script>
	
	<script type="text/javascript">var latloc = "<?= $spbu['latitude']; ?>";</script>
	<script type="text/javascript">var lngloc = "<?= $spbu['longitude']; ?>";</script>
	<script src="../js/map.edit.form.js"></script>
	
</body>

</html>
<?php
}
?>