<?php
	include "php/config.php";
	session_start();
	if(!isset($_SESSION['userLogin']) && !isset($_GET['userId'])){
		header('location: ./');
	}else if(isset($_GET['userId'])){
		$id = $_GET['userId'];
	}else if ($_SESSION['userLogin']){
		$id = $_SESSION['userLogin'];
	}
	$user = new User();

	$user->setConnection($connection);
	$user->setUSerId($id);
	$user->setUserData();
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $user->getFullName(); ?></title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	</head>

	<body id="body" data-ng-app="contactApp">
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
						<a href="./"><span class="mdl-layout-title"><?php echo $user->getFullName();?></span></a>
						<div class="mdl-layout-spacer"></div>
						<ul class="nav mdl-navigation mdl-layout--large-screen-only">
							<li><a class="mdl-navigation__link" data-scroll href="#body">about</a></li>
							<li><a class="mdl-navigation__link" data-scroll href="#references_sec">references</a></li>
							<li><a class="mdl-navigation__link" data-scroll href="#books_sec">Books</a></li>
							<li><a class="mdl-navigation__link" data-scroll href="#skills_sec">skills</a></li>
						</ul>


						<?php
							if(isset($_SESSION['userLogin'])){
						?>
						<!-- Right aligned menu below button -->
						<button id="demo-menu-lower-right"
								class="mdl-button mdl-js-button mdl-button--icon ver-more-btn">
						  <i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
							data-mdl-for="demo-menu-lower-right">
							<li class="mdl-menu__item"><a href="#"><i class="zmdi zmdi-upload font-blue pr-10"></i>Add book</a></li>

							<li class="mdl-menu__item"><a href="php/controller/logoutHandler.php"><i class="lower pr-10 font-red material-icons">power_settings_new</i>logout</a></li>
						</ul>
						<?php
							}
						?>
					</div>
				</header>
				<!--/Top Header-->

				<!--Left Sidebar-->

					<?php

						$id = $_SESSION['userLogin'];
						if(isset($_SESSION["userLogin"])) require("php/view/assets/leftSideBar.php");

						if(isset($_GET["userId"])) $id = $_GET["userId"];
							$user->setUserData($connection, $id);

					?>
				<!--/Left Sidebar-->



				<!--Main Content-->
				<div class="main-content relative">
					<div class="container">

						<!--About Sec-->
						<section class="about-sec mt-180 mt-sm-120  mb-30">
							<div class="row">
								<div class="col-lg-12">
									<div class="mdl-card mdl-shadow--2dp">
										<div class="row">
											<div class="col-md-5 col-xs-12 mb-30">
												<div class="candidate-img mb-35">
													<?php
														include("php/view/gallery/profilePic.php");
													?>
												</div>
												
											</div>
											<div class="col-md-7 col-xs-12">
												<div class="info-wrap">
													<h1><?php echo $user->getFullName();?></h1>
													<h5 class="mt-20 font-grey"></h5>
													<?php
														if( isset($_SESSION['userLogin']) && $id != $_SESSION['userLogin']){
													?>
														<div class="mt-30">
															<a id="download_cv" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  bg-blue font-white mr-10" href="#">follow</a>
															<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg-green font-white" href="#contact_sec" data-scroll>contact</a>
														</div>
													<?php
														}
													?>
												</div>
												<ul class="profile-wrap mt-50">
													<li>
														<div class="profile-title">age</div>
														<div class="profile-desc">24</div>
													</li>
													<li>
														<div class="profile-title">address</div>
														<div class="profile-desc">

														</div>
													</li>
													<li>
														<div class="profile-title">email</div>
														<div class="profile-desc">
															<?php echo $user->getEmail();?>
														</div>
													</li>
													<li>
														<div class="profile-title">phone</div>
														<div class="profile-desc">
														</div>
													</li>

												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!--/About Sec-->
						<!--References Sec-->
						<?php  require('php/view/assets/testos.php');?>
						<!--/References Sec-->
						<!--Books Sec-->
						<section id="books_sec" class="blog-sec sec-pad-top-sm">
							<h2 class="mb-30">books</h2>
							<div class="row">
								<?php
									require("php/view/gallery/picsGallery.php");
								?>
							</div>
							<div class="text-center mt-20 mb-30">
								<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  margin-lr-auto view-more" href="blog-list.html">view all</a>
							</div>
						</section>
						<!--/Books Sec-->


						<!--Footer Sec-->
						<footer class="footer-sec sec-pad-top-sm sec-pad-bottom text-center">
							<h4>thank you for visiting.</h4>
							<p class="mt-10">Hencework 2017. All rights reserved.</p>
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
