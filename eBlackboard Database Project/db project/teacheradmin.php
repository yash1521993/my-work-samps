<!DOCTYPE HTML>
<html>
	<head>
	<style>
		table{
			 
		}
		</style>
		<title>Admin Teacher tab</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body class="subpage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">
						<div class="row">
							<div class="12u">

								<!-- Logo -->
									<h1><a href="#" id="logo">eBlackboard</a></h1>

								<!-- Nav -->
									<nav id="nav">
										<a href="index.php">Homepage</a>
										<a href="afterlogin.php">Student DB</a>
										<a href="Teacheradmin.php">Teacher DB</a>
										<a href="Parentadmin.php">Parent DB</a>
										<a href="adminlogout.php">Log-Off</a>
									</nav>

							</div>
						</div>
					</header>
				</div>

			<!-- Content -->
				<div id="content-wrapper">
					<div id="content">
						<div class="container">
							<div class="row">
								<div class="12u">

									<!-- Main Content -->
								<section>
									<header>
										<h2>Admin Homepage</h2>
									</header>
									<div class="container1">  
										<h3 align="center" ><a href="addcourses.php">Click here to add COURSES and CLASSES</a></h3>
										<h3 align="center">Search Teacher Database</h3><br />  
										<div class="form-group">  
											 <div class="input-group">  
												  <span class="input-group-addon">Search</span>  
												  <input type="text" name="search_text" id="search_text" placeholder="Search by Teacher Name" class="form-control" />  
											 </div>  
										</div>  
										<br />  
										<div id="result"></div>  
								   </div> 
									
										<table cellspacing="50">
										<?php
											echo "<tr>";
												echo "<th>  |  </th>";
												echo "<th>TEACHER ID</th>";
												echo "<th>  |  </th>";
												echo "<th>TEACHER NAME</th>";
												echo "<th>  |  </th>";
												echo "<th>DATE OF BIRTH</th>";
												echo "<th>  |  </th>";
												echo "<th>SEX</th>";
												echo "<th>  |  </th>";
												echo "<th>BLOOD GROUP</th>";
												echo "<th>  |  </th>";
												echo "<th>ADDRESS</th>";
												echo "<th>  |  </th>";
												echo "<th>PHONE</th>";
												echo "<th>  |  </th>";
												echo "<th>EMAIL</th>";
												echo "<th>  |  </th>";
												echo "<th>DELETE</th>";
												echo "<th>  |  </th>";
												echo "<th>UPDATE</th>";
												echo "<th>  |  </th>";
											echo "</tr>";
											$query = "select * from teacher";
											include "functions.php";
											$result = selectQuery($sql = $query, $page = "");
											while($row = mysqli_fetch_assoc($result)) {
											echo "<tr> ";
											echo "<td>  |  </td>";
											echo "<td> ".$row['teacherid']." </td>";
											echo "<td>  |  </td>";
											echo "<td> ".$row['teachername']."</td>";
											echo "<td>  |  </td>";
											echo "<td> ".$row['dateofbirth']." </td>";
											echo "<td>  |  </td>";
											echo "<td> ".$row['sex']."</td>";
											echo "<td>  |  </td>";
											echo "<td> ".$row['bloodgroup']."</td>";
											echo "<td>  |  </td>";
											echo "<td> ".$row['address']."</td>";
											echo "<td>  |  </td>";
											echo "<td> ".$row['phone']."</td>";
											echo "<td>  |  </td>";
											echo "<td> ".$row['email']."</td>";
											echo "<td>  |  </td>";
									echo "<td> <a href = 'deleteteacher.php?id=".$row['teacherid']."'>Delete</a> </td>";
									echo "<td>  |  </td>";
									echo "<td> <a href = 'updateteacher.php?id=".$row['teacherid']."'>Update</a> </td>";
									echo "<td>  |  </td>";
												echo "</tr>";
											}
										?>
										</table><br/>
										<h3>ADD TEACHERS</h3>
										<form method="post" enctype="multipart/form-data" action = "addteacher.php">
												<table border="1">
												<tr>
													<td>Teacher Id</td>
													<td><input type="text" name="teacherid" placeholder="T****" required/></td>
												</tr>
												<tr>
													<Td>Teacher Name</td>
													<td><input type="text" name="teachername" required/></td>
												</tr>
												<tr>
													<Td>Date of Birth</td>
													<td><input type="text" name="dateofbirth" placeholder="yyyy-mm-dd" required/></td>
												</tr>
												<tr>
													<td>Sex</td>
													<td>
													Male<input type="radio" name="sex" value="M" required/>
													Female<input type="radio" name="sex" value="F" required/>
													</td>
												</tr>

												<tr>
													<td>Blood Group</td>
													<td><input type="text"  name="bloodgroup" required/></td>
												</tr>
												<tr>
													<Td>Address </td>
													<td><textarea rows="4" cols="50" name="address" required></textarea></td>
												</tr>
												<tr>
													<td>Phone</td>
													<td><input type="text" pattern="[0-9]*" maxlength="10" name="phone" required/></td>
												</tr>
												<tr>
													<td>Email</td>
													<td>
													<input type="email" name="email" required/></td>
												</tr>
												<tr>
													<Td>Password</td>
													<td><input type="password" name="password" required/></td>
												</tr>
												<td colspan="2">
													<input type="submit" name="save" value="Insert Data"/>
													</td>
												</tr>
												</table>
											</form>
										</section>

								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="8u 12u(mobile)">

								<!-- Links -->
									<section>
										<h2>Links to Important Stuff</h2>
										<div>
											<div class="row">
												<div class="3u 12u(mobile)">
													<ul class="link-list last-child">
														<li><a href="index.php">Homepage</a></li>
													<li><a href="myblackboard.php">My Blackboard</a></li>
													<li><a href="admin.php">Admin</a></li>
													<li><a href="reachus.php">Reach Us</a></li>
													</ul>
												</div>
												
											</div>
										</div>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Blurb -->
									<section>
										<h2>Project eBlackboard</h2>
										<p>
											The main aim of the project is to upgrade the offline school system into totally online internet based interactive system. This project helps students, teachers and parents make their interaction easier when digitalized. 
										</p>
									</section>

							</div>
						</div>
					</footer>
				</div>

			<!-- Copyright -->
				<div id="copyright">
					&copy;. All rights reserved.|eBlackboard
				</div>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#search_text').keyup(function(){  
           var txt = $(this).val();  
           if(txt != '')  
           {  
                $.ajax({  
                     url:"searchteacher.php",  
                     method:"post",  
                     data:{search:txt},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          $('#result').html(data);  
                     }  
                });  
           }  
           else  
           {  
                $('#result').html('');                 
           }  
      });  
 });  
 </script>  