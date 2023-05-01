	<!-- Topbar Start -->
	<div class="navbar-custom">
		<div class="container-fluid">
			<ul class="list-unstyled topnav-menu float-end mb-0">

				<li class="d-none d-lg-block">
					<form class="app-search">
						<div class="app-search-box dropdown">
							<div class="input-group">
								<input type="search" class="form-control" placeholder="Search..." id="top-search">
								<button class="btn input-group-text" type="submit">
									<i class="fe-search"></i>
								</button>
							</div>
							<div class="dropdown-menu dropdown-lg" id="search-dropdown">
								<!-- item-->
								<div class="dropdown-header noti-title">
									<h5 class="text-overflow mb-2">Found 22 results</h5>
								</div>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<i class="fe-home me-1"></i>
									<span>Analytics Report</span>
								</a>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<i class="fe-aperture me-1"></i>
									<span>How can I help you?</span>
								</a>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<i class="fe-settings me-1"></i>
									<span>User profile settings</span>
								</a>

								<!-- item-->
								<div class="dropdown-header noti-title">
									<h6 class="text-overflow mb-2 text-uppercase">Users</h6>
								</div>

								<div class="notification-list">
									<!-- item-->
									<a href="javascript:void(0);" class="dropdown-item notify-item">
										<div class="d-flex align-items-start">
											<img class="d-flex me-2 rounded-circle" src="<?= base_url('assets/') ?>images/users/user-2.jpg" alt="Generic placeholder image" height="32">
											<div class="w-100">
												<h5 class="m-0 font-14">Erwin E. Brown</h5>
												<span class="font-12 mb-0">UI Designer</span>
											</div>
										</div>
									</a>

									<!-- item-->
									<a href="javascript:void(0);" class="dropdown-item notify-item">
										<div class="d-flex align-items-start">
											<img class="d-flex me-2 rounded-circle" src="<?= base_url('assets/') ?>images/users/user-5.jpg" alt="Generic placeholder image" height="32">
											<div class="w-100">
												<h5 class="m-0 font-14">Jacob Deo</h5>
												<span class="font-12 mb-0">Developer</span>
											</div>
										</div>
									</a>
								</div>

							</div>
						</div>
					</form>
				</li>
				<!-- 
				<li class="dropdown d-inline-block d-lg-none">
					<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<i class="fe-search noti-icon"></i>
					</a>
					<div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
						<form class="p-3">
							<input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
						</form>
					</div>
				</li> -->

				<li class="dropdown d-none d-lg-inline-block">
					<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
						<i class="fe-maximize noti-icon"></i>
					</a>
				</li>




				<li class="dropdown notification-list topbar-dropdown">
					<a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<i class="fe-bell noti-icon"></i>
						<span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-lg">

						<!-- item-->
						<div class="dropdown-item noti-title">
							<h5 class="m-0">
								<span class="float-end">
									<a href="" class="text-dark">
										<small>Clear All</small>
									</a>
								</span>Notification
							</h5>
						</div>

						<div class="noti-scroll" data-simplebar>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item active">
								<div class="notify-icon">
									<img src="<?= base_url('assets/') ?>images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" />
								</div>
								<p class="notify-details">Cristina Pride</p>
								<p class="text-muted mb-0 user-msg">
									<small>Hi, How are you? What about our next meeting</small>
								</p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-primary">
									<i class="mdi mdi-comment-account-outline"></i>
								</div>
								<p class="notify-details">Caleb Flakelar commented on Admin
									<small class="text-muted">1 min ago</small>
								</p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon">
									<img src="<?= base_url('assets/') ?>images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" />
								</div>
								<p class="notify-details">Karen Robinson</p>
								<p class="text-muted mb-0 user-msg">
									<small>Wow ! this admin looks good and awesome design</small>
								</p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-warning">
									<i class="mdi mdi-account-plus"></i>
								</div>
								<p class="notify-details">New user registered.
									<small class="text-muted">5 hours ago</small>
								</p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-info">
									<i class="mdi mdi-comment-account-outline"></i>
								</div>
								<p class="notify-details">Caleb Flakelar commented on Admin
									<small class="text-muted">4 days ago</small>
								</p>
							</a>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-secondary">
									<i class="mdi mdi-heart"></i>
								</div>
								<p class="notify-details">Carlos Crouch liked
									<b>Admin</b>
									<small class="text-muted">13 days ago</small>
								</p>
							</a>
						</div>

						<!-- All-->
						<a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
							View all
							<i class="fe-arrow-right"></i>
						</a>

					</div>
				</li>

				<li class="dropdown notification-list topbar-dropdown">
					<a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<img src="<?= base_url('assets/') ?>images/users/user-1.jpg" alt="user-image" class="rounded-circle">
						<span class="pro-user-name ms-1">
							Geneva <i class="mdi mdi-chevron-down"></i>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end profile-dropdown ">
						<!-- item-->
						<div class="dropdown-header noti-title">
							<h6 class="text-overflow m-0">Welcome !</h6>
						</div>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-user"></i>
							<span>My Account</span>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-settings"></i>
							<span>Settings</span>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-lock"></i>
							<span>Lock Screen</span>
						</a>

						<div class="dropdown-divider"></div>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<i class="fe-log-out"></i>
							<span>Logout</span>
						</a>

					</div>
				</li>


			</ul>

			<!-- LOGO -->
			<div class="logo-box">
				<a href="index.html" class="logo logo-dark text-center">
					<span class="logo-sm">
						<img src="<?= base_url('assets/') ?>images/logo-sm.png" alt="" height="22">
						<!-- <span class="logo-lg-text-light">UBold</span> -->
					</span>
					<span class="logo-lg">
						<img src="<?= base_url('assets/') ?>images/logo-dark.png" alt="" height="20">
						<!-- <span class="logo-lg-text-light">U</span> -->
					</span>
				</a>

				<a href="index.html" class="logo logo-light text-center">
					<span class="logo-sm">
						<img src="<?= base_url('assets/') ?>images/logo-sm.png" alt="" height="22">
					</span>
					<span class="logo-lg">
						<img src="<?= base_url('assets/') ?>images/logo-light.png" alt="" height="20">
					</span>
				</a>
			</div>

			<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
				<li>
					<button class="button-menu-mobile waves-effect waves-light">
						<i class="fe-menu"></i>
					</button>
				</li>

				<li>
					<!-- Mobile menu toggle (Horizontal Layout)-->
					<a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
						<div class="lines">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</a>
					<!-- End mobile menu toggle-->
				</li>



			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- end Topbar -->

	<div class="topnav">
		<div class="container-fluid">
			<nav class="navbar navbar-light navbar-expand-lg topnav-menu">

				<div class="collapse navbar-collapse" id="topnav-menu-content">
					<ul class="navbar-nav">

						<li class="nav-item dropdown">
							<a class="nav-link" href="<?= base_url('admin/dashboard') ?>" id="topnav-dashboard">
								<i class="fe-airplay me-1"></i> Dashboard
							</a>

						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fe-grid me-1"></i> Manage Properties<div class="arrow-down"></div>
							</a>
							<div class="dropdown-menu" aria-labelledby="topnav-apps">

								<a href="<?= base_url('admin/Propertycategory') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Property Category</a>

								<a href="<?= base_url('admin/Prosubcategory') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Property Sub Category</a>

								<a href="<?= base_url('admin/Propertymaster') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i>Property Master</a>


							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fe-grid me-1"></i>Masters<div class="arrow-down"></div>
							</a>
							<div class="dropdown-menu" aria-labelledby="topnav-apps">
								<a href="<?= base_url('admin/Masters') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Masters</a>
								<a href="<?= base_url('admin/Questionmaster') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i>Question Master</a>
								<a href="<?= base_url('admin/Sourcecategory') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i>Input Source Master</a>
								<a href="<?= base_url('admin/Position') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Position</a>
								<!-- <a href="<?= base_url('admin/Customermaster') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Customer Master</a> -->
								<a href="<?= base_url('admin/Country') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Country</a>
								<a href="<?= base_url('admin/State') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> State</a>
								<a href="<?= base_url('admin/City') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> City</a>
								<a href="<?= base_url('admin/Area') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Area</a>

								 <a href="<?= base_url('admin/Phase') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Phase master</a>
								<!--<a href="<?= base_url('admin/Status') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Status master</a> -->
								<a href="<?= base_url('admin/Source') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i>Inquiry Source master</a>
								<!-- <a href="<?= base_url('admin/Staff') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i> Staff master</a> -->
                                <a href="<?= base_url('admin/LeadStage') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i>Lead Stage</a>
                                <a href="<?= base_url('admin/LeadFormMaster') ?>" class="dropdown-item"><i class="fe-bookmark me-1"></i>Lead Form Master</a>
							</div>
						</li>

						<li>
							<a class="nav-link" href="<?= base_url('admin/Formmaster') ?>" id="topnav-dashboard">
								<i class="fe-bookmark me-1"></i>Form Master
							</a>

						</li>
						<li>
							<a class="nav-link" href="<?= base_url('admin/Customermaster') ?>" id="topnav-dashboard">
								<i class="fe-bookmark me-1"></i> Customer Master
							</a>

						</li>
						<li>
							<a class="nav-link" href="<?= base_url('admin/Staff') ?>" id="topnav-dashboard">
								<i class="fe-bookmark me-1"></i> Team Master
							</a>

						</li>
						<li>
							<a class="nav-link" href="<?= base_url('admin/Agentmaster') ?>" id="topnav-dashboard">
								<i class="fe-bookmark me-1"></i> Channel Partner
							</a>

						</li>
						<!-- <li>
							
							<a href="<?= base_url('admin/Customermaster') ?>" class="dropdown-item">
								<i class="fe-bookmark me-1"></i> Customer Master
							</a>

						</li> -->


					</ul> <!-- end navbar-->
				</div> <!-- end .collapsed-->
			</nav>
		</div> <!-- end container-fluid -->
	</div> <!-- end topnav-->
