<!DOCTYPE HTML>
<?php
session_start();
if(isset($_SESSION['userID'])) {
	header("Location:afterlogin.php");
}
?>

<html>
	<head>
		<title>eBlackboard-admin</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />		
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
										<a href="myblackboard.php">My Blackboard</a>
										<a href="admin.php">Admin</a>
										<a href="reachus.php">Reach Us</a>
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
								<div class="9u 12u(mobile)">

									<!-- Main Content -->
										<section>
											<header>
												<h2>Admin Login to do all tech stuff</h2>
												
											</header>
											<div class="module form-module">
											<div class="form">
											<center>
											<h2>Login to your account</h2>
											
											<form  method="post" action="adminlogincheck.php">
											  <b>Admin Id</b>&nbsp;<input type="text" placeholder="Admin" name="adminname" id="adminname"/>&nbsp;&nbsp;&nbsp;
											  <b>Admin Password</b>&nbsp;<input type="password" placeholder="AdminPass" name="password" id="password"/><br/>
											  <input  type="submit" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											  <input type="reset">
											</form>
											</center>
										  </div>
											</div>
										</section>

								</div>
								<div class="3u 12u(mobile)">

									<!-- Sidebar -->
										<section>
											<header>
												<h2>What can be done?</h2>
											</header>
											Admin can create a database and add all the required tables
											say Student, Teacher and Parent. Admin can insert or update or delete records for the mentioned tables.
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