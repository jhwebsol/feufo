<?php include("includes/db_config.php"); 
if (isset($_POST['submit'])) {
  extract($_POST);
   date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
 $skm = implode(',',$skill);
  $subject=mysqli_real_escape_string($conn,$_POST['subject']);
   $data = htmlentities( $_POST['data']);
   $eid=$_SESSION['employer_id'];
 $message=mysqli_real_escape_string($conn,$data);
$sql_qry="insert into jd_detail(empr_id,skills,subject,message) values ('$eid','$skm','$subject','$message')";
$res=mysqli_query($conn,$sql_qry);
if($res){
    echo "<script>window.location.href='employer-jd.php'</script>";
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
        .rightbox .ls-widget .widget-content p{color:#000}
    </style>
    <link href="admin/summernote/summernote.css" rel="stylesheet">
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
                        <a href="employer-jd.php" class="boxactive"><i class="la la-bookmark-o"></i>Jd Details</a>
                        <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>
                        <a href="employer-shortlisted-candidate.php"><i class="la la-bookmark-o"></i>Shortlisted Candidates</a>
                        <a href="employer-wishlist-candidate.php"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>
                        <a href="employer-account-summary.php"><i class="la la-box"></i>Account Summary</a>
                        <a href="employer-messages.php"><i class="la la-comment-o"></i>Messages</a>
                        <a href="employer-change-password.php"><i class="la la-lock"></i>Change Password</a>
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
                                            <h3 class="text-black">Add Jd Details</h3>
                                        </div>
                                        <div class="widget-content">
                                            <?php $eid=$_SESSION['employer_id'];
                                                $sqlsr =mysqli_query($conn,"SELECT * FROM employer WHERE id='".$eid."'");
                                                $resr= mysqli_fetch_array($sqlsr); ?>
                                            <form class="default-form" action="" method="post">
                                                <div class="row">
                                                     <div class="form-group col-lg-12 col-md-12">
                                                        <label>Select Skills</label>
                                                        <select class="chosen-select" name="skill[]" multiple style="height:80%;">
                                                            <option>Select Skills</option>
                                                            <?php /*$sid=$resr['skill'];
                                                            $sk_id=$res['skill'];
                                                        $rids = explode(",",$sk_id);
                                                        foreach($rids as $pm_id){*/
                                                    $sqltps=mysqli_query($conn,"SELECT * from skill_detail ");
                                                    while($restps=mysqli_fetch_array($sqltps)){ ?>
                                                        <option value="<?= $restps['id'];?>"><?= $restps['skill_name'];?></option><?php } //} ?>
                                                       </select>  
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>Subject</label>
                                                        <input type="text" name="subject" placeholder="Enter Subject" >
                                                    </div>

                                                    <!-- Input -->
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <label>JD Data</label>
                                                        <textarea name="data"  id="summernote" style="height:200px; width:100%; color:#000;"></textarea>  
                                                    </div>

                                                    <!-- Input -->
                                                    <div class="form-group col-lg-6 col-md-12">
                                                        <button class="theme-btn btn-style-one" type="submit" name="submit">Add</button>
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
<script src="admin/summernote/summernote.js"></script> 
<script> 
$('#summernote').summernote({
   tabsize: 2,
  height: 400,
});
</script> 
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