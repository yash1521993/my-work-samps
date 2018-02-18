<?php
	$class = $_POST['class'];
	$courseid = $_POST['courseid'];
	$coursename = $_POST['coursename'];
	$courseschedule = $_POST['courseschedule'];
	$teacherid = $_POST['teacherid'];
	

	$sql1 = "INSERT into classes(class,courseid,coursename,courseschedule,teacherid) values('$class','$courseid','$coursename','$courseschedule','$teacherid')";
	#$sql2 = "INSERT into users(uname, password) values('$uname', '$password')";

	include "functions.php";
	insertUpdateDelete($sql1, $page = "addcourses.php");
	#insertUpdateDelete($sql2, $page = "afterlogin.php");
?>