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
						<h1>List of User Input:</h1></br></br>
                        <a href="user_input_atm/user_input_atm.php"><h3>User Input ATM </h3></a></br>
						<a href="user_input_spbu/user_input_spbu.php"><h3>User Input Gas Station </h3></a></br>
						<a href="user_input_bengkel/user_input_bengkel.php"><h3>User Input Repair Shop </h3></a>
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