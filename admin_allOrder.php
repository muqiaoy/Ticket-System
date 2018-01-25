<?php 
	session_start();
		
	if(!isset($_SESSION['admin_login'])) 
		header('location:index.php');   
?>

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
		<div class="c_display" style="border:0;background:0">
			<div class="c_title" style="margin-top:-30px;">All Orders</div>
			<div class="c_table" style="margin-top:15px; margin-left:-55px">
				<table border=1>
					<tr><th>Order Number</th>   
					<th>Customer Name</th>   
					<th>Program Name</th>
					<th>Organization</th>
					<th>City</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Departure Time</th>
					<th>Arrive Time</th>					
					<th>Flight Number</th>
					<th>Flight Class</th>
					<th>Total Cost</th></tr>
					<?php
						include 'dbConnection.php';
						$sql="SELECT * FROM program_order";
						$result=mysql_query($sql) or die(mysql_error());
						while($rws=  mysql_fetch_array($result)){
					
							echo "<tr>";
							echo "<td>".$rws[0]."</td>";
							$p_id=$rws[1];
							$c_id=$rws[2];
							$f_id=$rws[3];
							$sql1="SELECT * FROM program WHERE ProgramID='$p_id'";
							$result1=mysql_query($sql1) or die(mysql_error());
							$rws1=mysql_fetch_array($result1);
							$sql2="SELECT * FROM customers WHERE userID='$c_id'";
							$result2=mysql_query($sql2) or die(mysql_error());
							$rws2=mysql_fetch_array($result2);
							$sql3="SELECT * FROM flight WHERE FlightID='$f_id'";
							$result3=mysql_query($sql3) or die(mysql_error());
							$rws3=mysql_fetch_array($result3);
							echo "<td>".$rws2[3]."</td>";
							echo "<td>".$rws1[1]."</td>";
							echo "<td>".$rws1[2]."</td>";
							echo "<td>".$rws1[3]."</td>";
							echo "<td>".$rws1[4]."</td>";
							echo "<td>".$rws1[5]."</td>";
							echo "<td>".$rws3[2]."</td>";
							echo "<td>".$rws3[3]."</td>";
							echo "<td>".$f_id."</td>";
							echo "<td>".$rws[4]."</td>";
							echo "<td>".$rws[5]."</td>";			   
							echo "</tr>";
						}
					?>
				</table>
			</div>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
