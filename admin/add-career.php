<?php include("includes/css.php");
if (isset($_POST['submit'])) {
  extract($_POST);
   date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
   $tmp_file = $_FILES['timage']['tmp_name'];
    $ext = pathinfo($_FILES["timage"]["name"], PATHINFO_EXTENSION);
    $rand = md5(uniqid().rand());
    $image1 = $rand.".".$ext;
    move_uploaded_file($tmp_file,"img/document/".$image1);

$sql_qry="insert into career_detail(job_title,desp,image) values ('$name','$desp','$image1')";
$res=mysqli_query($conn,$sql_qry);
if($res){
    echo "<script>window.location.href='career_detail.php'</script>";
 }
 
}
 ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<section class="content">
				<div class="row">					 
					<div class="col-xs-12">
						<div class="box box-danger">
							<div class="box-header">
								<div class="row">
									<div class="col-md-10"><h3 class="box-title">Add Career Details</h3></div>
									
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom"> 			 
									<form action=""  method="post" enctype="multipart/form-data">
										<div>
											<div class="row">	
												<div class="col-md-12">
													<div class="form-group">
														<label for="first_name">Job Title</label>
														<input class="form-control" placeholder="Enter Job Title" name="name" type="text" value="">
													</div>
												</div> 
											</div>
											
											<!-- <div class="row">
												<div class="col-md-12">
													<div class="form-group">
													<label for="desp" class="control-label">Designation</label>
														<input type="text" class="form-control" placeholder="Enter Designation" name="designation" />
													</div>
												</div>	
											</div> -->
											
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
													<label for="desp" class="control-label">Description</label>
														<textarea class="form-control" id="summernote"  placeholder="Enter Description" name="desp"></textarea>
													</div>
												</div>	
											</div>
											
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="acontact_no" class="control-label">Image</label>
														<input class="form-control" placeholder="Alternate Contact Number" name="timage" type="file" value="">
													</div>
												</div>	
											</div>
												 
											<div class="col-md-4">			
												<div class="form-actions"> 
													<button  type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i> Create</button>
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
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script> 
      $('#summernote').summernote({
         tabsize: 10,
        height: 300
      });
    </script> 

	</body>
</html>