<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["id"];
$sql1 ="UPDATE  faq SET title='$title',desp='$data' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if ($res) {
	 echo "<script>window.location.href='faq.php'</script>";
 }
}
?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header with-border"> 
									<h3 class="box-title">Edit Faq Details</h3> 
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<form method="post" action="">
									<div class="form-group"> 
										  <?php  $id=$_GET['id'];
                                 $sql2="select * from faq where id='$id'";
                                                    $exe2=mysqli_query($conn,$sql2);
                                                
                                                   $row=mysqli_fetch_array($exe2); ?>

                                                   <input type="hidden" value="<?php echo $row['id'];?>" class="form-control" name="id" id="id">
										<div class="col-md-12">
											<label>Question:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea class="form-control" name="title" placeholder="Enter Question"><?php echo $row['title'];?></textarea>
											</div>
										</div> 
										 
										<div class="col-md-12">
											<label>Answer:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												
												<textarea name="data" class="" id="summernote" rows="2"  style="height:200px"><?php echo $row['desp'];?> </textarea>
											</div>
										</div> 
										<div class="clearfix"></div> 
										<div class="col-md-2">
											<input type="submit" name="update" class="btn btn-success btn-md btn-search mt-30" value="Update">
											</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
</body>

</html>
