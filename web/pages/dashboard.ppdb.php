	<!-- Dashboard wrapper starts -->

	<div class="dashboard-wrapper">
		<!-- Top bar starts -->
			<div class="top-bar clearfix">
				<div class="row gutter">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="page-title">
							<h4><?php echo $_GET['page']?></h4>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<ul class="right-stats" id="mini-nav-right">
							<li>
								<a onclick="printJS({ printable: 'kartu', type: 'html' })" class="btn btn-success"><span class='icon-print'></span>PRINT</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<!-- Top bar ends -->
		<div class="main-container">
			<div class='row gutter' id='htmldata'>
			</div>
		</div>
	</div>
	<!-- Dashboard wrapper End -->
	<script>
	$(document).ready(function(){  
		
		function fetch_data()  
			  {  
				   $.ajax({  
						url  : '<?php echo BASE_URL?>/module/dashboard.php',
						method:"GET", 
						dataType:"text", 						
						success:function(data){  
							 $('#htmldata').html(data);
						}  
				   });  
			  } 
		fetch_data();

	});
	</script>
	