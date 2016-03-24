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
                        <div class="col-md-9 col-sm-8">
							<h2>Repair Shop Data</h2>
						</div>
						<div class="col-md-3 col-sm-4" style="padding-bottom:30px;">
							</br>
							<a href="input_bengkel.php" class="btn btn-default" style="float: right;">Input Repair Shop Data</a>
							</br>
						</div>
                        <table id="repair_shop_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Repair Shop Name</th>
									<th>Type of Vehicle</th>
									<th>Brand</th>
									<th>Address</th>
									<th>Telphone</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<th>Repair Shop Name</th>
									<th>Type of Vehicle</th>
									<th>Brand</th>
									<th>Address</th>
									<th>Telphone</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</tfoot>
						 
							<tbody>
							<?php 
								$getbengkel = "SELECT * FROM bengkel";
								$query = mysql_query($getbengkel, $conn) or die (mysql_error());
								$count=mysql_num_rows($query);
								$bengkel = mysql_fetch_assoc($query);
								do {
							?>
								<tr>
									<td align="left" valign="top"><?php echo $bengkel['bengkel_name'];?></td>
									<td align="center" valign="top"><?php echo $bengkel['vehicle_type'];?></td>
									<td align="left" valign="top"><?php echo $bengkel['brand'];?></td>
									<td align="left" valign="top"><?php echo $bengkel['bengkel_address'];?></td>
									<td align="left" valign="top"><?php echo $bengkel['telephone'];?></td>
									<td align="center" valign="top">
										<?php
										if($count!=0){ ?>
											<a href="edit_bengkel.php?id=<?php echo $bengkel['id_bengkel']; ?>">
												<img src="../img/edit.png" style="height: 24px; width: 24px;"></img>
											</a>
										<?php }?>
									</td>
									<td align="center" valign="top">
										<?php
										if($count!=0){ ?>
											<a href="delete_bengkel.php?id=<?php echo $bengkel['id_bengkel']; ?>" onclick="return confirm('Are you sure want to delete this data?');">
												<img src="../img/delete.png" style="height: 24px; width: 24px;"></img>
											</a>
										<?php }?>
									</td>
								</tr>
							<?php
								} while($bengkel = mysql_fetch_assoc($query));
							?>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	
	<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#repair_shop_data').DataTable();
	} );
	</script>
	
</body>

</html>
<?php
}
?>