<?php include("includes/db_config.php"); 
if(isset($_POST['update_pd']))
{ extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$id=$_SESSION['employer_id'];
$options = [
    'cost' => 11,
];
$passwords = $_POST['password'];
$passwordhash = password_hash($passwords, PASSWORD_BCRYPT, $options);
$sql1 ="UPDATE employer SET password='$passwordhash' WHERE empr_id='".$id."'"; 
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
<div class="page-wrapper">
    <span class="header-span"></span>
    <?php include("includes/header.php");?>
    <section class="menuesboxes">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="navgation">
                        <a href="employer-dashboard.php"> <i class="la la-home"></i> Dashboard</a>
                        <a href="employer-profile.php"><i class="la la-user-tie"></i>My Profile</a>
                      <a href="employer-jd.php"><i class="la la-bookmark-o"></i>Jd Details</a>
                        <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>
                        <a href="employer-wishlist-candidate.php"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>               
                      <a href="employer-interview-candidate.php"><i class="la la-bookmark-o"></i>Interview Candidates</a>
                        <a href="employer-account-summary.php"><i class="la la-box"></i>Account Summary</a>
                        <a href="employer-messages.php"><i class="la la-comment-o"></i>Messages</a>
                        <a href="employer-change-password.php" class="boxactive"><i class="la la-lock"></i>Change Password</a>
                        <a href="logout.php"><i class="la la-sign-out"></i>Logout</a>
                    </ul>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="rightbox">
                        <div class="ls-widget">
                            <div class="tabs-box">

                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <h3 class="text-black">Change Password</h3>
                                        </div>
                                        <div class="widget-content">
                                            <form class="default-form" action="" method="post">
                                                <div class="row">
                                                    <!-- Input 
                <div class="form-group col-lg-7 col-md-12">
                  <label>Old Password </label>
                  <input type="password" name="password" placeholder="">
                </div>-->

                                                    <!-- Input -->
                                                    <div class="form-group col-lg-7 col-md-12">
                                                        <label>New Password</label>
                                                        <input type="password" name="password" placeholder="" onclick="rgcheckPass()" id="password">
                                                    </div>

                                                    <!-- Input -->
                                                    <div class="form-group col-lg-7 col-md-12">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="chpassword" id="chpassword" onclick="rgcheckPass()" placeholder="">
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
    function rgcheckPass() {
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('chpassword');
        var message = document.getElementById('error-nwl');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        var passw = /^[A-Za-z]\w{7,14}$/;

        if ((pass1.value.length > 7) && (pass1.value.match(passw))) {
            pass1.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "character number ok!"
        } else {
            pass1.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " you have to enter at least 7 digit and special character!"
            return;
        }

        if (pass1.value == pass2.value) {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Password Match!"
        } else {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " These passwords don't match"
        }
    }
</script>

</body>

</html>