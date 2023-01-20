<?php include("includes/db_config.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_SESSION['employer_id'];
$skill = implode(",",$skill);
$sql1 ="UPDATE employer SET company_name='$cname',emp_name='$name',contact_no='$contact_no',alt_contact_no='$alt_contact_no',website='$website',est_since='$est_since',team_size='$team_size',skill='$skill',listing='$listing',about_data='$about_data' WHERE id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from employer where id = $id";
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
} }
if(isset($_POST['social_submit']))
{ extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$id=$_SESSION['employer_id'];
$sql1 ="UPDATE employer_social_md SET facebook='$facebook',twitter='$twitter',linkedin='$linkedin',email_id='$email_id' WHERE empr_id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
if(isset($_POST['search_addr']))
{ extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$id=$_SESSION['employer_id'];
$sql1 ="UPDATE employer_contact SET country='$country',state='$state',city='$city',address='$address',map_link='$map_link',latitude='$latitude',longitude='$longitude' WHERE empr_id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?>
    <style>
        .menuesboxes {
            background-color: #2f315c !important;
            margin-top: 28px;
            padding-top: 20px;
        }

        .navgation {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 5px;
        }

        .navgation a {
            padding: .75rem 1.25rem;
            background-color: #ced031 !important;
            color: #000 !important;
            font-weight: 600;
            display: block;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, .125);
        }

        .navgation .boxactive {
            background-color: #fff !important;
            color: #000 !important;
        }

        .rightbox {
            background-color: #fff !important;
            padding: 10px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <span class="header-span"></span>
        <?php include("includes/header.php");?>
        <section class="menuesboxes">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="navgation">
                            <a href="employer-dashboard.php"> <i class="la la-home"></i> Dashboard</a>
                            <a href="employer-profile.php" class="boxactive"><i class="la la-user-tie"></i>My Profile</a>
                            <a href="employer-jd.php"><i class="la la-bookmark-o"></i>Jd Details</a>
                            <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>                            
                            <a href="employer-wishlist-candidate.php"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>
                           <a href="employer-interview-candidate.php"><i class="la la-bookmark-o"></i>Interview Candidates</a>
                            <a href="employer-account-summary.php"><i class="la la-box"></i>Account Summary</a>
                            <a href="employer-messages.php"><i class="la la-comment-o"></i>Messages</a>
                            <a href="employer-change-password.php"><i class="la la-lock"></i>Change Password</a>
                            <a href="logout.php"><i class="la la-sign-out"></i>Logout</a>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="rightbox">
                        <div class="col-md-12">
                            <h3 class="text-black mb-2">My Profile</h3>
                             </div>
                            <?php $eid=$_SESSION['employer_id'];
$sqlsr =mysqli_query($conn,"SELECT * FROM employer WHERE id='".$eid."'");
$resr= mysqli_fetch_array($sqlsr); ?>

                            <div class="ls-widget">
                                <div class="tabs-box">
                                    <div class="widget-content">
                                        <form class="default-form" action="" method="post" enctype="multipart/form-data">
                                            <div class="uploading-outer">
                                                <div class="uploadButton">
                                                    <input class="uploadButton-input" type="file" name="logo" accept="image/*, application/pdf" id="upload" multiple="">
                                                    <label class="uploadButton-button ripple-effect" for="upload">Browse Logo</label>
                                                    <span class="uploadButton-file-name"></span>
                                                </div>
                                                <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg &amp; .png</div>
                                            </div>

                                            <div class="uploading-outer">
                                                <div class="uploadButton">
                                                    <input class="uploadButton-input" type="file" name="banner" accept="image/*, application/pdf" id="upload_cover" multiple="">
                                                    <label class="uploadButton-button ripple-effect" for="upload">Browse Cover</label>
                                                    <span class="uploadButton-file-name"></span>
                                                </div>
                                                <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files are .jpg &amp; .png</div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Company Name </label>
                                                    <input type="text" name="cname" placeholder="Company name" value="<?= $resr['company_name']; ?>">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Name </label>
                                                    <input type="text" name="name" placeholder="name" value="<?= $resr['emp_name']; ?>">
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Email-Id</label>
                                                    <input type="text" name="email_id" placeholder="vethire@gmail.com" value="<?= $resr['email_id']; ?>">
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Contact Number</label>
                                                    <input type="text" name="contact_no" placeholder="0 123 456 7890" value="<?= $resr['contact_no']; ?>">
                                                </div>
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Alt. Contact Number</label>
                                                    <input type="text" name="alt_contact_no" placeholder="0 123 456 7890" value="<?= $resr['alt_contact_no']; ?>">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Website</label>
                                                    <input type="text" name="website" placeholder="www.vethire.com" value="<?= $resr['website']; ?>">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Est. Since</label>
                                                    <input type="text" name="est_since" placeholder="06.04.2002" value="<?= $resr['est_since']; ?>">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Team Size</label>
                                                    <select class="" name="team_size">
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

                                                <!-- Search Select -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Skills </label>
                                                    <select class="chosen-select multiple" multiple="" name="skill[]" tabindex="-1">
                                                       <?php $sqltps=mysqli_query($conn,"SELECT * from skill_detail");
                                                    while($restps=mysqli_fetch_array($sqltps)) { ?>
                                                        <option value="<?= $restps['id'];?>"><?= $restps['skill_name'];?></option><?php } ?>
                                                        </select>
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Allow In Search &amp; Listing</label>
                                                    <select class="chosen-select" name="listing">
                                                        <option value="1"><?php if($resr['listing'] =="Yes"){ echo "1";}else{ echo "0"; } ?></option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>

                                                <!-- About Company -->
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label>About Company</label>
                                                    <textarea placeholder="Job Description" name="about_data"><?= $resr['about_data']; ?></textarea>
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <button class="theme-btn btn-style-one" name="update">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Ls widget -->
                            <div class="ls-widget">
                                <div class="tabs-box">
                                    <div class="widget-title">
                                        <h4>Social Network</h4>
                                    </div>
                                    <?php $eid=$_SESSION['employer_id'];
                $sqlsc =mysqli_query($conn,"SELECT * FROM employer_social_md WHERE empr_id='".$eid."'");
                $resc= mysqli_fetch_array($sqlsc); ?>
                                    <div class="widget-content">
                                        <form class="default-form" action="" method="post">
                                            <div class="row">
                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Facebook</label>
                                                    <input type="text" name="facebook" placeholder="www.facebook.com/" value="<?= $resc['facebook']; ?>">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Twitter</label>
                                                    <input type="text" name="twitter" placeholder="www.twitter.com/" value="<?= $resc['twitter']; ?>">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Linkedin</label>
                                                    <input type="text" name="linkedin" placeholder="www.linkedin.com/" value="<?= $resc['linkedin']; ?>">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Gmail</label>
                                                    <input type="text" name="email_id" placeholder="" value="<?= $resc['email_id']; ?>">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <button class="theme-btn btn-style-one" name="social_submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Ls widget -->
                            <div class="ls-widget">
                                <div class="tabs-box">
                                    <div class="widget-title">
                                        <h4>Contact Information</h4>
                                    </div>
                                    <?php $eid=$_SESSION['employer_id'];
                $sqlsct =mysqli_query($conn,"SELECT * FROM employer_contact WHERE empr_id='".$eid."'");
                $resct= mysqli_fetch_array($sqlsct); 
                $cid=$resct['country'];
               $sid=$resct['state'];
               $ctid=$resct['city'];
               $sqlct=mysqli_fetch_array(mysqli_query($conn,"select * from country where id=".$cid));
               $sqlst=mysqli_fetch_array(mysqli_query($conn,"select * from state where id=".$sid));
               $sqlcy=mysqli_fetch_array(mysqli_query($conn,"select * from city where id=".$ctid));
               ?>
                                    <div class="widget-content">
                                        <form class="default-form" action="" method="post">
                                            <div class="row">
                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Country</label>
                                                    <select class="chosen-select" name="country">
                                                        <option value="<?php echo $sqlct['country_id']; ?>"><?php echo $sqlct['country_name']; ?></option>
                                                        <?php $status="Active";
                           $sqltp=mysqli_query($conn,"SELECT * from country where status='".$status."'");
                            while($restp=mysqli_fetch_array($sqltp)) { ?>
                                                        <option value="<?php echo $restp['id']; ?>"><?php echo $restp['country_name'];?></option><?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>State</label>
                                                    <select class="chosen-select" name="state" id="state">
                                                        <option value="<?php echo $sqlst['state_id']; ?>"><?php echo $sqlst['state_name']; ?></option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>City</label>
                                                    <select class="chosen-select" name="city" id="city">
                                                        <option value="<?php echo $sqlcy['city_id']; ?>"><?php echo $sqlcy['city_name']; ?></option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label>Complete Address</label>
                                                    <input type="text" name="address" value="<?= $resct['address'];?>" placeholder="#121, North Melbourne VIC -100001, Australia">
                                                </div>

                                                <div class="form-group col-lg-6 col-md-12">
                                                    <label>Find On Map</label>
                                                    <input type="text" name="map_link" value="<?= $resct['map_link'];?>" placeholder="#121, North Melbourne VIC -100001, Australia">
                                                </div>

                                                <div class="form-group col-lg-3 col-md-12">
                                                    <label>Latitude</label>
                                                    <input type="text" name="latitude" value="<?= $resct['latitude'];?>" placeholder="Melbourne">
                                                </div>

                                                <div class="form-group col-lg-3 col-md-12">
                                                    <label>Longitude</label>
                                                    <input type="text" name="longitude" placeholder="Melbourne" value="<?= $resct['longitude'];?>">
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12">
                                                    <button class="theme-btn btn-style-three" name="search_addr">Add Location</button>
                                                </div>
                                                <!-- Input -->
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <button class="theme-btn btn-style-one">Save</button>
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
        </section>
        <?php include("includes/employer-footer.php");?>
    </div>
    <?php include("includes/js.php");?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#country').on('change', function() {
                var ct_id = $(this).val();
                if (ct_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_state.php',
                        data: 'ct_id=' + ct_id,
                        success: function(html) {
                            $('#state').html(html);
                            // console.log(html);
                            // $('#city').html('<option value="">Select Division</option>'); 
                        }
                    });
                }
            });
            $('#state').on('change', function() {
                var st_id = $(this).val();
                if (st_id) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_state.php',
                        data: 'st_id=' + st_id,
                        success: function(html) {
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