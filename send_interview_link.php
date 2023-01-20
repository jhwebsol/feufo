<?php include("includes/db_config.php"); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
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
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$empr_id=$_SESSION['employer_id'];
$video_link=$_POST['video_link'];
$cd_idd=$_POST['cd_idd'];
$status="1";
//if(isset($_POST['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
$sql ="UPDATE candidate_interview_details SET video_link='$video_link',status='$status' WHERE id='$cd_idd'";
if (mysqli_query($conn, $sql)){
$last_id= mysqli_insert_id($conn);
$sqlcd =mysqli_query($conn,"SELECT * FROM candidate_interview_details WHERE id = '".$cd_idd."'");
$res_cd= mysqli_fetch_array($sqlcd);
$sqldate =mysqli_query($conn,"SELECT * FROM candidate_interview_date WHERE cid = '".$cd_idd."'");
$res_date= mysqli_fetch_array($sqldate);
$sqlemp =mysqli_query($conn,"SELECT * FROM employee_details WHERE id = '".$empr_id."'");
$res_emp= mysqli_fetch_array($sqlemp);
$sqlempr =mysqli_query($conn,"SELECT * FROM employer WHERE id = '".$empr_id."'");
$res_empr= mysqli_fetch_array($sqlempr);
$email=$res_emp['email_id'];
$emp_name=$res_emp['emp_name'];
$company_name=$res_empr['company_name'];
$stage=$res_cd['stage'];
$video_link=$res_cd['video_link'];
$schedule_at=$res_cd['schedule_at'];
$hours=$res_date['hours'];
$in_date=$res_date['in_date'];
$sqltm =mysqli_query($conn,"SELECT * FROM candidate_interview_times WHERE cd_interview_id='".$cd_idd."'");
while($restm= mysqli_fetch_array($sqltm)){
$hour=(int)$restm['hours'];
$hours=(int)$restm['hours'];
$data= $hour.':'.$restm['minute'].' '.$restm['timezone'] .'-'. ++$hours.':'.$restm['minute'].' '.$restm['timezone'];  }
$date = date("d-m-Y");
$from_team = "Feufo";
$from_website = "https://www.feufo.com/";
$to = $email;
$subject = "Interview Schedule with ".$company_name;
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
                               <span style='text-align:left;'>Hello $emp_name!</span>
                            </span> 
                       </p>
                        <br/>
                <div style='width:26%;float:left;font-weight:600;font-size:11px;color:#fff;text-align:left;line-height:20px;'>Stage:</div>
                <div style='width:74%;float:left;font-weight:500;font-size:13px;color:#fff!important;text-align:left;line-height:20px;'>$stage</div>
               
                        <div style='width:26%;font-size:11px;float:left;font-weight:600;color:#fff;text-align:left;line-height:20px;'>When: </div>
                <div style='width:74%;float:left;font-size:13px;font-weight:500;color:#fff!important;text-align:left;line-height:20px;'>$in_date $data</div>
                <br/>
                <div style='width:26%;float:left;font-weight:600;font-size:11px;color:#fff;text-align:left;line-height:20px;'>Join With Below Link:</div>
                <div style='width:74%;float:left;font-weight:500;font-size:13px;color:#fff!important;text-align:left;line-height:20px;'><a href='$video_link' target='_new'>$video_link</a></div>
                <br/>
               
                         <p style='width:100%;font-weight:600;height:40px;color:#fff;'>Please Be Available on time
                        </p>
                           </div>
                           <div style='width:100%;background-color:#000;color:#fff;min-height:60px;font-size:12px;padding-top:10px;padding-bottom:10px;text-align:left;'>
                           <span style='color:#fff;padding-bottom:5px;text-align:center;margin-top:50px;'>Thank You  <a href='https://www.feufo.com/' target='_new' style='color:#fff;'>$from_website</a></span>                       
                       </div>
                    </div> 
            </body>
        </html>";
$email = new PHPMailer();
$email->SetFrom('admin@feufo.com', 'Feufo');
$email->Subject   =$subject;
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress($to);
   if (! $email->Send()) {
    } else {
     echo "Interview Booked Successfully";
    }
         echo "Interview Booked Successfully";

 }
//}else{ echo "Please Login";}
 $conn->close();
 ?>