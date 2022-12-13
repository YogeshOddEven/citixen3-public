					<!-- Top navbar -->
						<nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
							<div class="container-fluid">
								<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
								
                                <!-- Brand -->
								<a class="navbar-brand pt-0 d-md-none" href="index.php?pid=home">
									<img src="assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
								</a>
                                <!-- Form -->
								
								<ul class="navbar-nav align-items-center ">
                                	<li class="nav-item dropdown">
										<a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0" data-toggle="dropdown" href="#" role="button">
										<div class="media align-items-center">
											<span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="img/<?php echo get_user_login_photo(); ?>"></span>
                                            <div class="media-body ml-2 d-none d-lg-block">
												<span class="mb-0 "><?php echo get_user_login_name(); ?></span>
											</div>
										</div></a>
										<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
											<div class=" dropdown-header noti-title">
												<h6 class="text-overflow m-0">Welcome!</h6>
											</div>
											<div class="dropdown-divider"></div><a class="dropdown-item" href="process/logout.php"><i class="ni ni-user-run"></i> <span>Logout</span></a>
										</div>
									</li>
								</ul>
							</div>
						</nav>
						<!-- Top navbar-->