<?php include("includes/css.php");
$id=$_GET['editid'];
$sql2="select * from blog where id='$id'";
$exe2=mysqli_query($conn,$sql2);
$res=mysqli_fetch_array($exe2); ?>
<?php 
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["id"];
$datas=mysqli_real_escape_string($conn,$_POST['data']);
$sdatas=mysqli_real_escape_string($conn,$_POST['sdesp']);
$rdt_datas=mysqli_real_escape_string($conn,$_POST['rdt_data']);
$data1 = htmlentities($datas);
$sdata1 = htmlentities($sdatas);
$rdt_datas1 = htmlentities($rdt_datas);
if(file_exists('../blog')){
	    if(strtolower(str_replace(" ", "-", $blog_title)) == strtolower(str_replace(" ", "-", $blog_url_old))) {
	        if(file_exists('../blog/'.strtolower(str_replace(" ", "-", $blog_url_old)).'.php')){
					$sql1 ="UPDATE  blog SET blog_title='$blog_title',blog_date='$blog_date',blog_postby='$blog_postby',status='$status',show_home='$show_home',title='$title',meta_keyword='$meta_keyword',blod_desp='$data1',requirement='$rdt_datas1',short_desp='$sdata1' WHERE id='$id'"; 
					$res=mysqli_query($conn,$sql1) or die(mysqli_error());

					if($res){
					$sqlg = "SELECT * from blog where id = $id";
					  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
					  $resg = mysqli_fetch_object($resultg);

						if($_FILES["blog_img"]["name"] != ""){
						$oname=$_FILES["blog_img"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["blog_img"]["tmp_name"];
						$path = "img/blog/".$resg->id.'.'.$extension;
						$upath = "img/blog/".$resg->blog_image;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_image = $resg->id.'.'.$extension;
						} else {
						  $blog_image = $resg->blog_image;
						}
					   if($_FILES["banner"]["name"] != ""){
						$oname=$_FILES["banner"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["banner"]["tmp_name"];
						$path = "img/blog/".$resg->id."12".'.'.$extension;
						$upath = "img/blog/".$resg->banner;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_banner = $resg->id."12".'.'.$extension;
						} else {
						  $blog_banner = $resg->banner;
						}
					$sqlup = "UPDATE blog SET  blog_image='$blog_image',banner='$blog_banner'
								 WHERE  id = $resg->id";
						$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
						 if($resultup){
						 echo "<script>window.location.href='blog-details.php'</script>";
						
                        }
                     }
                   }  else{
				if(copy('../blog-detail.php', '../blog/'.strtolower(str_replace(" ", "-", $blog_url_old)).'.php')) {
					$data1 = htmlentities( $_POST['data']);
					$sql1 ="UPDATE  blog SET blog_title='$blog_title',blog_date='$blog_date',blog_postby='$blog_postby',status='$status',show_home='$show_home',title='$title',meta_keyword='$meta_keyword',blod_desp='$data1',short_desp='$sdata1',requirement='$rdt_datas1' WHERE id='$id'"; 
					$res=mysqli_query($conn,$sql1) or die(mysqli_error());

					if($res){
					$sqlg = "SELECT * from blog where id = $id";
					  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
					  $resg = mysqli_fetch_object($resultg);

						 if($_FILES["blog_img"]["name"] != ""){
						$oname=$_FILES["blog_img"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["blog_img"]["tmp_name"];
						$path = "img/blog/".$resg->id.'.'.$extension;
						$upath = "img/blog/".$resg->blog_image;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_image = $resg->id.'.'.$extension;
						} else {
						  $blog_image = $resg->blog_image;
						}
						if($_FILES["banner"]["name"] != ""){
						$oname=$_FILES["banner"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["banner"]["tmp_name"];
						$path = "img/blog/".$resg->id."12".'.'.$extension;
						$upath = "img/blog/".$resg->banner;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_banner = $resg->id."12".'.'.$extension;
						} else {
						  $blog_banner = $resg->banner;
						}
					$sqlup = "UPDATE blog SET  blog_image='$blog_image',banner='$blog_banner'
								 WHERE  id = $resg->id";
						$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
						 if($resultup){
						 echo "<script>window.location.href='blog-details.php'</script>";
						
                        }
					}
				}
			}
		}else{
			if(file_exists('../blog/'.strtolower(str_replace(" ", "-", $blog_url_old)).'.php')){
               	if(rename("../blog/".strtolower(str_replace(" ", "-", $blog_url_old)).".php", "../blog/".strtolower(str_replace(" ", "-", $blog_title)).".php")){
               		$data1 = htmlentities( $_POST['data']);
					$sql1 ="UPDATE  blog SET blog_title='$blog_title',blog_date='$blog_date',blog_postby='$blog_postby',status='$status',show_home='$show_home',title='$title',meta_keyword='$meta_keyword',blod_desp='$data1',short_desp='$sdata1',requirement='$rdt_datas1' WHERE id='$id'"; 
					$res=mysqli_query($conn,$sql1) or die(mysqli_error());

					if($res){
					$sqlg = "SELECT * from blog where id = $id";
					  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
					  $resg = mysqli_fetch_object($resultg);

						 if($_FILES["blog_img"]["name"] != ""){
						$oname=$_FILES["blog_img"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["blog_img"]["tmp_name"];
						$path = "img/blog/".$resg->id.'.'.$extension;
						$upath = "img/blog/".$resg->blog_image;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_image = $resg->id.'.'.$extension;
						} else {
						  $blog_image = $resg->blog_image;
						}


					    if($_FILES["banner"]["name"] != ""){
						$oname=$_FILES["banner"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["banner"]["tmp_name"];
						$path = "img/blog/".$resg->id."12".'.'.$extension;
						$upath = "img/blog/".$resg->banner;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_banner = $resg->id."12".'.'.$extension;
						} else {
						  $blog_banner = $resg->banner;
						}
					    $sqlup = "UPDATE blog SET  blog_image='$blog_image',banner='$blog_banner'
								 WHERE  id = $resg->id";
						$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
						 if($resultup){
						 echo "<script>window.location.href='blog-details.php'</script>";
						
                        }
                     }
               	}
            } else{
            	if(copy('../blog-detail.php', '../blog/'.strtolower(str_replace(" ", "-", $blog_title)).'.php')) {
				$data1 = htmlentities( $_POST['data']);
				$sql1 ="UPDATE  blog SET blog_title='$blog_title',blog_date='$blog_date',blog_postby='$blog_postby',status='$status',show_home='$show_home',title='$title',meta_keyword='$meta_keyword',blod_desp='$data1',short_desp='$sdata1',requirement='$rdt_datas1' WHERE id='$id'";
					$res=mysqli_query($conn,$sql1) or die(mysqli_error());
					if($res){
					$sqlg = "SELECT * from blog where id = $id";
					  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
					  $resg = mysqli_fetch_object($resultg);
						 if($_FILES["blog_img"]["name"] != ""){
						$oname=$_FILES["blog_img"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["blog_img"]["tmp_name"];
						$path = "img/blog/".$resg->id.'.'.$extension;
						$upath = "img/blog/".$resg->blog_image;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_image = $resg->id.'.'.$extension;
						} else {
						  $blog_image = $resg->blog_image;
						}
					    if($_FILES["banner"]["name"] != ""){
						$oname=$_FILES["banner"]["name"];
						$pos = strrpos($oname, ".");
						$extension=substr($oname,$pos+1);
						$tn = $_FILES["banner"]["tmp_name"];
						$path = "img/blog/".$resg->id."12".'.'.$extension;
						$upath = "img/blog/".$resg->banner;
						unlink($upath);
						 move_uploaded_file($tn,$path);
						 $blog_banner = $resg->id."12".'.'.$extension;
						} else {
						  $blog_banner = $resg->banner;
						}
					    $sqlup = "UPDATE blog SET  blog_image='$blog_image',banner='$blog_banner'
								 WHERE  id = $resg->id";
						$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
                        if($resultup){
						 echo "<script>window.location.href='blog-details.php'</script>";
						
                        }
                     }
				}

           }
        }
    }

}
?>  
<?php if (isset($_SESSION['loggedin_admin']) && $_SESSION['loggedin_admin'] == true) { ?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
			<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
            <section class="content-header">
                <a href="blog-details.php" class="btn btn-md btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Blog</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Blog Form</h6>
                    </div>
                    <div class="box-body table-responsive">
                    	<form method="post" action="" enctype="multipart/form-data">
							<div class="form-group"> 										
								<div class="col-md-12">
									<label>Title:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<textarea class="form-control" value="" name="blog_title" rows="2" placeholder="Enter Blog Title"><?php echo $res['blog_title']; ?></textarea><input type="hidden" class="form-control" rows="2" name="blog_url_old" value="<?php echo $res['blog_url'];?>" placeholder="Enter Blog Title">
									</div>
								</div> 
								
								<div class="col-md-6">
									<label>Posted By:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<input type="text" value="<?php echo $res['blog_postby']; ?>" name="blog_postby" class="form-control" placeholder="Enter Posted By" value="">
									</div>
								</div> 
								<!-- <div class="col-md-6">
									<label>Category:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div> 
										<select class="toggle form-control" name="category">
                                            <option value="<?= $sqlbg['id'];?>"><?= $sqlbg['bc_name'];?></option>
                                           <?php $sql_tsm=mysqli_query($conn,"select * from blog_category"); $i=1;
                                        while($restsm= mysqli_fetch_array($sql_tsm)){ ?>
                                        <option value="<?= $restsm['id'];?>"><?= $restsm['bc_name'];?></option>
                                        <?php } ?>
                               		 	</select>
									</div>
								</div> --> 
								<div class="col-md-6">
									<label>Image:(Size 800px X 600px)</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										 <img src="img/blog/<?php echo $res['blog_image']; ?>" width="40px">
										<input type="file" name="blog_img" class="form-control" placeholder="Blog Photo">
									</div>  
								</div> 
								
								<div class="col-md-12">
									<label>Short Description:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<textarea name="sdesp" class="" id="summernote" style="height:100px"> <?php echo $res['short_desp']; ?></textarea>
									</div>
								</div> 
								<div class="col-md-12">
									<label>Description:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<textarea name="data" class="" id="summernote2" style="width: 100%;height:200px"> <?php echo $res['blod_desp']; ?></textarea>
									</div>
								</div> 
								<div class="col-md-12">
									<label>Requirements:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<textarea name="rdt_data" class="" id="summernote3" style="width: 100%;height:200px"> <?php echo $res['requirement']; ?></textarea>
									</div>
								</div> 
								<div class="col-md-6">
									<label>Blog Banner:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										 <img src="img/blog/<?php echo $res['banner']; ?>" width="40px">
										<input name="banner" type="file" class="form-control"/>
									</div>
								</div>
								<div class="col-md-6">
									<label>Blog Post Date:</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<input type="date" value="<?php echo $res['blog_date']; ?>" name="blog_date" class="form-control" placeholder="Enter Blog Date" value="">
									</div>
								</div> 
								<div class="col-md-6">
									<label>Status:</label> 
									<select class="toggle form-control" name="status">
                                         <option value="<?php echo $res['status']; ?>"><?php echo $res['status']; ?></option>
                                         <option >Active</option>
                                        <option >InActive</option>
                           		 	</select> 
								</div> 
								<div class="col-md-6">
									<label>Show Home Page:</label> 
									<select class="toggle form-control" name="show_home">
										<option value="<?php echo $res['show_home']; ?>"><?php echo $res['show_home']; ?></option>
                                         <option>Yes</option>
                                         <option>No</option>
                           		 	</select> 
								</div> 
								<div class="form-group">
									<label>Seo Title</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										<input type="text"  name="title" value="<?php echo $res['title']; ?>" class="form-control" placeholder="Enter Title">
									</div>
								</div>

								<div class="form-group">
									<label>SEO Description</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-suitcase"></i>
										</div>
										  <textarea name="meta_keyword" class="form-control" style="height:200px"><?php echo $res['meta_keyword']; ?></textarea>
									</div>
								</div>
                                
								 <input type="hidden" value="<?php echo $res['id'];?>" name="id" id="id">
								<div class="clearfix"></div> 
								<div class="col-md-2">
									<input type="submit" name="update" class="btn btn-success btn-md btn-search mt-30" value="Update Blog Data">
								</div>
									</div>
								</form>
							</div>
						</div> 
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
</body>
<?php } else { 
echo "<script>window.location.href='index.php'</script>";
} ?>
</html>
