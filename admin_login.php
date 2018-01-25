<?php 
	if(isset($_REQUEST['adminBtn'])){
		include 'dbConnection.php';
		$adminName=$_REQUEST['unm'];
		$password= $_REQUEST['pwd'];
  
		$sql="SELECT adminID,adminName,password FROM admin WHERE adminName='$adminName' AND password='$password'";
		$result=mysql_query($sql) or die(mysql_error());
		$rws=mysql_fetch_array($result) or die(header('location:index.php'));
	
		$id=$rws[0];
		$unm=$rws[1];
		$pwd=$rws[2];
		if($unm==$adminName && $pwd==$password){
			session_start();
			$_SESSION['admin_login']=1;
			$_SESSION['a_id']=$id;
			header('location:admin_home.php'); 
		}
   
		else{
			header('location:index.php');  
		}
	}
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
		?>
		
		<div class="login" id="login" style="margin-top:50px">
		    <p class="loginTitle" font-weight='bold'>Administrator Login</p>
			<form class="loginInput" action='' method='post'>
				<br><input class="inputBox" type="text" name="unm" placeholder="Username" required><br>
				<br><input class="inputBox" type="password" name="pwd" placeholder="Password" required><br>
				<div class="button"><input class="buttonFrame" type="submit" value="Log in" name="adminBtn"></div>
			</form>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
