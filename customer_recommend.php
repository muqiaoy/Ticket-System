<?php 
	session_start();
		
	if(!isset($_SESSION['customer_login'])) 
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
			include'customer_menu.php';
		?>
		<div class="c_display" style="height:550px; margin-top:20px">
			<div class="c_title">THE HOTTEST PROGRAM INFORMATION</div>
			<div class="c_table" style="margin-top:15px">
				<table border=1>
					<tr><th>Program Number</th>       
					<th>Program Name</th>
					<th>Organization</th>
					<th>City</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Description</th>
					<th>Cost</th></tr>
				<?php
					if(isset($_REQUEST['recBtn'])){
						include 'dbConnection.php';
						$sql="SELECT * FROM program WHERE organization= (SELECT OrgName FROM organization WHERE rate=(SELECT MAX(rate)FROM organization))";
						$result=mysql_query($sql) or die(mysql_error());
						while($rws=  mysql_fetch_array($result)){
					
							echo "<tr>";
							echo "<td>".$rws[0]."</td>";
							echo "<td>".$rws[1]."</td>";
							echo "<td>".$rws[2]."</td>";
							echo "<td>".$rws[3]."</td>";
							echo "<td>".$rws[4]."</td>";
							echo "<td>".$rws[5]."</td>";
							echo "<td>".$rws[6]."</td>";
							echo "<td>".$rws[7]."</td>";				   
							echo "</tr>";
						}
					}
				?>
				</table>
			</div>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
