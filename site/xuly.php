<?php
	$username=$_GET['Username'];
	$ltk=$_GET['Ltk'];
	session_start();
	$_SESSION['Username'] = $username;
	$_SESSION['Ltk'] = $ltk;
	if($ltk=='sinhvien') header("Location: student_trangchu.php?");
	if($ltk=='quanly') header("Location: quanly.php?");
	if($ltk=='admin') header("Location: admin.php?");
	?>