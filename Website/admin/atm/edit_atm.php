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
						<h2>ATM Form - Edit</h2>
						<?php
						if(isset($_GET['id'])) {
							$idatm = $_GET['id'];
							$getatm = "SELECT * FROM atm WHERE id_atm='$idatm'";
							$query = mysql_query($getatm, $conn) or die(mysql_error());
							$atm = mysql_fetch_assoc($query);
							$selected_bank = $atm['bank_name'];
						?>
						<form role="form" action="edit_atm.php" method="post">
							<input type="hidden" name="id_atm" value="<?php echo $idatm; ?>"/>
							<div class="form-group">
								<label>ATM Name:</label>
								<input type="text" class="form-control form-effect" id="atm_name" name="atm_name" value="<?php echo $atm['atm_name'];?>">
							</div>
							<div class="form-group">
								<label>Bank Name:</label>
								<select class="form-control" id="bank_name" name="bank_name" onchange="document.getElementById('selected_bank').value=this.options[this.selectedIndex].value">
									 <option value='Bank BCA'>Bank BCA</option>
									 <option value='Bank Mandiri'>Bank Mandiri</option>
									 <option value='Bank BNI'>Bank BNI</option>
								</select>
							</div>
							<input type="hidden" name="selected_bank" id="selected_bank" value="<?php echo $selected_bank?>">
							<div class="form-group">    
								<label>Address:</label>
								<input type="text" class="form-control form-effect" id="address" name="address" value="<?php echo $atm['atm_address'];?>">
							</div>
							<div class="form-group">    
								<label>Latitude:</label>
								<input type="text" class="form-control form-effect" id="latitude" name="latitude" value="<?php echo $atm['latitude'];?>">
							</div>
							<div class="form-group">    
								<label>Longitude:</label>
								<input type="text" class="form-control form-effect" id="longitude" name="longitude" value="<?php echo $atm['longitude'];?>">
							</div>
							<div id="map-canvas" class="col-md-12" style="height:400px; margin-bottom:20px;"></div> 
							<button type="submit" class="btn btn-default btn-sub">Submit</button>
						</form>
						<?php
						} else if (isset($_POST['atm_name']) && isset($_POST['bank_name']) && isset($_POST['address']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
							$id_atm = mysql_real_escape_string(stripslashes(trim($_POST['id_atm'])));
							$atm_name = mysql_real_escape_string(stripslashes(trim($_POST['atm_name'])));
							$bank_name = mysql_real_escape_string(stripslashes(trim($_POST['bank_name'])));
							$address = mysql_real_escape_string(stripslashes(trim($_POST['address'])));
							$latitude = mysql_real_escape_string(stripslashes(trim($_POST['latitude'])));
							$longitude = mysql_real_escape_string(stripslashes(trim($_POST['longitude'])));
							
							if( !empty($atm_name) && !empty($bank_name) && !empty($address) && !empty($latitude) && !empty($longitude) ){
								$query = "UPDATE atm SET atm_name='$atm_name', bank_name='$bank_name', atm_address='$address', latitude='$latitude', longitude='$longitude' WHERE id_atm='$id_atm'";
								$result = mysql_query($query,$conn) or die("Failed to Get Database!");
								if($result){
									echo '<script language="javascript">';
									echo 'alert("ATM Data Edited Successfully")';
									echo '</script>';
									?>
									<meta http-equiv="refresh" content="0; url=atm_data.php">
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
		   $("#bank_name option:contains(" + '<?php echo $selected_bank?>' + ")").attr('selected', 'selected');
	  });
	</script>
	
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgcWWEI6GTejGA-75klSEo_H7uEkrIWus&callback=initMap">
    </script>
	
	<script type="text/javascript">var latloc = "<?= $atm['latitude']; ?>";</script>
	<script type="text/javascript">var lngloc = "<?= $atm['longitude']; ?>";</script>
	<script src="../js/map.edit.form.js"></script>
	
</body>

</html>
<?php
}
?>