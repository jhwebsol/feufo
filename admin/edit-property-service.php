<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select sub_category.sub_category_name,category.cat_name,property_services.* from property_services join category on property_services.category_id=category.id join sub_category on property_services.sub_category_id=sub_category.id where property_services.id='$id'";
$result = mysqli_query($conn, $sql); 

if(isset($_POST['update']))
{
extract($_POST);
$id=$_GET["id"];
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR']; 
$cat_id=$_POST["category"];
$subcat_id=$_POST["sub_category"];
$pdesp = mysqli_real_escape_string($conn,$_POST['property_desp']);
$property_desp = htmlentities($pdesp);
$sql ="UPDATE  property_services  SET category_id='$cat_id',sub_category_id='$subcat_id',sub_sub_cat_id='$sub_sub_category_id',prod_desp='$property_desp',title='$title',meta_keyword='$meta_keyword',created_date='$datetime',ip_address='$ip' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res)
{ 	$sqlg = "SELECT * from property_services where id = '$id'";
	$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
	$resg = mysqli_fetch_object($resultg);
	if($_FILES["img"]["name"] != ""){
	$oname=$_FILES["img"]["name"];
	$pos = strrpos($oname, ".");
	$extension=substr($oname,$pos+1);
	$tn = $_FILES["img"]["tmp_name"];
	$rand1 = md5(uniqid().rand());
	$path = "product/".$resg->id.$rand1.'.'.$extension;
	$upath = "product/".$resg->img;
	unlink($upath);
	move_uploaded_file($tn,$path);
	$image1 = $resg->id.$rand1.'.'.$extension;
	} else {
	$image1 = $resg->img;
	}
	$sqlup = "UPDATE property_services SET  img =  '$image1' WHERE id = $resg->id";
	$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
echo "<script>document.location.href='property-services.php'</script>";
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
								<h3 class="box-title">Edit Property Details</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<?php $res= mysqli_fetch_array($result);
										$sub_sub_cat_id=$res['sub_sub_cat_id'];
									    $sql_sscat=mysqli_query($conn,"SELECT * from sub_sub_category where id='$sub_sub_cat_id'");
                                        $res_sscat=mysqli_fetch_array($sql_sscat); ?>
										<div class="col-md-4">
											<label>Category:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
													<select name="category" id="cat_id" class="form-control">
												<option value="<?php echo $res['category_id'];?>"><?php echo $res['cat_name'];?></option>
												 <?php
										            $sql2="SELECT * from category";
										            $exe2=mysqli_query($conn,$sql2);
										            while ($res2=mysqli_fetch_array($exe2))
										            {
										            ?>
										            <option value="<?php echo $res2['id']; ?>"><?php echo $res2['cat_name'];?></option>
										            <?php
										            }
										            ?>
											</select>
											</div>
										</div>
										<div class="col-md-4">
											<label>Sub-Category:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select name="sub_category" id="sub_cat" class="form-control">
												<option value="<?php echo $res['sub_category_id'];?>"><?php echo $res['sub_category_name'];?></option>
												</select>
											</div>
										</div>
										 <div class="col-md-4">
											<label>Sub-Sub-Category:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select name="sub_sub_category_id" id="subsub_cat" class="form-control">
												<option value="<?php echo $res['sub_sub_cat_id'];?>"><?php echo $res_sscat['sub_sub_cat_name'];?></option>
												</select>
											</div>
										</div> 
										<div class="col-md-4">
											<label> Banner:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="file" name="img" class="form-control" >
													<br/><img src="product/<?php echo $res['img'];?>" width="80px" style="margin-top:10px;margin-left:10px">
											</div>
										</div>
										<!-- <div class="col-md-4">
											<label> Image 2 :</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="file" name="img2" class="form-control" >
													<br/><img src="img/service/<?php echo $res['img2'];?>" width="80px" style="margin-top:10px;margin-left:10px">
											</div>
										</div>
										<div class="col-md-4">
											<label> Image 3:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="file" name="img3" class="form-control" >
													<br/><img src="img/service/<?php echo $res['img3'];?>" width="80px" style="margin-top:10px;margin-left:10px">
											</div>
										</div>
										 -->
										<div class="col-md-12">
											<label>Title:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="title" value="<?php echo $res['title'];?>" class="form-control" placeholder="Enter Title ">
											</div>
										</div>
										
										<div class="col-md-12">
											<label> Meta Keyword:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea class="form-control" rows="5" name="meta_keyword" placeholder="Meta Keyword "><?php echo $res['meta_keyword'];?></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<label> Description:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea id="summernote_editor" class="form-control" name="property_desp" placeholder="Enter Property Description"><?php echo $res['prod_desp'];?></textarea>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									
									<div class="col-md-4 mt-20">
										<div class="form-group">
											<input type="submit" name="update" class="btn btn-success btn-md" value="Submit">
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
      $('#summernote_editor').summernote({
         tabsize: 2,
        height: 400,
            spellCheck: true,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'italic', 'superscript', 'subscript', 'clear']],
      ['fontname', ['fontname','fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'help', 'undo', 'redo']],
    ],
    callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    }
      });
   function sendFile(file, editor, welEditable) {
    data = new FormData();
    data.append("file", file);
    $.ajax({
        data: data,
        type: "POST",
        url: "upload_img.php",
        cache: false,
        processData: false,
        contentType: false,
        success: function(url) {
            var image = $('<img>').attr('src', url);
            $('#summernote_editor').summernote("insertNode", image[0]);
        }
    });
}
    </script> 
</script>
</html>