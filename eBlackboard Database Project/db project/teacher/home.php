<!DOCTYPE HTML>
<?php
	session_start();
	include "../functions.php";
	if(!isset($_SESSION['userID'])) {
		header("Location:../myblackboard.php");	
	}
	$uname = $_SESSION['userID'];
	if(isset($_GET['Upload'])) {
		$file = $_FILES['file'];
		$class = $_POST['class'];
		$courseid=$_POST['courseid'];
		$path = uploadFile($file, $page = "Home.php");
		# $path = mysqli_real_escape_string($path);
		if($_GET['Upload'] == 1) {
			# Materials
			$category = "Materials";
			$sql = "INSERT into uploads(documentid,class,courseid, teacherid, category,location) values ('','$class','$courseid','$uname','$category','$path')";
			insertUpdateDelete($sql, $page = "home.php");
		} elseif($_GET['Upload'] == 2) {
			# Grades
			$category = "Grades";
			$sql = "INSERT into uploads(documentid,class,courseid, teacherid, category,location) values ('','$class','$courseid','$uname','$category','$path')";
			insertUpdateDelete($sql, $page = "home.php");
		} else {
			# Attendance
			$category = "Attendance";
			$sql = "INSERT into uploads(documentid,class,courseid, teacherid, category,location) values ('','$class','$courseid','$uname','$category','$path')";
			insertUpdateDelete($sql, $page = "home.php");
		}
	}
	$uploadSQL = "SELECT * FROM uploads where teacherid = '$uname'";
	$rowCount = getNRows($uploadSQL, "home.php");

//modify till here first

	
?>
<html>
	<head>
		<title>Student Homepage</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
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
										<a href="../index.html">Homepage</a>
										<a href="../myblackboard.php">My Blackboard</a>
										<a href="../admin.php">Admin</a>
										<a href="../reachus.php">Reach Us</a>
										<a href="teacherlogout.php">Log-Off</a>
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
												<h2>Hello, <?php echo $_SESSION['userID']; ?></h2>
												<h3>You can get information about various fields like courses, grades and attendance. Also you can upload all the above files to eBlackboard so that students and parents can view their respective files.</h3>
											</header>
											<h2>Upload files here</h2>
						<table cellpadding="10">
						<tr>
							<tr><td>Materials</td></tr>
							<form name = "materialUpload" method = "post" action = "home.php?Upload=1" enctype="multipart/form-data">
							<td>Class    <input type="text" name="class" placeholder="Enter Class Number"></td>
							<td>Course Id<input type="text" name="courseid" placeholder="Enter CourseId"></td>
							<td><input type="file" name="file"></td>
							<td><input type = "submit" value = "Upload"/></td>
							</form>
						</tr>
						<tr>
							<tr><td>Grades</td></tr>
							<form name = "gradeUpload" method = "post" action = "home.php?Upload=2" enctype="multipart/form-data">
							<td>Class    <input type="text" name="class" placeholder="Enter Class Number"></td>
							<td>Course Id<input type="text" name="courseid" placeholder="Enter CourseId"></td>							
							<td><input type="file" name="file"></td>
							<td><input type = "submit" value = "Upload"/></td>
							</form>
						</tr>
						<tr>
							<tr><td>Attendance</td></tr>
							<form name = "attendanceUpload" method = "post" action = "home.php?Upload=3" enctype="multipart/form-data">
							<td>Class    <input type="text" name="class" placeholder="Enter Class Number"></td>
							<td>Course Id<input type="text" name="courseid" placeholder="Enter CourseId"></td>
							<td><input type="file" name="file"></td>
							<td><input type = "submit" value = "Upload"/></td>
							</form>
						</tr>
						</table>
											
											<br/><!--Uploaded materials or files-->
							<h2>Uploaded Materials</h2>
									<?php
										if($rowCount >= 1) { ?>
											<table cellpadding="10" border = 1>
											<?php
												echo "<tr>";
													echo "<th><b>CLASS</b></th>";
													echo "<th>|||</th>";
													echo "<th>CATEGORY</th>";
													echo "<th>|||</th>";
													echo "<th>COURSE</th>";
													echo "<th>|||</th>";
													echo "<th>FILE</th>";
												echo "</tr>";
												$result = selectQuery($sql = $uploadSQL, $page = "");
												while($row = mysqli_fetch_assoc($result)) {
													$fName = $row['location'];
													$fName = explode("/", $fName);
													$fName = $fName[2];
													echo "<tr>";
														echo "<td>".$row['class']."</td>";
														echo "<td>|||</td>";
														echo "<td>".$row['category']."</td>";
														echo "<td>|||</td>";
														echo "<td>".$row['courseid']."</td>";
														echo "<td>|||</td>";
														echo "<td><a href = '".$row['location']."' target='_blank'>".$fName."</a></td>";
													echo "</tr>";
												}
											?>
											</table>
										<?php } 
										else {
											echo "<p>No Uploads yet!</p>";
										}?>
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
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>