<?php 
if(isset($_REQUEST['signupBtn'])){
	if($_REQUEST['pwd']!=$_REQUEST['pwd2'])
		header('location:customer_signup.php');
	else{
		include 'dbConnection.php';
		$username=mysql_real_escape_string($_REQUEST['unm']);
		$fullname=mysql_real_escape_string($_REQUEST['fnm']);
		$university=$_REQUEST['uni'];
		$major=mysql_real_escape_string($_REQUEST['mj']);
		$age=mysql_real_escape_string($_REQUEST['age']);
		$contact=mysql_real_escape_string($_REQUEST['contact']);
		$password=mysql_real_escape_string($_REQUEST['pwd']);
		$salt='$3a$';
		$password=crypt($password,$salt);

		$sql="INSERT into customers values('','$username','$password','$fullname','$university','$major','$age','$contact','')";
		mysql_query($sql) or die("Account already exists.");
	
		$sql1="SELECT MAX(userId) from customers";
		$result=mysql_query($sql1) or die(mysql_error());
		$rws= mysql_fetch_array($result);
		$id=$rws[0];
		
		$salt2='htrip0';
		$cp_id=crypt($id,$salt2);
		$sql2="INSERT into coupon values('$id','$cp_id','1')";
		mysql_query($sql2) or die(mysql_error());
	
		header('location:index.php');
	}
}
?>

<html>
	<?php include'header.php'?>
	
	<div class="signup" id="signup">
		<p class="signupTitle">Register an account for your special learning trip!</p>
		<form class="signupInput" action='' method='post'>
			<br><input class="inputBox1" type="text" name="unm" placeholder="Username" required><input class="inputBox1" type="text" name="fnm" placeholder="Fullname" required><br>
			<br><input class="inputBox1" type="text" name="uni" placeholder="University" required><br><br>
			Major:
			<select name="mj">
				<option value="Art">Art</option>
				<option value="Busniess">Business</option>
				<option value="Engineering">Engineering</option>
				<option value="Science">Science</option>
			</select><br>
			<br><input class="inputBox1" type="text" name="age" placeholder="Age" required><input class="inputBox1" type="text" name="contact" placeholder="Contact email" required><br>
			<br><input class="inputBox2" type="password" name="pwd" placeholder="Password" required><br>
			<br><input class="inputBox2" type="password" name="pwd2" placeholder="Confirm Password" required><br>
			<div class="button"><input class="buttonFrame" type="submit" value="Sign Up" name="signupBtn"></div>
		</form>
	</div>
	<div class="signupPic"><img src="img/signup.png" height="75%" width="80%"></div>
	<?php include'footer.php'?>
</html>