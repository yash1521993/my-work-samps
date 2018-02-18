<?php
	$studentid = $_POST['studentid'];
	$parentid = $_POST['parentid'];
	$phone = $_POST['phone'];
	$mailid = $_POST['mailid'];	
	$password = $_POST['password'];
	$accounttype="parent";

	$sql1 = "INSERT into parent(studentid, parentid,mailid,password,phone) values('$studentid', '$parentid','$mailid','$password',$phone )";
	$sql2 = "INSERT into users(userid, password,accounttype) values('$parentid', '$password','$accounttype')";

	include "functions.php";
	insertUpdateDelete($sql1, $page = "parentadmin.php");
	//insertUpdateDelete($sql2, $page = "afterlogin.php");
?>