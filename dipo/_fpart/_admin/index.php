<?php 
include_once("vendor/_config.php");
include_once("vendor/db_config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="shortcut icon" href="<?php echo DIR_ADMIN;?>/img/favicon.ico">
		<title>Login - SMAS DIPONEGORO MOJOKERTO</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<script type="text/javascript" src="<?php echo DIR_ADMIN;?>/js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo DIR_ADMIN;?>/js/validation.min.js"></script>
		<!-- Bootstrap CSS -->
		<link href="<?php echo DIR_ADMIN;?>/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<!-- Login CSS -->
		<link href="<?php echo DIR_ADMIN;?>/css/main.css" rel="stylesheet" />

		<!-- Ion Icons -->
		<link href="<?php echo DIR_ADMIN;?>/fonts/icomoon/icomoon.css" rel="stylesheet" />
	</head>
	<body class="login-bg">
		<form id="login-form">
			<div class="login-wrapper">
				<div class="login">
					<div class="login-header">
						<div class="logo">
							<img src="img/logoll.png" alt="Bluemoon Admin Dashboard Logo" />
						</div>
						<h5>Login to access to your dashboard.</h5>
					</div>
					<form id="login-form">
					<div class="login-body">
						<div id="error">
							<!-- error will be shown here ! -->
						</div>
						<input id="do" type="hidden" name="do" class="form-control" value="login">
						<div class="form-group">
							<label for="username">NISN</label>
							<input id="username" type="text" name="username" class="form-control" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="Password">Password</label>
							<input id="password" name="password" type="password" class="form-control" placeholder="Password">
						</div>
						<button class="btn btn-danger btn-block" id="btn-login" type="submit"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In</button>
					</div>
					</form>
				</div>
				<p>Belum Daftar? <a href="daftar">Daftar Sekarang</a></p>
			</div>
		</form>
		<script type="text/javascript" src="<?php echo DIR_ADMIN;?>/js/customs.js"></script>
	</body>
</html>