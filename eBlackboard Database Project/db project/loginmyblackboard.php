<?php
	$userid = $_POST['userid'];
	$password = $_POST['password'];
	$accounttype=$_POST['accounttype']; 
	$page = $accounttype."/home.php";
	
	# # Check login
	$password = stripslashes($password);
	# $password = mysqli_real_escape_string($password);

	$sql="SELECT * FROM users where userid='$userid' and password='$password'";
	include "functions1.php";
	CheckLogin($sql, $userid, $page);
?>