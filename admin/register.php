<?php include("includes/db_config.php");
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
if (isset($_POST['register_submit'])) {
    $logo = "img/logo.png";
    $logo_width = "100%";
    $logo_height = "";
    // All CSS
    // Body
    $body_title = "Dezign Mania";
    $width_of_mail_body = "90%"; // Please write in % percentage for better view...
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
    $highlight_font_size = "14px";
    $highlight_font_family = "monospace";
    // Heading
    $heading_color = "#000";
    $heading_font_size = "25px";
    $heading_font_family = "monospace";
  
 extract($_POST);
$email_id = mysqli_real_escape_string($conn,$_POST['email_id']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$sql ="SELECT count(*) as num FROM user_profile WHERE email_id = '".$email_id."'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$res= mysqli_fetch_array($result);
 $count=$res['num']; 
if($count == 0 )
{ 
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$password = md5($_POST["password"]); 
$ip=$_SERVER['REMOTE_ADDR'];
$sql="INSERT into user_profile(first_name,last_name,email_id,password,created_date,ip_address) values ('$fname','$lname','$email_id','$password','$date','$ip')";
$result = mysqli_query($conn, $sql);
$last_id= mysqli_insert_id($conn);
if($result) {
    $sqll ="SELECT * FROM user_profile WHERE id = '".$last_id."'";
$resultt = mysqli_query($conn, $sqll) or die(mysqli_error($conn));
$ress= mysqli_fetch_array($resultt);
$name=$ress['first_name'];
$email=$ress['email_id'];
$passwords=$_POST["password"];
$date = date("d-m-Y");
$from_team = "Dezign Maina";
$from_website = "https://www.dezignmania.com/";
$to = $email;
$message = "<html>
    <head>
        <title>$body_title</title>
    </head>
    <body style='background-color:#ececec;'> 

            <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' >
           <div style='background-color:#fff;color:#000184;font-size:32px;font-weight:600;padding:20px 0px;text-align:center'> Dezign Mania </div>                          
           <div style='background-color:#000;border-radius:5px;height:350px;padding:0px 10px 0px 10px'> 
               <p style='color:#fff; font-size:18px; font-family: $paragraph_font_family;text-align:left;'> 
                    <span style='color:#fff; font-size: $highlight_font_size; font-family: $highlight_font_family;text-align:left;'>
                      <span style='text-transform:capitalize;font-size:12px;text-align:left;'>Dear $name.</span><br/><font style='font-size:12px;margin-bottom:10px;'> Your Profile has been successfully registered.</font> 
                    </span> 
                </p>
                <div style='width:26%;font-size:11px;float:left;font-weight:600;color:#fff;text-align:left;line-height:20px;'>Login URL:</div>
                <div style='width:74%;float:left;font-size:13px;font-weight:500;color:#fff!important;text-align:left;line-height:20px;'>https://www.dezignmania.com/login.php</div>
                <br/>
                <div style='width:26%;float:left;font-weight:600;font-size:11px;color:#fff;text-align:left;line-height:20px;'>LOGIN ID:</div>
                <div style='width:74%;float:left;font-weight:500;font-size:13px;color:#fff!important;text-align:left;line-height:20px;'>$email</div>
                <br/>
                <div style='width:26%;float:left;font-weight:600;font-size:11px;color:#fff;text-align:left;line-height:20px;margin-bottom:10px;'>PASSWORD:</div>
                <div style='width:74%;float:left;font-weight:500;font-size:13px;color:#fff;text-align:left;line-height:20px;margin-bottom:10px;'>$passwords</div>
                 <br/><br/>
                <div style='width:100%;line-height:16px;font-weight:500;font-size:13px;color:#fff;text-align:left;'>
 
<p style='margin-bottom:10px;'>Now, customize your own neon sign & brighten up your space with Dezign Mania neon signs.</p>
<p style='margin-bottom:10px;'> Happy Dezigning!</p></div>
                </div>
                
                <div style='width: 100%; color:#000; font-size:12px; padding-top:20px; padding-bottom:10px;'>
                    <div style='width:100%;text-align:center;float:left'>&copy; Dezign Mania Ltd. All Rights Reserved.</div>
                  
                </div>
            </div>
 
    </body>
</html>";
$email = new PHPMailer();
$email->SetFrom('info@dezignmania.com', 'Dezign Maina'); //Name is optional
$email->Subject   = "Your Registration successfully Completed";
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress($to);
   if (! $email->Send()) {
       echo "<script>alert('Problem in sending email!');</script>";
    } else {
    }
      echo '<script>alert("Registration successfully Completed")</script>'; 
  echo "<script>window.location.href='login.php'</script>";

 }
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
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dezign Mania</title>
    <?php include("includes/css.php");?>
    <style>label{color:#fff}</style>
</head>

<body class="template-collection has-smround-btns has-loader-bg equal-height has-sm-container" style="background-color:#000;">
    <?php include("includes/header.php");?>
    <div class="page-content" style="min-height: 42.2px;">
        <div class="holder breadcrumbs-wrap mt-0">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Register</span></li>
                </ul>
            </div>
        </div>
        <div class="holder">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-18 col-lg-12 text-white">
                        <h2 class="text-center text-white">Create an Account</h2>
                        <div class="form-wrapper">
                            <p class="text-white">To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" name="fname" class="form-control" placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="text" name="lname" class="form-control" placeholder="Last name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email_id" id="remail_id" class="form-control email_search" placeholder="E-mail">
                                    <span style="color: red" id="a_remail_alert"></span>
                                    <span class="alert alert-danger" id="result2" style="display: none;"> </span>
                                </div>
                                <div class="form-group">
                                    <input type="password" onkeyup="checkPass()" name="password" id="ccpassword"  class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" onkeyup="checkPass()" name="password" id="cfpassword"  class="form-control" placeholder="Confirm Password">
                                    <span id="error-nwl"></span>
                                </div>
                                <div class="clearfix">
                                    <input id="checkbox1" name="checkbox1" type="checkbox" checked="checked" required>
                                    <label for="checkbox1" class="text-white">By registering your details you agree to our <a href="#" class="custom-color" data-fancybox="" data-src="#modalTerms">Terms and Conditions</a> and <a href="#" class="custom-color" data-fancybox="" data-src="#modalCookies">Cookie Policy</a></label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="register_submit" id="pregisters" class="btn text-white">create an account</button>
                                </div>
                                <p>&nbsp;</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalTerms" style="display: none;" class="modal-info-content modal-info-content-lg">
            <div class="modal-info-heading">
                <h2>Terms and Conditions</h2>
            </div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br/>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div id="modalCookies" style="display: none;" class="modal-info-content modal-info-content-lg">
            <div class="modal-info-heading">
                <h2>Cookie Policy</h2>
            </div>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br/>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
    </div>
    <?php include("includes/footer.php");?>
    <?php include("includes/js.php");?>
<script src="js/validations.js"></script>
<script type="text/javascript">
    /*$(document).ready(function(){  
    $("#mobile_number").keyup(function(){
      return validmobile('mobile_number','a_rphone_alert'); 
});   }); */
        $(document).ready(function(){  
    $("#remail_id").keyup(function(){
      return validemailid('remail_id','a_remail_alert'); 
});   }); 
    
    $(document).ready(function(){ 
    $("#pregisters").click(function(){
     // var mobile_number    = validmobile('mobile_number','a_rphone_alert'); 
      var remail_id    = validemailid('remail_id','a_remail_alert'); 
      if(remail_id == 0 )
      {
        return false;
      }

      });  
  });
function checkPass()
{
    var pass1 = document.getElementById('ccpassword');
    var pass2 = document.getElementById('cfpassword');
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
    //alert(searchid);
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
$(document).ready(function(){
    $(".email-login").keyup(function()
    {
    searchid = $(this).val();
    //alert(searchid);
    dataString = 'search='+ searchid;
    if(searchid!='')
    {
    $.ajax({
    type: "POST",
    url: "reg_validation.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
    }return false;
    });
    });  
 </script>

</body>

</html>
