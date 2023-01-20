<?php include("includes/css.php"); 
if (isset($_POST['submit'])) {
  //extract($_POST);
  //var_dump($_POST);exit();
   date_default_timezone_set('Asia/Kolkata');
$name = htmlentities( $_POST['article']);
$id=$_POST["id"];
$sql1 ="UPDATE  howit_work  SET data='$name'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if(!$res){
    die('query failed'. mysqli_error($conn));
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
                    <?php   $sql2="SELECT * from howit_work";
                        $exe2=mysqli_query($conn,$sql2);
                        while ($res=mysqli_fetch_array($exe2))
                        { ?>
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">How it work</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                             <div class="row clear_fix">
                        <div class="col-md-12">
                              <textarea name="article" id="summernote"  style="height:200px"><?php echo html_entity_decode($res['data']);  ?></textarea>
                        </div>
                    </div>
                     <input type="hidden" class="form-control" value="<?php echo $res['id']; ?>" name="id" id=""  placeholder="Enter Cruise Name" >

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