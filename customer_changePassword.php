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
				<p class="loginTitle" font-weight='bold'>Change Password</p>
				<form class="loginInput" action='' method='post'>
					<br><input class="inputBox" type="password" name="o_pwd" placeholder="Old Password" style="width:150px" required><br>
					<br><input class="inputBox" type="password" name="pwd1" placeholder="New Password" style="width:150px" required><br>
					<br><input class="inputBox" type="password" name="pwd2" placeholder="Confirm New Password" style="width:150px" required><br>
					<div class="button"><input class="buttonFrame" type="submit" value="Submit" name="subBtn"></div>
				</form>
			</div>
		<?php include'footer.php'?>
	</body>
</html>

<?php
	if(isset($_REQUEST['subBtn'])){
		include 'dbConnection.php';
		if($_REQUEST['pwd1']!=$_REQUEST['pwd2']){
			header('location:customer_changePassword.php');
		}
		else{
			$new_pwd=$_REQUEST['pwd1'];
			$salt='$3a$';
			$o_pwd=$_REQUEST['o_pwd'];
			$o_pwd=crypt($o_pwd,$salt);
			$new_pwd=crypt($new_pwd,$salt);
			$c_id=$_SESSION['c_id'];
			$sql1="SELECT * FROM customers WHERE userId='$c_id'";
			$result1=mysql_query($sql1) or die(mysql_error());
			$rws1=  mysql_fetch_array($result1);
			if($o_pwd!=$rws1[2]){}
			else{
				$sql="UPDATE customers SET password='$new_pwd' WHERE userId='$c_id'";
				mysql_query($sql) or die(mysql_error());
				header('location:customer_accountHome.php');
			}
		}
	}
?>
