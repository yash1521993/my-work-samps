<html>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "blackboard");  
 $output = '';  
 $sql = "SELECT * FROM teacher WHERE teachername LIKE '%".$_POST["search"]."%'";  
 $result = mysqli_query($connect, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
      $output .= '<h4 align="center">Search Result</h4>';  
      $output .= '<div class="table-responsive">  
                          <table class="table table bordered">  
                               <tr>  
                                    <th>Teacher Name</th>  
                                    <th>Address</th>  
                                    <th>Phone</th>  
                                    <th>Email</th> 
                               </tr>';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["teachername"].'</td>  
                     <td>'.$row["address"].'</td>  
                     <td>'.$row["phone"].'</td>  
                     <td>'.$row["email"].'</td>  
					 <td> <a href = deleteteacher.php?id='.$row['teacherid'].'>Delete</a> </td>
					 <td> <a href = updateteacher.php?id='.$row['teacherid'].'>Update</a> </td>
					 	
									
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