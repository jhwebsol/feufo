<?php include("includes/db_config.php"); 
if (isset($_POST['submit'])) {
extract($_POST);
//var_dump($_FILES);exit();
date_default_timezone_set('Asia/Kolkata');
$name = htmlentities( $_POST['article']);
$datas = mysqli_real_escape_string($conn,$name);
$id=$_POST["id"];
$sql1 ="UPDATE  home_aboutus  SET text='$datas'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from home_aboutus where id = $id";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);    
if($_FILES["video_link"]["name"] != ""){
  $vdfile_name = $_FILES['video_link']['name'];
    $vdext = pathinfo($_FILES["video_link"]["name"], PATHINFO_EXTENSION);
    $rands = md5(uniqid().rand());
     $video_files = $rands.".".$vdext;
     $vdfile_size = $_FILES['video_link']['size'];
    $allowed_extensions = array("webm", "mp4", "ogv");
    $file_size_max = 2147483648;
    $pattern = implode ($allowed_extensions, "|");
    $vdfile_type = end(explode(".", $vdfile_name));
    if (preg_match("/({$pattern})$/i", $vdfile_name) )
   {
if (($vdfile_type == "webm") || ($vdfile_type == "mp4") || ($vdfile_type == "ogv"))
{
    if ($_FILES['video_link']['error'] > 0)
    { echo "<script>alert('video Uploading Unexpected error occured, please try again later.!!!'); 
                </script>";
    } else {
         move_uploaded_file($_FILES["video_link"]["tmp_name"], "img/".$video_files);
    }
} else { echo "<script>alert('Invalid video format!!!'); 
                </script>";
}
}else{ echo "<script>alert('Video size is more please upload another video!!!'); 
                </script>";
}
}else{ $video_files = $resg->video_link; }     
$sqlup = "UPDATE home_aboutus SET video_link = '$video_files' WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
} } ?>

<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Feufo</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include("includes/css.php")?>
</head>
 <script type="text/javascript" src='ckeditor/ckeditor.js'></script>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <form name="" method="post" action=""  enctype="multipart/form-data">

                <div class="row">
                    <?php   $sql2="SELECT * from home_aboutus";
                        $exe2=mysqli_query($conn,$sql2);
                        while ($res=mysqli_fetch_array($exe2))
                        { ?>
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Home About US</h3>
                            </div> 
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                             <div class="row clear_fix">
                              <div class="col-md-12">
                                <label>Video </label> 
                                    <video width="100%" height="440" controls>
                                      <source src="img/<?= $res['video_link'];?>" type="video/mp4">
                                      <source src="movie.ogg" type="video/ogg">
                                      Your browser does not support the video tag.
                                    </video> 
                                <input type="file" name="video_link" class="form-control" placeholder=" Photo" > 
                              </div>  
                                <div class="col-md-12">
                                   <label>About US</label>
                                    <textarea name="article" id="summernote" class=""  style="height:200px"><?php echo html_entity_decode($res['text']);  ?></textarea>
                                </div>
                            </div>
                             <input type="hidden" class="form-control" value="<?php echo $res['id']; ?>" name="id" id="">
                              <button type="submit" name="submit" id="" class="btn btn-primary pull-right">Submit</button>
                            </div>
                            
                        </div>
                    <?php } ?> 
                </div>
            </form> 
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?> 
</body>
</html>