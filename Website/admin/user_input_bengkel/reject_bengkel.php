<?php
require "../config.php";
session_start();
if(!isset($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=http://localhost/gopals/admin/index.php'>";
}else{
	$idbengkel = $_GET['id'];
	$query = "DELETE FROM user_input_bengkel WHERE id_bengkel='$idbengkel'";
	$result = mysql_query($query,$conn) or die("Failed to Get Database!");
	if($result){
		echo '<script language="javascript">';
		echo 'alert("Repair Shop Data Rejected")';
		echo '</script>';
		?>
		<meta http-equiv="refresh" content="0; url=user_input_bengkel.php">
		<?php	
	}
}
?>

