<?php
	include("php/config.php");
	session_start();
	if(!isset($_SESSION['userLogin'])){
		header('location: ./');
	}
	$id = $_SESSION['userLogin'];
	$user = new User(); 	
	$user->setUserData($connection, $id);
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $user->getFirstName() ." ". $user->getLastName();?></title>
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
						<a href="index.html"><span class="mdl-layout-title"><?php echo $user->getFirstName();?></span></a>
						<div class="mdl-layout-spacer"></div>
						<ul class="nav mdl-navigation mdl-layout--large-screen-only">
							<li><a class="mdl-navigation__link" data-scroll href="#body">about</a></li>
							<li><a class="mdl-navigation__link" data-scroll href="#references_sec">references</a></li>
							<li><a class="mdl-navigation__link" data-scroll href="#books_sec">Books</a></li>
							<li><a class="mdl-navigation__link" data-scroll href="#skills_sec">skills</a></li>
						</ul>
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
					</div>
				</header>
				<!--/Top Header-->
				
				<!--Left Sidebar-->

					<?php 
						
						$id = $_SESSION['userLogin']; 
						require("php/view/assets/leftSideBar.php");
						
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
												<ul class="social-icons">
													<li>
														<a class="facebook-link" href="#">
															<i id="tt1" class="zmdi zmdi-facebook"></i>
															<div class="mdl-tooltip" data-mdl-for="tt1">
																facebook
															</div>
														</a>
													</li>
													<li>
														<a class="twitter-link" href="#">
															<i id="tt2" class="zmdi zmdi-twitter"></i>
															<div class="mdl-tooltip" data-mdl-for="tt2">
																twitter
															</div>
														</a>
													</li>
													<li>
														<a class="linkedin-link" href="#">
															<i id="tt3" class="zmdi zmdi-linkedin"></i>
															<div class="mdl-tooltip" data-mdl-for="tt3">
																linkedin
															</div>
														</a>
													</li>
													<li>
														<a class="dribbble-link" href="#">
															<i id="tt4" class="zmdi zmdi-dribbble"></i>
															<div class="mdl-tooltip" data-mdl-for="tt4">
																dribbble
															</div>
														</a>
													</li>
													<li>
														<a class="instagram-link" href="#">
															<i id="tt5" class="zmdi zmdi-instagram"></i>
															<div class="mdl-tooltip" data-mdl-for="tt5">
																instagram
															</div>
														</a>
													</li>
												</ul>
											</div>
											<div class="col-md-7 col-xs-12">
												<div class="info-wrap">
													<h1><?php echo $user->getFirstName() ." ". $user->getLastName();?></h1>
													<h5 class="mt-20 font-grey"></h5>
													<?php
														if($id != $_SESSION['userLogin']){
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
						<section id="references_sec" class="reference-sec sec-pad-top-sm">
							<h2 class="mb-30">testimonial</h2>
							<div class="row">
								<div class="col-sm-12 mb-30">
									<div class="mdl-card mdl-shadow--2dp border-top-yellow pa-35">
										<div class="testimonial-carousel">
											<div>
												<blockquote>"Invitamus me testatur sed quod non dum animae tuae lacrimis ut libertatem deum rogus aegritudinis causet. Dicens hoc contra serpentibus isto."</blockquote>
												<span class="ref-name block mb-5 mt-20">john doe</span>
												<span class="ref-desgn block">Lead Designer in Droffox</span>
											</div>
											<div>
												<blockquote>"Invitamus me testatur sed quod non dum animae tuae lacrimis ut libertatem deum rogus aegritudinis causet. Dicens hoc contra serpentibus isto."</blockquote>
												<span class="ref-name block mb-5 mt-20">Shone doe</span>
												<span class="ref-desgn block">Lead Designer in Fakebook</span>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						
						</section>
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
						<!--Skills Sec-->
						<section id="skills_sec" class="skills-sec sec-pad-top-sm">
							<div class="row">
								<div class="col-sm-6 mb-30">
									<h2 class="mb-30">technical skills</h2>
									<div class="mdl-card mdl-shadow--2dp">
										<div class="mb-30">
											<span class="progress-cat">Photoshop CS</span>
											<div class="progress-bar-graph"> 
												<div class="progress-bar-wrap">
													<div class="bar-wrap blue-bar">
														<span data-width="60"></span>
													</div>
												</div>	
											</div>
										</div>	
										<div class="mb-30">
											<span class="progress-cat">Illustrator CS</span>
											<div class="progress-bar-graph"> 
												<div class="progress-bar-wrap">
													<div class="bar-wrap green-bar">
														<span data-width="90"></span>
													</div>
												</div>	
											</div>
										</div>
										<div class="mb-30">
											<span class="progress-cat">Sketch</span>
											<div class="progress-bar-graph"> 
												<div class="progress-bar-wrap">
													<div class="bar-wrap yellow-bar">
														<span data-width="50"></span>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 mb-30">
									<h2 class="mb-30">soft skills</h2>
										<div class="mdl-card mdl-shadow--2dp">
										<div class="mb-30">
											<span class="progress-cat">Communication</span>
											<div class="progress-bar-graph"> 
												<div class="progress-bar-wrap">
													<div class="bar-wrap blue-bar">
														<span data-width="80"></span>
													</div>
												</div>	
											</div>
										</div>	
										<div class="mb-30">
											<span class="progress-cat">Language</span>
											<div class="progress-bar-graph"> 
												<div class="progress-bar-wrap">
													<div class="bar-wrap green-bar">
														<span data-width="95"></span>
													</div>
												</div>	
											</div>
										</div>
										<div class="mb-30">
											<span class="progress-cat">General Knowledge</span>
											<div class="progress-bar-graph"> 
												<div class="progress-bar-wrap">
													<div class="bar-wrap yellow-bar">
														<span data-width="90"></span>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!--/Skills Sec-->
						
					
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
