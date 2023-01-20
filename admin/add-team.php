<?php include("includes/css.php");
if (isset($_POST['submit'])) {
  extract($_POST);
   date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
   $tmp_file = $_FILES['timage']['tmp_name'];
    $ext = pathinfo($_FILES["timage"]["name"], PATHINFO_EXTENSION);
    $rand = md5(uniqid().rand());
    $image1 = $rand.".".$ext;
    move_uploaded_file($tmp_file,"img/".$image1);

$sql_qry="insert into team(name,designation,desp,image) values ('$name','$designation','$desp','$image1')";
$res=mysqli_query($conn,$sql_qry);
if($res){
    echo "<script>window.location.href='team.php'</script>";
 }
 
}
 ?>
 <?php include("includes/css.php"); ?>
 <body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
   			<?php include("includes/header.php");?>
    		<?php include("includes/sidebar.php");?>
    		<div class="content-wrapper">
	            <div class="col-md-8">
	            	<section class="content-header">
	               		 <a href="team.php" class="btn btn-md btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Staff</a>
		            </section>
		            <section class="content">
		                <div class="box box-danger gurnew">
		                    <div class="box-header py-3">
		                        <h6 class="m-0 font-weight-bold text-primary">Staff Form</h6>
		                    </div>
		                    <div class="box-body table-responsive">
								<div class="nav-tabs-custom"> 			 
									<form action=""  method="post" enctype="multipart/form-data">	 
												<div class="col-md-12">
													<div class="form-group">
														<label for="first_name">Name</label>
														<input class="form-control" placeholder="Enter Full Name" name="name" type="text" value="">
													</div>
												</div>  
												<div class="col-md-6">
													<div class="form-group">
													<label for="desp" class="control-label">Email</label>
														<input type="email" class="form-control" placeholder="Enter email" name="email" />
													</div>
												</div>	
												 <div class="col-md-6">
													<div class="form-group">
														<label for="pwd">Password</label>
														<input class="form-control" placeholder="Enter Password" name="pwd" type="password" value="">
													</div>
												</div> 
												<div class="col-md-6">
													<div class="form-group">
														<label for="acontact_no" class="control-label">Image (Size: 500px X 500px)</label>
														<input class="form-control" placeholder="Alternate Contact Number" name="timage" type="file" value="">
													</div>
												</div> 
												<div class="col-md-6">
													<div class="form-group">
														<label for="Author">Author</label>
														<input class="form-control" placeholder="Enter Author" name="author" type="text" value="">
													</div>
												</div>  
												 <div class="col-md-12">
		                                       		 <div class="form-group">
			                                            <label> Status</label>
			                                            <select class="form-control">
			                                                <option>Active</option>
			                                                <option>InActive</option>
			                                            </select>
			                                        </div>
		                                   		</div> 
											
												<div class="col-md-4">			
													<div class="form-actions"> 
														<button  type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i> Save</button>
													</div>
												</div>
										 
									</form>
								</div> 
							</div> 
						</div>
						</section> 
 		</div> 
 		</div> 
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?> 
	</body>
</html>