<?php include("includes/css.php");
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["id"];
$desp = htmlentities($_POST['desp']);
$sql ="UPDATE  service_details  SET title='$serv_title',description='$desp' WHERE id='$id'";
$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($res)
{
$sqlg = "SELECT * from service_details where id = $id";
  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
  $resg = mysqli_fetch_object($resultg);
  if($_FILES["image"]["name"] != ""){
	$oname=$_FILES["image"]["name"];
	$pos = strrpos($oname, ".");
	$extension=substr($oname,$pos+1);
	$tn = $_FILES["image"]["tmp_name"];
	$path = "img/".$resg->id.'sr'.'.'.$extension;
	$upath = "img/".$resg->service_img;
	unlink($upath);
	 move_uploaded_file($tn,$path);
	 $service_img = $resg->id.'sr'.'.'.$extension;
	} else {
	  $service_img = $resg->service_img;
	}
  
$sqlup = "UPDATE service_details SET service_img =  '$service_img' WHERE id = $resg->id";
	$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error($conn));
	if($resultup)
	{
     echo "<script>document.location.href='service-detail.php'</script>";
    }		
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
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Edit Home Services</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
									<?php $id=$_GET["id"];
								$sql="select * from service_details where id='$id'";
								$result = mysqli_query($conn, $sql); 
									$res= mysqli_fetch_array($result); ?>
										<div class="col-md-4">
											<label> Title</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="serv_title" value="<?php echo $res['title']; ?>" class="form-control" placeholder="Enter Service Title ">
												<input type="hidden" name="old_serv_title" value="<?php echo $res['title']; ?>" >
											</div>
										</div>
										<div class="col-md-12">
											<label>description:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea id="summernote" name="desp" rows="2" placeholder="description "><?php echo $res['description']; ?></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<label>Service Images  :</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="File" name="image" class="form-control">
												<br/><img src="img/<?php echo $res['service_img'];?>" width="80px" style="margin-top:10px;margin-left:10px">
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