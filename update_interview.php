<?php include("includes/db_config.php"); 
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$emp_id= $_POST['emp_id'];
$empr_id=$_SESSION['employer_id'];
//$empr_id='1';
$interview_type=$_POST['interview_type'];
$stage=$_POST['stage'];
$timezone=$_POST['timezone'];
$schedule_at=$_POST['schedule_at'];
$duration=$_POST['duration'];
//if(isset($_POST['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
$sql="INSERT into candidate_interview_details(empr_id,emp_id,interview_type,schedule_at,duration,stage,timezone) values ('$empr_id','$emp_id','$interview_type','$schedule_at','$duration','$stage','$timezone')";
if (mysqli_query($conn, $sql)) {
    $last_id= mysqli_insert_id($conn);
	echo $last_id;
 }
//}else{ echo "Please Login";}
 $conn->close();
 ?>