 <?php include("includes/css.php"); 
if(isset($_POST['update'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d, H:i:s");
$id=$_GET['id'];
$sql1 ="UPDATE  email_template SET subject='$subject',desp='$desp',created_date='$date' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='email-template.php'</script>";
}
} ?>

 <body class="hold-transition skin-blue sidebar-mini">
     <div class="wrapper">
         <?php include("includes/header.php");?>
         <?php include("includes/sidebar.php");?>
         <div class="content-wrapper">
             <div class="col-md-8">
                 <section class="content-header">
                     <a href="email-template.php" class="btn btn-md btn-success"><i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i> Go Back</a>
                 </section>
                 <section class="content">
                     <div class="box box-danger gurnew">
                        <?php $idd=$_GET['id'];
                        $ressc=mysqli_fetch_array(mysqli_query($conn,"SELECT * from email_template where id='".$idd."'")); ?>
                         <div class="box-header py-3">
                             <h6 class="m-0 font-weight-bold text-primary">'<?= $ressc['name'];?>' Email Template</h6>
                         </div>
                         <div class="box-body table-responsive">
                             <div class="nav-tabs-custom">
                                 <form action="" method="post" enctype="multipart/form-data">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="Subject">Subject</label>
                                             <input class="form-control" placeholder="Enter Subject" name="subject" type="text" value="<?= $ressc['subject'];?>">
                                         </div>
                                     </div> 
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="Description">Description</label>
                                             <textarea class="form-control" name="desp" placeholder="Enter Subject" type="text" rows="4"><?= $ressc['desp'];?></textarea>
                                         </div>
                                     </div> 
                                     <div class="col-md-4">
                                         <div class="form-actions">
                                             <button type="submit" name="update" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i> Save</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </section>
             </div>
         </div>
         <?php include("includes/footer.php");?>
         <div class="control-sidebar-bg"></div>
     </div>
     <?php include("includes/js.php");?>
 </body>
 </html>