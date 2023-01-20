<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST); 
$id=$_GET['id'];
$sql1 ="UPDATE  team SET name='$name',desp='$desp',designation='$designation' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from team where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
	if($_FILES["timage"]["name"] != ""){
	$oname=$_FILES["timage"]["name"];
	$pos = strrpos($oname, ".");
	$extension=substr($oname,$pos+1);
	$tn = $_FILES["timage"]["tmp_name"];
	$path = "img/".$resg->id.'.'.$extension;
	$upath = "img/".$resg->image;
	unlink($upath);
	 move_uploaded_file($tn,$path);
	 $image_ban = $resg->id.'.'.$extension;
	} else {
	  $image_ban = $resg->image;
	}
    $sqlup = "UPDATE team SET image='$image_ban'
			 WHERE  id = $resg->id";
	$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
	    echo "<script>window.location.href='team.php'</script>";

}
}

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
									<div class="col-md-10"><h3 class="box-title">Edit Team Details</h3></div>
									
								</div>
							</div>
							<?php $id=$_GET['id'];
							$sql2="SELECT * from team where id='$id'";
					            $exe2=mysqli_query($conn,$sql2);
					            $res=mysqli_fetch_array($exe2)?>
								
							<div class="box-body">
								<div class="nav-tabs-custom"> 			 
									<form action=""  method="post" enctype="multipart/form-data">
										<div>
											<div class="row">	
												<div class="col-md-12">
													<div class="form-group">
														<label for="first_name">Name</label>
														<input class="form-control" placeholder="Enter Full Name" name="name" type="text" value="<?php echo $res['name']; ?>">
													</div>
												</div> 
											</div>
											
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
													<label for="desp" class="control-label">Designation</label>
														<input type="text" class="form-control" placeholder="Enter Designation" value="<?php echo $res['designation']; ?>" name="designation" />
													</div>
												</div>	
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
													<label for="desp" class="control-label">Description</label>
														<input type="text" class="form-control" placeholder="Enter Description" value="<?php echo $res['desp']; ?>" name="desp" />
													</div>
												</div>	
											</div>
											
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="acontact_no" class="control-label">ImageImage (Size: 500px X 500px)</label>
														<input class="form-control"  name="timage" type="file" value=""><br/>
														<img src="img/<?php echo $res['image']; ?>" width="60px">
													</div>
												</div>	
											</div>
												 
											<div class="col-md-4">			
												<div class="form-actions"> 
													<button  type="submit" name="update" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i> Update</button>
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
	</body>
</html>