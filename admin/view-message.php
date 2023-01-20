<?php //use PHPMailer\PHPMailer\PHPMailer;
/*use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';*/
include("includes/css.php");
if (isset($_POST['chat'])) {
 $logo = "img/logo.png";
    $logo_width = "100%";
    $logo_height = "";
    // All CSS
    // Body
    $body_title = "";
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
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$user_id=$_GET['user_id'];
$sql11="SELECT * from message_chat where user_id='$user_id'";
$resq1=mysqli_query($conn,$sql11);
$row11= mysqli_fetch_array($resq1); 
$sqlus=mysqli_fetch_array(mysqli_query($conn,"SELECT * from employer where id='".$user_id."'"));
$admin_msg=$row11['admin_msg'];
$user_msg=$row11['user_msg'];
if(empty($admin_msg)  && !empty($user_msg)) {
$sql_up ="UPDATE  message_chat SET admin_msg='$message' WHERE user_id='$user_id'";
$res_up=mysqli_query($conn,$sql_up) or die(mysqli_error());
// $from_team = "Feufo";
// $from_website = "https://www.feufo.com/";
// $to = $sqlus['email'];
// $subject="Message Notification";
// $message = "<html>
//                 <head>
//                     <title>$body_title</title>
//                 </head>
//                 <body style='background-color:#f5f5f5;'>
//                    <center>
//                         <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' > 
                           
//                            <div style='background-color:#f5f5f5;padding:30px 10px 0px 10px'> 
                           
// <div style='width:100%;font-weight:600;height:300px;color:#000;border-left:1px solid #ccc;padding-top:10px;border-right:1px solid #ccc;border-top:1px solid #ccc;background-color:#fff;'> 
//                                    <p style='color:#000; font-size: $paragraph_font_size; font-family: $paragraph_font_family;'> 
//                                     <span style='color:#000; font-size: $highlight_font_size; font-family: $highlight_font_family;'>
//                                        <span style='text-transform:capitalize;'>Welcome to Feufo </span>
//                                     </span> 
//                                     <br/>
//                                    <h2>You Got New Message From Our Team Please Check.</h2>                                    
//                                 </p>
//                                 <br/> <div style='width:100%;float:left;font-weight:600color:#000;border-right:1px solid #ccc;'><a href='https://www.feufo.com/change-password.php?email=$email' target='_new' style='color:#fff;font-size:22px;font-weight:800;text-align:center;border-radius:10px;width:260px!important;padding:5px 20px;height:40px;background-color:#22337d;'>Click Here</a></div>
//                                 </div>

//                                 <div style='width: 100%; background-color:#22337d; color:#fff; min-height:60px;font-family: $footer_font_family; font-size: 20px; padding-top: 20px; padding-bottom:10px;'>
//                                    <span style='color:#fff;padding-bottom:5px;text-align:center;'><strong>&copy;Feufo</strong><br/>Thank You  <a href='https://www.feufo.com/' target='_new' style='color:#fff;'>$from_website</a></span>
                            
//                                 </div>
//                             </div>
//                        </center>
//                     </body>
//                 </html>";
// $email = new PHPMailer();
// $email->SetFrom('no-reply@feufo.com', 'Feufo'); 
// $email->Subject   =($subject);
// $email->IsHTML(true);
// $email->Body      =  ($message);
// $email->AddAddress($to);
// if (! $email->Send()) {
//    echo "<script>alert('Problem in sending email!');</script>";
// } else {
//   echo '<script>alert("Message And Email Sended")</script>';  }
}else if(empty($user_msg)){
$sql1="INSERT into message_chat(user_id,admin_msg,admin_date) values ('$user_id','$message','$date')"; echo $sql1;
$result = mysqli_query($conn, $sql1) or die(mysqli_error());
$sqlus=mysqli_fetch_array(mysqli_query($conn,"SELECT * from employer where id='".$user_id."'"));
/*$from_team = "Feufo";
$from_website = "https://www.feufo.com/";
$to = $sqlus['email'];
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
                                       <span style='text-transform:capitalize;'>Welcome to Feufo </span>
                                    </span> 
                                    <br/>
                                    <h2>You Got New Message From Our Team Please Check.</h2>                                    
                                </p>
                                <br/> <div style='width:100%;float:left;font-weight:600color:#000;border-right:1px solid #ccc;'><a href='https://www.feufo.com/change-password.php?email=$email' target='_new' style='color:#fff;font-size:22px;font-weight:800;text-align:center;border-radius:10px;width:260px!important;padding:5px 20px;height:40px;background-color:#22337d;'>Click Here</a></div>
                                </div>

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
  echo '<script>alert("Message And Email Sended")</script>';  }*/

} else{
$sql1="INSERT into message_chat(user_id,admin_msg,admin_date) values ('$user_id','$message','$date')";echo $sql1;
$result = mysqli_query($conn, $sql1) or die(mysqli_error());
// $from_team = "Feufo";
// $from_website = "https://www.feufo.com/";
// $to = $sqlus['email'];
// $subject="Message Notification";
// $message = "<html>
//                 <head>
//                     <title>$body_title</title>
//                 </head>
//                 <body style='background-color:#f5f5f5;'>
//                    <center>
//                         <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' > 
                           
//                            <div style='background-color:#f5f5f5;padding:30px 10px 0px 10px'> 
                           
// <div style='width:100%;font-weight:600;height:300px;color:#000;border-left:1px solid #ccc;padding-top:10px;border-right:1px solid #ccc;border-top:1px solid #ccc;background-color:#fff;'> 
//                                    <p style='color:#000; font-size: $paragraph_font_size; font-family: $paragraph_font_family;'> 
//                                     <span style='color:#000; font-size: $highlight_font_size; font-family: $highlight_font_family;'>
//                                        <span style='text-transform:capitalize;'>Welcome to Feufo </span>
//                                     </span> 
//                                     <br/>
//                                     <h2>You Got New Message From Our Team Please Check.</h2>                                    
//                                 </p>
//                                 <br/> <div style='width:100%;float:left;font-weight:600color:#000;border-right:1px solid #ccc;'><a href='https://www.feufo.com/change-password.php?email=$email' target='_new' style='color:#fff;font-size:22px;font-weight:800;text-align:center;border-radius:10px;width:260px!important;padding:5px 20px;height:40px;background-color:#22337d;'>Click Here</a></div>
//                                 </div>

//                                 <div style='width: 100%; background-color:#22337d; color:#fff; min-height:60px;font-family: $footer_font_family; font-size: 20px; padding-top: 20px; padding-bottom:10px;'>
//                                    <span style='color:#fff;padding-bottom:5px;text-align:center;'><strong>&copy;Feufo</strong><br/>Thank You  <a href='https://www.feufo.com/' target='_new' style='color:#fff;'>$from_website</a></span>
                            
//                                 </div>
//                             </div>
//                        </center>
//                     </body>
//                 </html>";
// $email = new PHPMailer();
// $email->SetFrom('no-reply@feufo.com', 'Feufo'); 
// $email->Subject   =($subject);
// $email->IsHTML(true);
// $email->Body      =  ($message);
// $email->AddAddress($to);
// if (! $email->Send()) {
//    echo "<script>alert('Problem in sending email!');</script>";
// } else {
//   echo '<script>alert("Message And Email Sended")</script>';  }
}

 }
?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
            <?php  $user_id=$_GET['user_id'];
            $sqlemp= mysqli_fetch_array(mysqli_query($conn,"select * from employer where id = '$user_id'")); ?>
                                       
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<div class="col-md-12">
									<h3 class="box-title">View Employer Details : <?= $sqlemp['company_name'];?></h3>
								</div>
							</div>

							<!-- /.box-header -->
							<div class="box-body">  
								 <div class="col-md-12">
                    <div class="row">
                        <div class="box box-warning direct-chat direct-chat-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Messages</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                         <?php  $user_id=$_GET['user_id'];
                          $squ=mysqli_query($conn,"select * from message_chat where user_id='$user_id'");
                          while( $res=mysqli_fetch_array($squ)){
                                 $user_msg=$res['user_msg'];
                                 if(!empty($user_msg)){ ?>
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">Employer</span>
                                            <span class="direct-chat-timestamp pull-right"><?php $date= $res['user_date'];
                                                $newDate = date("d M Y H:i", strtotime($date));
                                                echo $newDate; ?></span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="img/emp/<?= $sqlemp['logo'];?>" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                           <?php echo $res['user_msg']; ?>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                   <?php }  $admin_msg=$res['admin_msg'];
                                 if(!empty($admin_msg)){ ?>
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">You</span>
                                            <span class="direct-chat-timestamp pull-left"><?php $date= $res['admin_date'];
                                                $newDate = date("d M Y H:i", strtotime($date));
                                                echo $newDate; ?></span>
                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="img/logo.png" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                           <?php echo $res['admin_msg']; ?>
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                <?php } }  ?>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <textarea type="text" name="message" placeholder="Type Message ..." class="form-control mb-10" rows="1"></textarea>
                                    <div class="col-md-2">
                                        <button type="submit" name="chat" class="btn btn-warning btn-md">Send</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-footer-->
                        </div>
                    </div>
                </div>
               <!-- /.box-body -->
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<!-- Modal Category --> 
			<div id="add_data_Modal" class="modal fade">  
		      <div class="modal-dialog">  
		           <div class="modal-content">  
		                <div class="modal-header">  
		                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
		                     <h4 class="modal-title">Update Documents Details</h4>  
		                </div>  
		                <div class="modal-body">  
		                     <form method="post" name="frm" id="insert_form" enctype="multipart/form-data">  
		                          <label>Document Name</label>  
		                         <input type="text" name="dname" id="dname" class="form-control" placeholder="Document Name">
		                          </br>
		                        <label>Document Number</label>  
		                         <input type="text" name="dnumber" id="dnumber" class="form-control" placeholder="Document Number">
		                          </br>
		                        <label>Document Image</label>  
		                         <input type="file" name="dimage" class="form-control" >
		                          </br>
		                          <input type="hidden" name="did" id="d_id" />  
		                          <input type="submit" name="update" id="insert" value="Insert" class="btn btn-success" />  
		                     </form>  
		                </div>  
		                <div class="modal-footer">  
		                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
		                </div>  
		           </div>  
		      </div>  
		 </div>  
			<!-- ./Modal Category -->

		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>

	<script language="javascript">

 $(document).ready(function(){  
     
      $(document).on('click', '.edit_data', function(){  
           var d_id = $(this).attr("id");  
           $.ajax({  
                url:"edit_document.php",  
                method:"POST",  
                data:{d_id:d_id},  
                dataType:"json",  
                success:function(data){  
                     $('#dname').val(data.name); 
                     $('#dnumber').val(data.d_number); 
                     $('#d_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
     
 });  
function delete_doc_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_document.php?id=' + id;
	}
}
function delete_un_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_univers.php?id=' + id;
	}
}
</script>

</body>

</html>
