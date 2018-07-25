<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="shortcut icon" href="templates/img/favicon.ico">
		<title>Login - SMAS DIPONEGORO MOJOKERTO</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<script type="text/javascript" src="templates/js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="templates/js/validation.min.js"></script>
		<!-- Bootstrap CSS -->
		<link href="<?php echo BASE_URL;?>templates/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		<!-- Login CSS -->
		<link href="<?php echo BASE_URL;?>templates/css/main.css" rel="stylesheet" />

		<!-- Ion Icons -->
		<link href="<?php echo BASE_URL;?>templates/fonts/icomoon/icomoon.css" rel="stylesheet" />
	</head>
	<body class="login-bg">
		<form id="login-form">
			<div class="login-wrapper">
				<div class="login">
					<div class="login-header">
						<div class="logo">
							<img src="<?php echo BASE_URL;?>templates/img/logoll.png" alt="Bluemoon Admin Dashboard Logo" />
						</div>
						<h5>Login to access to your dashboard.</h5>
					</div>
					<form id="login-form" method= "post" action="#">
					<div class="login-body">
						<div id="error">
							<!-- error will be shown here ! -->
						</div>
						<div class="form-group">
							<label for="username">NISN / Email</label>
							<input id="username" type="text" name="username" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="Password">Password</label>
							<input id="password" name="password" type="password" class="form-control" placeholder="Password">
						</div>
						<button class="btn btn-danger btn-block" id="btn-login" type="submit"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In</button>
					</div>
					</form>
				</div>
				<p>Belum Daftar? <a href="<?php echo BASE_URL ?>register">Daftar Sekarang</a></p>
			</div>
		</form>
		<script>

			$('document').ready(function(){ 
				 /* validation */	
				$("#login-form").submit(function(e){
					event.preventDefault();
					if($('#UserId').val() == ""){  
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; Harap Isi Semua!</div>');
					}else if($('#password').val() == "" ){
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; Harap Isi Semua!</div>');			
					}else{
						$.ajax({
							type : 'POST',
							url  : 'doLogin.php',
							data : $("#login-form").serialize(),
							dataType:"json", 
							cache: false,
							beforeSend: function(){	
								$("#error").fadeOut();
								$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
							},
							success: function(response){						
									if(response.apikey){
										$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-transfer"></span> &nbsp; Akan Dialihkan!!</div>');
										$("#btn-login").html('Signing In ...');
										setTimeout('window.location.href = "index.php?page=dashboard"; ',4000);
									}
									else{
										$("#error").fadeIn(1000, function(){						
											$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; '+response.result+'!</div>');
											$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
										});
									}
							}
							
						});
						return false;
					}
				})
			});
		</script>
	</body>
</html>