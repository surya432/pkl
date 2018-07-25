<!-- Container fluid Starts -->
		<div class="container-fluid">

			<!-- Navbar starts -->
			<nav class="navbar navbar-default">
				<div class="navbar-header">
					<span class="navbar-text">Menu</span>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="collapse-navbar">
					<ul class="nav navbar-nav">
						<li id='dashboard'>
							<a href="<?php echo BASE_URL ?>?page=dashboard"><i class="icon-dashboard2"></i>Dashboard</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Pages <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href='<?php echo BASE_URL ?>?page=profile'>Profile</a>
								</li>
								<li>
									<a href='<?php echo BASE_URL ?>?page=profile-ortu'>Profile Orang Tua</a>
								</li>
								<li>
									<a href='<?php echo BASE_URL ?>?page=document'>Latters</a>
								</li>
								
							</ul>
						</li>
						<li>
							<a href="widgets.html"><i class="icon-widgets"></i>Widgets</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- Navbar ends -->