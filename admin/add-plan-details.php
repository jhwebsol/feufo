<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$data = htmlentities($_POST['features']);
$datas = mysqli_real_escape_string($conn,$data);
 if(count($_POST["plan_text"]) > 0)  {
        for($i = 0; $i < count($_POST["plan_text"]); $i++){
        $plan_text = mysqli_real_escape_string($conn,$_POST['plan_text'][$i]);
        $sql_spl="INSERT into plan_details(created_date,plan_text) values ('$date','$plan_text')";
        $spl_res=mysqli_query($conn, $sql_spl) or die(mysqli_error());
       }
    }
    echo "<script>window.location.href='plan-details.php'</script>";
} ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					 
					<div class="col-xs-12">
						<div class="box box-danger">
							<div class="box-header">
								<div class="row">
									<div class="col-md-10"><h3 class="box-title">Add Plan Details</h3></div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom"> 			 
									<form action=""  method="post" enctype="multipart/form-data">
										<div><div id="dynamic_field">
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Plan Text</label>
														<input class="form-control" placeholder="Enter Plan Text" name="plan_text[]" type="text" value="">
													</div>
												</div> 
											</div>
											<div class="clearfix"></div>
											<button type="button" id="add" class="btn btn-primary float-right">+Add More</button>
										</div>
											<div class="col-md-4">			
												<div class="form-actions" style="margin-top:30px;"> 
													<button  type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i> Submit</button>
												</div>
											</div>
										</div>
									</form>
								</div> 
							</div>							
						</div>						
					</div>					
				</div>				
			</section>			
		</div>		
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?>
	<script>
     $(document).ready(function() {
			var i = 1;
			$('#add').click(function() {
				i++;
				 $('#dynamic_field').append('<div id="row'+i+'" class="cdy"><div><strong>Plan Text:</strong><br /><input type="text" name="plan_text[]" class="form-control name_list" style="width:90%;float:left;"/></div><div style="width:5%; margin-left:20px;float:right;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div><div class="clearfix"></div><hr/>'); 
			});
			$(document).on('click', '.btn_remove', function() {
				var button_id = $(this).attr("id");
				$('#row' + button_id + '').remove();
			});
			$('#submit').click(function() {
				$.ajax({
					url: "add-product.php",
					method: "POST",
					data: $('#add_name').serialize(),
					success: function(data) {
						alert(data);
						$('#add_name')[0].reset();
					}
				});
			});
		});
	</script>
	</body>
</html>