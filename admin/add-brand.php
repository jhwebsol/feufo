<?php include("includes/css.php");?>
<?php if (isset($_POST['submit'])) {
	//var_dump($_POST);exit();
extract($_POST);
    $tmp_file = $_FILES['gallery_image']['tmp_name'];
    $ext = pathinfo($_FILES["gallery_image"]["name"], PATHINFO_EXTENSION);
    $rand = md5(uniqid().rand());
    $gimg = $rand.".".$ext;
    move_uploaded_file($tmp_file,"img/partners/".$gimg);
    
$sql="INSERT into es_brand(name,image) values ('$gallery_image_name','$gimg')";
//echo $sql; exit();
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='add-brand.php'</script>";
}
}
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["g_id"];
	$sql1 ="UPDATE  es_brand  SET name='$gname' WHERE id='$id'"; 
	$res=mysqli_query($conn,$sql1) or die(mysqli_error());

	if($res){
	$sqlg = "SELECT * from es_brand where id = $id";
	  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
	  $resg = mysqli_fetch_object($resultg);

		 if($_FILES["gallery_image"]["name"] != ""){
		$oname=$_FILES["gallery_image"]["name"];
		$pos = strrpos($oname, ".");
		$extension=substr($oname,$pos+1);
		$tn = $_FILES["gallery_image"]["tmp_name"];
		$path = "img/partners/".$resg->id.'.'.$extension;
		$upath = "img/partners/".$resg->image;
		unlink($upath);
		move_uploaded_file($tn,$path);
		 $image = $resg->id.'.'.$extension;
		} else {
		  $image = $resg->image;
		}

		$sqlup = "UPDATE es_brand SET  image='$image' WHERE  id = $resg->id";
		$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
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
					<div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Partners</h3>
							</div> 
							<div class="box-body table-responsive">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>S.No</th>
											<!-- <th>Category Name</th> -->
											<th>Image Name</th>
											<th>Images</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody> 
										<?php
									$sql="select * from es_brand ";
									$result = mysqli_query($conn, $sql);
                                    $j=1;
									while($res= mysqli_fetch_array($result))
									{ 
									?>
										<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['name']; ?></td> 
												<td><img src="img/partners/<?php echo $res['image']; ?>" class="img-responsive" style="width:50px" alt=""> </td>
											<td><input type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success edit_data" /></td> 
											 <td><a href="javascript:delete_gall_by_ID('<?php echo $res['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
										</tr>  
									<?php } ?>
										
									</tbody>
								</table>
							</div> 
						</div>
					</div>
					<div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Add Partners</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									
									<div class="form-group">
										<label> Name :</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="gallery_image_name" class="form-control" placeholder="Enter Name">
										</div>
									</div> 
									<div class="form-group">
										<label>Brand Image :(Size: 180px X 110px)</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="gallery_image" class="form-control" placeholder="Choose Images">
										</div>
									</div> 

									<div class="form-group">
										<div class="input-group">
											<input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				</div>
				<!-- Modal Category --> 
				<div id="add_data_Modal" class="modal fade">  
					<div class="modal-dialog">  
						<div class="modal-content">  
							<div class="modal-header">  
								 <button type="button" class="close" data-dismiss="modal">&times;</button>  
								 <h4 class="modal-title">Update Partners</h4>  
							</div>  
							 <form method="post" enctype="multipart/form-data">  
								<div class="modal-body">                      
								
									<div class="form-group">
										<label> Name :</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="gname" id="gname" class="form-control" placeholder="Enter Name">
										</div>
									</div> 
									<div class="form-group">
										<label> Image :(Size: 180px X 110px) </label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="gallery_image" class="form-control" placeholder="Choose Images">
										</div>
									</div>                  
								</div>  
								 <input type="hidden" name="g_id" id="g_id" />
								<div class="modal-footer">                  	 
									<input type="submit" name="update" id="insert" value="Update" class="btn btn-success" />  
								 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
							</div> 
							 </form>   
						</div>  
					</div>  
				</div>  
			<!-- ./Modal Category -->
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
<script language="javascript">

 $(document).ready(function(){  
     
      $(document).on('click', '.edit_data', function(){  
           var g_id = $(this).attr("id");  
           $.ajax({  
                url:"edit_es_brand.php",  
                method:"POST",  
                data:{g_id:g_id},  
                dataType:"json",  
                success:function(data){  
                    /* $('#gallery_cat').val(data.gallery_cat_id); */
                     $('#gname').val(data.name); 
                     $('#g_id').val(data.id); 
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
     
 });  


function delete_gall_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_brand.php?id=' + id;
	}
}
</script>
</body> 
</html>