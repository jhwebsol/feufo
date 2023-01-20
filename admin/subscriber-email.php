<?php include("includes/css.php");
if(isset($_POST['update'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d, H:i:s");
$id='3';
$sql1 ="UPDATE  email_template SET subject='$subject',desp='$desp',created_date='$date' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
}
}
?> 

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
           
            <section class="content">
                <div class="col-md-6">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">Email for Subscriber</h3>
                        </div>
                        <div class="box-body table-responsive">
                             <?php $idd='3';
                        $ressc=mysqli_fetch_array(mysqli_query($conn,"SELECT * from email_template where id='".$idd."'")); ?>
                            <form method="post" action="" enctype="multipart/form-data">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Subject </label>
                                        <input type="text" name="subject" value="<?= $ressc['subject'];?>" class="form-control" placeholder="Enter Subject">
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message </label>
                                        <textarea name="desp" rows="4" class="form-control" placeholder="Write Message"><?= $ressc['desp'];?></textarea>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <input type="submit" name="update" class="btn btn-success btn-lg" value="Send Email">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
</body>
</html>
