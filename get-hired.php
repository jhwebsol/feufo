<?php include("includes/db_config.php");
 if (empty($_SESSION['token'])) {
if (function_exists('mcrypt_create_iv')) {
$_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
 } else {
  $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
 }
}
$token = $_SESSION['token']; 

if (isset($_POST["enquiry"]) ) {
if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {    
extract($_POST);
 date_default_timezone_set('Asia/Kolkata');
 $datetime = date('Y-m-d H:i:s');
$name = mysqli_real_escape_string($conn,$hname);
$skill = mysqli_real_escape_string($conn,$optradio);
$company_name = mysqli_real_escape_string($conn,$company_name);
$programming_language = mysqli_real_escape_string($conn,$programming);
$timezone = mysqli_real_escape_string($conn,$timezone);
$salary = mysqli_real_escape_string($conn,$salary);
$joining_at = mysqli_real_escape_string($conn,$join);
$location = mysqli_real_escape_string($conn,$location);
$linkedin = mysqli_real_escape_string($conn,$linkedin);
$repository_link = mysqli_real_escape_string($conn,$repository);
$tmp_file = $_FILES['image']['tmp_name'];
$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$bimg = $rand.".".$ext;
move_uploaded_file($tmp_file,"admin/img/".$bimg);
$tmp_file = $_FILES['resume']['tmp_name'];
$ext = pathinfo($_FILES["resume"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$img = $rand.".".$ext;
move_uploaded_file($tmp_file,"admin/img/".$img);
$sql="INSERT into hired_enquiry(name,skill,company_name,programming_language,timezone,salary,joining_at,location,linkedin,repository_link,image,cv,created_date) values ('$name','$skill','$company_name','$programming_language','$timezone','$salary','$joining_at','$location','$linkedin','$repository_link','$bimg','$img','$datetime')";
$result = mysqli_query($conn, $sql); 
if($result){
echo '<script>alert("Thank you!! We will Get Back To You Shortly.")</script>';  }
}else{
echo '<script>alert("Something went wrong")</script>';     
} } } ?>
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
                                       
                                        	<form method="post" action="" enctype="multipart/form-data">
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
                                                    <input type="hidden" name="token" value="<?=$_SESSION["token"]?>">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="hname" id="hname" placeholder="Your Answer" class="email-login" required>
                                                    <span style="color: red" id="hname_alert"></span>
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
                                                    <input id="company_name" type="text" name="company_name" placeholder="Your Answer">
                                                    <span style="color: red" id="company_name_alert"></span>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>In which programming language and libraries do you want to take the test? We will share a small coding challenge based on your preference</label>
                                                    <input id="programming" type="text" name="programming" value="" placeholder="Your Answer">
                                                    <span style="color: red" id="programming_alert"></span>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>If you are from Europe and & Asia, What are the international time zone you are okay to work in?</label>
                                                    <input id="timezone" type="text" name="timezone" placeholder="Your Answer">
                                                    <span style="color: red" id="timezone_alert"></span>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>What is your salary expectation? *</label>
                                                    <input id="salary" type="text" name="salary" placeholder="Your Answer">
                                                    <span style="color: red" id="salary_alert"></span>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>How soon You can join once you get Hired? </label>
                                                    <input id="join" type="text" name="join" placeholder="Your Answer">
                                                    <span style="color: red" id="join_alert"></span>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>Location *</label>
                                                    <input id="location" type="text" name="location" placeholder="Your Answer">
                                                    <span style="color: red" id="location_alert"></span>
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label>Linkedin Profile</label>
                                                    <input id="linkedin" type="text" name="linkedin" placeholder="Your Answer">
                                                    <span style="color: red" id="linkedin_alert"></span>
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <label>Your Repository Link (Github, Gitlab, etc)*</label>
                                                    <input id="repository" type="text" name="repository" placeholder="Your Answer">
                                                    <span style="color: red" id="repository_alert"></span>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label>Upload your Photo *</label>
                                                    <input type="file" name="image" placeholder="Your Answer" required>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Your CV *</label>
                                                    <input id="" type="file" name="resume" placeholder="Your Answer" required>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <button class="theme-btn btn-style-one" type="submit" name="enquiry" id="">Submit</button>
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
            $("#hname").keyup(function() {
                return validatetext('hname', 'hname_alert');
            });
        });
        $(document).ready(function() {
            $("#company_name").keyup(function() {
                return validatetext('company_name', 'company_name_alert');
            });
        });
        $(document).ready(function() {
            $("#programming").keyup(function() {
                return validatetext('programming', 'programming_alert');
            });
        });
        $(document).ready(function() {
            $("#timezone").keyup(function() {
                return validatetext('timezone', 'timezone_alert');
            });
        });
        $(document).ready(function() {
            $("#salary").keyup(function() {
                return validatetext('salary', 'salary_alert');
            });
        });
        $(document).ready(function() {
            $("#join").keyup(function() {
                return validatetext('join', 'join_alert');
            });
        });
        $(document).ready(function() {
            $("#location").keyup(function() {
                return validatetext('location', 'location_alert');
            });
        });
        $(document).ready(function() {
            $("#linkedin").keyup(function() {
                return validatetext('linkedin', 'linkedin_alert');
            });
        });
        $(document).ready(function() {
            $("#repository").keyup(function() {
                return validatetext('repository', 'repository_alert');
            });
        });
        $(document).ready(function() {
            $("#enq_submit").click(function() {
                var hname = validatetext('hname', 'hname_alert');
                var company_name = validatetext('company_name', 'company_name_alert');
                var programming = validatetext('programming', 'programming_alert');
                var join = validatetext('join', 'join_alert');
                var timezone = validatetext('timezone', 'timezone_alert');
                var location = validatetext('location', 'location_alert');
                var linkedin = validatetext('linkedin', 'linkedin_alert');
                var repository = validatetext('repository', 'repository_alert');
                var linkedin = validatetext('linkedin', 'linkedin_alert');
                if (hname == 0 || company_name == 0 || programming == 0 || timezone == 0 || location == 0 || linkedin == 0 || repository == 0 || join == 0) {
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