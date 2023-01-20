<?php include("includes/db_config.php"); 
if(isset($_POST['update_pd']))
{ extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$id=$_SESSION['employee_id'];
$options = [
    'cost' => 11,
];
$passwords = $_POST['password'];
$passwordhash = password_hash($passwords, PASSWORD_BCRYPT, $options);
$sql1 ="UPDATE employee_details SET password='$passwordhash' WHERE empr_id='".$id."'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){ echo " <script>alert('Password Updated!!!'); 
                    </script>";
}
} ?>
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
                    <li><a href="edit-profile.php"><i class="la la-user-tie"></i>Edit Profile</a></li>
                    <li><a href="my-resume.php"><i class="la la-file-invoice"></i>My Resume</a></li> 
                    <li><a href="job-alerts.php"><i class="la la-bell"></i>Job Alerts</a></li>
                    <li><a href="benifits-offered.php"><i class="la la-bell"></i>Benifit Offered</a></li>
                    <li><a href="shortlisted-jobs.php"><i class="la la-bookmark-o"></i>Shortlisted Jobs</a></li> 
                    <li><a href="messages.php"><i class="la la-comment-o"></i>Messages</a></li>
                    <li class="active"><a href="change-password.php"><i class="la la-lock"></i>Change Password</a></li>
                    <li><a href="logout.php"><i class="la la-sign-out"></i>Logout</a></li>
                </ul> 
            </div>
        </div>
        <section class="user-dashboard">
      <div class="dashboard-outer">
        <div class="upper-title-box">
          <h3>Change Password</h3>
          <div class="text">Ready to jump back in?</div>
        </div>

        <!-- Ls widget -->
        <div class="ls-widget">
          <div class="widget-title">
            <h4>Change Password</h4>
          </div>

          <div class="widget-content">
            <form class="default-form" action="#">
              <div class="row">
                <!-- Input -->
                <div class="form-group col-lg-7 col-md-12">
                  <label>New Password</label>
                  <input type="password" name="password" id="password" placeholder="">
                </div>
                <!-- Input -->
                <div class="form-group col-lg-7 col-md-12">
                  <label>Confirm Password</label>
                  <input type="password" name="chpassword" id="chpassword" placeholder="">
                </div>

                <!-- Input -->
                <div class="form-group col-lg-6 col-md-12">
                  <button class="theme-btn btn-style-one" name="update_pd">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
        <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
<script type="text/javascript">
     function rgcheckPass()
    {
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('chpassword');
        var message = document.getElementById('error-nwl');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        var passw=  /^[A-Za-z]\w{7,14}$/;
 
        if((pass1.value.length > 7) && (pass1.value.match(passw)))
        {
            pass1.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "character number ok!"
        }
        else
        {
            pass1.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " you have to enter at least 7 digit and special character!"
            return;
        }
      
        if(pass1.value == pass2.value)
        {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Password Match!"
        }
      else
        {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " These passwords don't match"
        }
    } 
</script>    
</body>

</html>