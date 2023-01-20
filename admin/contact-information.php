<?php include("includes/css.php");
if(isset($_POST['adsubmit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d, H:i:s");
$id="1";
$sql1 ="UPDATE  contactus_info SET address='$address',phone_no='$phone_no',email_id='$email_id',map='$google_map',copyright='$copyright',created_date='$date' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if(isset($_POST['submits'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d, H:i:s");
$id="1";
$sqls="UPDATE footer_contact SET address='$address',phone='$phone_no',email_id='$email_id',created_date='$date' WHERE id='$id'"; 
$ress=mysqli_query($conn,$sqls) or die(mysqli_error());
}
if(isset($_POST['scsubmit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d, H:i:s");
$id="1";
$sqls="UPDATE social_media SET facebook='$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin',youtube='$youtube',whats_app='$whats_app',created_date='$date' WHERE id='$id'"; 
$ress=mysqli_query($conn,$sqls) or die(mysqli_error());
}
 ?>
 
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
         <div class="content-wrapper">             
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Contact Information</h3>
                            </div> 
                            <div class="box-body table-responsive">
                                <div class="card card-primary card-outline card-tabs">
                                    <div class="card-header p-0 pt-1 border-bottom-0">
                                        <ul class="nav nav-tabs">
                                          <li class="active"><a href="#tab1default" data-toggle="tab">Contact Information</a></li>
                                            <!-- <li><a href="#tab2default" data-toggle="tab">Topbar Contact</a></li> --> 
                                            <li><a href="#tab3default" data-toggle="tab">Footer Contact</a></li> 
                                            <li><a href="#tab4default" data-toggle="tab">Social  Contact</a></li>  
                                        </ul>                                     
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="tab1default">
                                                 <form action="" method="post" enctype="multipart/form-data">
                                                    <?php $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from contactus_info ")); ?>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                           <textarea type="text" rows="2" name="address" class="form-control" placeholder="Enter Address"><?= $restp['address'];?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                           <input type="tel" class="form-control" name="phone_no" placeholder="Enter Phone" value="<?= $restp['phone_no'];?>">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                           <input type="email" name="email_id" class="form-control" placeholder="Enter Email" value="<?= $restp['email_id'];?>">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Google Map Embed Code</label>
                                                           <textarea type="text" rows="3" name="google_map" class="form-control" placeholder="Enter Map Address"><?= $restp['map'];?></textarea>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Copyright Text</label>
                                                           <textarea type="text" name="copyright" class="form-control" rows="1" placeholder="Enter Copyright Text"><?= $restp['copyright'];?></textarea>
                                                        </div>
                                                    </div> 
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="adsubmit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                            </div>
                                        
                                          <div class="tab-pane fade" id="tab3default">
                                            <?php $resct=mysqli_fetch_array(mysqli_query($conn,"SELECT * from footer_contact ")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                           <textarea type="text" rows="2" class="form-control" placeholder="Enter Address" name="address"><?= $resct['address'];?>Maka Al-Mukarama Street, Somalia</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                           <input type="tel" class="form-control" placeholder="Enter Phone" name="phone_no" value="<?= $resct['phone'];?>">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                           <input type="email" name="email_id" class="form-control" placeholder="Enter Email" value="<?= $resct['email_id'];?>">
                                                        </div>
                                                    </div> 
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="submits" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                          <div class="tab-pane fade" id="tab4default">
                                            <?php $rescts=mysqli_fetch_array(mysqli_query($conn,"SELECT * from social_media ")); ?>
                                                 <form action="" method="post" enctype="multipart/form-data">   <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Facebook</label>
                                                           <input type="text" name="facebook" class="form-control" placeholder="Enter Facebook" value="<?= $rescts['facebook'];?>">
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Twitter</label>
                                                           <input type="text" name="twitter" class="form-control" placeholder="Enter Facebook" value="<?= $rescts['twitter'];?>">
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Instagram</label>
                                                           <input type="text" name="instagram" class="form-control" placeholder="Enter Facebook" value="<?= $rescts['instagram'];?>">
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>LinkedIn</label>
                                                           <input type="text" name="linkedin" class="form-control" placeholder="Enter Facebook" value="<?= $rescts['linkedin'];?>">
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Youtube</label>
                                                           <input type="text" class="form-control" placeholder="Enter Facebook" name="youtube" value="<?= $rescts['youtube'];?>">
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Whats App Number</label>
                                                           <input type="text" class="form-control" placeholder="Enter Facebook" name="whats_app" value="<?= $rescts['whats_app'];?>">
                                                        </div>
                                                    </div>  
                                                  <div class="col-md-4">
                                                      <div class="form-actions">
                                                          <button type="submit" name="scsubmit" id="submit" class="btn btn-success btn-lg"> Update</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div> 
                                          </div>                                             
                                        </div>
                                </div>
                            </div>
                         </div> 
                  </div>
                </div> 
            </section>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

        function delete_ban_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_banner.php?id=' + id;
            }
        }

        $(document).ready(function() {

            $(document).on('click', '.edit_data', function() {
                var ban_id = $(this).attr("id");
                $.ajax({
                    url: "edit_banner.php",
                    method: "POST",
                    data: {
                        ban_id: ban_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#name').val(data.name);
                        $('#ban_id').val(data.id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });

        });
    </script>
</body>

</html>