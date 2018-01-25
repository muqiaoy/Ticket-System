<?php 
	session_start();
		
	if(!isset($_SESSION['admin_login'])) 
		header('location:index.php');   
?>
<?php
	$a_id=$_SESSION['a_id'];
	include 'dbConnection.php';
	$sql="SELECT * FROM admin WHERE adminID='$a_id'";
	$result=  mysql_query($sql) or die(mysql_error());
	$rws=  mysql_fetch_array($result);
	
	
	$admin_name= $rws[1];
	$admin_id= $rws[0];
	$admin_password= $rws[2];
	
	$_SESSION['a_name']=$admin_name;
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
		<div class="c_display" style="height:200px">
		<div class="c_title" style="margin-top:50px">Welcome, <?php echo" ";echo $_SESSION['a_name'];?></div>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
