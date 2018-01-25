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
		<div class="c_display" style="height:500px">
			<?php
				include 'dbConnection.php';
				$p_id=$_SESSION['f_pid'];
				$c_id=$_SESSION['c_id'];
				$sql1="SELECT * FROM program WHERE ProgramID='$p_id'";
				$result=mysql_query($sql1);
				$rws=mysql_fetch_array($result);
				$p_org=$rws[2];
				$p_city=$rws[3];
				$p_sdate=$rws[4];
				$p_edate=$rws[5];
				$p_desc=$rws[6];
				$p_cost=$rws[7];
				if(isset($_REQUEST['noBtn'])){
					$sql="INSERT into program_order values('','$p_id','$c_id','','','$p_cost','0')";
					mysql_query($sql) or die("Order already exists.");
					header('location:index.php');
				}
				else if(isset($_REQUEST['yesBtn'])){
					echo"<table border=1>";
					echo"<tr><th>Flight ID</th>";     
					echo"<th>Air Company</th>";
					echo"<th>Start time</th>";
					echo"<th>Arrive time</th>";
					echo"<th>First class price</th>";
					echo"<th>Eco price</th>";
					echo"<th>Terminal</th>";
					echo"<th></th></tr>";
				    $sql1="SELECT * FROM flight WHERE ToCity='$p_city'";
					$result=mysql_query($sql1) or die(mysql_error());
					while($rws=  mysql_fetch_array($result)){					
						echo "<tr>";
						echo "<td>".$rws[0]."</td>";
						echo "<td>".$rws[1]."</td>";
						echo "<td>".$rws[2]."</td>";
						echo "<td>".$rws[3]."</td>";
						echo "<td>".$rws[4]."</td>";
						echo "<td>".$rws[5]."</td>";
						echo "<td>".$rws[7]."</td>";
						echo "<td>"."<form><input type='hidden' name='fid' value=".$rws[0]."><input class='oButton' style='margin-bottom:1px;margin-top:1px' type='submit' value='First' name='firstBtn'></form>";
						echo "<form><input type='hidden' name='fid' value=".$rws[0]."><input class='oButton' style='margin-bottom:1px;margin-top:1px' type='submit' value='Eco' name='ecoBtn'></form>";
						echo "<form><input type='hidden' name='fid' value=".$rws[0]."><input class='oButton' style='margin-bottom:1px;margin-top:1px' type='submit' value='Cancel' name='cancelBtn'></form></td>";
						echo "</tr>";
					}
				}
			?>
		</div>
	</body>
</html>
<?php
    if(isset($_REQUEST['firstBtn'])){
		$p_id=$_SESSION['f_pid'];
		$c_id=$_SESSION['c_id'];
		$sql1="SELECT * FROM program WHERE ProgramID='$p_id'";
		$result1=mysql_query($sql1);
		$rws1=mysql_fetch_array($result1);
		$p_cost=$rws1[7];
		
		$f_id=$_REQUEST['fid'];
		$sql2="SELECT * FROM flight WHERE FlightId='$f_id'";
		$result2=mysql_query($sql2);
		$rws2=mysql_fetch_array($result2);
		$f_cost=$rws2[4];
		
		$cost=$p_cost+$f_cost;
		$sql="INSERT into program_order values('','$p_id','$c_id','$f_id','first','$cost','0')";
		mysql_query($sql) or die("Order already exists.");
		header('location:customer_accountHome.php');
    }
    else if(isset($_REQUEST['ecoBtn'])){
        include 'dbConnection';
		$p_id=$_SESSION['f_pid'];
		$c_id=$_SESSION['c_id'];
		$sql1="SELECT * FROM program WHERE ProgramID='$p_id'";
		$result1=mysql_query($sql1);
		$rws1=mysql_fetch_array($result1);
		$p_cost=$rws1[7];
		
		$f_id=$_REQUEST['fid'];
		$sql2="SELECT * FROM flight WHERE FlightID='$f_id'";
		$result2=mysql_query($sql2);
		$rws2=mysql_fetch_array($result2);
		$f_cost=$rws2[5];
		
		$cost=$p_cost+$f_cost;
		$sql="INSERT into program_order values('','$p_id','$c_id','$f_id','eco','$cost','0')";
		mysql_query($sql) or die("Order already exists.");
		header('location:customer_accountHome.php');
    }
    else if(isset($_REQUEST['cancelBtn']))
        header('location:customer_accountHome.php');
?>
