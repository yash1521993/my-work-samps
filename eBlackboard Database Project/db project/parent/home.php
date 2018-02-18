<!DOCTYPE HTML>
<?php
	session_start();
	include "../functions.php";
	if(!isset($_SESSION['userID'])) {
		header("Location:../myblackboard.php");	
	}
	$uname = $_SESSION['userID'];
	$sql = "SELECT * FROM parent,student where student.studentid=parent.studentid and parentid = '$uname'";
	$result = selectQuery($sql, "");
	$class = "";
	while($row = mysqli_fetch_assoc($result)) {
		$class = $row['class'];
		$name = $row['sname'];
	}
	$usql = "SELECT * FROM uploads,student where student.class=uploads.class and class = $class";
	$materialCount = getNRows($usql, "home.php");
?>
<html>
	<head>
		<title>Parent Homepage</title>
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
										<a href="../threecolumn.html">My Blackboard</a>
										<a href="../admin.html">Admin</a>
										<a href="../twocolumn2.html">Reach Us</a>
										<a href="studentlogout.php">Log-Off</a>
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
												<h3>You can get information about various fields like courses, grades and attendance</h3>
											</header>
											<h2>Uploaded Files</h2>
		<?php
		if($materialCount >= 1) { ?>
			<table cellpadding="10" border = 1>
			<?php
				echo "<tr>";
					echo "<th>CLASS</th>";
					echo "<th>CATEGORY</th>";
					echo "<th>FILE</th>";
				echo "</tr>";
				$result = selectQuery($sql = $usql, $page = "");
				while($row = mysqli_fetch_assoc($result)) {
					$fName = $row['location'];
					$fName = explode("/", $fName);
					$fName = $fName[2];
					echo "<tr>";
						echo "<td>".$row['class']."</td>";
						echo "<td>".$row['category']."</td>";
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
														<li><a href="#">Neque amet dapibus</a></li>
														<li><a href="#">Sed mattis quis rutrum</a></li>
														<li><a href="#">Accumsan suspendisse</a></li>
														<li><a href="#">Eu varius vitae magna</a></li>
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