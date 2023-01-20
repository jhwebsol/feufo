<?php include("includes/css.php"); 
if (isset($_POST['submit'])) {
   date_default_timezone_set('Asia/Kolkata');
$name = htmlentities( $_POST['article']);
$id=$_POST["id"];
$sql1 ="UPDATE  help_center  SET data='$name'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from help_center where id = '$id'";
  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
  $resg = mysqli_fetch_object($resultg);
  
  if($_FILES["ban_img"]["name"] != ""){
    $oname=$_FILES["ban_img"]["name"];
    $pos = strrpos($oname, ".");
    $extension=substr($oname,$pos+1);
    $tn = $_FILES["ban_img"]["tmp_name"];
    $path = "banner/".$resg->id.'hp'.'.'.$extension;
    $upath = "banner/".$resg->image;
    unlink($upath);
     move_uploaded_file($tn,$path);
      $image = $resg->id.'hp'.'.'.$extension;
    } else {
      $image = $resg->image;
    }
$sqlup = "UPDATE help_center SET  image =  '$image' WHERE  id = $resg->id";
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
                <form name="" method="post" action=""  enctype="multipart/form-data">

                <div class="row">
<div class="col-md-12">
                    <?php   $sql2="SELECT * from help_center";
                        $exe2=mysqli_query($conn,$sql2);
                        while ($res=mysqli_fetch_array($exe2))
                        { ?>
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Help center</h3>
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
                                <label>Help center</label>
                              <textarea name="article" id="summernote"  style="height:200px"><?php echo html_entity_decode($res['data']);  ?></textarea>
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
</body>

</html>
