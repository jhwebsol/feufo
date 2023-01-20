<?php include("includes/db_config.php"); 
if (!empty($_POST['token'])) {
 if (hash_equals($_SESSION['token'], $_POST['token'])) {    
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$demo_date = mysqli_real_escape_string($conn,$_POST['demo_date']);
$demo_time = mysqli_real_escape_string($conn,$_POST['timeszn']);
$did = mysqli_real_escape_string($conn,$_POST['did']);
$sql ="UPDATE demo_booking  SET demo_date='$demo_date',demo_time='$demo_time' WHERE id='$did'"; 
if (mysqli_query($conn, $sql)) {
	echo "Your Demo session booked successfully";
   }
 }else{ echo "Something went wrong"; }
}
 $conn->close();
 ?>