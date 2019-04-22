    <!--Left Sidebar-->
				<div class="mdl-layout__drawer">
					<div class="nicescroll-bar">
						<div class="drawer-profile-wrap">
							<div class="candidate-img-drawer mt-25 mb-20">
							  <img src="<?php echo "php/upload/".$_SESSION['userLogin']."/profilePictures/".$profileOwner->getProfilePicture(); ?>" alt="..." style="height:130px; width:130px;border-radius:50%;">
							</div>
							<span class="candidate-name block mb-10 text-center"><a href="profile.php"><?php echo $profileOwner->getFullName(); ?></a></span>

						</div>
						<div class="mdl-scroll-spy-2">
							<ul class="mdl-navigation">
								<li>
									<a class="mdl-navigation__link border-top-sep" data-scroll href="#body">
										<i class="zmdi zmdi-border-color pr-15"></i>
										<span class="font-capitalize">about</span>
									</a>
								</li>

								<li>
									<a class="mdl-navigation__link border-top-sep" data-scroll href="#references_sec">
										<i class="zmdi zmdi-bookmark pr-15"></i>
										<span class="font-capitalize">references</span>
									</a>
								</li>

								<li>
									<a class="mdl-navigation__link border-top-sep" data-scroll href="#books_sec">
										<i class="zmdi zmdi-book pr-15"></i>
										<span class="font-capitalize">Books</span>
									</a>
								</li>

								<li>
									<a class="mdl-navigation__link border-top-sep" data-scroll href="#skills_sec">
										<i class="zmdi zmdi-cutlery pr-15"></i>
										<span class="font-capitalize">skills</span>
									</a>
								</li>

							</ul>
						</div>

					</div>
				</div>
				<!--/Left Sidebar-->
