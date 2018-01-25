<?php
	$serverName="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbname="ticket_db";
	mysql_connect($serverName,$dbusername,$dbpassword) or die("Could not connect the database");
	mysql_select_db($dbname) or die(mysql_error());
?>