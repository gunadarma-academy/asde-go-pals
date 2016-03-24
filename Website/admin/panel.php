<?php
require "config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}else{
?>

<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body>
	
    <div id="wrapper">

        <?php include "menu.php"; ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Welcome to Go-Pals Admin Control Panel</h1></br>
                        <h2 style="text-align:center;">Team Members:</h1></br>
						<table class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th style="text-align:center;">Name</th>
									<th style="text-align:center;">Email</th>
									<th style="text-align:center;">Github</th>
								</tr>
							</thead>						 
							<tbody>
								<tr>
									<td align="center" valign="top">Alvin</td>
									<td align="center" valign="top">
										<a href="mailto:alvin.christian7@yahoo.com">alvin.christian7@yahoo.com</a>
									</td>
									<td align="center" valign="top">
										<a href="http://github.com/@alvinchristian7">@alvinchristian7</a>
									</td>										
								</tr>
								<tr>
									<td align="center" valign="top">Andi Darmawan</td>
									<td align="center" valign="top">
										<a href="mailto:andi.lazvegas@gmail.com">andi.lazvegas@gmail.com</a>
									</td>
									<td align="center" valign="top">
										<a href="http://github.com/andilazvegas">@andilazvegas</a>
									</td>										
								</tr>
								<tr>
									<td align="center" valign="top">Fakhria Nur Shabrina</td>
									<td align="center" valign="top">
										<a href="mailto:ifashabrina@gmail.com">ifashabrina@gmail.com</a>
									</td>
									<td align="center" valign="top">
										<a href="http://github.com/ifashabrina">@ifashabrina</a>
									</td>										
								</tr>
								<tr>
									<td align="center" valign="top">M. Farhan Mubarak</td>
									<td align="center" valign="top">
										<a href="mailto:united.barock@gmail.com">united.barock@gmail.com</a>
									</td>
									<td align="center" valign="top">
										<a href="http://github.com/fhnbarock">@fhnbarock</a>
									</td>										
								</tr>
							</tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
}
?>