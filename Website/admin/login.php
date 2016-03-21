<?php
require ("config.php");

session_start();
if(isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=panel.php'>";
}else{
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Go-pals Admin Login Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	
	<link href='http://fonts.googleapis.com/css?family=Poppins:400,600,700,500,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,400italic,500,500italic,300,100italic,100,300italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#43c6e9;">
	<div class="bodysize">
		<!-- Page Content -->
		<div class="container-fluid vcenter" >
			<div class="row">
				<div class="col-md-4 col-sm-3 col-xs-2"></div>
				<div class="col-md-4 col-sm-6 col-xs-8 loginform" >
					<h2 style="text-align:center;">Login Panel</h2></br></br>
					<form role="form" action="" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						</div> </br>
						<div class="col-md-12 text-center"> 
							<button type="submit" class="btn btn-primary btn-sub" style="margin-bottom:20px; width:80%;">Login</button>
						</div>
					</form>
					<?php
					if (isset($_POST['username']) && isset($_POST['password'])){
						$username = $_POST['username'];
						$password = $_POST['password'];
						$username = stripslashes($username);
						$password = stripslashes($password);
						$username = mysql_real_escape_string($username);
						$password = mysql_real_escape_string($password);
						$enkrip = "gopals";
						$password2 = md5($password.md5($enkrip));
						$query = "SELECT * FROM admin WHERE admin_username='$username' and admin_password='$password2'";
						$result = mysql_query($query,$conn) or die("Failed to Get Database!");
						$count=mysql_num_rows($result);
						if($count==1){
							$_SESSION['admin'] = $username;
							echo '<script language="javascript">';
							echo 'alert("Login Success")';
							echo '</script>';
							echo "<meta http-equiv='refresh' content='0; url=panel.php'>";
						} else{
							echo '<script language="javascript">';
							echo 'alert("Wrong Username or Password")';
							echo '</script>';
							echo "<meta http-equiv='refresh' content='0; url=login.php'>";
						}
					}
					?>
				</div> 
				<div class="col-md-4 col-sm-3 col-xs-2"></div>
			</div>
		</div>
	</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
}
?>