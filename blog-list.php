<?php
	require('php/config.php');
	if(isset($_SESSION['userLogin']) && isset($_GET['books'])){
		$id = $_SESSION['userLogin'];
	}else if(isset($_SESSION['userLogin']) && !isset($_GET['books'])){
		header('location: ./addbook.php');
	}else if(!isset($_SESSION['userLogin']) && !isset($_GET['books'])){
		header('location: ./');
	}

	$booksPath = "php/upload/".$id."/booksPictures/";
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Material CV/Resume/Vcard/Portfolio by Hencework.</title>
		<meta name="description" content="Matresume is a material CV / Resume / Vcard / Portfolio HTML5 template by hencework." />
		<meta name="keywords" content="material design, resume, responsive template, cv, multipurpose, portfolio, html5 template, themeforest.net, bootstrap, html5, creative, landing page, sass, clean, design, modern, angular js," />
		<meta name="author" content="hencework"/>

		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	</head>

	<body id="body" class="blog-detail" data-ng-app="contactApp">


		<!--Main Wrapper-->
		<div class="main-wrapper">

			<!--Bg Image-->
			<div class="bg-struct bg-img"></div>
			<!--/Bg Image-->

			<div class="mdl-js-layout mdl-layout--fixed-header">

				<!--Top Header-->
				<header class="mdl-layout__header">
					<div class="mdl-layout__header-row mdl-scroll-spy-1">
						<!-- Title -->
						<a href="index.html"><span class="mdl-layout-title">benjamin</span></a>
						<div class="mdl-layout-spacer"></div>
						<ul class="nav mdl-navigation mdl-layout--large-screen-only">
							<li><a class="mdl-navigation__link" href="index.html#body">about</a></li>
							<li><a class="mdl-navigation__link" href="index.html#skills_sec">skills</a></li>
							<li><a class="mdl-navigation__link" href="index.html#portfolio_sec">portfolio</a></li>
							<li><a class="mdl-navigation__link" href="index.html#experience_sec">experience</a></li>
							<li><a class="mdl-navigation__link" href="index.html#education_sec">education</a></li>

							<li><a class="mdl-navigation__link" href="index.html#references_sec">references</a></li>
							<li><a class="mdl-navigation__link" href="index.html#contact_sec">contact</a></li>
						</ul>
						<!-- Right aligned menu below button -->
						<button id="demo-menu-lower-right"
								class="mdl-button mdl-js-button mdl-button--icon ver-more-btn">
						  <i class="material-icons">more_vert</i>
						</button>

						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
							data-mdl-for="demo-menu-lower-right">
							<li class="mdl-menu__item"><a href="#"><i class="zmdi zmdi-download font-red pr-10"></i>Download CV</a></li>
							<li class="mdl-menu__item"><a href="mailto:benjaminsirje49@company.com"><i class="zmdi zmdi-email-open font-green pr-10"></i>Contact Me</a></li>
							<li class="mdl-menu__item"><a href="callto:12345678910"><i class="zmdi zmdi-phone  font-blue  pr-10"></i>+1 234 567 89 10</a></li>
						</ul>
					</div>
				</header>
				<!--/Top Header-->

				<!--Left Sidebar-->

				<!--/Left Sidebar-->

				<!--Main Content-->
				<div class="main-content relative">
					<div class="container">
						<!--Blog Sec-->
						<section id="blog_sec" class="blog-sec mt-180 mt-sm-120">
							<h2 class="mb-30">blog</h2>

							<?php
								require("php/view/gallery/booksPreview.php");
							?>
Q
						</section>

						<!--/Blog Sec-->

						<!--Footer Sec-->
						<footer class="footer-sec sec-pad-top-sm sec-pad-bottom text-center">
							<h4>thank you for visiting.</h4>
							<p class="mt-10">Hencework 2017. All rights reserved.</p>
								<ul class="social-icons mt-10">
									<li>
										<a class="facebook-link" href="#">
											<i id="tt6" class="zmdi zmdi-facebook"></i>
											<div class="mdl-tooltip" data-mdl-for="tt6">
												facebook
											</div>
										</a>
									</li>
									<li>
										<a class="twitter-link" href="#">
											<i id="tt7" class="zmdi zmdi-twitter"></i>
											<div class="mdl-tooltip" data-mdl-for="tt7">
												twitter
											</div>
										</a>
									</li>
									<li>
										<a class="linkedin-link" href="#">
											<i id="tt8" class="zmdi zmdi-linkedin"></i>
											<div class="mdl-tooltip" data-mdl-for="tt8">
												linkedin
											</div>
										</a>
									</li>
									<li>
										<a class="dribbble-link" href="#">
											<i id="tt9" class="zmdi zmdi-dribbble"></i>
											<div class="mdl-tooltip" data-mdl-for="tt9">
												dribbble
											</div>
										</a>
									</li>
									<li>
										<a class="instagram-link" href="#">
											<i id="tt10" class="zmdi zmdi-instagram"></i>
											<div class="mdl-tooltip" data-mdl-for="tt10">
												instagram
											</div>
										</a>
									</li>
								</ul>

						</footer>
						<!--Footer Sec-->
					</div>
				</div>
				<!--/Main Content-->

			</div>
		</div>
		<!--/Main Wrapper-->

			<!-- Scripts -->
			<script src="assets/js/jquery-1.12.4.min.js"></script>
			<script src="assets/js/angular.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery-ui.min.js"></script>
			<script src="assets/js/material.min.js"></script>
			<script src="assets/js/jQuery.appear.js"></script>
			<script src="assets/js/app.js"></script>
			<script src="assets/js/controllers.js"></script>
			<script src="assets/js/smooth-scroll.js"></script>
			<script src="assets/js/isotope.js"></script>
			<script src="assets/js/lightgallery-all.js"></script>
			<script src="assets/js/owl.carousel.min.js"></script>
			<script src="assets/js/froogaloop2.min.js"></script>
			<script src="assets/js/jquery.slimscroll.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxXt2P7-U38bK0xEFIT-ebZJ1ngK8wjww"></script>
			<script src="assets/js/init.js"></script>
	</body>
</html>
