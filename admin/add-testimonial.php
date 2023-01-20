<?php include("includes/db_config.php"); 
 include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
   $tmp_file = $_FILES['timage']['tmp_name'];
    $ext = pathinfo($_FILES["timage"]["name"], PATHINFO_EXTENSION);
    $rand = md5(uniqid().rand());
    $image1 = $rand.".".$ext;
    move_uploaded_file($tmp_file,"img/testimonial/".$image1);
 $name=mysqli_real_escape_string($conn,$_POST['name']);
 $designation=mysqli_real_escape_string($conn,$_POST['designation']);
 $desp=mysqli_real_escape_string($conn,$_POST['desp']);
$sql_qry="insert into es_testimonial(name,designation,image,linkdin_link,desp) values ('$name','$designation','$image1','$llink','$desp')";
$res=mysqli_query($conn,$sql_qry);
if($res){
    echo "<script>window.location.href='testimonial.php'</script>";
 }
 
}
 ?>


<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="testimonial.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Testimonial</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Testimonial Form</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="nav-tabs-custom">
                            <form action="" method="post" enctype="multipart/form-data"> 
                                     
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="first_name">Name</label>
                                                <input class="form-control" placeholder="Enter Full Name" name="name" type="text" value="">
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="location" class="control-label">Designation</label>
                                                <input class="form-control" placeholder="Enter Designation" name="designation" type="text">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email" class="control-label">Description</label>
                                                <textarea class="form-control" placeholder="Enter Description" name="desp"></textarea>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="acontact_no" class="control-label">Image</label>
                                                <input class="form-control" placeholder="Image" name="timage" type="file" value="">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="acontact_no" class="control-label">Linkedin link</label>
                                                <input class="form-control" placeholder="Link" name="llink" type="text" value="">
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-12">
                                            <label>Status</label>
                                            <select type="file" name="icon" class="form-control">
                                                <option>Active</option>
                                                <option>InActive</option>
                                            </select>
                                        </div>                                   

                                    <div class="col-md-4" style="margin-top:20px;">
                                        <div class="form-actions">
                                            <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i> Create</button>
                                        </div>
                                    </div> 
                            </form>
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
