<?php
	include "functions.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM parent where studentid = '$id'";
	insertUpdateDelete($sql, "parentadmin.php");
?>