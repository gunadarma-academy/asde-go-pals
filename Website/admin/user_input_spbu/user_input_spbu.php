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
							<h2>User Input Gas Statons Data</h2>
						</div>
						<table id="user_input_spbu" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Gas Station Name</th>
									<th>Company</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Confirm</th>
									<th>Reject</th>
								</tr>
							</thead>
						 
							<tfoot>
								<tr>
									<th>Gas Station Name</th>
									<th>Company</th>
									<th>Address</th>
									<th>Edit</th>
									<th>Confirm</th>
									<th>Reject</th>
								</tr>
							</tfoot>
						 
							<tbody>
							<?php 
								$getspbu = "SELECT * FROM user_input_spbu";
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
											<a href="confirm_spbu.php?id=<?php echo $spbu['id_spbu']; ?>" onclick="return confirm('Are you sure want to confirm this data?');">
												<img src="../img/confirm.png" style="height: 24px; width: 24px;"></img>
											</a>
										<?php }?>
									</td>
									<td align="center" valign="top">
										<?php
										if($count!=0){ ?>
											<a href="reject_spbu.php?id=<?php echo $spbu['id_spbu']; ?>" onclick="return confirm('Are you sure want to reject this data?');">
												<img src="../img/reject.png" style="height: 24px; width: 24px;"></img>
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
		$('#user_input_spbu').DataTable();
	} );
	</script>
	
</body>

</html>
<?php
}
?>