<?php 
	session_start();
		
	if(!isset($_SESSION['customer_login'])) 
		header('location:index.php');   
?>


<?php
	$c_id=$_SESSION['c_id'];
	include 'dbConnection.php';
	$sql="SELECT * FROM customers WHERE userId='$c_id'";
	$result=  mysql_query($sql) or die(mysql_error());
	$rws=  mysql_fetch_array($result);
	
	
	$customer_name= $rws[1];
	$customer_id= $rws[0];
	$customer_password= $rws[2];
	
	$_SESSION['c_name']=$customer_name;
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
		<div class="c_display" style="height:350px">
			<div class="c_title" style="margin-top:50px">Your Coupon Code is:
			<p>
			<?php
				$id=$_SESSION['c_id'];
				include 'dbConnection.php';
				$sql="SELECT userId from customers WHERE userId=$id";
				$result=mysql_query($sql) or die(mysql_error());
				$salt2='htrip0';
				$cp_id=crypt($id,$salt2);
				echo $cp_id;
			?></p></div>
			<p>Notice: One coupon code can only be used by any other user except yourself, and only be used once. The amount of discount is 20%. You can send this coupon code to your friends.</p>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
