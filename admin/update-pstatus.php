<?php include("includes/db_config.php"); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php'; 
if(isset($_POST["pstatus"]))  
 {  $id=$_POST["id"];
$status=$_POST["pstatus"];
$sql1 ="UPDATE pricing_package_cart  SET payment_status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
$last_id= mysqli_insert_id($conn);
if($res){
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
    $footer_text_color = "white";
    $footer_font_size = "10px";
    $footer_font_family = "monospace";
    // Button
    $button_background_color = "#000";
    $button_text_color = "white";
    $button_font_size = "18px";
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
$resel=mysqli_fetch_array(mysqli_query($conn,"SELECT * from pricing_package_cart where id='".$last_id."'"));$puser_id=$ress['puser_id'];  
 $sqll ="SELECT * FROM es_property_user WHERE id = '".$puser_id."'";
$resultt = mysqli_query($conn, $sqll) or die(mysqli_error($conn));
$ress= mysqli_fetch_array($resultt);    
$from_team = "Feufo";
$from_website = "https://www.feufo.com/";
$name=$ress['name'];
$email=$ress['email_id']; 
$to = $email;
$s_idd="7";
$resel=mysqli_fetch_array(mysqli_query($conn,"SELECT * from email_template where id='".$s_idd."'")); 
$subject=$resel['subject'];
$desp=$resel['desp'];
$message = "<html>
        <head>
            <title>$body_title</title>
        </head>
        <body style='background-color:#ececec;'>
                <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' >
                 <div style='background-color:#22337d;color:#fff;font-size:28px;font-weight:600;padding:10px 0px;text-align:center;'> Feufo </div>
 <div style='background-color:#e9ecf3; height:418px;padding:10px 10px 0px 10px'> 
                   <p style='color:#000; font-size: $paragraph_font_size; font-family: $paragraph_font_family;'> 
                        <span style='color:#000; font-size: $highlight_font_size; font-family: $highlight_font_family;'>Welcome to Feufo</span>
                        <br/>
                        <h5>$desp</h5>                                    
                    </p>
 <div style='width:100%;margin-bottom:20px;margin-top:20px;color:#000;'> 
                    
<h4><br/>Regards<br/>Team Feufo </h4>
                     </div> 
</div>
                    <div style='width: 100%; background-color:#22337d; color:#fff;text-align:center; font-family: $footer_font_family; font-size: 16px; padding-top: 10px; padding-bottom:10px;'>
                        
                        <p style='color:white;padding-bottom:2px;text-align:center;'>Thank You For Registration <a href='https://www.feufo.com/' target='_new' style='color:#fff;'>$from_website</a></p>
                    </div> 
                </div> 
        </body>
    </html>";
$email = new PHPMailer();
$email->SetFrom('info@feufo.com', 'Feufo'); 
$email->Subject   = $subject;
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress($to);
if (! $email->Send()) {
   echo "<script>alert('Problem in sending email!');</script>";
} else {
}
}  
}  
 ?>