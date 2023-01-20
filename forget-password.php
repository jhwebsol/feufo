<?php include("includes/db_config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
if (isset($_POST['forgot_submit'])){
  $logo = "img/logo.png";
    $logo_width = "100%";
    $logo_height = "";
    // All CSS
    // Body
    $body_title = "Feufo";
    $width_of_mail_body = "80%"; // Please write in % percentage for better view...
    $padding_of_mail_body = "20px";
    $body_background_color = "#ccc";
    $body_text_color = "#000";
    // Header
    $footer_background_color = "#2F3B59";
    $footer_text_color = "black";
    $footer_font_size = "10px";
    $footer_font_family = "monospace";
    // Button
    $button_background_color = "#000";
    $button_text_color = "black";
    $button_font_size = "20px";
    $button_font_family = "monospace";
    $button_padding = "15px";
    $button_border_radius = "10px";
    // Highlight
    $highlight_color = "#000";
    $highlight_font_size = "25px";
    $highlight_font_family = "monospace";
    // Heading
    $heading_color = "#000";
    $heading_font_size = "25px";
    $heading_font_family = "monospace";
 extract($_POST);
$email_id = mysqli_real_escape_string($conn,$_POST['emailid']);
$sql ="SELECT count(*) as num FROM employer WHERE email_id = '".$email_id."'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$res= mysqli_fetch_array($result);
if($count == 0 )
{ $email=$_POST['emailid'];
$date = date("d-m-Y");
$from_team = "Feufo";
$from_website = "https://www.feufo.com/";
$to = $email;
$message = "<html>
                <head>
                    <title>$body_title</title>
                </head>
                <body style='background-color:#f5f5f5;'> 
                        <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;'>                            
                           <div style='background-color:#fff;color:#000;padding:20px 10px 0px 10px;text-align:left'> 
                              <p style='text-align:left;margin-top:15px;font-size:22px;color:#000;margin-bottom:10px;'>Reset your password</p>  
                    <p style='color:#000;font-size:$paragraph_font_size; font-family: $paragraph_font_family;'> 
                                    <span style='color:#000;font-size:$highlight_font_size;font-family: $highlight_font_family;'>
                                       <span style='text-align:left;'>Welcome to Feufo!</span>
                                    </span> 
                               </p>
                               <p style='text-align:left;margin-top:15px;font-size:12px;'>Please take a moment to reset your new password. Your password should have minimum 6 characters. Click on below link.:</p>                                    
                                 <p style='width:100%;font-weight:600;height:40px;color:#fff;'> 
                                   <div style='width:100%;float:left;font-size:15px;font-weight:600;color:#fff;text-align:left'><a href='https://www.feufo.com/forgot-password.php?email=$email' target='_new' style='color:#ff00ff;'>Click Here</a></div>
                                   </div>
                                   <div style='width:100%;background-color:#000;color:#fff;min-height:60px;font-size:12px;padding-top:10px;padding-bottom:10px;text-align:left;'>
                                   <span style='color:#fff;padding-bottom:5px;text-align:center;margin-top:50px;'>Thank You  <a href='https://www.feufo.com/' target='_new' style='color:#fff;'>$from_website</a></span>                       
                               </div>
                            </div> 
                    </body>
                </html>";
$email = new PHPMailer();
$email->SetFrom('admin@feufo.com', 'Feufo');
$email->Subject   ="Change Password";
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress($to);
   if (! $email->Send()) {
      // echo "<script>alert('Problem in sending email!');</script>";
    } else {
    }
      echo '<script>alert("Email sent on your Email-id, please check")</script>'; 
  echo "<script>window.location.href='login.php'</script>";
 }else{
    echo '<script>alert("Email Id Already Exits! Please Login")</script>';  
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
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="model">
                                            <div id="login-modal">
                                                <div class="login-form default-form">
                                                     <div class="title-outer">
                                            <h1 style="color:#000;text-align:center;teaxt-transform:uppercase">Forget Password</h1>
                                            <div style="border-top:1px solid #000;padding:5px 0px;margin-top:5px;margin-bottom:10px;"></div>
                                        </div>

                                                    <div class="form-inner">
                                                        <form method="post" action="">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" name="emailid" id="emailid" placeholder="Username" class="email-login" required>
                                                                <div class="alert alert-warning" id="result" style="display: none;"></div>
                                                                <span style="color: red" id="emailid_alert"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="theme-btn btn-style-one" type="submit" name="forgot_submit">Submit</button>
                                                            </div>
                                                        </form>
                                                        <div class="bottom-box">
                                                            <div class="text">Already have account? <a href="login.php" class="">Login</a></div>
                                                            
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
    </script>

</body>

</html>