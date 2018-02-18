<?php
	$teacherid = $_POST['teacherid'];
	$teachername = $_POST['teachername'];
	$dateofbirth = $_POST['dateofbirth'];
	$sex = $_POST['sex'];
	$bloodgroup = $_POST['bloodgroup'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];	
	$password = $_POST['password'];
	$address = $_POST['address'];
	$accounttype="teacher";
	
	$sql1 = "INSERT into teacher(teacherid, teachername, dateofbirth, sex,bloodgroup,address,phone,email,password) values('$teacherid', '$teachername', '$dateofbirth', '$sex','$bloodgroup','$address',$phone,'$email','$password')";
	$sql2 = "INSERT into users(userid, password,accounttype) values('$teacherid', '$password','$accounttype')";

	include "functions.php";
	insertUpdateDelete($sql1, $page = "");
	insertUpdateDelete($sql2, $page = "teacheradmin.php");
?>