/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$('document').ready(function(){ 
     /* validation */
	$("#register-form").submit(function(e){
	
	})	
	$("#login-form").submit(function(e){
		event.preventDefault();
		if($('#UserId').val() == ""){  
			$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; Harap Isi Semua!</div>');
		}else if($('#password').val() == "" ){
			$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-warning-sign"></span> &nbsp; Harap Isi Semua!</div>');			
		}else{
			$.ajax({
				type : 'POST',
				url  : 'api.php',
				data : $("#login-form").serialize(),
				dataType:"json", 
				cache: false,
				beforeSend: function(){	
					$("#error").fadeOut();
					$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success: function(response){						
						if(response.status==true){
							$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-transfer"></span> &nbsp; Akan Dialihkan!!</div>');
							$("#btn-login").html('Signing In ...');
							setTimeout('window.location.href = "dashboard.php"; ',4000);
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