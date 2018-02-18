<!DOCTYPE HTML>

<html>
	<head>
		<title>Admin Homepage</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
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
										<a href="Studentadmin.php">Student DB</a>
										<a href="Teacheradmin.php">Teacher DB</a>
										<a href="Parentadmin.php">Parent DB</a>
										<a href="Adminlogout.php">Log-Off</a>
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
								<?php
										include "functions.php";

										session_start();

										$adminname = $_SESSION['userid'];
										if(!isset($_SESSION['userid']))
										{
										  header("location:admin.php"); 
										}
										$con = connectDDB();
										$query="select * from admin where adminname ='$adminname'";
										$result=mysqli_query($con,$query);
										while($row = mysqli_fetch_array($result))
										{
											$adminname = $row['adminname'];
										 }
										 ?>
										<h3> Welcome <?php echo $adminname; ?> </h3>
									
										<form method="post" enctype="multipart/form-data">
												<table border="1">
												<tr>
													<td>Student Id</td>
													<td><input type="text" name="studentid" placeholder="S****" required/></td>
												</tr>
												<tr>
													<Td>Student Name</td>
													<td><input type="text" name="sname" required/></td>
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