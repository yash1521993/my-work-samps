<html>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "blackboard");  
 $output = '';  
 $sql = "SELECT * FROM parent WHERE studentid LIKE '%".$_POST["search"]."%'";  
 $result = mysqli_query($connect, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
      $output .= '<h4 align="center">Search Result</h4>';  
      $output .= '<div class="table-responsive">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>Student Id</th>  
                                    <th>Parent Id</th>  
                                    <th>Phone</th>  
                                    <th>Email</th> 
									<th>Delete</th> 
									<th>Update</th>
                               </tr>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["studentid"].'</td>  
                     <td>'.$row["parentid"].'</td>  
                     <td>'.$row["phone"].'</td>  
                     <td>'.$row["mailid"].'</td>  
					 <td> <a href = deleteparent.php?id='.$row['studentid'].'>Delete</a> </td>
					 <td> <a href = updateparent.php?id='.$row['studentid'].'>Update</a> </td>
					 	
									
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