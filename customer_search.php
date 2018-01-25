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
		<link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
		<script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script>
			$(function() {
			$( "#sdt" ).datepicker();
			});
			$(function() {
			$( "#edt" ).datepicker();
			});
		</script>
	</head>
	<body>
		<?php 
			include'header.php';
			include'customer_menu.php';
		?>
		<div class="login" style="height:400px; width:300px; margin-top:8%; margin-right:40%">
		    <p class="loginTitle" font-weight='bold'>Program Searching</p>
			<form class="loginInput" action='customer_coupon.php' method='post'>
				<br><input class="inputBox" type="text" id="sdt" name="sdt" placeholder="Start Date" style="width:60%" required><br>
				<br><input class="inputBox" type="text" id="edt" name="edt" placeholder="End Date" style="width:60%" required><br>
				<br><input class="inputBox" type="text" name="city" placeholder="City" style="width:30%" required><br>
				<div class="button"><input class="buttonFrame" type="submit" value="Search" name="searchBtn"></div>
			</form>
		</div>
		<div class="recommend"><form action="customer_recommend.php"><input class="oButton" type="submit" value=">>See what other people like" name="recBtn"></form></div>
		<?php include'footer.php'?>
	</body>
</html>
