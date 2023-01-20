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
echo "<script>window.location.href='https://www.feufo.com/employer-dashboard.php'</script>";
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
                                
                                <div class="model col-lg-12 col-md-12 col-sm-12" style="background-color:#fff">
                                    <div class="login-form default-form">                                         
                                       
                                        	<form method="post" action="">
                                        		 <div class="row form-inner">
                                        		  <div class="col-md-7 form-group">
                                        		 	<h2 style="color:#000">Get Hired with Feufo  </h2>
                                            <div class="text" style="">If you're an engineer, we want to help you find your dream job and earn 25% of Feufo's fees once you get hired. If you're a company, we want to help you build your dream team. Either way, we hope you'll join us on this journey!<br/>
                                        	We will market your profile to different Startup from the US, Canada, the UK and a few other countries where your salary expectation and timezone preference get matched.<br/>
                                        	For taking up the test. you will get paid flat 25% from Feufo fees once you get hired without taking the test if you want to get listed, You will get 10% of Feufo fees (T&C: You have to be from 1st Tier Universities or Unicorn/Premium, companies.<br/>
                                        	***Keep yourself away from creating any profile. Share us the Info, we will do the rest!***<br/>
                                        Note: We dont offer any sponsorship, Neither do our client.</div>
                                         </div>
                                                <div class="col-md-5 form-group">
                                                    <label>How does Feufo Talent Onboarding work?</label>
                                                   <iframe width="100%" height="300px" src="https://www.youtube.com/embed/ACEt8k-x7PY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="username" id="name" placeholder="Your Answer" class="email-login" required>
                                                    <div class="alert alert-warning" id="result" style="display: none;"> </div>
                                                    <span style="color: red" id="emailid_alert"></span>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>Opting out for *</label>
                                                    <label class="radio-inline">
                                                    	<input type="radio" name="optradio" checked> Skills based (Earn flat 25% of feufo fees once you get hired)
                                                    </label>
                                                    <label class="radio-inline">
                                                    	<input type="radio" name="optradio"> Skills based (Earn flat 25% of feufo fees once you get hired)
                                                    </label>                                                    
                                                    <label class="radio-inline">
                                                    	<input type="radio" name="optradio"> Premium Universities. (Earn 10% of Feufo fees once you get hired)
                                                    </label>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>What type of companies you would like to work?</label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>In which programming Language and libraries do you want to take the test? We will share a small coding challenge based on your preference</label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>If you are from Europe and & Asia, What are the international time zone you are okay to work in?</label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>What is your salary expectation? *</label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>How soon You can join once you get Hired? </label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>Location *</label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <label>Linkedin Profile</label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <label>Your Repository Link (Github, Gitlab, etc)*</label>
                                                    <input id="" type="text" name="" value="" placeholder="Your Answer">
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label>Upload your Photo *</label>
                                                    <input id="" type="file" name="" value="" placeholder="Your Answer">
                                                </div>
 

                                                <div class="col-md-6 form-group">
                                                    <label>Your CV *</label>
                                                    <input id="" type="file" name="" value="" placeholder="Your Answer">
                                                </div>
 

                                                <div class="col-md-6 form-group">
                                                    <button class="theme-btn btn-style-one" type="submit" name="log_submit">Submit</button>
                                                </div>
                                                 <div class="col-md-6 form-group">
                                                    <button class="theme-btn " type="submit" name="log_submit">Clearform</button>
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