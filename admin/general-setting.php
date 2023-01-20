<?php include("includes/css.php");
if (isset($_POST['submits'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$id="1";
$sql1 ="UPDATE  header_setting  SET email_id='$email',contact_no='$contact_no',address='$address',status='$status'  WHERE id='$id'";  
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlgs = mysqli_query($conn,"SELECT * from header_setting where id = '".$id."'");
  $resgs = mysqli_fetch_object($sqlgs);
  
  if($_FILES["logo"]["name"] != ""){
    $oname=$_FILES["logo"]["name"];
    $pos = strrpos($oname, ".");
    $extension=substr($oname,$pos+1);
    $tn = $_FILES["logo"]["tmp_name"];
    $path = "img/".$resgs->id.'logo'.'.'.$extension;
    $upath = "img/".$resgs->logo;
    unlink($upath);
     move_uploaded_file($tn,$path);
      $logo = $resgs->id.'logo'.'.'.$extension;
    } else {
      $logo = $resgs->logo;
    }
if($_FILES["favicon"]["name"] != ""){
    $oname=$_FILES["favicon"]["name"];
    $pos = strrpos($oname, ".");
    $extension=substr($oname,$pos+1);
    $tn = $_FILES["favicon"]["tmp_name"];
    $rand = md5(uniqid().rand());
    $path = "img/".$resgs->id.$rand.'.'.$extension;
    $upath = "img/".$resgs->favicon;
    unlink($upath);
     move_uploaded_file($tn,$path);
      $images = $resgs->id.$rand.'.'.$extension;
    } else {
      $images = $resgs->favicon;
    }
$sqlup = "UPDATE header_setting SET logo ='$logo',ficon ='$images' WHERE  id = $resgs->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
}
}
?>

  <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
          <?php include("includes/header.php");?>
          <?php include("includes/sidebar.php");?>
          <div class="content-wrapper">
              <div class="col-md-8">
                  <section class="content">
                      <div class="box box-danger gurnew">
                          <div class="box-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">General Setting</h6>
                          </div>
                          <div class="box-body table-responsive">
                              <div class="nav-tabs-custom">
                                  <form action="" method="post" enctype="multipart/form-data">
                                    <?php $idd="1";
                                     $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from header_setting where id='".$idd."'")); ?>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="pwd"> Current Header Logo </label>
                                              <img src="https://www.feufo.com/admin/img/<?= $restp['logo'];?>" style="width:100px;">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="acontact_no" class="control-label"> Header Logo </label>
                                              <input class="form-control" name="logo" type="file" >
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="pwd"> Current Favicon </label>
                                              <img src="https://www.feufo.com/admin/img/<?= $restp['ficon'];?>" style="width:40px;">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="acontact_no" class="control-label"> Favicon </label>
                                              <input class="form-control" name="favicon" type="file" value="">
                                          </div>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="Contact Message"> Email For Send Contact Message </label>
                                              <input class="form-control" placeholder="" name="email" type="email" value="<?= $restp['email_id']; ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="Contact Message"> Contact Number </label>
                                              <input class="form-control" placeholder="" name="contact_no" type="text" value="<?= $restp['contact_no']; ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="Contact Message"> Address </label>
                                              <input class="form-control" placeholder="" name="address" type="text" value="<?= $restp['address']; ?>">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label> Status</label>
                                              <select class="form-control" name="status">
                                                  <option><?= $restp['status']; ?></option>
                                                  <option>Active</option>
                                                  <option>InActive</option>
                                              </select>
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-actions">
                                              <button type="submit" name="submits" class="btn btn-success btn-lg"> Update</button>
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