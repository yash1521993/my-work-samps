<?php
	$studentid = $_POST['studentid'];
	$sname = $_POST['sname'];
	$dateofbirth = $_POST['dateofbirth'];
	$sex = $_POST['sex'];
	$bloodgroup = $_POST['bloodgroup'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];	
	$password = $_POST['password'];
	$fathername= $_POST['fathername'];
	$mothername = $_POST['mothername'];
	$address = $_POST['address'];
	$class = $_POST['class'];
	$accounttype="student";

	$sql1 = "INSERT into student(studentid, sname, dateofbirth, sex,bloodgroup,phone,email,password,fathername,mothername,address,class) values('$studentid', '$sname', '$dateofbirth', '$sex','$bloodgroup',$phone,'$email','$password','$fathername','$mothername','$address',$class)";
	$sql2 = "INSERT into users(userid, password,accounttype) values('$studentid', '$password','$accounttype')";

	include "functions.php";
	insertUpdateDelete($sql1, $page = "");
	insertUpdateDelete($sql2, $page = "afterlogin.php");
?>