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
			<div class="login" id="login" style="margin-top:10% ;margin-right:35%; border:0; background:0">
				<p class="loginTitle" font-weight='bold'>Update Personal Information</p>
				<?php 
					include'dbConnection.php';
					$c_id=$_SESSION['c_id'];
					$sql1="SELECT * FROM customers WHERE userId='$c_id'";
					$result1=mysql_query($sql1) or die(mysql_error());
					$rws1=  mysql_fetch_array($result1);
					$unm=$rws1[1];
					$fnm=$rws1[3];
					$uni=$rws1[4];
					$mj=$rws1[5];
					$age=$rws1[6];
					$contact=$rws1[7];
					echo "<form class='loginInput' action='' method='post'>";
					echo "<br>Username: <input class='inputBox' type='text' name='unm' value='$unm' style='width:150px' required><br>";
					echo "<br>Full name:<input class='inputBox' type='text' name='fnm' value='$fnm' style='width:150px' required><br>";
					echo "<br>University: <input class='inputBox' type='text' name='uni' value='$uni' style='width:150px' required><br>";
					echo "<br>Major:
						<select name='mj'>
							<option value='Art'>Art</option>
							<option value='Busniess'>Business</option>
							<option value='Engineering'>Engineering</option>
							<option value='Science'>Science</option>
						</select><br>";
					echo "<br>Age: <input class='inputBox' type='text' name='age' value='$age' style='width:80px' required><br>";
					echo "<br>Contact: <input class='inputBox' type='text' name='contact' value='$contact' style='width:180px' required><br>";
					echo "<div class='button'><input class='buttonFrame' type='submit' value='Update' name='subBtn'></div>";
					echo "</form>";
				?>
			</div>
		<?php include'footer.php'?>
	</body>
</html>

<?php
	if(isset($_REQUEST['subBtn'])){
		include 'dbConnection.php';
		$new_unm=$_REQUEST['unm'];
		$new_fnm=$_REQUEST['fnm'];
		$new_uni=$_REQUEST['uni'];
		$new_mj=$_REQUEST['mj'];
		$new_age=$_REQUEST['age'];
		$new_contact=$_REQUEST['contact'];
		$c_id=$_SESSION['c_id'];
		$sql1="SELECT * FROM customers WHERE userId='$c_id'";
		$result1=mysql_query($sql1) or die(mysql_error());
		$rws1=  mysql_fetch_array($result1);
		$sql="UPDATE customers SET username='$new_unm', fullName='$new_fnm', university='$new_uni', major='$new_mj', age='$new_age', contact='$new_contact'  WHERE userId='$c_id'";
		mysql_query($sql) or die(mysql_error());
		header('location:customer_accountHome.php');
}
?>
