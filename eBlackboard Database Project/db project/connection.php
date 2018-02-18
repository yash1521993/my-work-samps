<?php 

try
	{
	$con=mysqli_connect("localhost","root","","blackboard");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	}
	catch(exception $e)
	{
	  die("ERROR : ".$e->getMessage());
	}	
?>