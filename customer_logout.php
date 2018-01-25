<?php 
	session_start();

	include 'dbConnection.php';

	$date=date('Y-m-d h:i:s');
	$id=$_SESSION['login_id'];
	$sql="UPDATE customers SET lastlogin='$date' WHERE userId='$id'";
	mysql_query($sql) or die(mysql_error());

	session_destroy();
	header('location:index.php');
?>