<?php 
	session_start();
		
	if(!isset($_SESSION['admin_login'])) 
		header('location:index.php');   
?>

<?php

if(isset($_REQUEST['deleteBtn'])){
    include 'dbConnection.php';
    
    $cid=$_REQUEST['cid'];
    $sql1="DROP TABLE profile".$cid;
    $sql2="DELETE FROM customers WHERE userId='$cid'";
    $sql3="DELETE FROM program_order WHERE customerID='$cid'";
    $result=mysql_query($sql2) or die("No program searched.");
	header('location:admin_allUser.php'); 
}?>


<html>
	<head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>    
        
        
        <meta charset="UTF-8">
		<link rel="stylesheet" href="screen.css">
	</head>
	<body>
		<?php 
			include'header.php';
			include'admin_menu.php';
		?>
		<div class="c_display" style="height:750px; margin-top:20px">
			<div class="c_title">USER LIST</div>
			<div class="c_table" style="margin-top:15px">
				<table border=1>
					<tr><th>User Number</th>       
					<th>Username</th>
					<th>Full Name</th>
					<th>University</th>
					<th>Major</th>
					<th>Age</th>
					<th>Contact</th>
					<th></th></tr>
			<?php
			    include 'dbConnection.php';
				$sql="SELECT * FROM customers";
				$result=mysql_query($sql) or die(mysql_error());
				while($rws=  mysql_fetch_array($result)){
					
					echo "<tr>";
					echo "<td>".$rws[0]."</td>";
					echo "<td>".$rws[1]."</td>";
					echo "<td>".$rws[3]."</td>";
					echo "<td>".$rws[4]."</td>";
					echo "<td>".$rws[5]."</td>";
					echo "<td>".$rws[6]."</td>";
					echo "<td>".$rws[7]."</td>";
					echo "<td>"."<form><input type='hidden' name='cid' value=".$rws[0]."><input class='oButton' type='submit' value='Delete' name='deleteBtn'></form></td>";	//todo			   
					echo "</tr>";
				}
			?>
				</table>
			</div>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
