<?php include("includes/db_config.php"); 
if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {    
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$name = mysqli_real_escape_string($conn,$_POST['name']);
$company_name = mysqli_real_escape_string($conn,$_POST['company_name']);
$focus = mysqli_real_escape_string($conn,$_POST['focus']);
$contact_no = mysqli_real_escape_string($conn,$_POST['contact_no']);
$emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
$sql="INSERT into demo_booking(company_name,name,email_id,contact_no,training_focus) values ('$company_name','$name','$emailid','$contact_no','$focus')";
if (mysqli_query($conn, $sql)) {
    $last_id= mysqli_insert_id($conn);
    echo $last_id;
	//echo "Your Demo session booked successfully";
   }
 }else{ echo "Something went wrong"; }
}
 $conn->close();
 ?>