<?php
require "../config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=http://gopals.netau.net/admin/index.php'>";
}else{
	$idatm = $_GET['id'];
	$query = "DELETE FROM atm WHERE id_atm='$idatm'";
	$result = mysql_query($query,$conn) or die("Failed to Get Database!");
	if($result){
		echo '<script language="javascript">';
		echo 'alert("ATM Data Deleted Successfully")';
		echo '</script>';
		?>
		<meta http-equiv="refresh" content="0; url=atm_data.php">
		<?php	
	}
}
?>

