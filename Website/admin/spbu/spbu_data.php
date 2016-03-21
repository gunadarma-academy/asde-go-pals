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
                        <div class="col-md-9 col-sm-8">
							<h2>Gas Station Data</h2>
						</div>
						<div class="col-md-3 col-sm-4" style="padding-bottom:30px;">
							</br>
							<a href="input_spbu.php" class="btn btn-default" style="float: right;">Input Gas Station Data</a>
							</br>
						</div>
                        <table id="spbu_data" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Gas Station Name</th>
									<th>Company</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<th>Gas Station Name</th>
									<th>Company</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</tfoot>
						 
							<tbody>
							<?php 
								$getspbu = "SELECT * FROM spbu";
								$query = mysql_query($getspbu, $conn) or die (mysql_error());
								$count=mysql_num_rows($query);
								$spbu = mysql_fetch_assoc($query);
								do {
							?>
								<tr>
									<td align="left" valign="top"><?php echo $spbu['spbu_name'];?></td>
									<td align="center" valign="top"><?php echo $spbu['company'];?></td>
									<td align="left" valign="top"><?php echo $spbu['spbu_address'];?></td>
									<td align="center" valign="top">
										<?php
										if($count!=0){ ?>
											<a href="edit_spbu.php?id=<?php echo $spbu['id_spbu']; ?>">
												<img src="../img/edit.png" style="height: 24px; width: 24px;"></img>
											</a>
										<?php }?>
									</td>
									<td align="center" valign="top">
										<?php
										if($count!=0){ ?>
											<a href="delete_spbu.php?id=<?php echo $spbu['id_spbu']; ?>" onclick="return confirm('Are you sure want to delete this data?');">
												<img src="../img/delete.png" style="height: 24px; width: 24px;"></img>
											</a>
										<?php }?>
									</td>
								</tr>
							<?php
								} while($spbu = mysql_fetch_assoc($query));
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
		$('#spbu_data').DataTable();
	} );
	</script>

	
</body>

</html>
<?php
}
?>