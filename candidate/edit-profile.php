<?php include("includes/db_config.php");
if(isset($_POST['update']))
{ extract($_POST);
$id=$_GET["id"];
date_default_timezone_set('Asia/Kolkata');
$datetime = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
$category = strtolower(str_replace(" ", "-", $res_cat['cat_name']));
$sub_category = strtolower(str_replace(" ", "-", $res_scat['sub_category_name']));
$emp_namess = strtolower(str_replace(" ", "-", $emp_name));
$old_emp_name = strtolower(str_replace(" ", "-", $old_emp_name));
$emps_name = mysqli_real_escape_string($conn,$emp_namess);
      $sqls ="UPDATE employee_details SET salary='$salary',location='$location',job_type='$job_type',avalibility='$avalibility',experience_level='$experience_level',assetment_link='$assetment_link',previous_comp_linkedin='$previous_comp_linkedin',present_comp_linkedin='$present_comp_linkedin',github='$github',linkedin='$linkedin'  WHERE id='$id'";  
            $ress=mysqli_query($conn,$sqls);
            if($ress)
            {   $sqlg = "SELECT * from employee_details where id = '$id'";
               $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error($conn));
               $resg = mysqli_fetch_object($resultg);
               if($_FILES["image"]["name"] != ""){
                $oname=$_FILES["image"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image"]["tmp_name"];
                $path = "emp/".$resg->id.'313'.'.'.$extension;
                $upath = "emp/".$resg->image;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image = $resg->id.'313'.'.'.$extension;
                } else {
                  $image = $resg->image;
                } 
               if($_FILES["image2"]["name"] != ""){
                $oname=$_FILES["image2"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image2"]["tmp_name"];
                $path = "emp/".$resg->id.'bn'.'.'.$extension;
                $upath = "emp/".$resg->image2;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image2 = $resg->id.'bn'.'.'.$extension;
                } else {
                  $image2 = $resg->image2;
                } 
               if($_FILES["image3"]["name"] != ""){
                $oname=$_FILES["image3"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image3"]["tmp_name"];
                $path = "emp/".$resg->id.'map'.'.'.$extension;
                $upath = "emp/".$resg->image3;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image3 = $resg->id.'map'.'.'.$extension;
                } else {
                  $image3 = $resg->image3;
                } 
               if($_FILES["image4"]["name"] != ""){
                $oname=$_FILES["image4"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["image4"]["tmp_name"];
                $path = "emp/".$resg->id.'212'.'.'.$extension;
                $upath = "emp/".$resg->image4;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $image4 = $resg->id.'212'.'.'.$extension;
                } else {
                  $image4 = $resg->image4;
                } 
               if($_FILES["resume"]["name"] != ""){
                $oname=$_FILES["resume"]["name"];
                $pos = strrpos($oname, ".");
                $extension=substr($oname,$pos+1);
                $tn = $_FILES["resume"]["tmp_name"];
                $path = "emp/".$resg->id.'414'.'.'.$extension;
                $upath = "emp/".$resg->resume;
                unlink($upath);
                 move_uploaded_file($tn,$path);
                 $resume = $resg->id.'414'.'.'.$extension;
                } else{
                  $resume = $resg->resume;
                }
               $sqlup = "UPDATE employee_details SET image = '$image',image2 = '$image2',image3='$image3',image4='$image4',image5='$image5',resume='$resume' WHERE id = $resg->id"; 
                $resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());    
                       echo "<script>document.location.href='candidate-job.php'</script>";     
            }
      }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?>
</head>

<body>
    <div class="page-wrapper dashboard">
        <span class="header-span"></span>
        <?php include("includes/header.php");?>
        <div class="sidebar-backdrop"></div>
        <div class="user-sidebar">
            <div class="sidebar-inner">
                <ul class="navigation">
                    <li><a href="dashboard.php"><i class="la la-home"></i>Dashboard</a></li>
                    <li><a href="my-profile.php"><i class="la la-user-tie"></i>My Profile</a></li>
                    <li class="active"><a href="edit-profile.php"><i class="la la-user-tie"></i>Edit Profile</a></li>
                    <li><a href="my-resume.php"><i class="la la-file-invoice"></i>My Resume</a></li> 
                    <li><a href="job-alerts.php"><i class="la la-bell"></i>Job Alerts</a></li>
                    <li><a href="benifits-offered.php"><i class="la la-bell"></i>Benifit Offered</a></li>
                    <li><a href="shortlisted-jobs.php"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li> 
                    <li><a href="messages.php"><i class="la la-comment-o"></i>Messages</a></li>
                    <li><a href="change-password.php"><i class="la la-lock"></i>Change Password</a></li>
                    <li><a href="logout.php"><i class="la la-sign-out"></i>Logout</a></li>
                </ul> 
            </div>
        </div>
      <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>Candidate Profile!</h3>
          <div class="text">Ready to jump back in?</div>
        </div>
       <?php $euser_id=$_SESSION['employee_id'];
       $sql=mysqli_query($conn,"select * from employee_details where id='".$euser_id."' "); 
       $res= mysqli_fetch_array($result);  ?>
                      
        <div class="row">
          <div class="col-lg-12">
             <div class="ls-widget">
              <div class="tabs-box">
                <div class="widget-title">
                  <h4>Edit Profile</h4>
                </div>
                <div class="widget-content">
                  <div class="uploading-outer"> 
                  <form class="default-form" action="my-profile.php">
                    <div class="row">
                      
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Name </label>
                        <input type="text" name="name" value="<?php echo $res['emp_name']; ?>" placeholder="name" readonly>
                      </div>

                       <div class="form-group col-lg-6 col-md-12">
                        <label>Email-Id</label>
                        <input type="text" name="email_id" value="<?php echo $res['email_id']; ?>" placeholder="feufo@gmail.com" readonly="">
                      </div>
                         <!-- <div class="form-group col-lg-6 col-md-12">
                        <label>Alt. Email</label>
                        <input type="email" name="alt_email_id" value="<?php echo $res['alt_email_id']; ?>" placeholder="info@feufo.com">
                      </div> -->

                       <div class="form-group col-lg-6 col-md-12">
                        <label>Contact Number</label>
                        <input type="text" name="mobile_no" value="<?php echo $res['mobile_no']; ?>" placeholder="+1-123 456 7890">
                      </div>
                         <div class="form-group col-lg-6 col-md-12">
                        <label>Location</label>
                        <input type="text" name="name" value="<?php echo $res['location']; ?>" placeholder="Location">
                      </div> 
                       <div class="form-group col-lg-6 col-md-12">
                        <label>Job type</label>
                        <input type="date" name="name" value="<?php echo $res['job_type']; ?>" placeholder="Job type">
                      </div>
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Salary</label>
                        <input type="text" name="salary" value="<?= $res['salary']; ?>" placeholder="Salary">
                      </div> 
                      <!--  <div class="form-group col-lg-12 col-md-12">
                        <label>Feufo Fees</label>
                        <input type="text" name="feufo_fees" value="<?php echo $res['feufo_fees']; ?>" placeholder="Feufo">
                      </div> -->  
                      <div class="form-group col-lg-6 col-md-12">
                        <label>Avalibility</label>
                        <input type="text" name="avalibility" value="<?= $res['avalibility']; ?>" placeholder="avalibility">
                      </div> 
                       <div class="form-group col-lg-12 col-md-12">
                        <label>Assetment link</label>
                        <input type="text" name="assetment_link" value="<?php echo $res['assetment_link']; ?>" placeholder="Assetment link">
                      </div>  
                       <div class="form-group col-lg-12 col-md-12">
                        <label>Github</label>
                        <input type="text" name="github" value="<?php echo $res['github']; ?>" placeholder="github">
                      </div>  
                       <div class="form-group col-lg-12 col-md-12">
                        <label>Present Work At</label>
                        <img src="emp/<?php echo $res['previous_company']; ?>" style="width:30px;"><br/>
                        <input type="file" name="pimg" placeholder="github">
                      </div>  
                       <div class="form-group col-lg-12 col-md-12">
                        <label>Present Company Linkedin Id</label>
                        <input type="text" name="previous_comp_linkedin" value="<?php echo $res['previous_comp_linkedin']; ?>" placeholder="Present Company Linkedin Id">
                      </div>  
                      <div class="form-group col-lg-12 col-md-12">
                        <label>Previous Work At</label>
                        <img src="emp/<?php echo $res['present_company']; ?>" style="width:30px;"><br/>
                        <input type="file" name="pvimg" placeholder="github">
                      </div>  
                       <div class="form-group col-lg-12 col-md-12">
                        <label>Previous Company Linkedin Id</label>
                        <input type="text" name="present_comp_linkedin" value="<?php echo $res['present_comp_linkedin']; ?>" placeholder="Previous Company Linkedin Id">
                      </div>  
                       <div class="form-group col-lg-6 col-md-12">
                        <label>Facebook</label>
                        <input type="text" name="name" placeholder="www.facebook.com/">
                      </div>

                      <div class="form-group col-lg-6 col-md-12">
                        <label>Linkedin</label>
                        <input type="text" name="name" value="<?php echo $res['linkedin']; ?>" placeholder="www.linkedin.com/">
                      </div>

                       <div class="form-group col-lg-6 col-md-12">
                        <label>Twitter</label>
                        <input type="text" name="name" value="<?php echo $res['twitter']; ?>" placeholder="www.twitter.com/">
                      </div>

                       <div class="form-group col-lg-6 col-md-12">
                        <label>Discord</label>
                        <input type="text" name="discord" value="<?php echo $res['discord']; ?>" placeholder="Discord">
                      </div>  
                      </div> 
                      <div class="form-group col-lg-4 col-md-4">
                        <label>Image </label><br/>
                         <input type="file" name="image">
                        <img src="https://www.feufo.com/admin/emp/<?php echo $res['image']; ?>" alt="" style="height: 50px;">
                      </div>  
                      <div class="form-group col-lg-4 col-md-4">
                        <label>Image 2 </label><br/>
                         <input type="file" name="image2">
                        <img src="https://www.feufo.com/admin/emp/<?php echo $res['image2']; ?>" alt="" style="height: 50px;">
                      </div>  
                      <div class="form-group col-lg-4 col-md-4">
                        <label>Image 3 </label><br/>
                         <input type="file" name="image3">
                        <img src="https://www.feufo.com/admin/emp/<?php echo $res['image3']; ?>" alt="" style="height: 50px;">
                      </div>  
                    
                       <div class="form-group col-lg-4 col-md-4">
                        <label>Image 4 </label><br/>
                         <input type="file" name="image4">
                        <img src="https://www.feufo.com/admin/emp/<?php echo $res['image4']; ?>" alt="" style="height: 50px;">
                      </div>  
                    
                       <div class="form-group col-lg-4 col-md-4">
                        <label>Image 5 </label><br/>
                         <input type="file" name="image5">
                        <img src="https://www.feufo.com/admin/emp/<?php echo $res['image5']; ?>" alt="" style="height: 50px;">
                      </div>  
                    
                       <div class="form-group col-lg-12 col-md-12">
                        <button class="theme-btn btn-style-one" type="submit" name="update">Update</button>
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
    <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>