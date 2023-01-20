<?php use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
 include("includes/css.php");
if(isset($_POST['update']))
{ extract($_POST);
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
    $highlight_font_size = "20px";
    $highlight_font_family = "monospace";
    // Heading
    $heading_color = "#000";
    $heading_font_size = "25px";
    $heading_font_family = "monospace";    
$id=$_POST["a_id"];
date_default_timezone_set('Asia/Kolkata');
$cdate = date('Y-m-d H:i:s');
$sql1 ="UPDATE  pricing_package_cart  SET payment_status='$payment_status',trans_date='$cdate' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){ $id=$_POST["a_id"];
$sql_crt=mysqli_fetch_array(mysqli_query($conn,"select pricing_package_cart.*,es_property_user.email_id,es_property_user.name as dname from pricing_package_cart join es_property_user on pricing_package_cart.puser_id=es_property_user.id where pricing_package_cart.id=".$id));
if($_POST['payment_status']=="Received"){
 $p_id=$sql_crt['plan_id'];    
$sqlptm=mysqli_query($conn,"select * from plan_pricing where id='".$p_id."'");
$resptm= mysqli_fetch_array($sqlptm);    
$from_team = "Feufo";
$from_website = "https://www.feufo.com/";
 $name=$sql_crt['dname'];
 $email=$sql_crt['email_id']; 
 $price=$sql_crt['price']; 
 $duration=$resptm['duration']; 
 $to = $email; 
 if($duration==="30 Days"){
 if( date('d') == 31 || (date('m') == 1 && date('d') > 28)){
    $dates = strtotime('last day of next month');
} else {
    $dates = strtotime('+1 months');
} }else if($duration==="12 Month"){
if( date('d') == 365 || (date('y') == 1 && date('m') == 12)){
    $dates = strtotime('last day of next month');
} else {
    $dates = strtotime('+12 months');
}    
}
$vd=date('Y-m-d', $dates);
 date_default_timezone_set('Asia/Kolkata');
$datess = date('Y-m-d H:i:s');
$date=$res['created_dates']; 
$adate = date("d M Y , H:i A ", strtotime($datess));
$vdate = date("d M Y ", strtotime($vd));
$message = "<html>
        <head>
            <title>$body_title</title>
        </head>
        <body style='background-color:#ececec;'>
        
                <div style='width: $width_of_mail_body; padding: $padding_of_mail_body;' >
               <div style='background-color:#22337d;color:#fff;font-size:28px;font-weight:600;padding:10px 0px;text-align:center;'> Feufo</div>
               
               <div style='background-color:#e9ecf3; height:418px;padding:10px 10px 0px 10px'> 
                   <p style='color:#000; font-size: $paragraph_font_size; font-family: $paragraph_font_family;'> 
                        <span style='color:#000; font-size: $highlight_font_size; font-family: $highlight_font_family;'>
                          Dear <span style='text-align:capitalize;'>$name,</span><br/> We have received an amount of $$price towards subscription of https://www.feufo.com/  
                        </span> 
                        <br/>
                        <h4>Your Property is active now. You can check live https://www.feufo.com/ </h4>                                    
                    </p>
                     <br/>
                     <div style='width:100%;margin-top:20px;margin-bottom:20px;color:#000;'> 
                    <div style='width:30%;float:left;font-weight:600;color:#000;'>Date of Activation :</div>
                    <div style='width:70%;float:left;font-weight:500;color:#000;'>$adate</div>
                    </div> <br/>
 <div style='width:100%;margin-top:10px;margin-bottom:20px;color:#000;'>                    
                    <div style='width:30%;float:left;font-weight:600;color:#000;'>Valid upto :</div>
                    <div style='width:70%;float:left;font-weight:500;color:#000;'>$vdate</div>                    
  </div> <br/>
 <div style='width:100%;margin-bottom:20px;margin-top:20px;color:#000;'> 
                    
<h4><br/>Regards<br/>Team Feufo </h4>
                     </div> 
</div>
                    <div style='width: 100%; background-color:#22337d; color:#fff;text-align:center; font-family: $footer_font_family; font-size: 16px; padding-top: 10px; padding-bottom:10px;'>
                        
                        <p style='color:white;padding-bottom:2px;text-align:center;'>Thank You For Registration <a href='https://www.feufo.com/' target='_new' style='color:#fff;'>$from_website</a></p>
                    </div> 
                </div>
           </center>
        </body>
    </html>";
$email = new PHPMailer();
$email->SetFrom('info@feufo.com', 'Feufo'); 
$email->Subject   = $name . " Your Payment successfully Completed";
$email->IsHTML(true);
$email->Body      =  ($message);
$email->AddAddress($to);
if (! $email->Send()) {
 echo "<script>alert('Problem in sending email!');</script>";
} else {
}
}
echo " <script>alert('Status updated');
                        </script>
                    ";    
}
}
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content"  id="divToPrint">
                <div class="col-md-12">

                    <div class="box">
                        <div class="box-body">
                          
                            <div class="no-padding table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php $id=$_GET['id'];
                                        $sql_ptm="select pricing_package_cart.*,plan_pricing.plan_name,plan_pricing.plan_price from pricing_package_cart join plan_pricing on pricing_package_cart.plan_id=plan_pricing.id where property_id='".($id)."' ";
                                        $resultm = mysqli_query($conn, $sql_ptm);
                                        $res= mysqli_fetch_array($resultm); ?>
                                       <tr>
                                            <td>
                                                <label>Plan name. :</label>
                                                <input type="text" class="form-control" value="<?php echo $res['plan_name']; ?>" readonly>
                                            </td>
                                            <td colspan="7">
                                                <label>Plan Price :</label>
                                                <input type="text" class="form-control" value="<?= $date=$res['plan_price'];  ?>" readonly>
                                            </td>
                                        </tr>
                                       <tr>
                                            <td>
                                                <label>Order No. :</label>
                                                <input type="text" class="form-control" value="<?php echo $res['order_id']; ?>" readonly>
                                            </td>
                                            <td colspan="7">
                                                <label>Date :</label>
                                                <input type="text" class="form-control" value="<?php $date=$res['created_dates']; 
                                                 echo $Date = date("d M Y , H:i A ", strtotime($date)); ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <strong>Transaction date :</strong>
                                                <?php echo $res['trans_date']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <strong>Payment method :</strong>
                                                <?php echo $res['payment_method']; ?>
                                            </td>
                                            <td colspan="2">
                                                <strong>Payment Proof Receipt :</strong>
                                                <img src="assest/images/proof/<?php echo $res['proof']; ?>" class="img-responsive" style="height:20px;">
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <strong>Payment Update Status :</strong>
                                                <form method="post" action="">
                                               <select class="form-control" name="payment_status">
                                                        <option value="<?php echo $res['payment_status']; ?>"><?php echo $res['payment_status']; ?></option>
                                                        <option value="Received">Received</option>
                                                        <option value="Pending">Pending</option>
                                                    </select>
                                                <input type="hidden" name="a_id" value="<?php echo $res['id']; ?>" class="form-control-sm">
                                                <button type="submit" name="update" class="btn btn-success" >Update</button> 
                                                </form>
                                                
                                            </td>
                                            <td colspan="2">
                                                <strong>Order Status :</strong>
                                                <?php echo $res['order_status']; ?>
                                            </td> 
                                        </tr>
                                       
                                    </tbody>

<tfoot>
<tr>
<td colspan="2"><a href="property.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a></td>
</tr>
</tfoot>
                                </table>

                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal Category -->
            </section>
			
		</div>
		
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?>
</body>

</html>
