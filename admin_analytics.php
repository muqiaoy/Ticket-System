<?php
session_start();

if(!isset($_SESSION['admin_login']))
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
include'admin_menu.php';
?>
<div class="c_display" style="height:750px; margin-top:20px">
    <div class="c_title">City Analytics</div>
    <div class="chart"><img src="img/chart.jpg" height="60%" width="85%" /></div>
</div>
<?php include'footer.php'?>
</body>
</html>
