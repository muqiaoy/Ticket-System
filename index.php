<?php 
	if(isset($_REQUEST['submitBtn'])){
		include 'dbConnection.php';
		$username=$_REQUEST['unm'];
		$password= $_REQUEST['pwd'];
		$salt='$3a$';
		$password=crypt($password,$salt);
  
		$sql="SELECT userId,username,password FROM customers WHERE username='$username' AND password='$password'";
		$result=mysql_query($sql) or die(mysql_error());
		$rws=mysql_fetch_array($result) or die(header('location:index.php'));
	
		$id=$rws[0];
		$unm=$rws[1];
		$pwd=$rws[2];
		if($unm==$username && $pwd==$password){
			session_start();
			$_SESSION['customer_login']=1;
			$_SESSION['c_id']=$id;
			header('location:customer_accountHome.php'); 
		}
   
		else{
			header('location:index.php');  
		}
	}
?>

<?php
	if(isset($_REQUEST['signup'])){
		header('location:customer_signup.php');
	}
?>

<?php 
session_start();
if(isset($_SESSION['customer_login'])) 
    header('location:customer_accountHome.php');   
?>

<html>
    <head>
        <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>    
        
        
        <meta charset="UTF-8">
		<title>online ticket system</title>
	    <link rel="stylesheet" href="screen.css">
    </head>
	<body>
		<?php include 'header.php'?>
		
			
		<div class="homePic">
			<div class="homePic1"><img src="img/header.jpg" height="100%" width="100%" /></div>
			<div class="homePic2">Travel with FOOT and LOVE<br>By HeartTrip!</p>
				<a class="homePicBtn" href="#login">Sign In></a></div>
		</div>
		
		<div class="login" id="login">
		    <p class="loginTitle" font-weight='bold'>Users Login</p>
			<form class="loginInput" action='' method='post'>
				<br><input class="inputBox" type="text" name="unm" placeholder="Username" required><br>
				<br><input class="inputBox" type="password" name="pwd" placeholder="Password" required><br>
				<div class="button"><input class="buttonFrame" type="submit" value="Log in" name="submitBtn"><input class="buttonFrame" type="submit" value="Sign Up" name="signup"></div>
			</form>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
