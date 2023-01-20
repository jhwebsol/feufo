<?php session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

 // var_dump($_POST);
 // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    $logo = "https://www.dezignmania.com/images/logo.png";
    $logo_width = "100%";
    $logo_height = "";
    // All CSS
    // Body
    $body_title = "Dezignmania ";
    $width_of_mail_body = "80%"; // Please write in % percentage for better view...
    $padding_of_mail_body = "20px";
    $body_background_color = "";
    $body_text_color = "";
    // Header
    $header_background_color = "";
    $header_text_color = "";
    $header_font_size = "";
    $header_font_family = "";
    // Footer
    $footer_background_color = "#2F3B59";
    $footer_text_color = "white";
    $footer_font_size = "10px";
    $footer_font_family = "monospace";
    // Button
    $button_background_color = "#4db7fe";
    $button_text_color = "white";
    $button_font_size = "20px";
    $button_font_family = "monospace";
    $button_padding = "15px";
    $button_border_radius = "10px";
    // Highlight
    $highlight_color = "#4db7fe";
    $highlight_font_size = "25px";
    $highlight_font_family = "monospace";
    // Heading
    $heading_color = "#4db7fe";
    $heading_font_size = "25px";
    $heading_font_family = "monospace";
    // Paragraph
    $paragraph_color = "";
    $paragraph_font_size = "14px";
    $paragraph_font_family = "monospace";
    // Write the email id and team name that you send From
    $from_team = "Dezignmania";
   $from_email = "info@dezignmania.com";
   $from_website = "https://www.dezignmania.com/index.php";
    // If required include your Cc also
    //$cc = "info@dezignmania.com";
    // Include Your All Other Information 
    // --- Mail Body Configuration End ---
$keyId = 'rzp_live_sBZvcJbl7t4igl'; 
$keySecret = 'N4ilYWpet1VLtckdNXcyamyT';
require('includes/db_config.php');
//include "../admin/controllers/student-session-information.php"; 
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$razorpayOrderId = $_SESSION['razorpay_order_id'];
$method = "Invalid";
$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
     $api = new Api($keyId, $keySecret);
    try
    {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature'],
            //'course_id' => $_POST['id']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
    $payment_id = $_SESSION['order_if_af'];
    $paym_id = $_POST['paym_id'];
    $sql=mysqli_query($conn, "select * from user_payment where id='".$paym_id."'");
    $row=mysqli_fetch_array($sql);
    $sql1=mysqli_query($conn, "select * from user_profile where id=".$_SESSION['id']);
    $row1=mysqli_fetch_array($sql1);
    $user_id = $_SESSION['id'];
    $email = $row1['email_id'];
    $phone = $row1['contact_no'];
    $name = $row1['first_name'];
    $date = date("d-m-Y");
    $to = $email;
    $subject = "Order Placed And Payment Successfully Completed";
    $message = "
                <html>
                    <head>
                        <title>$body_title</title>
                    </head>
                    <body style='background-color: $body_background_color; color: $body_text_color;'>
                        <center>
                            <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' >
                                <br/><br/>
                                <p style='color: $paragraph_color; font-size: $paragraph_font_size; font-family: $paragraph_font_family;'> 
                                    <span style='color: $highlight_color; font-size: $highlight_font_size; font-family: $highlight_font_family;'>
                                        Hi $name,
                                    </span> 
                                    <br/>
                                    Welcome to <span style='color: $highlight_color; font-size: $highlight_font_size; font-family: $highlight_font_family;'> $from_team</span>, Your Order Placed And Payment successfully Completed <br/> Thankyou!!!
                                </p>
                                <br/><br/><br/><br/>
                                <div style='width: 100%; background-color: $footer_background_color; color: $footer_text_color; font-family: $footer_font_family; font-size: $footer_font_size; padding-top: 30px; padding-bottom: 30px;'>
                                    Thanks And Regards
                                    <br/>
                                    <span style='color: white;'>$from_website</span>
                                </div>
                            </div>
                        </center>
                    </body>
                </html>";
   $email = new PHPMailer();
   $email->Body      =  ($message);
   $email->SetFrom('info@dezignmania.com', 'Dezignmania'); //Name is optional
   $email->Subject   ="Order Placed And Payment Successfully Completed";
   $email->IsHTML(true);
   $email->Body      =  ($message);
   $email->AddAddress($to);
   if (! $email->Send()) {
       echo "<script>alert('Problem in sending email!');</script>";
    } else {
    $sql1=mysqli_query($conn, "select * from user_profile where id=".$_SESSION['id']);
    $row1=mysqli_fetch_array($sql1);
    $user_id = $_SESSION['id'];
    $email = $row1['email_id'];
    $name = $row1['first_name'];
    $date = date("d-m-Y");
    $to = "info@dezignmania.com";
    $subject = "Order Placed And Payment Successfully Completed";
     $message = "
                <html>
                    <head>
                        <title>$body_title</title>
                    </head>
                    <body style='background-color: $body_background_color; color: $body_text_color;'>
                        <center>
                            <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' >
                                <br/><br/>
                                <p style='color: $paragraph_color; font-size: $paragraph_font_size; font-family: $paragraph_font_family;'> 
                                    <span style='color: $highlight_color; font-size: $highlight_font_size; font-family: $highlight_font_family;'>
                                        Hi Team,
                                    </span> 
                                    <br/>
                                    Order Placed By <span style='color: $highlight_color; font-size: $highlight_font_size; font-family: $highlight_font_family;'> $name</span>, Payment successfully Completed By Razorpay ..<br/> !!!
                                </p>
                            </div>
                        </center>
                    </body>
                </html>";
   $email = new PHPMailer();
$email->Body      =  ($message);
$email->SetFrom('info@dezignmania.com', 'Dezignmania'); //Name is optional
$email->Subject   = $name . " Placed An Order";
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress('info@dezignmania.com');
   if (! $email->Send()) {
       echo "<script>alert('Problem in sending email!');</script>";
    } else { }
 }
   // mail($to,$subject,$message,$headers);
    $transactionId = $_SESSION['order_if_af'];
    $pid = $row['id'];
    $amount = $row['total_price'];
    $plan_id = $row['cart_id'];
    $name = $row1['first_name'];
    $rid = explode(",",$plan_id);
    foreach($rid as $pm_id){
     $status="1"; 
     $stat="0";
     $sql_paytm ="UPDATE  addto_cart SET payment_status='$status',invoice_id='$stat' WHERE user_id='".$user_id."' and id='".$pm_id."'"; 
    $result_ptm=mysqli_query($conn,$sql_paytm) or die(mysqli_error());
    }
    date_default_timezone_set('Asia/Kolkata');
    $created_at = date( 'Y-m-d h:i:s A', time () );
    $payment_id=$_POST['razorpay_payment_id']; 
    $payment_method="razorpay";
    $payment_status="completed";
    $statuss=1;
    $sql_pay ="UPDATE  user_payment SET payment_method='$payment_method',pay_status='$payment_status',payment_id='$payment_id',transactionId='$transactionId',payable_status='$statuss',created_date='$created_at' WHERE id='".$paym_id."'"; 
    $res_ptm=mysqli_query($conn,$sql_pay) or die(mysqli_error());
    if($res_ptm){
      /*  echo "
            <script> 
                alert('Your Payment Successfully completed, Now you can use your panel. Thankyou!!!'); 
                location.replace('index.php');
            </script>"; */
            header("location:index.php");
    } else{
        //exit();
        echo "
            <script> 
                alert('Your Payment Successfully completed!!!'); 
                location.replace('index.php');
            </script>";
    }
?>