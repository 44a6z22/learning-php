    <!--Left Sidebar-->
                                
				<div class="mdl-layout__drawer">
					<div class="nicescroll-bar">
						<div class="drawer-profile-wrap">
							<div class="candidate-img-drawer mt-25 mb-20">
								<?php
									include("php/view/gallery/profilePic.php");
								?>
							</div>
							<span class="candidate-name block mb-10 text-center"><a href="profile.php"><?php echo $user->getFirstName() ." ". $user->getLastName();?></a></span>
							
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