
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<div class="navbar-minimize">
							<button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
								<i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
								<i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
							</button>
						</div>
						<a class="navbar-brand" href="#pablo">Dashboard</a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end">

						<ul class="navbar-nav" style="margin-right: 20px;">

							<li class="nav-item dropdown">
								<a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: url(<?=@BASE?>src/images/users/<?=@UIMG?>) center center; background-size: cover;width: 45px; height: 45px; border: 2px solid #fff; border-radius: 50%;">
									<p class="d-lg-none d-md-block">
										Account
									</p>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
									<a class="dropdown-item" href="#">Profile</a>
									<a class="dropdown-item" href="#">Settings</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="?action=sign-out">Log out</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav> <!-- End Navbar -->

<?php
	// ============== Sign Out ============
	if (@$_GET['action']=='sign-out'){
		header ('Location: '.BASE.'auth/login.php');
		session_destroy();
	}
?>