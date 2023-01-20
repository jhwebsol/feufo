<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.id=".$id;
$result = mysqli_query($conn, $sql);

if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["pid"];
$sqlg = "SELECT * from slider_img where id = $id";
  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
  $resg = mysqli_fetch_object($resultg);
  if($_FILES["img"]["name"] != ""){
	$oname=$_FILES["img"]["name"];
	$pos = strrpos($oname, ".");
	$extension=substr($oname,$pos+1);
	$tn = $_FILES["img"]["tmp_name"];
	$path = "img/banner/".$resg->id.'.'.$extension;
	$upath = "img/banner/".$resg->image;
	unlink($upath);
	 move_uploaded_file($tn,$path);
	  $image = $resg->id.'.'.$extension;
	} else {
	  $image = $resg->image;
	}
$sqlup = "UPDATE slider_img SET image ='$image' WHERE id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
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
									<div class="col-md-4">
										<h3 class="box-title">View Slider Image</h3>
									</div>
									<div class="col-md-1 pull-right"><a href="slider.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a> </div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead></thead>
											<tbody>
												<?php $sql_prd=mysqli_query($conn,"select * from slider_img");
                                                            while($resimg= mysqli_fetch_array($sql_prd)){  ?>
												<tr>
													<th>Images:</th>
													<td colspan="3"> <a href="" data-toggle="modal" data-target="#myModal"><img src="img/banner/<?= $resimg['image']; ?>" width="140px"></a></td>
													<th>Edit:</th>
													<td colspan="3"><input type="button" name="edit" value="Edit" id="<?php echo $resimg["id"]; ?>" class="btn btn-md btn-primary edit_data" />
                                                                 </td>
												</tr>
											    <?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="4"><a href="slider.php"><button class="btn btn-flat btn-custom2 btn-md"><i class="fa fa-backward"></i> Back</button></a></td>
												</tr>
											</tfoot>
										</table> 
									</div>
								</div>
							</div>							
						</div>						
					</div>					
				</div>				
			</section>
			 <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Slider</h4>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="img" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <!--  <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option for="">Active</option>
                                                <option for="">Inactive</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="pid" id="pid" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="update" id="insert" value="Update" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>		
		</div>		
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?>
	<script language="javascript">
 $(document).ready(function(){  
      $(document).on('click', '.edit_data', function(){  
           var pid = $(this).attr("id");  
           $.ajax({  
                url:"edit_slimg.php",  
                method:"POST",  
                data:{pid:pid},  
                dataType:"json",  
                success:function(data){ 
                console.log(data); 
                     $('#pid').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
     
 });  
</script>

</body>
</html>
