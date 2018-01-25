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
			<?php
				if(isset($_REQUEST['orderBtn'])){
					$_SESSION['f_pid']=$_REQUEST['pid'];
				    echo "<p style='font-size:18px'>Your order has been recorded. Do you want to register a flight together?</p>";
				    echo "<form action='customer_flight.php'><input type='hidden' name='pid' value=".$_REQUEST['pid']."><input class='oButton' type='submit' value='Yes' name='yesBtn'><input class='oButton' type='submit' value='No' name='noBtn'></form>";
				}
			?>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
