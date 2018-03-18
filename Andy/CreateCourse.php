<?php include 'Course_DatabaseConnection.php';?>
<!-- <!DOCTYPE HTML> -->
<html>
<head>
  <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>EpistEmE &mdash; Free Website Template, Free HTML5 Template by GetTemplates.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

		<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Self -->
	<link rel="stylesheet" href="css/self.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- FOR IE9 below -->
	<!-- [if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script>
	function validateForm() {
		//Check course title
		var x = document.forms["createCourse"]["course_title"].value;
		if (x == "") {
	        alert("Course title must be filled out");
	        return false;
	    }
		//End Check course title

		//Check course code
	    var x = document.forms["createCourse"]["course_code"].value;
	    if (x.length != 8)
		{
			alert("Wrong Course Code length");
	        return false;
	    }
		x = x.toUpperCase();
		var CourseIDPat = /^([A-Z]{4})([0-9]{4})$/;
		if (x.match(CourseIDPat) == null)
		{
			alert("Wrong Course Code format");
			return false;
		}
		//End check course code

		//Check Maximum enrollment number
		var x = document.forms["createCourse"]["max_enroll_num"].value;
		if (isNaN(x) == true)
		{
			alert("Maximum enrollment number must be an integer");
			return false;
		}
		//End check Maximum enrollment number

		//Check course password
		 var x = document.forms["createCourse"]["course_pw"].value;
	    if (x.length != 6)
		{
			alert("Wrong password length, 6 characters is required");
	        return false;
	    }
		//End check course password
		}
		</script>
</head>
<body>

	<div class="gtco-loader"></div>
	<!-- <div class="i am good"></div> -->

	<div id="page">


	<div class="page-inner">

	<div id="head-top" style="position: absolute; width: 100%; top: 0; ">
		<div class="gtco-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<div id="gtco-logo"><a href="home.html">EpistEmE <em>.</em></a></div>
					</div>
					<div class="col-md-6 col-xs-6 social-icons">
						<ul class="gtco-social-top">
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<nav class="gtco-nav sticky-banner" role="navigation">
			<div class="gtco-container">

				<div class="row">
					<div class="col-xs-12 text-center menu-1">
						<ul>
							<li><a href="home.html">Home</a></li>
							<li><a href="services.html">Services</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="has-dropdown">
								<a href="Courseinfo.php">Courses</a>
								<ul class="dropdown">
									<li><a href="#">Most popular</a></li>
									<li><a href="#">Most enroll</a></li>
									<li><a href="#">View all</a></li>
								</ul>
							</li>
							<li><input type="text" placeholder="Search for courses.."></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>
	</div>

	</div>

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_4.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-12 mt-text text-center animate-box" data-animate-effect="fadeInUp">
					<h1><strong>Create new course</strong></h1>
					<div class="padding-low"></div>
					<form name = "createCourse"action = "" method = "POST" onsubmit="return validateForm()" name = "input">
						<table border = "2" align=center>
						<tr><td bgcolor="white">Course Title</td><td><input type = "text" name="course_title" id = "course_title" maxlength="30"></td></tr>
						<tr><td bgcolor="white">Course Code (XXXX0000)</td><td><input type = "text" name="course_code" id = "course_code" maxlength="8"></td></tr>
						<tr><td bgcolor="white">Maximum enrollment number</td><td><input type = "text" name="max_enroll_num" id = "max_enroll_num"></td></tr>
						<tr><td bgcolor="white">Course password</td><td><input type = "password" name="course_pw" id = "course_pw" maxlength="10"></td></tr>
						</table>
						<div class="padding-medium"></div>

						<input type = "submit" name = "create" value = "Submit">
						<input type="button" onclick="location.href='Courseinfo.php';" value="Back" ><br>
						<!-- Create new course table -->
						<?php
						if(isset ($_POST['create']))
						{
							$sql = "CREATE TABLE `course`.`".$_POST['course_code']."_info` ( `ID` VARCHAR(12) NOT NULL , `Name` TEXT NOT NULL , `Type` TEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
							mysqli_query($db,$sql) or die("Create enrolled list table failed");

							$sql = "CREATE TABLE `course`.`".$_POST['course_code']."_material` ( `ID` INT NOT NULL AUTO_INCREMENT , `material_name` TEXT NOT NULL , `material_type` TEXT NOT NULL , `material_path` TEXT NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
							mysqli_query($db,$sql) or die("Create course material table failed");
							$sql = "INSERT INTO `course_list` (`course_title`, `course_code`, `enrolled_num`, `max_enrolled_num`, `course_pw`)
							VALUES ('".$_POST['course_title']."', '".$_POST['course_code']."', '0', '".$_POST['max_enroll_num']."', '".$_POST['course_pw']."')";
							mysqli_query($db,$sql) or die("Create failed");

							$message = "Course created successfully";
							echo "<script type='text/javascript'>alert('$message');</script>";
							echo "Course \"".$_POST['course_code']." ".$_POST['course_title']."\" has successfully created<br>";
							echo "Accessed with:".$_POST['course_pw'];
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</header>

  <div class="flex-section gtco-gray-bg">
		<div class="col-1">
			<div class="text">

				<div class="row row-pb-sm">
					<div class="col-md-12">
					<h2>You may ask:</h2>

					<!-- <p>There are tremendous number of course outlines which are available to everyone. In order to ensure our material is updated, they are all modified by students who passed the course.</p> -->
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-md-6">
						<ul class="check-li">
							<li>Public</li>
							<li>Accurate</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="check-li">
							<li>Updated</li>
							<li>Clear</li>
						</ul>
					</div>
				</div> -->
			</div>
		</div>
		<div class="col-2 flex-img" style="background-image: url(images/img_1.jpg);"></div>
	</div>

	<div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>We have high quality services that you will surely love!</h1>
				</div>
			</div>
		</div>
	</div>

</div>
</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

  <!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>

</body>
</html>
