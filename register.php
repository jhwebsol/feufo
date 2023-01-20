<?php include("includes/db_config.php");
if(isset($_POST['register'])){
extract($_POST);
$email= $_POST['email'];
$password= $_POST['password'];
$cpassword= $_POST['passwords'];
$sql ="SELECT count(*) as num FROM employer WHERE email_id = '".$email."'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$res= mysqli_fetch_array($result);
 $count=$res['num']; 
if($count == 0){
if($password === $cpassword){ 
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$options = [
    'cost' => 11,
];
$passwordFromPost = $_POST['password'];
$passwordhash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
$sql="INSERT into employer(email_id,password,created_date) values ('$email','$passwordhash','$date')";
$result = mysqli_query($conn, $sql); 
$last_id= mysqli_insert_id($conn);
if($result) {
$sqls=mysqli_query($conn,"INSERT into employer_social_md(empr_id) values ('$last_id')");
$sqlss=mysqli_query($conn,"INSERT into employer_contact(empr_id) values ('$last_id')");
$sqlpt=mysqli_query($conn,"INSERT into posts_views(empr_id) values ('$last_id')");
  echo '<script>alert("Registration successfully Completed")</script>'; 
}
}else{
    echo '<script>alert("Email Id OR Password Does not match")</script>';  
} }else{
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
</head>

<body>
    <div class="page-wrapper">
        <?php include("includes/header.php");?>
        <section class="page-title">
            <div class="auto-container">
                <div class="title-outer">
                    <h1>Create a Free Feufo Account</h1>
                </div>
            </div>
        </section>
        <section class="about-section-three" style="background: linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12"></div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="model">
                            <div id="login-modal">
                                <!-- Login Form -->
                                <div class="login-form default-form">
                                    <div class="form-inner">

                                        <form method="post" action="">
                                            <div class="form-group">
                                                <div class="btn-box row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <a href="#" class="theme-btn btn-style-four"><i class="la la-briefcase"></i> Employer </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" name="email" id="emailid" class="email-search" placeholder="Email" required>
                                                <div class="alert alert-warning" id="result2" style="display: none;"> </div>
                                                <span style="color: red" id="email_alert"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" onkeyup="rgcheckPass()" name="password" id="chpassword" placeholder="Password">
                                            </div>

                                            <div class="form-group">
                                                <label>Conform Password</label>
                                                <input id="password-field" type="password" onkeyup="rgcheckPass()" name="passwords" id="cchpassword" value="" placeholder="Password">
                                                <span id="error-nwl"></span>
                                            </div>

                                            <div class="form-group">
                                                <button class="theme-btn btn-style-one" id="register" onclick="return Validate()" type="submit" name="register">Register</button>
                                            </div>
                                        </form>

                                        <div class="bottom-box">
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
        </section>

        <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
<script type="text/javascript">
         function rgcheckPass()
    {
        var pass1 = document.getElementById('chpassword');
        var pass2 = document.getElementById('cchpassword');
        var message = document.getElementById('error-nwl');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
      
        if(pass1.value.length > 5)
        {
            pass1.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "character number ok!"
        }
        else
        {
            pass1.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = " you have to enter at least 6 digit!"
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

$(document).ready(function(){
    $(".email-search").keyup(function()
    {
    searchid = $(this).val();
    dataString = 'search2='+ searchid;
    if(searchid!='')
    {
    $.ajax({
    type: "POST",
    url: "reg_validation.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result2").html(html).show();
    }
    });
    }return false;
    });
    });
</script>
<script type="text/javascript">
$(document).ready(function(){  
    $("#emailid").keyup(function(){
      return validemailid('emailid','emailid_alert'); 
});   }); 
$(document).ready(function(){ 
$("#register").click(function(){
  var emailid    = validemailid('emailid','emailid_alert'); 
  if(emailid == 0 )
  {
    return false;
  }
  });  
});
function Validate() {
    var password = document.getElementById("chpassword").value;
    var confirmPassword = document.getElementById("cchpassword").value;
    if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    return true;
}

 $(function() {
        $('#chpassword').on('keypress', function(e) {
            if (e.which == 32){
                alert('Space not applicable, Please remove spaces');
                console.log('Space Detected');
                return false;
            }
        });
});

</script> 

</body>

</html>