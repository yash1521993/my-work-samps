<html>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "blackboard");  
 $output = '';  
 $sql = "SELECT * FROM student WHERE sname LIKE '%".$_POST["search"]."%'";  
 $result = mysqli_query($connect, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
      $output .= '<h4 align="center">Search Result</h4>';  
      $output .= '<div class="table-responsive">  
                          <table class="table table bordered">  
                               <tr> 
							   		<th>Student Id</th>  
                                    <th>Student Name</th>  
                                    <th>Address</th>  
                                    <th>Phone</th>  
                                    <th>Email</th>  
                                    <th>Class</th> 
									<th>Delete</th> 
									<th>Update</th> 
                               </tr>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["studentid"].'</td>
					 <td>'.$row["sname"].'</td>
                     <td>'.$row["address"].'</td>  
                     <td>'.$row["phone"].'</td>
                     <td>'.$row["email"].'</td>  
                     <td>'.$row["class"].'</td>
					 <td> <a href = delete.php?id='.$row['studentid'].'>Delete</a> </td>
					 <td> <a href = update.php?id='.$row['studentid'].'>Update</a> </td>
					 	
									
                </tr>  
           ';  
      }  
      echo $output;  
 }  
 else  
 {  
      echo 'No Students with given name'; 
 }  
 ?>  
 </html>