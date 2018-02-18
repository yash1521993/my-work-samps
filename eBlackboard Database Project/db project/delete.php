<?php
	include "functions.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM student where studentid = '$id'";
	insertUpdateDelete($sql, "Afterlogin.php");
?>