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
		<div class="c_display">
			<div class="c_title">SEARCH RESULTS</div>
			<div class="c_table" style="margin-top:30px">				
				<table border=1 style="width:100%">
					<tr><th>Program Number</th>       
					<th>Program Name</th>
					<th>Organization</th>
					<th>City</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Description</th>
					<th>Cost</th>
					<th></th></tr>
				<?php
				if(isset($_REQUEST['searchBtn'])){
					$startdate=$_REQUEST['sdt'];
					$enddate= $_REQUEST['edt'];
					$city=$_REQUEST['city'];
					include 'dbConnection.php';
					$sql="SELECT * FROM program WHERE city='$city' AND DATE_FORMAT(startDate,'%m/%d/%Y')>='$startdate' AND DATE_FORMAT(endDate,'%m/%d/%Y')<='$enddate'";
					$result=mysql_query($sql) or die(mysql_error());
					while($rws=  mysql_fetch_array($result)){
					
						echo "<tr>";
						echo "<td>".$rws[0]."</td>";
						echo "<td>".$rws[1]."</td>";
						echo "<td>".$rws[2]."</td>";
						echo "<td>".$rws[3]."</td>";
						echo "<td>".$rws[4]."</td>";
						echo "<td>".$rws[5]."</td>";
						echo "<td style='font-size:12px'>".$rws[6]."</td>";
						echo "<td>".$rws[7]."</td>";
						echo "<td>"."<form action='customer_confirmFlight.php' method='post'><input type='hidden' name='pid' value=".$rws[0]."><input class='oButton' type='submit' value='Order' name='orderBtn'></form></td>";	   
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
