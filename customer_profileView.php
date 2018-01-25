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
			<div class="c_title">PERSONAL DETAILS</div>
			<?php
			    $c_id=$_SESSION['c_id'];
			    include 'dbConnection.php';
				$sql="SELECT * FROM customers WHERE userId=$c_id";
				$result=mysql_query($sql) or die(mysql_error());
                $rws=  mysql_fetch_array($result);
                $c_username=$rws[1];
                $c_fullname=$rws[3];
                $c_university=$rws[4];
                $c_major=$rws[5];
                $c_age=$rws[6];
                $c_contact=$rws[7];
			?>
			<div class="c_content">
			    <br><br>
			    <p><span class="c_subtitle">Name: </span><?php echo $c_username?></p>
			    <p><span class="c_subtitle">Full name: </span><?php echo $c_fullname?></p>
			    <p><span class="c_subtitle">University: </span><?php echo $c_university?></p>
			    <p><span class="c_subtitle">Major: </span><?php echo $c_major?></p>
			    <p><span class="c_subtitle">Age: </span><?php echo $c_age?></p>
			    <p><span class="c_subtitle">Contact: </span><?php echo $c_contact?></p>
			    <form action='customer_changePassword.php' method='post'><input class='oButton' type='submit' value='Change Password' name='changeBtn'></form>
			    <form action='customer_changeProfile.php' method='post'><input class='oButton' type='submit' value='Update Personal Information' name='changeBtn2'></form>
			</div>
		</div>
		<?php include'footer.php'?>
	</body>
</html>
