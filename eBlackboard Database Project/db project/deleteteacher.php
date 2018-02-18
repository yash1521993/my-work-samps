<?php
	include "functions.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM teacher where teacherid = '$id'";
	insertUpdateDelete($sql, "teacheradmin.php");
?>