<?php
	include "php/config.php";

	if( !isset( $_SESSION['userLogin'] ) && !isset( $_GET['userId'] ) )
	{
		header('location: ./');	
	}
	else if( isset( $_GET['userId'] ) && isset( $_SESSION['userLogin'] ) ||  isset( $_GET['userId'] ) && !isset( $_SESSION['userLogin'] ))
	{
		$id = $_GET['userId'];
	}
	else 
	{
		$id = $_SESSION['userLogin']; 
	}

	if( !$id )
	{
		header('location: ./');
	}
	
	$user = new User($connection);
	$user->setId($id);
	$user->setUserData();

  	$booksPath = "php/upload/" . $id . "/booksPictures/";
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $user->getFullName(); ?></title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/coments.css" />
	</head>

	<body id="body" data-ng-app="contactApp">
		<!--Main Wrapper-->
		<div class="main-wrapper">
			<!--Background Image-->
			<?php 
				require('php/view/assets/bgImg.php'); 
			?>
			<!--/Background Image-->

			<div class="mdl-js-layout mdl-layout--fixed-header">

				<!--Top Header-->
					<?php 
						require("php/view/assets/navBar.php") ; 
					?>
				<!--/Top Header-->

				<!--Left Sidebar-->
					<?php
						$id = $_SESSION['userLogin'];
						if(!isset( $_GET['userId'] ) || $_GET['userId'] ==  $_SESSION['userLogin'])
							require("php/view/assets/leftSideBar.php");

						if( isset( $_GET["userId"] ) )
						{
							$id = $_GET["userId"];
						}

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

													<img src="<?php echo "php/upload/" . $id . "/profilePictures/" . $user->getProfilepicture() ;  ?>" style="height:230px; width:230px;border-radius:50%;" alt="">
													
														
														<?php
															if(	!isset( $_GET['userId'] ) || $_GET['userId'] == $_SESSION['userLogin'] )
															{
														?>
															<form action="php/controller/accountActions/uploadHandler.php" method="POST" enctype="multipart/form-data">
																<div class="custom-file ">
																	<input type="file" name="photo" class="custom-file-input">
																	<label class="custom-file-label" for="inputGroupFile01">
																	</label>
																</div>
																<input type="submit" name="addBook" class="btn btn-primary btn-block" value="update">
															</form>
														<?php
															}
														?>
																							

												</div>
											</div>
											<div class="col-md-7 col-xs-12">
												<div class="info-wrap">
													<h1><?php echo	$user->getFullName(); ?></h1>
													<h5 class="mt-20 font-grey"></h5>

													<?php
														if( isset( $_SESSION['userLogin'] ) && $id != $_SESSION['userLogin'] )
														{
													?>
														<div class="mt-30">
															<a id="download_cv" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  bg-blue font-white mr-10" href="php/controller/accountActions/follows.php?follow=<?php echo $_GET['userId'] ;?>">follow</a>
															<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg-green font-white" href="#contact_sec" data-scroll>contact</a>
														</div>
													<?php
														}
													?>
												</div>
												<ul class="profile-wrap mt-50">
													<li>
														<div class="profile-title">age</div>
														<div class="profile-desc">
															<?php 
																echo $user->getAge();
															?>
														</div>
													</li>
													<li>
														<div class="profile-title">Username</div>
														<div class="profile-desc">
															<?php 
																echo	$user->getUserName() ;
															?>
														</div>
													</li>
													<li>
														<div class="profile-title">email</div>
														<div class="profile-desc">
															<?php 
																echo $user->getEmail() ;
															?>
														</div>
													</li>
													<li>
														<div class="profile-title">Status</div>
														<div class="profile-desc">
															<?php 
																echo 	$user->getUserType() ;
															?>
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
						<?php 
							require('php/view/assets/testos.php');
						?>
						<!--/References Sec-->

						<!--Books Sec-->
						<section id="books_sec" class="blog-sec sec-pad-top-sm">
							<h2 class="mb-30">books</h2>
							<div class="row">
								<?php
									require("php/view/gallery/booksShowCase.php");
								?>
							</div>
							<div class="text-center mt-20 mb-30">
								<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  margin-lr-auto view-more" href="blog-list.php?books">view all</a>
							</div>
						</section>
						<!--/Books Sec-->
					
				        <!-- comments Sec-->
						<section id="comments_sec" class="comment_block">
                                <?php
                                    if(isset($_GET['userId']) && $_GET['userId'] != $_SESSION['userLogin'])
                                    {
                                ?>
                                    <div class="create_new_comment ">
                                        <!-- current #{user} avatar -->
                                        <div class="user_avatar ">
                                            <img src="<?php echo "php/upload/" . $profileOwner->getId() . "/profilePictures/" . $profileOwner->getProfilepicture() ;  ?>">
                                        </div>
                                        
                                        <!-- the input field -->
										<form action="php/controller/commentsActions/addComment.php" method="POST" >
											<div class="input_comment">
												<input type="text" name="reciverId" value="<?php echo $_GET['userId']; ?>"  hidden >
                                                <input type="text" name="commentContent" placeholder="Join the conversation..">
												<input type="submit" name="submitComment" class="btn btn-primary" value="comment" hidden >
											</div>
										</form>
                                    </div>
                                <?php
                                    }
                                ?>

                                <?php
                                    require("php/view/gallery/comments.php");
                                ?> 

						</section>
						<!--/comments Sec-->
						
						<!--Footer Sec-->
						<footer class="footer-sec sec-pad-top-sm sec-pad-bottom text-center">
							<!-- <h4>thank you for visiting.</h4>
							<p class="mt-10">Hencework 2017. All rights reserved.</p> -->
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
