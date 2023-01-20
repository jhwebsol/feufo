<?php include("includes/css.php"); 
if (isset($_POST['submit'])) {
  //extract($_POST);
  //var_dump($_POST);exit();
   date_default_timezone_set('Asia/Kolkata');
$name = htmlentities( $_POST['article']);
$datas = mysqli_real_escape_string($conn,$name);

$id=$_POST["id"];
$sql1 ="UPDATE  about_us  SET text='$datas'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from about_us where id = '$id'";
  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
  $resg = mysqli_fetch_object($resultg);
  
  if($_FILES["ban_img"]["name"] != ""){
    $oname=$_FILES["ban_img"]["name"];
    $pos = strrpos($oname, ".");
    $extension=substr($oname,$pos+1);
    $tn = $_FILES["ban_img"]["tmp_name"];
    $path = "banner/".$resg->id.'abt'.'.'.$extension;
    $upath = "banner/".$resg->image;
    unlink($upath);
     move_uploaded_file($tn,$path);
      $image = $resg->id.'abt'.'.'.$extension;
    } else {
      $image = $resg->image;
    }
$sqlup = "UPDATE about_us SET  image =  '$image' WHERE  id = $resg->id";
    $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
}
}

?>

 
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

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
    <div class="col-md-12">
                    <?php   $sql2="SELECT * from about_us";
                        $exe2=mysqli_query($conn,$sql2);
                        while ($res=mysqli_fetch_array($exe2))
                        { ?>
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">About US</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                             <div class="row clear_fix">
                                <div class="col-md-12">
                                <label>Banner Image</label> 
                                 <img src="banner/<?php echo $res['image']; ?>" width="60px"><br/> 
                                
                                   <input type="file" name="ban_img" class="form-control" placeholder=" Photo" >
                               </div>
                              <div class="col-md-12">
                                <label>About US</label>
                              <textarea name="article" id="summernote"  style="height:200px"><?php echo html_entity_decode($res['text']);  ?></textarea>
                              </div>
                    </div>
                     <input type="hidden" class="form-control" value="<?php echo $res['id']; ?>" name="id" id=""  placeholder="Enter Cruise Name" >

                      <button type="submit" name="submit" id="" class="btn btn-primary pull-right">Submit</button>
                            </div>
                            
                        </div>
                    <?php } ?> 
                </div>
</div>
            </form> 
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?> 
 
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script> 
      $('#summernote').summernote({
         tabsize: 10,
        height: 300
      });
    </script> 

</body>

</html>
