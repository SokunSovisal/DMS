
		<!-- Sidebar -->
		<div class="sidebar" data-color="azure" data-background-color="black" data-image="<?=@BASE?>dist/img/sidenav4.jpg">

			<!-- data-color="purple | azure | green | orange | danger"
				   data-image="Image Background"
				   data-background-color="black | white | red " -->

			<!-- Sidebar Header -->
			<div class="logo">
				<a href="<?=@BASE?>" class="simple-text logo-mini">
					<small>BSS</small>
				</a>
				<a href="<?=@BASE?>	" class="simple-text logo-normal">
					SYSTEM
				</a>
			</div>

			<!-- Accoun sidebar -->
			<div class="sidebar-wrapper">
				
				<!-- Sidebar Item -->
				<ul class="nav">

					<!-- Active & No sub -->
					<li class="nav-item <?=(@$m=='dashboard')?'active':''?>">
						<a class="nav-link" href="<?=@BASE?>">
							<i class="material-icons">dashboard</i>
							<p> Dashboard </p>
						</a>
					</li> <!-- Nav Item -->

					<!-- Normal & No sub -->
					<li class="nav-item">
						<a class="nav-link" href="#">
							<i class="material-icons">home</i>
							<p> Testing </p>
						</a>
					</li> <!-- Nav Item -->

					
					
					<!-- With Sub -->
					<li class="nav-item ">
						<a class="nav-link" data-toggle="collapse" href="#users-nav">
							<i class="material-icons">people</i>
							<p> User Management
								<b class="caret"></b>
							</p>
						</a>
						<!-- With Sub -->
						<div class="collapse <?=(@$m=='manage_users')?'show':''?>" id="users-nav">
							<ul class="nav">

								<!-- sub menu -->
								<li class="nav-item <?=(@$sm=='users')?'active':''?>">
									<a class="nav-link" href="<?=@BASE?>users/">
										<span class="sidebar-mini"> <i class="fa fa-user"></i> </span>
										<span class="sidebar-normal"> User </span>
									</a>
								</li>

								<!-- sub menu normal -->
								<li class="nav-item <?=(@$sm=='user_permission')?'active':''?>">
									<a class="nav-link" href="<?=@BASE?>permission/">
										<span class="sidebar-mini"> <i class="fa fa-user-graduate"></i> </span>
										<span class="sidebar-normal"> User Permission </span>
									</a>
								</li>

								<!-- sub menu normal -->
								<li class="nav-item <?=(@$sm=='user_roles')?'active':''?>">
									<a class="nav-link" href="<?=@BASE?>roles/">
										<span class="sidebar-mini"> <i class="fa fa-user-cog"></i> </span>
										<span class="sidebar-normal"> User Role </span>
									</a>
								</li>
							</ul>
						</div>
					</li> <!-- Nav Item -->

				</ul>
			</div>
		</div>