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

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_bg_4.jpg)" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row row-mt-15em">
				<div class="col-md-7 mt-text text-left animate-box" data-animate-effect="fadeInUp">
					<h1><strong>Enrolled List</strong></h1>
					<h2></h2>
					<div class="padding-medium"></div>
					<input type="button" onclick="location.href='Courseinfo.php';" value="Back to course list" ><br>
				</div>
			</div>
		</div>
	</header>

	<div class="flex-section" style="background-color:grey;>
		<div class="col-1">
					<?php
					if (isset($_POST['View']))
					{
						$result = mysqli_query($db,"SELECT * FROM `".$_POST['View']."_info`") or die("failed");
						echo "<table border=\"1\"><tr>";
						for ($i = 0; $i < mysqli_num_fields($result); $i++)
						{
							$finfo = mysqli_fetch_field_direct($result, $i);
							echo "<td bgcolor=\"white\">".$finfo->name."</td>";
						}
						echo "</tr>";
						for ($i = 0; $i < mysqli_num_rows($result); $i++)  {
							echo "<tr>";
							$row_array = mysqli_fetch_row($result);
							for ($j=0; $j < mysqli_num_fields($result); $j++)
							{
								echo "<td bgcolor=\"white\">".$row_array[$j]."</td>\n";
							}
							echo "</tr>";
						}
					}
					?>
		</div>
	</div>


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
