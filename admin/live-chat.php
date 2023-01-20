<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
//var_dump($_POST);exit();
date_default_timezone_set('Asia/Kolkata');
$name = htmlspecialchars( $_POST['live_chat']);
 $data=mysqli_real_escape_string($conn,$name);
$id=$_POST["id"];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$sql1 ="UPDATE live_chat SET text='$data',status='$status',created_date='$date' WHERE id='$id'"; 
//echo $sql1; exit();
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
}
} ?>
  <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
          <?php include("includes/header.php");?>
          <?php include("includes/sidebar.php");?>
          <div class="content-wrapper">
              <div class="col-md-8">
                  <section class="content">
                      <div class="box box-danger gurnew">
                          <div class="box-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Live Chat</h6>
                          </div>
                          <div class="box-body table-responsive">
                              <div class="nav-tabs-custom">
                                  <form action="" method="post" enctype="multipart/form-data">
                                     <?php   $sql2="SELECT * from live_chat";
                                              $exe2=mysqli_query($conn,$sql2);
                                              $res=mysqli_fetch_array($exe2); ?>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                              <label> Allow Live Chat</label>
                                              <select name="status" class="form-control" onchange="yesnoCheck(this);">
                                                  <option value="Yes">Yes</option>
                                                  <option value="No">No</option>
                                              </select>
                                          </div>
                                      </div> 
                                      <div class="col-md-12" id="ifYes">
                                          <div class="form-group">
                                              <label for="Contact Message">  Allow Tawk Live Chat  </label>
                                              <textarea class="form-control" name="live_chat" placeholder="Enter Tawk Live Chat Script Path" type="text" rows="5" id="summernote">
                                                <?= $res['text']; ?>
                                                </textarea>
                                          </div>
                                      </div> 
                                       <input type="hidden" class="form-control" value="<?php echo $res['id']; ?>" name="id">
                                      <div class="col-md-4">
                                          <div class="form-actions">
                                              <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg"> Update</button>
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
      <script type="text/javascript">
        function yesnoCheck(that) {
    if (that.value == "No") {
        document.getElementById("ifYes").style.display = "none";
    } else {
        document.getElementById("ifYes").style.display = "block";
    }
    }
</script>
  </body>

  </html>