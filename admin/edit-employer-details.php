<?php include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_GET['id'];
$skill = implode(",",$skill);
$sql1 ="UPDATE employer SET company_name='$cname',emp_name='$name',contact_no='$contact_no',alt_contact_no='$alt_contact_no',website='$website',est_since='$est_since',team_size='$team_size',skill='$skill',listing='$listing',about_data='$about_data' WHERE id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from employer where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
if($_FILES["logo"]["name"] != ""){
$oname=$_FILES["logo"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["logo"]["tmp_name"];
$path = "image/".$resg->id.'32'.'.'.$extension;
$upath = "image/".$resg->logo;
unlink($upath);
 move_uploaded_file($tn,$path);
  $image = $resg->id.'32'.'.'.$extension;
} else {
  $image = $resg->logo;
}
 if($_FILES["banner"]["name"] != ""){
  $oname=$_FILES["banner"]["name"];
  $pos = strrpos($oname, ".");
  $extension=substr($oname,$pos+1);
  $tn = $_FILES["cat_banner_imag"]["tmp_name"];
  $path = "image/".$resg->id.'66'.'.'.$extension;
  $upath = "image/".$resg->banner;
  unlink($upath);
   move_uploaded_file($tn,$path);
   $image_bn = $resg->id.'66'.'.'.$extension;
  } else {
    $image_bn = $resg->banner;
  } 
$sqlup = "UPDATE employer SET logo ='$image',banner =  '$image_bn'
     WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());  
$sql1 ="UPDATE employer_social_md SET facebook='$facebook',twitter='$twitter',linkedin='$linkedin',email_id='$email_id' WHERE empr_id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
$sql1 ="UPDATE employer_contact SET country='$country',city='$city',address='$address',map_link='$map_link',latitude='$latitude',longitude='$longitude' WHERE empr_id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
 echo "<script>document.location.href='employer.php'</script>";    
}
}
?> 
<style type="">
  label{color: #858796;font-size: 17px;font-weight: 400;}
.form-control{border-radius:8px;height:40px;}
.box-header h6{font-size: 18px!important;}
.box-header .table tr th{  color: #858796;
  font-size: 16px;
}
.box-body .table tr th, .box-body .table tr td{color: #858796!important;font-size:17px!important;}
 .basicinform{color: #858796;font-size: 26px;font-weight: 500;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include("includes/header.php");?>
    <?php include("includes/sidebar.php");?>
<form method="post" action="" enctype="multipart/form-data">    
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
     <section class="content-header">
        <a href="employer.php.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Employer</a>
      </section>
      <!-- Main content -->
      <?php $eid=$_GET['id'];
$sqlsr =mysqli_query($conn,"SELECT * FROM employer WHERE id='".$eid."'");
$resr= mysqli_fetch_array($sqlsr); ?>
      <section class="content">
     <div class="box box-danger gurnew">       
                  <div class="box-body"> 
                        <h4 class="basicinform">Edit Basic Information</h4>
                        <hr>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" name="cname" class="form-control" id="" value="<?= $resr['company_name']; ?>" >
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Name <span class="text-danger">*</span></label>
                                     <input type="text" name="name" placeholder="name" value="<?= $resr['emp_name']; ?>" class="form-control">
								</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email_id" value="<?= $resr['email_id']; ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" name="website" value="<?= $resr['website']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="purpose">Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" name="contact_no" placeholder="0 123 456 7890" value="<?= $resr['contact_no']; ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Alt. Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" name="alt_contact_no" placeholder="0 123 456 7890" value="<?= $resr['alt_contact_no']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Est. Since</label>
                        <input type="text" name="est_since" class="form-control" placeholder="06.04.2002" value="<?= $resr['est_since']; ?>"></div>
                            </div>

                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                   <label>Team Size</label>
                                    <select class="form-control" name="team_size">
                                      <option value="<?= $resr['team_size']; ?>"><?= $resr['team_size']; ?></option>
                                      <option>0 - 10</option>
                                      <option>10 - 25</option>
                                      <option>25 - 50</option>
                                      <option>50 - 100</option>
                                      <option>100 - 150</option>
                                      <option>200 - 250</option>
                                      <option>300 - 350</option>
                                      <option>500 - 1000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                    <label>Multiple Select boxes </label>
                                    <select class="form-control multiple" multiple="" name="skill[]" tabindex="-1">
                                      <option value="Banking">Java Developer</option>
                                      <option value="Banking">Banking</option>
                                      <option value="Digital&amp;Creative">Digital &amp; Creative</option>
                                      <option value="Retail">Retail</option>
                                      <option value="Human Resources">Human Resources</option>
                                      <option value="Management">Management</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                     <label>Allow In Search &amp; Listing</label>
                                    <select class="form-control" name="listing">
                                      <option value="1"><?php if($resr['listing'] =="1"){ echo "Yes";}else{ echo "No"; } ?></option>
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 d-none" id="period_box">
                                <div class="form-group">
                                      <label>About Company</label>
                        <textarea placeholder="Job Description" name="about_data" class="form-control"><?= $resr['about_data']; ?></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>  
				</div>  
				 <div class="box box-danger gurnew">     
					<div class="box-body"> 
                        <h4 class="basicinform">Social Network</h4>
                        <hr>
                        <?php $eid=$_GET['id'];
                $sqlsc =mysqli_query($conn,"SELECT * FROM employer_social_md WHERE empr_id='".$eid."'");
                $resc= mysqli_fetch_array($sqlsc); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook</label>
                        <input type="text" name="facebook" placeholder="www.facebook.com/" value="<?= $resc['facebook']; ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Twitter</label>
                        <input type="text" name="twitter" placeholder="www.twitter.com/" value="<?= $resc['twitter']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Linkedin</label>
                        <input type="text" name="linkedin" placeholder="www.linkedin.com/" value="<?= $resc['linkedin']; ?>" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gmail</label>
                        <input type="text" name="email_id" placeholder="" value="<?= $resc['email_id']; ?>" class="form-control" >
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                         <div class="box box-danger gurnew">     
                         <div class="box-body"> 
                        <h4 class="basicinform">Contact Details</h4>
                        <hr>
                        <?php $eid=$_GET['id'];
                $sqlsct =mysqli_query($conn,"SELECT * FROM employer_contact WHERE empr_id='".$eid."'");
                $resct= mysqli_fetch_array($sqlsct); 
                $cid=$resct['country'];
               $sid=$resct['state'];
               $ctid=$resct['city'];
               $sqlct=mysqli_fetch_array(mysqli_query($conn,"select * from country where id=".$cid));
               $sqlst=mysqli_fetch_array(mysqli_query($conn,"select * from state where id=".$sid));
               $sqlcy=mysqli_fetch_array(mysqli_query($conn,"select * from city where id=".$ctid));
               ?>
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Country</label>
                        <select class="form-control" name="country" id="country">
                            <option value="<?php echo $sqlct['country_id']; ?>"><?php echo $sqlct['country_name']; ?></option>
                          <?php $status="Active";
                           $sqltp=mysqli_query($conn,"SELECT * from country where status='".$status."'");
                            while($restp=mysqli_fetch_array($sqltp)) { ?>
                            <option value="<?php echo $restp['id']; ?>"><?php echo $restp['country_name'];?></option><?php } ?>
                        </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control" name="state" id="state">
                                    <option value="<?php echo $sqlst['state_id']; ?>" ><?php echo $sqlst['state_name']; ?></option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                        <select class="form-control" name="city" id="city">
                                        <option value="<?php echo $sqlcy['city_id']; ?>" ><?php echo $sqlcy['city_name']; ?></option>
                                        </select>  
                                </div>
                            </div>
                        </div>
                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Complete Address</label>
                        <input type="text" name="address" value="<?= $resct['address'];?>" placeholder="#121, North Melbourne VIC -100001, Australia" class="form-control"> 
                                </div>
                            </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label>Find On Map</label>
                        <input type="text" name="map_link" value="<?= $resct['map_link'];?>" placeholder=""
                         class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" value="<?= $resct['latitude'];?>" placeholder="Melbourne" class="form-control">
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Longitude</label>
                        <input type="text" name="longitude" placeholder="Melbourne" value="<?= $resct['longitude'];?>" class="form-control">
                                </div>
                            </div>
                        
                      </div>
                    </div>
                     <button class="btn btn-success btn-lg" type="submit" name="update">Update</button>
                    </div> 
                </form>
          </section> 
    </div>
    
    <?php include("includes/footer.php");?>
    <div class="control-sidebar-bg"></div>
  </div>
  <?php include("includes/js.php");?>
  <script type="text/javascript">
$(document).ready(function(){
$('#country').on('change', function(){
    var ct_id = $(this).val();
    if(ct_id){
        $.ajax({
            type:'POST',
            url:'get_state.php',
            data:'ct_id='+ct_id,
            success:function(html){
                $('#state').html(html);
               // console.log(html);
               // $('#city').html('<option value="">Select Division</option>'); 
            }
        }); 
    }
});
$('#state').on('change', function(){
    var st_id = $(this).val();
    if(st_id){
        $.ajax({
            type:'POST',
            url:'get_state.php',
            data:'st_id='+st_id,
            success:function(html){
                $('#city').html(html);
               // console.log(html);
               // $('#city').html('<option value="">Select Division</option>'); 
            }
        }); 
    }
});
});
</script>
</body>
</html>