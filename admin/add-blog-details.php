<?php include("includes/css.php");
if (isset($_POST['blog_submit'])) {
extract($_POST);
 $blog_postby=mysqli_real_escape_string($conn,$_POST['blog_postby']);
 $blog_title=mysqli_real_escape_string($conn,$_POST['blog_title']);
 $blog_category=mysqli_real_escape_string($conn,$_POST['blog_category']);
 $datas=mysqli_real_escape_string($conn,$_POST['data']);
 $sdatas=mysqli_real_escape_string($conn,$_POST['sdata']);
 $rdt_datas=mysqli_real_escape_string($conn,$_POST['requirements']);
 $data1 = htmlentities($datas);
$sdata = htmlentities($sdatas);
$rdt_data = htmlentities($rdt_datas);
$tmp_file = $_FILES['banner']['tmp_name'];
$ext = pathinfo($_FILES["banner"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$bimg = $rand.".".$ext;
move_uploaded_file($tmp_file,"img/blog/".$bimg);
$tmp_file = $_FILES['blog_img']['tmp_name'];
$ext = pathinfo($_FILES["blog_img"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$bgimg = $rand.".".$ext;
$blog_page = strtolower(str_replace(" ", "-", $blog_title));
if(file_exists('../blog')){
if(!file_exists('../blog/'.$blog_page)){
    if(copy('../blog-detail.php', '../blog/'.$blog_page.'.php')) {
	    move_uploaded_file($tmp_file,"img/blog/".$bgimg);
	     $sql="INSERT into blog(blog_title,blog_date,blog_postby,blog_image,banner,title,meta_keyword,short_desp,blod_desp,requirement,show_home) values ('$blog_title','$blog_date','$blog_postby','$bgimg','$bimg','$title','$meta_keyword','$sdata','$data1','$rdt_data','$show_home')";
	        $res=mysqli_query($conn,$sql) or die(mysqli_error());
	    if ($res) {
          echo "<script> 
                        alert('Your blog details have added successfully!!!'); 
                        location.replace('blog-details.php');
                    </script>";
            } else { exit();
	                echo "  <script> 
	                            alert('There are some problem please try again!!!'); 
	                            location.replace('add-blog-details.php');
	                        </script>";
	            }
	        } 
	        else { exit();
	            echo "  <script> 
	                        alert('There are some problem please try again!!!'); 
	                        location.replace('add-blog-details.php');
	                    </script>";
	        }
	    }
	    else{
	        echo "  <script> 
	                    alert('blog details Name aleady exists, please change the and try again!!!'); 
	                    location.replace('add-blog-details.php');
	                </script>";
	    }
	}
	else{
	    echo "  <script> 
	                alert('blog not exists, please check and try again!!!'); 
	                location.replace('add-blog-details.php');
	            </script>";
	}
}

?> 
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
                        <h6 class="m-0 font-weight-bold text-primary">Blog Form</h6>
                    </div>
                    <div class="box-body table-responsive">
						<form method="post" action="" enctype="multipart/form-data">
							<div class="form-group"> 										
								<div class="col-md-12">
									<label>Title:</label>
									<textarea class="form-control" name="blog_title" rows="2" placeholder="Enter Title"></textarea>
								</div> 
								<div class="col-md-6">
									<label>Posted By:</label> 
									<input type="text" name="blog_postby" class="form-control" placeholder="Enter Posted By" >
								</div> 
								<!-- <div class="col-md-6">
									<label>Category:</label> 
									<select class="toggle form-control" name="category">
                                        <option for="">Select Category</option>
                                        <?php $sql_tsm=mysqli_query($conn,"select * from blog_category"); $i=1;
                                        while($restsm= mysqli_fetch_array($sql_tsm)){ ?>
                                        <option value="<?= $restsm['id'];?>"><?= $restsm['bc_name'];?></option>
                                        <?php } ?>
                           		 	</select> 
								</div> --> 
								 <div class="col-md-6">
									<label>Image:(Size 800px X 600px)</label> 
										<input type="file" name="blog_img" class="form-control" placeholder="Blog Photo">
									</div> 
								    <div class="col-md-12">
									  <label>Short Description:</label> 
										<textarea name="sdata" id="summernote" class="form-control" style="width:100%; height:100px"> </textarea> 
								    </div>  
								   <div class="col-md-12">
									<label>Description:</label> 
										<textarea name="data" id="summernote2" class="form-control" style="width:100%; height:200px"> </textarea> 
								    </div> 
								 <div class="col-md-12">
									<label>Requirements:</label> 
										<textarea name="requirements" id="summernote3" class="form-control" style="width:100%; height:200px"> </textarea> 
								    </div> 
								<div class="col-md-6">
									<label>Blog Banner:</label> 
										<input name="banner" type="file" class="form-control"/> 
								</div>
								<div class="col-md-6">
									<label>Blog Post Date:</label> 
										<input type="date" name="blog_date" class="form-control" placeholder="Enter Blog Date" value=""> 
								</div> 
								<div class="col-md-6">
									<label>Status:</label> 
									<select class="toggle form-control" name="status">
                                         <option for="">Active</option>
                                        <option for="">InActive</option>
                           		 	</select> 
								</div> 
								<div class="col-md-6">
									<label>Show Home Page:</label> 
									<select class="toggle form-control" name="show_home">
                                         <option >Yes</option>
                                        <option >No</option>
                           		 	</select> 
								</div> 
								<div class="col-md-6">
								<label>Seo Title</label> 
									<input type="text"  name="title" class="form-control" placeholder="Enter Title">
								</div> 
							   <div class="col-md-6">
								<label>SEO Description</label> 
									  <textarea name="meta_keyword" class="form-control" style="height:100px"></textarea>
								</div>                                
								
								<div class="clearfix"></div> 
								<div class="col-md-2">
									<input type="submit" name="blog_submit" class="btn btn-success btn-md btn-search mt-30" value="Save">
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
</html>
