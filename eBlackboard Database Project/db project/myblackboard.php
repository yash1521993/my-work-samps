<!DOCTYPE HTML>
<?php
	# # start session
	session_start();
	if(isset($_SESSION['userID'])) {
		header("location:student/home.php");
	}
?>
<html>
	<head>
		<title>eBlackboard -My</title>
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
											<h2>Login to My eBlackboard</h2>
											<h3>All in one/Single sign-in digital platform for teacher, student and parent</h3>
										</header>
									<div class="module form-module">
											<div class="form">
											<center>
									<form method = "post" name = "login" id = "login" action="loginmyblackboard.php">
									<table>
										<tr>
											<td align="left">UserName</td>
											<td><input type = "text" name = "userid" id = "userid"/></td>
										</tr>
										<tr>
											<td align="left">Password</td>
											<td><input type = "password" name = "password" id = "password"/></td>
										</tr>
										<tr>
											<td align="left">Account Type</td>
												<td>
												<select name="accounttype">
													<option value="teacher">Teacher</option>
													<option value="student">Student</option>
													<option value="parent">Parent</option>
												</select>
												</td>
										</tr>
										<tr>
												<td><input type = "submit" value = "Login"/></td>
												<td><input type="reset" value="Reset"/></td>
										</tr>
										</table>
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
											Student, Teacher and Parent---> Everyone can sign in through this portal and access customised data for each user group.
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