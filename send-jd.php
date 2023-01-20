<?php include("includes/db_config.php"); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$ip = $_SERVER['REMOTE_ADDR'];
$logo = "img/logo.png";
$logo_width = "100%";
$logo_height = "";
// All CSS
// Body
$body_title = "Feufo";
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
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$countrys=$details->country;
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$empr_id= $_POST['empr_id'];
$empid= $_POST['empid'];
$eid=$_SESSION['employer_id'];
if(isset($_SESSION['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
$sqlsr =mysqli_query($conn,"SELECT * FROM skills WHERE emp_id = '".$empid."'");
while($ress= mysqli_fetch_array($sqlsr)){
 $skid[]=$ress['skill_name'];    
}
$sqler =mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM employer WHERE emp_id = '".$empr_id."'"));
$sqlem =mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM employee_details WHERE id = '".$empid."'"));
$sqljd =mysqli_query($conn,"SELECT * FROM jd_detail WHERE empr_id = '".$empr_id."'");
$resjd= mysqli_fetch_array($sqljd);
$sk=$resjd['skills']; 
$sarray = explode(',', $sk);
 if(count(array_intersect($sarray, $skid)) >= 2){
$from_team = "Feufo";
$from_website = "https://www.feufo.com/";
echo $to = $sqlem['email_id'];
$emp_name = $sqlem['emp_name'];
$company_name = $sqler['company_name'];
$subject = $resjd['subject'];
$messages = $resjd['message'];
$message = "<html>
    <head>
        <title>$body_title</title>
    </head>
    <body style='background-color:#ececec;'> 

            <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' >
           <div style='background-color:#fff;color:#000184;font-size:32px;font-weight:600;padding:20px 0px;text-align:center'>$company_name</div>                          
           <div style='background-color:#000;border-radius:5px;height:350px;padding:0px 10px 0px 10px'> 
               <p style='color:#fff; font-size:18px; font-family: $paragraph_font_family;text-align:left;'> 
                    <span style='color:#fff; font-size: $highlight_font_size; font-family: $highlight_font_family;text-align:left;'>
                      <span style='text-transform:capitalize;font-size:12px;text-align:left;'>Dear $emp_name.</span><br/><font style='font-size:12px;margin-bottom:10px;'> Greeting from $company_name..!</font> 
                    </span> 
                </p>
               
                 <p style='margin-bottom:10px;'>$messages</p>
                </div>
                
                <div style='width: 100%; color:#000; font-size:12px; padding-top:20px; padding-bottom:10px;'>
                    <div style='width:100%;text-align:center;float:left'>&copy; Feufo. All Rights Reserved.</div>
                  
                </div>
            </div>
 
    </body>
</html>";
$email = new PHPMailer();
$email->SetFrom('admin@feufo.com', $company_name); //Name is optional
$email->Subject   = $subject;
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress($to);
   if (! $email->Send()) {
       echo "Problem in sending email!";
    } else {
        echo "JD Sended To Employee Successfully";
    }
 }else{
    echo "Something went wrong!";
 }
}
 $conn->close();
 ?>