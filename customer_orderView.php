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
		<div class="c_display" style="border:0;background:0">
			<div class="c_title" style="margin-top:-30px;">All Your Orders</div>
			<div class="c_table" style="margin-top:15px; margin-left:-95px">
				<table border=1>
					<tr><th>Order Number</th>       
					<th>Program Name</th>
					<th>Organi -zation</th>
					<th>City</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Departure Time</th>
					<th>Arrive Time</th>					
					<th>Flight Number</th>
					<th>Flight Class</th>
					<th>Description</th>
					<th>Total Cost</th>
					<th>Rating</th></tr>
					<?php
						include 'dbConnection.php';
						$c_id=$_SESSION['c_id'];
						$sql="SELECT * FROM program_order WHERE customerID='$c_id'";
						$result=mysql_query($sql) or die(mysql_error());
						while($rws=  mysql_fetch_array($result)){
					
							echo "<tr>";
							echo "<td>".$rws[0]."</td>";
							$p_id=$rws[1];
							$f_id=$rws[3];
							$sql1="SELECT * FROM program WHERE ProgramID='$p_id'";
							$result1=mysql_query($sql1) or die(mysql_error());
							$rws1=mysql_fetch_array($result1);
							$sql2="SELECT * FROM flight WHERE FlightID='$f_id'";
							$result2=mysql_query($sql2) or die(mysql_error());
							$rws2=mysql_fetch_array($result2);
							echo "<td>".$rws1[1]."</td>";
							echo "<td>".$rws1[2]."</td>";
							echo "<td>".$rws1[3]."</td>";
							echo "<td>".$rws1[4]."</td>";
							echo "<td>".$rws1[5]."</td>";
							echo "<td>".$rws2[2]."</td>";
							echo "<td>".$rws2[3]."</td>";
							echo "<td>".$f_id."</td>";
							echo "<td>".$rws[4]."</td>";
							echo "<td style='font-size:12px'>".$rws1[6]."</td>";
							echo "<td>".$rws[5]."</td>";
							
							$sql3="SELECT * FROM program_order WHERE orderID='$rws[0]'";
							$result3=mysql_query($sql3) or die(mysql_error());
							$rws3=mysql_fetch_array($result3);
							if($rws3[6]==0){
								echo "<td>"."<form method='post'><input type='hidden' name='oid' value=".$rws[0]."><input type='text' name='rate' placeholder='From 1 to 5' style='width:70px'><input class='oButton' type='submit' value='Rate' name='rateBtn'></form></td>";
							}
							else{
							    echo "<td>".$rws3[6]."</td>";
							}
							echo "</tr>";
						}
					?>
				</table>
			</div>
		</div>
		<?php include'footer.php'?>
	</body>
</html>

<?php
	include 'dbConnection.php';
	if(isset($_REQUEST['rateBtn'])){
		if($_REQUEST['rate']!=null){
			$rate=$_REQUEST['rate'];
			$od_id=$_REQUEST['oid'];
			$sql4="UPDATE program_order SET Rate=$rate WHERE orderID='$od_id'";
			mysql_query($sql4) or die(mysql_error());
			
			$sql5="SELECT programID FROM program_order WHERE orderID='$od_id'";
			$result5=mysql_query($sql5); //result5 is the program id
			$rws5=mysql_fetch_array($result5);
			$p_id=$rws5[0];
			
			$sql6="SELECT organization FROM program WHERE ProgramID='$p_id'";
			$result6=mysql_query($sql6); //result6 is the relevant organization name
			$rws6=mysql_fetch_array($result6);
			$og_name=$rws6[0];
			
			$sql7="SELECT OrgID FROM organization WHERE OrgName='$og_name'";
			$result7=mysql_query($sql7); //result7 is the org id
			$rws7=mysql_fetch_array($result7);
			$og_id=$rws7[0];
			
			$sql8="UPDATE organization SET rate= (SELECT AVG(rate) FROM (SELECT * FROM program_order WHERE rate<>0) AS T WHERE programID IN (SELECT ProgramID FROM program WHERE organization='$og_name')) WHERE OrgID='$og_id'";
			mysql_query($sql8) or die(mysql_error());
		}
	header('location:customer_orderView.php');
	}
?>