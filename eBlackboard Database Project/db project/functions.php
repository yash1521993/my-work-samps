<?php
	
	function CheckLogin($sql,$adminname,$page)
	   {
	include("connection.php");
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);

	//if(!mysqli_query($con, $sql))
			//{
			//	$str = 0;
	//	header("location: admin.php?error_login=".$str);
			//}
			//else
	if($count == 1)
			{
			  session_start();
				  $_SESSION['userID'] = $adminname;
				  header("location:".$page);
			}
	else
	{
	$str = 0;
	header("location: admin.php?error_login=".$str);
	}
	   }

	function getNRows($sql, $page)
      {
            $result = selectQuery($sql, $page);
            $rowcount = mysqli_num_rows($result);
            return($rowcount);
      }

      function closeSession($con)
      {
            mysqli_close($con);
      }

	function insertUpdateDelete($sql, $page)
	{
         include "connection.php";
      	# $sql="INSERT INTO users(email_id,pwd) values('".$email_id."','".$password."')";
      	if(!mysqli_query($con, $sql))
      	{
            $str=0;
			if($page != "") {
                     header("location: ".$page."?error=".$str);
                  }
      	}
      	else
      	{
             $str=1;
             if($page != "") {
			   header("location: ".$page."?success=".$str);
                  }
      	}
	}

	function selectQuery($sql, $page)
	{
            include "connection.php";
		# $sql="SELECT * FROM users where email_id='".$email_id."'";
		$result = mysqli_query($con, $sql);
            if(!$result) {
                  die("Could not get the data: ");
            }
            return($result);
	}
      function uploadFile($file, $page)
      {
            $name = $file['name'];
            $path = "../uploads/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
                  return($path);
            } else {
                  header("Location:".$page."?usuccess=0");
            }
      }
 	
?>