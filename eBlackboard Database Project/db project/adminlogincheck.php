<?php
$adminname=$_POST['adminname'];
$password=$_POST['password'];
$page = "afterlogin.php";
$password = stripslashes($password);
$sql="SELECT * FROM admin where adminname='$adminname' and password='$password'";
include('functions.php');
CheckLogin($sql, $adminname, $page)
?>