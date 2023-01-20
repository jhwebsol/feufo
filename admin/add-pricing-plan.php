<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$data=$_POST['plan_txt'];
$names_str = implode(",",$data);
$sql_qry="insert into plan_pricing(plan_name,duration,plan_price,plan_text,plan_color) values ('$plan_name','$plan_duration','$price','$names_str','$plan_color')";
if(mysqli_query($conn, $sql_qry)) {
$last_id= mysqli_insert_id($conn);
    echo "<script>window.location.href='pricing-plan.php'</script>";
 }
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
									<div class="col-md-10"><h3 class="box-title">Add Partners Plan Details</h3></div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom"> 			 
									<form action=""  method="post" enctype="multipart/form-data">
										<div>
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Plan Name</label>
														<input class="form-control" placeholder="Enter Plan Name" name="plan_name" type="text" value="">
													</div>
												</div> 
												<div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Plan Price</label>
														<input class="form-control" placeholder="Enter Plan Price" name="price" type="text" value="">
													</div>
												</div> 
											</div>
											 <div class="row">	
												 <div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Plan Duration </label>
														<input class="form-control" placeholder="Enter Plan Duration" name="plan_duration" type="text" >
													</div>
												</div>
												 <div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Plan Color</label>
														<input class="form-control" placeholder="Enter Plan Duration" name="plan_color" type="color" >
													</div>
												</div>
											</div> 
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
													<label for="desp" class="control-label">Price Table</label>
														<?php $sql="select * from plan_details ";
														$result = mysqli_query($conn, $sql);$j=1;
														while($res= mysqli_fetch_array($result)){ ?>	
													<input name="plan_txt[]" type="checkbox" value="<?= $res['id'];?>">	<?= $res['plan_text'];?> <br/><?php } ?>
													</div>
												</div>	
											</div>
											<div class="clearfix"></div>
											<div class="col-md-4">			
												<div class="form-actions"> 
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
				 $('#dynamic_field').append('<div id="row'+i+'" class="cdy"><div><strong>Country:</strong><br /><input type="text" name="country[]" class="form-control name_list" /></div><div><strong>Country code:(2 letter only)</strong><br /><input type="text" name="code[]" class="form-control name_list" /></div><div><strong>Price:</strong><br /><input type="text" name="price[]" class="form-control name_list" /></div><div style="width:10%; margin-top:30px"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div><div class="clearfix"></div><hr/>'); 
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