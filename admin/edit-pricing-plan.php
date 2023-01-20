<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_GET['id'];
$data=$_POST['plan_txt'];
$names_str = implode(",",$data);
$sql1 ="UPDATE  plan_pricing SET plan_name='$plan_name',duration='$duration',plan_price='$plan_price',plan_text='$names_str',plan_color='$plan_color' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
 echo "<script>window.location.href='pricing-plan.php'</script>";
} }
?>

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
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
									<div class="col-md-10"><h3 class="box-title">Edit Pricing Plan Details</h3></div>
									
								</div>
							</div>
							<?php $id=$_GET['id'];
							$sql2="SELECT * from plan_pricing where id='$id'";
					            $exe2=mysqli_query($conn,$sql2);
					            $res=mysqli_fetch_array($exe2)?>
								
							<div class="box-body">
								<div class="nav-tabs-custom"> 			 
									<form action=""  method="post" enctype="multipart/form-data">
										<div>
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Plan Name</label>
														<input class="form-control" placeholder="Enter Plan Name" name="plan_name" type="text" value="<?php echo $res['plan_name']; ?>">
													</div>
												</div> 
											 
												<div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Plan Price</label>
														<input class="form-control" placeholder="Enter Plan Price" name="plan_price" type="text" value="<?php echo $res['plan_price']; ?>">
													</div>
												</div>  	
												<div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Duration</label>
														<input class="form-control" placeholder="Enter Plan Duration" name="duration" type="text" value="<?php echo $res['duration']; ?>">
													</div>
												</div>  	
												<div class="col-md-6">
													<div class="form-group">
														<label for="first_name">Select Color</label>
														<input class="form-control" placeholder="Enter Plan Color" name="plan_color" type="color" value="<?php echo $res['plan_color']; ?>">
													</div>
												</div> 
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
													<label for="desp" class="control-label">Price Table</label>
														<?php $plid=$res['id'];
														$sqltt="select * from plan_details ";
														$resultp = mysqli_query($conn, $sqltt);
														while($resp= mysqli_fetch_array($resultp)){
														$pid=$resp['id'];	
														$sqlprs="SELECT * from plan_pricing where id='".$plid."' and plan_text like '%$pid%'";
					                                    $results=mysqli_query($conn,$sqlprs);
					                                    $resv= mysqli_fetch_array($results);?>	
													<input name="plan_txt[]" type="checkbox" value="<?= $resp['id'];?>" <?php if (mysqli_num_rows($results) > 0){ echo "checked"; } ?>>	<?= $resp['plan_text'];?> <br/><?php } ?>
													</div>
												</div>	
											</div>
											<div class="col-md-4">			
												<div class="form-actions"> 
													<button  type="submit" name="update" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i>Update</button>
												</div>
											</div>
										</div>
									</form>
								</div> 
							</div>							
						</div>					
					</div>
					<!-- /.col -->
					</div>				
			</section>			
		</div>		
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?> 
	</body>
</html>