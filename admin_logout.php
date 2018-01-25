<?php 
	session_start();

	include 'dbConnection.php';

	$date=date('Y-m-d h:i:s');
	$id=$_SESSION['admin_id'];
	$sql="UPDATE admin SET lastlogin='$date' WHERE adminID='$id'";
	mysql_query($sql) or die(mysql_error());

	session_destroy();
	header('location:index.php');
?>