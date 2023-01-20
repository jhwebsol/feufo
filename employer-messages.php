<?php include("includes/db_config.php");
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php'; */
if (isset($_POST['send_ms'])) {
  extract($_POST);
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

 date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
  $id=$_SESSION['employer_id'];
  $sql1="INSERT into message_chat(user_id,user_msg,user_date) values ('$id','$msg','$date')";
$result = mysqli_query($conn, $sql1) or die(mysqli_error());
if($result){
/*$sqlus=mysqli_fetch_array(mysqli_query($conn,"SELECT * from employer where id='".$id."'"));  
$from_team = "Feufo";
$from_website = "https://www.feufo.com/index.php";
$company_name = $sqlus['company_name'];
$to="info@feufo.com";
$subject="Message Notification";
$message = "<html>
                <head>
                    <title>$body_title</title>
                </head>
                <body style='background-color:#f5f5f5;'>
                   <center>
                        <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' > 
                           
                           <div style='background-color:#f5f5f5;padding:30px 10px 0px 10px'> 
                           
<div style='width:100%;font-weight:600;height:300px;color:#000;border-left:1px solid #ccc;padding-top:10px;border-right:1px solid #ccc;border-top:1px solid #ccc;background-color:#fff;'> 
                                   <p style='color:#000; font-size: $paragraph_font_size; font-family: $paragraph_font_family;'> 
                                    <span style='color:#000; font-size: $highlight_font_size; font-family: $highlight_font_family;'>
                                       <span style='text-transform:capitalize;'>Hi Team </span>
                                    </span> 
                                    <br/>
                                    <h2>$company_name Sent a new message, check message.</h2>                                    
                                </p>
                                <br/>
                                <div style='width: 100%; background-color:#22337d; color:#fff; min-height:60px;font-family: $footer_font_family; font-size: 20px; padding-top: 20px; padding-bottom:10px;'>
                                   <span style='color:#fff;padding-bottom:5px;text-align:center;'><strong>&copy;Feufo</strong><br/>Thank You  <a href='https://www.feufo.com/' target='_new' style='color:#fff;'>$from_website</a></span>
                            
                                </div>
                            </div>
                       </center>
                    </body>
                </html>";
$email = new PHPMailer();
$email->SetFrom('no-reply@feufo.com', 'Feufo'); 
$email->Subject   =($subject);
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress($to);
if (! $email->Send()) {
   echo "<script>alert('Problem in sending email!');</script>";
} else {
  echo '<script>alert("Message Sended")</script>';  }*/
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
    <style type="text/css">
        .btn-style-one {
            width: 8%;
            margin-top: 10px;
        }

        .type_msg {
            width: 90%;
        }

        .menuesboxes {
            background-color: #2f315c !important;
            margin-top: 28px;
            padding-top: 20px;
        }

        .navgation {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 5px;
        }

        .navgation a {
            padding: .75rem 1.25rem;
            background-color: #ced031 !important;
            color: #000 !important;
            font-weight: 600;
            display: block;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, .125);
        }

        .navgation .boxactive {
            background-color: #fff !important;
            color: #000 !important;
        }

        .rightbox {
            background-color: #fff !important;
            padding: 10px 10px;
            border-radius: 5px;
        }
    </style>
</head>

<div class="page-wrapper">
    <span class="header-span"></span>
    <?php include("includes/header.php");?>
    <section class="menuesboxes">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="navgation">
                        <a href="employer-dashboard.php"> <i class="la la-home"></i> Dashboard</a>
                        <a href="employer-profile.php"><i class="la la-user-tie"></i>My Profile</a>
                        <a href="employer-jd.php"><i class="la la-bookmark-o"></i>Jd Details</a>
                        <a href="employer-all-candidate.php"><i class="la la-bookmark-o"></i>All Candidates</a>
                        <a href="employer-wishlist-candidate.php"><i class="la la-bookmark-o"></i>Wishlist Candidates</a>             
                        <a href="employer-interview-candidate.php"><i class="la la-bookmark-o"></i>Interview Candidates</a>
                        <a href="employer-account-summary.php"><i class="la la-box"></i>Account Summary</a>
                        <a href="employer-messages.php" class="boxactive"><i class="la la-comment-o"></i>Messages</a>
                        <a href="employer-change-password.php"><i class="la la-lock"></i>Change Password</a>
                        <a href="logout.php"><i class="la la-sign-out"></i>Logout</a>
                    </ul>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="rightbox">
                        <div class="ls-widget">
                            <div class="tabs-box">

                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <h3 class="text-black">Messages</h3>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="chat-widget">
                                                <div class="widget-content">
                                                    <div class="row">
                                                        <!-- <div class="contacts_column col-xl-4 col-lg-5 col-md-12 col-sm-12 chat" id="chat_contacts">
                    <div class="card contacts_card">
                      <div class="card-header">
                        <div class="search-box-one">
                          <form method="post" action="#">
                            <div class="form-group">
                              <span class="icon flaticon-search-1"></span>
                              <input type="search" name="search-field" value="" placeholder="Search" required="">
                            </div>
                          </form>
                        </div>
                      </div>
                       <div class="card-body contacts_body">
                        <ul class="contacts">
                          <li>
                            <a href="#">
                              <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                  <img src="https://www.feufo.com/img/user.jpg" class="rounded-circle user_img" alt="">
                                </div>
                                <div class="user_info">
                                  <span></span>
                                  <p> Head of Development</p>
                                </div>
                                <span class="info">5 mins</span>
                              </div>
                            </a>
                          </li> 
                        </ul>
                      </div> 
                    </div>
                  </div>-->
                                                        <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12 chat">
                                                            <div class="card message-card">
                                                                <div class="card-header msg_head">
                                                                    <div class="d-flex bd-highlight">
                                                                        <?php $eid=$_SESSION['employer_id'];
                          $sqlsr =mysqli_query($conn,"SELECT * FROM employer WHERE id='".$eid."'");
                          $resr= mysqli_fetch_array($sqlsr); ?>
                                                                        <div class="img_cont">
                                                                            <img src="admin/img/emp/<?= $resr['logo'];?>" alt="" class="rounded-circle user_img">
                                                                        </div>
                                                                        <div class="user_info">
                                                                            <span><?= $resr['company_name'];?></span>
                                                                        </div>
                                                                    </div>

                                                                    <!-- <div class="btn-box">
                          <button class="dlt-chat">Delete Conversation</button>
                          <button class="toggle-contact"><span class="fa fa-bars"></span></button>
                        </div> -->
                                                                </div>

                                                                <div class="card-body msg_card_body">
                                                                    <?php  $user_id=$_SESSION['employer_id'];
                        $sqlsr =mysqli_query($conn,"SELECT * FROM employer WHERE id='".$user_id."'");
                        $resr= mysqli_fetch_array($sqlsr);
                        $squ=mysqli_query($conn,"select * from message_chat where user_id='$user_id'");
                        while( $res=mysqli_fetch_array($squ)){
                          //var_dump($res);
                               $user_msg=$res['user_msg'];
                               if(!empty($user_msg)){
                            ?>
                                                                    <div class="d-flex justify-content-end mb-2 reply">
                                                                        <div class="img_cont_msg">
                                                                            <img src="admin/img/emp/<?= $resr['logo'];?>" alt="" class="rounded-circle user_img_msg">
                                                                            <div class="name">You <span class="msg_time"><?php $date= $res['user_date'];
                                                $newDate = date("d M Y H:i", strtotime($date));
                                                echo $newDate; ?></span></div>
                                                                        </div>
                                                                        <div class="msg_cotainer">
                                                                            <?php echo $res['user_msg']; ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php }  echo $admin_msg=$res['admin_msg'];
                                 if(!empty($admin_msg)){ ?>
                                                                    <div class="d-flex justify-content-start mb-2">
                                                                        <div class="img_cont_msg">
                                                                            <img src="img/user.jpg" alt="" class="rounded-circle user_img_msg">
                                                                            <div class="name">Admin <span class="msg_time">
                                                                                    <?php $date= $res['admin_date'];
                                $newDate = date("d M Y H:i", strtotime($date));
                                echo $newDate; ?></span></div>
                                                                        </div>
                                                                        <div class="msg_cotainer">
                                                                            <?php echo $res['admin_msg']; ?>
                                                                        </div>
                                                                    </div><?php } } ?>

                                                                </div>

                                                                <div class="card-footer">
                                                                    <div class="form-group mb-0">
                                                                        <form action="" method="post" enctype="multipart/form-data">
                                                                            <textarea class="form-control type_msg" name="msg" placeholder="Type a message..."></textarea>
                                                                            <button type="submit" name="send_ms" class="theme-btn btn-style-one submit-btn">Send</button>
                                                                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/employer-footer.php")?>
</div>
<?php include("includes/js.php");?>
</body>

</html>