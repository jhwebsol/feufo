<?php include("includes/db_config.php"); 
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
$countrys=$details->country;
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$empr_id= $_POST['empr_id'];
$empid= $_POST['empid'];
$eid=$_SESSION['employer_id'];
if(isset($_SESSION['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
$sqlsr ="SELECT * FROM wishlist WHERE empr_id = '".$empr_id."' and emp_id='".$empid."'";
$result = mysqli_query($conn, $sqlsr) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0){	
$sql="INSERT into wishlist(empr_id,emp_id) values ('$empr_id','$empid')";
if (mysqli_query($conn, $sql)) {
	echo "Added To Your Wishlist successfully";
  }else{ echo "some wrong"; }
 }
}else{ echo "Please Login";
	}
 $conn->close();
 ?>