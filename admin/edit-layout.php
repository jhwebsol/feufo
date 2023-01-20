<?php include("includes/db_config.php");
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["id"];
$area_no = mysqli_real_escape_string($conn,$_POST['area_no']);
  $plot_no = mysqli_real_escape_string($conn,$_POST['plot_no']);
  $width = mysqli_real_escape_string($conn,$_POST['width']);
  $height = mysqli_real_escape_string($conn,$_POST['height']);
$sql ="UPDATE  layout  SET plot_no='$plot_no',area_no='$area_no',width='$width',height='$height' WHERE id='$id'";
$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($res)
{
     echo "<script>document.location.href='layout-details.php'</script>";
}
}

?>

<!DOCTYPE html>  
<html lang="en-IN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
   <title>Feufo</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include("includes/css.php")?>
</head>

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
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Edit Layout Details</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
									<?php $id=$_GET["id"];
								$sql="select * from layout  where layout.id='$id'";
								$result = mysqli_query($conn, $sql); 
									$res= mysqli_fetch_array($result); ?>
										
										
										<div class="col-md-4">
											<label>Plot No</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="plot_no" value="<?php echo $res['plot_no']; ?>" class="form-control" placeholder="Enter Service Title ">
												
											</div>
										</div>
									
										<div class="col-md-4">
											<label>Area  No</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="area_no" value="<?php echo $res['area_no']; ?>" class="form-control" placeholder="Enter Area  No ">
											</div>
										</div>
									
										<div class="col-md-4">
											<label>Width</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="width" value="<?php echo $res['width']; ?>" class="form-control" placeholder="Enter Width">
												
											</div>
										</div>
								
									<div class="col-md-4">
											<label>Height</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="height" value="<?php echo $res['height']; ?>" class="form-control" placeholder="Enter Height">
											</div>
										</div>
								
									</div>
									<div class="clearfix"></div>
									<div class="col-md-4 mt-20">
										<div class="form-group">
												<input type='hidden' name='id' value="<?php echo $_GET['id']?>" />
											<input type="submit" name="update" class="btn btn-success btn-md" value="Update">
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
	<script type="text/javascript">
	$(document).ready(function(){
		    $('#cat_id').on('change', function(){
		        var cat_id = $(this).val();
		        if(cat_id){
		            $.ajax({
		                type:'POST',
		                url:'ajax_get_subsub_cat.php',
		                data:'cat_id='+cat_id,
		                success:function(html){
		                    $('#sub_cat').html(html);
		                   // console.log(html);
		                   // $('#city').html('<option value="">Select Division</option>'); 
		                }
		            }); 
		        }
		    });

		    	$('#sub_cat').on('change', function(){
		        var scat_id = $(this).val();
		        if(scat_id){
		            $.ajax({
		                type:'POST',
		                url:'ajax_get_subsub_cat.php',
		                data:'scat_id='+scat_id,
		                success:function(html){
		                    $('#subsub_cat').html(html);
		                }
		            }); 
		        }
		    });
        });
</script>
</body>
</html>