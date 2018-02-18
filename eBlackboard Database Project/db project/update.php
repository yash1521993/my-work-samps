<!DOCTYPE HTML>

<html>
	<head>
		<title>Update for STUDENT ID - <?php echo $_GET['id']; ?></title>
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
										<a href="index.html">Homepage</a>
										<a href="threecolumn.html">My Blackboard</a>
										<a href="admin.html">Admin</a>
										<a href="twocolumn2.html">Reach Us</a>
										<a href="onecolumn.html">One Column</a>
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
											<title>Update STUDENT ID - <?php echo $_GET['id']; ?></title>
												<h1>Update for STUDENT ID - <?php echo $_GET['id']; ?></h1>
											</header>
<?php
	session_start();
	if(!isset($_SESSION['userID'])) {
		header("Location:afterlogin.php");	
	}
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
	} elseif(isset($_GET['update'])) {
		include "functions.php";
		$id = $_GET['update']; # $_POST['studentid'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$class = $_POST['class'];
		$sql = "UPDATE student set class = $class,phone=$phone,email='$email',address='$address'
		WHERE studentid = '$id'";
		echo $sql;
		insertUpdateDelete($sql = $sql, $page = "afterlogin.php");
	} else {
		header("Location:Afterlogin.php");
	}
?>
<!DOCTYPE html>

<body>
	
	<?php
		$sql = "SELECT * FROM student where studentid = '$id'";
		include "functions.php";
		$result = selectQuery($sql = $sql, $page = "");
	?>
	<?php echo '<form name = "update" id = "update" method = "post" action = "update.php?update='.$id.'">'; ?>
	<?php
		while($row = mysqli_fetch_assoc($result)) {		
			
			echo "<input type = 'text' value = '".$row['studentid']."' name = 'studentid' disabled/><br/><br/>";
			echo "Student Name   : <input type = 'text' value = '".$row['sname']."' name = 'name' disabled /><br/><br/>";
			echo "Phone          : <input type = 'text' value = '".$row['phone']."' name = 'phone'/><br/><br/>";
			echo "Email          : <input type = 'text' value = '".$row['email']."' name = 'email'/><br/><br/>";
			echo "Address        : <textarea name = 'address'>".$row['address']."</textarea><br/><br/>";
			echo "Class          : <input type = 'text' value = '".$row['class']."' name = 'class'/><br/><br/>";
		}
	?>
		<input type = "submit" value = "Update"/>
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