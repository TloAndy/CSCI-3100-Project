<?php include 'Course_DatabaseConnection.php';?>
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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="gtco-loader"></div>

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

	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_4.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-12 mt-text text-center animate-box" data-animate-effect="fadeInUp">
					<h1><strong>Upload Course Material</strong></h1>
					<h2></h2>
					<!-- <div class="padding-medium"></div> -->
					<!-- <h2>Add course material</h2> -->
					<?php
					//CHOOSE CODE, TEMPOARY CODE
					if (!$_POST)
					{
					?>
					<form method = "POST">
					<?php
					$result = mysqli_query($db,"SELECT `course_code`,`course_title` FROM `course_list`") or die("failed");
					echo "<select name = \"course_code\" id = \"course_code\" required><option disabled selected>**Please select**</option>";
					for ($i = 0; $i < mysqli_num_rows($result); $i++)
					{
						$row_array = mysqli_fetch_row($result);
						echo "<option value = \"".$row_array[0]."\">";
						for ($j=0; $j < mysqli_num_fields($result); $j++) {
							echo $row_array[$j]." ";
						}
						echo "</option>\n";

					}
					echo "</select>";
					?>
					<br><input type = "submit" name = "choose" value = "choose">
					</form>
					<?php
					}
					//END OF CHOOOSE COURSE, TEMPOARY CODE
					//ADD COURSE MATERIAL
					else if (isset($_POST['choose'])&&isset($_POST['course_code']))
					{
						echo "<h2>Add ".$_POST['course_code']." course material</h2>";
					?>

					<table  border = "2">
					<tr><td>Name of the file</td><td><input type = "text" name="material_name" id = "material_name" maxlength="30"></td></tr>
					<tr><td>Type</td><td><select>
					<option value = "lecture notes">Lecture notes</option>
					<option value = "tutorila notes">Tutorial notes</option>
					<option value = "Assignment">Assignment</option>
					<option>Others</option></select>
					</td></tr>
					<tr><td>File</td><td><input type="file" name = "file" id = "file" required></td></tr>
					<tr><td colspan = "2"><input type = "submit" name = "add" value = "add"></td></tr>

					</table>
					<?php
					}
					//END OF ADD COURSE MATERIAL FORM
					?>

					<input type="button" onclick="location.href='Courseinfo.php';" value="Back to course list" ><br>
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

  <footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>We are students from the Chinese University of Hong Kong. We hope this website can provide a better learning environment to both the students and instructors.</p>
						<!-- <p><a href="#">Learn more...</a></p> -->
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>Services</h3>
						<ul class="gtco-footer-links">
							<li>Public Course Outlines</li>
							<li>Discussion Site</li>
							<li>Course Evaluation</li>
							<li>Personal Calendar</li>
							<li>Posting course material</li>
						</ul>
					</div>
				</div>



				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@GetTemplates.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
						<small class="block">Designed by <a href="http://GetTemplates.co/" target="_blank">GetTemplates.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>

</div>

</div>

<div class="gototop js-top active">
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
