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
			<div class="c_title">FRIENDLY REMINDER</div>
			<br><p>If you want to use a coupon, please input the COUPON CODE you get from your friends:</p>
				<?php
				if(isset($_REQUEST['searchBtn'])){
					$startdate=$_REQUEST['sdt'];
					$enddate= $_REQUEST['edt'];
					$city=$_REQUEST['city'];
					include 'dbConnection.php';
					echo "<form action='customer_searchResult.php' method='post'><input type='text' id='coupon' name='coupon' style='height:5%'>";
					echo "<input type='hidden' id='sdt' name='sdt' value=".$startdate.">";
					echo "<input type='hidden' id='edt' name='edt' value=".$enddate.">";
					echo "<input type='hidden' id='city' name='city' value=".$city.">";
					echo "<input type='submit' value='Submit' name='cpBtn' class='oButton'><br>";
					echo "<input type='submit' value='No, thanks' name='thxBtn' class='oButton'>";
					echo "</form>";
				}
				?>
		</div>
		<?php include'footer.php'?>
	</body>
</html>