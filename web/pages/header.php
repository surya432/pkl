<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="Bluemoon Admin" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Wrapbootstrap, Bootstrap, C3 Graphs, D3 Graphs, NVD3 Graphs, Admin Skin, Black Admin Dashboard, Grey Admin Dashboard, Dark Admin Dashboard, Simple Admin Dashboard, Simple Admin Theme, Simple Bootstrap Dashboard, Invoice, Tasks, Profile" />
		<meta name="author" content="Srinu Basava" />
		<link rel="shortcut icon" href="img/favicon.ico">
		<title>Dashboard</title>
		
		<!-- Bootstrap CSS -->
		<link href="<?php echo BASE_URL_THEMES ?>/css/bootstrap.min.css" media="screen" rel="stylesheet" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<!-- Main CSS -->
		<link href="<?php echo BASE_URL_THEMES ?>/css/main.css" rel="stylesheet" media="screen" />

		<!-- Ion Icons -->
		<link href="<?php echo BASE_URL_THEMES ?>/fonts/icomoon/icomoon.css" rel="stylesheet" />
		
		<!-- Bar Indicator CSS -->
		<link href="<?php echo BASE_URL_THEMES ?>/js/barIndicator/barIndicator.css" rel="stylesheet" />

		<!-- Datepicker -->
		<link rel="stylesheet" href="<?php echo BASE_URL_THEMES ?>/css/datepicker.css" />

		<!-- C3 CSS -->
		<link href="<?php echo BASE_URL_THEMES ?>/css/c3/c3.css" rel="stylesheet" />
		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
	<!-- Header starts -->
		<header>

			<!-- Logo starts -->
			<a href="<?php echo BASE_URL?>" class="logo">
				<img src="<?php echo BASE_URL_THEMES ?>/img/logoll.png" alt="Bluemoon Admin" />
			</a>
			<!-- Logo ends -->

			<!-- Header actions starts -->
			<ul id="header-actions" class="clearfix">
				<li class="list-box user-admin dropdown">
					<div class="admin-details">
						<div class="name"><?php echo $_SESSION['nama']?></div>
						<div class="designation"><?php echo $_SESSION['nisn']?></div>
					</div>
					<a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-account_circle"></i>
					</a>
					<ul class="dropdown-menu sm">
						<li class="dropdown-content">
							<a href="<?php echo BASE_URL?>?page=profile">Edit Profile</a>
							<a href="<?php echo BASE_URL?>logout.php">Logout</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- Header actions ends -->
		</header>
		<!-- Header ends -->
		