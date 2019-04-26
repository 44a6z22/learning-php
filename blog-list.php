<?php
	require('php/config.php');
	
	if(isset($_SESSION['userLogin']) && isset($_GET['books']))
	{
		$id = $_SESSION['userLogin'];
	}
	else if	(isset($_SESSION['userLogin']) && !isset($_GET['books']))
	{
		header('location: ./addbook.php');
	}
	else if(!isset($_SESSION['userLogin']) && !isset($_GET['books']))
	{
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
				<?php 	require('php/view/assets/bgImg.php'); ?>
			<!--/Bg Image-->

			<div class="mdl-js-layout mdl-layout--fixed-header">

				<!--Top Header-->
				<?php	require("php/view/assets/navBar.php"); ?>
				<!--/Top Header-->

				<!--Left Sidebar-->

				<!--/Left Sidebar-->

				<!--Main Content-->
				<div class="main-content relative">
					<div class="container">
						<!--Blog Sec-->
						<section id="blog_sec" class="blog-sec mt-180 mt-sm-120">
							<h2 class="mb-30 font-white">books</h2>
							<?php	require("php/view/gallery/booksPreview.php"); ?>
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


