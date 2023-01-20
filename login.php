<?php include("includes/db_config.php");
 if(isset($_POST["log_submit"])) 
{  extract($_POST);
$emails = $_POST["username"]; 
$passwords = $_POST["passwords"]; 
$emails = stripslashes($emails);
$passwords = stripslashes($passwords);
$sqlsr ="SELECT * FROM employer WHERE email_id = '".$emails."'";
$result = mysqli_query($conn, $sqlsr) or die(mysqli_error($conn));
$resr= mysqli_fetch_array($result);
$hashedpassword=$resr['password']; 
if (password_verify($passwords, $hashedpassword)){ 
$_SESSION['loggedin_employer'] = true;
$_SESSION['employer_id']=$resr['id'];
echo $user_id=$_SESSION['employer_id'];
echo '<script>alert("Login successfully")</script>'; 
echo "<script>window.location.href='https://www.feufo.com/employer-dashborad.php'</script>";
}else{
$sqlcd =mysqli_query($conn,"SELECT * FROM employee_details WHERE email_id = '".$emails."'");
$rescd= mysqli_fetch_array($sqlcd);
$passwordep=$rescd['password']; 
if (password_verify($passwords, $passwordep)){ 
$_SESSION['loggedin_employee'] = true;
$_SESSION['employee_id']=$rescd['id'];
echo $euser_id=$_SESSION['employee_id'];
echo '<script>alert("Login successfully")</script>'; 
echo "<script>window.location.href='https://www.feufo.com/candidate/dashboard.php'</script>";
}else{ echo '<script>alert("The username or password are incorrect!")</script>'; }
}
//else{ echo '<script>alert("The username or password are incorrect!")</script>'; }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?>
    <link href="css/candidate.css" rel="stylesheet">
    <style>
        .default-form .form-group input[type="text"] {
            height: 50px;
            line-height: 30px;
            padding: 15px 20px;
            font-size: 15px;
            color: #696969;
            background: #F0F5F7;
            border: 1px solid #CFD2D2;
        }

        .default-form .form-group {
            margin-bottom: 10px;
        }

        .default-form .form-group>label {
            margin-bottom: 5px;
        }

        #login-modal .social-btn-two {
            padding: 10px 3px;
        }

        .social-btn-two i {
            margin-right: 5px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <?php include("includes/header.php");?>
        <section class="page-title">
            <div class="auto-container">
                <div class="title-outer">
                </div>
            </div>
        </section>
        <section class="about-section-three" style="background: linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12"></div>
                    <div class="col-lg-8 col-md-8 col-sm-12" id="contents">
                        <div class="row" id="login-modal">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:0px;background-color:#2f315c;">
                                    <div class="title-box">
                                        <center><img src="https://www.feufo.com/img/logo.png" alt="" title=""></center>
                                        <div style="border-top:1px solid;padding:10px 0px;margin-top:10px;margin-bottom:10px;"></div>
                                        <h3 style="color:#fff">Experience hiring with Feufo as easily as shopping with Amazon</h3>
                                        <div class="text" style="color:#fff">Hiring engineers can be a daunting task. Not only do you have to review their resumes, but you also have to review their coding challenges and assess their skills. With Feufo, you can skip all of that. Feufo has made it easy by pre-vetting engineers with real coding challenges. Any startup can review the engineer's test code and hire in just a few clicks. With over 10,000 engineers from premium companies and universities, you're sure to find the perfect fit for your next project. Feufo has you covered.</div>
                                    </div>
                                </div>
                                <div class="model col-lg-6 col-md-6 col-sm-12" style="background-color:#fff">
                                    <div class="login-form default-form">
                                        <div class="title-outer">
                                            <h1 style="color:#000;text-align:center;teaxt-transform:uppercase">Login to Feufo</h1>
                                            <div style="border-top:1px solid #000;padding:5px 0px;margin-top:5px;margin-bottom:10px;"></div>
                                        </div>
                                        <div class="form-inner">
                                            
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" id="emailid" placeholder="Username" class="email-login" required>
                                                    <div class="alert alert-warning" id="result" style="display: none;"> </div>
                                                    <span style="color: red" id="emailid_alert"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input id="password-field" type="password" name="passwords" value="" placeholder="Password">
                                                </div>

                                                <div class="form-group">
                                                    <div class="field-outer">
                                                        <a href="forget-password.php" class="pwd">Forgot password?</a>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button class="theme-btn btn-style-one" type="submit" name="log_submit">Log In</button>
                                                </div>
                                            </form>

                                            <div class="bottom-box">
                                                <div class="text">Don't have an account? <a href="register.php" class="">Signup</a></div>
                                                <div class="divider"><span>or</span></div>
                                                <div class="btn-box row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-linkedin"></i> Log In via Linkedin</a>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                                                    </div>
                                                </div>
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

        <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".email-login").keyup(function() {
                searchid = $(this).val();
                dataString = 'search=' + searchid;
                if (searchid != '') {
                    $.ajax({
                        type: "POST",
                        url: "reg_validation.php",
                        data: dataString,
                        cache: false,
                        success: function(html) {
                            $("#result").html(html).show();
                        }
                    });
                }
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#emailid").keyup(function() {
                return validemailid('emailid', 'emailid_alert');
            });
        });
        $(document).ready(function() {
            $("#login").click(function() {
                var emailid = validemailid('emailid', 'emailid_alert');
                if (emailid == 0) {
                    return false;
                }
            });
        });
        $(document).ready(function() {
            $("#fpass").click(function() {
                $("#trigger").toggle();
                $("#contents").hide();
            });
        });
    </script>

</body>

</html>