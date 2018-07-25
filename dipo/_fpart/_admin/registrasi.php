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
		<div id="login-form">
			<div class="login-wrapper">
				<div class="login">
					<div class="login-header">
						<div class="logo">
							<img src="img/logoll.png" alt="Bluemoon Admin Dashboard Logo" />
						</div>
						<h5 id="header_text">Daftar Dengan Nomor NISN</h5>
					</div>
					<form id="register-form">
					<div class="login-body">
						<div id="error">
							<!-- error will be shown here ! -->
						</div>
						<input id="do" type="hidden" name="do" class="form-control" value="register">
						<div id="step">
						<div class="form-group">
							<label for="username">NISN</label>
							<input id="no_nisn" type="number" name="no_nisn" class="form-control" placeholder="Nomer NISN">
                        </div>
						<div class="form-group">
							<label for="Tempat lahir">Tempat lahir</label>
							<input id="tempat_lahir" type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                        </div>
						<div class="form-group">
							<label for="Email">Email</label>
							<input id="email" type="email" name="email" class="form-control" placeholder="Email">
                        </div>
						<div class="form-group">
							<label for="Password">Password</label>
							<input id="password" type="password" name="password" class="form-control" placeholder="Password">
                        </div>
						<button name="btn_register" id="btn_register" type="button" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-check"></span> &nbsp; Daftar</button>
					</div>
					</form>
				</div>
				<p>Sudah Daftar? <a href="login">Log In Sekarang</a></p>
			</div>
		</form>
		<script>
		$('document').ready(function(){
			event.preventDefault();
			$(document).on('click',"#btn_register", function () {
				if($('#no_nisn').val() != ""){
					var values = $('#register-form').serialize();
					$.ajax({
						type : 'POST',
						url  : 'api.php',
						data : values,
						dataType:"json", 
						cache: false,
						beforeSend: function(){	
							$("#error").fadeOut();
							$("#btn_check_nisn").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
						},
						success: function(response){
							if(response.status==true){
								$('#do').val("register");
								$('#header_text').html("Registrasi Sukses");
								$('#step').html('<div class="form-group"><label>Nama: '+response.result.nama+'</label><label>Tanggal Lahir: '+response.result.tgl_lahir+'</label><label>Tempat Lahir: '+response.result.tmpt_lahir+'</label><label>Jenis Kelamin: '+response.result.jenis_kelamin+'</label></div><div class="form-group"><label>Email</label><input id="email" type="email" name="email" class="form-control" value="" placeholder="Email"></div><label>Password</label><input id="password" type="password" name="password" class="form-control" value="" placeholder="Password"></div><button class="btn btn-primary btn-block" id="btn-register" name="btn-register" type="submit"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Lanjutkan</button><button class="btn btn-danger btn-block" id="btn-cancel" type="submit"><span class="glyphicon glyphicon-remove"></span> &nbsp; Cancel</button>');
							}else{
								$("#error").fadeIn(1000, function(){						
									$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; '+response.result+'!</div>');
									$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
								});
							}
						}
					});
				}else{
					$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; Harap Isi No NISN!</div>');
				}
			});
		});
		</script>
	</body>
</html>