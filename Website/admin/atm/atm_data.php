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
							<h2>ATM Data</h2>
						</div>
						<div class="col-md-3 col-sm-4" style="padding-bottom:30px;">
							</br>
							<a href="input_atm.php" class="btn btn-default" style="float: right;">Input ATM Data</a>
							</br>
						</div>
                        <table id="atm_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ATM Name</th>
									<th>Bank</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<th>ATM Name</th>
									<th>Bank</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</tfoot>
						 
							<tbody>
							<?php 
								$getatm = "SELECT * FROM atm";
								$query = mysql_query($getatm, $conn) or die (mysql_error());
								$count=mysql_num_rows($query);
								$atm = mysql_fetch_assoc($query);
								do {
							?>
								<tr>
									<td align="left" valign="top"><?php echo $atm['atm_name'];?></td>
									<td align="center" valign="top"><?php echo $atm['bank_name'];?></td>
									<td align="left" valign="top"><?php echo $atm['atm_address'];?></td>
									<td align="center" valign="top">
										<?php
										if($count!=0){ ?>
											<a href="edit_atm.php?id=<?php echo $atm['id_atm']; ?>">
												<img src="../img/edit.png" style="height: 24px; width: 24px;"></img>
											</a>
										<?php }?>
									</td>
									<td align="center" valign="top">
										<?php
										if($count!=0){ ?>
											<a href="delete_atm.php?id=<?php echo $atm['id_atm']; ?>" onclick="return confirm('Are you sure want to delete this data?');">
												<img src="../img/delete.png" style="height: 24px; width: 24px;"></img>
											</a>
										<?php }?>
									</td>
								</tr>
							<?php
								} while($atm = mysql_fetch_assoc($query));
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
		$('#atm_data').DataTable();
	} );
	</script>
	
</body>

</html>
<?php
}
?>