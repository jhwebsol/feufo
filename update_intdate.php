<?php include("includes/db_config.php"); 
$ip = $_SERVER['REMOTE_ADDR'];
if(($_POST['action']== "add_date")){
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$emp_id= $_POST['emp_id'];
$cd_id= $_POST['cd_id'];
$empr_id=$_SESSION['employer_id'];
$in_date=$_POST['dates'];
$ex_date = explode(" ",$in_date);
$newdate1=$ex_date[0]; 
$newdate2=$ex_date[1];
$newdate3=$ex_date[2];
$newdate4=$ex_date[3];
$fndate= $newdate3.' '.$newdate2.' '.$newdate4;
//if(isset($_POST['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
$sql="INSERT into candidate_interview_date(cid,emp_id,in_date,created_date) values ('$cd_id','$emp_id','$fndate','$date')";echo $sql;
if (mysqli_query($conn, $sql)) {
    $last_id= mysqli_insert_id($conn);
    //echo "Added successfully";
 }
//}else{ echo "<script>location.replace('https://www.feufo.com/login.php'); </script>";   }
}
if(($_POST['action']== "add_slot")){
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
 $timeslot= $_POST['timeslot'];
 $cd_id= $_POST['cdid']; 
if(count($_POST["cdid"]) > 0)  {
for($i = 0; $i < count($_POST["cdid"]); $i++){
$cd_id = mysqli_real_escape_string($conn,$_POST['cdid'][$i]);
 $timeslot = mysqli_real_escape_string($conn,$_POST['timeslot'][$i]);    
//$empr_id=$_SESSION['employer_id'];
//if(isset($_POST['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
$sql ="UPDATE candidate_interview_date SET hours='$timeslot' WHERE id='$cd_id'";
if (mysqli_query($conn, $sql)) {
    $last_id= mysqli_insert_id($conn);
    //echo "Added successfully";
  }
 }
}
//}else{ echo "Please Login";   }
}
if(($_POST['action']== "add_time")){
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$cdid= $_POST['cdid'];
$tzone=$_POST['tzone'];
$minute=$_POST['minute'];
$hours=$_POST['hours'];
$timezone=$_POST['timezone'];
//if(isset($_POST['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
if(count($_POST["minute"]) > 0){
for($i = 0; $i < count($_POST["minute"]); $i++){
 $minute = mysqli_real_escape_string($conn,$_POST['minute'][$i]);
 $hours = mysqli_real_escape_string($conn,$_POST['hours'][$i]);
 $timezone = mysqli_real_escape_string($conn,$_POST['timezone'][$i]);
$sql="INSERT into candidate_interview_times(cd_interview_id,minute,hours,timezone,created_date) values ('$cdid','$minute','$hours','$timezone','$date')";
if (mysqli_query($conn, $sql)){
    $last_id= mysqli_insert_id($conn);
    //echo "Added successfully";
  }
 }
}
//}else{ echo "Please Login";   }
}
if(($_POST['action']== "add_interviewer")){
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$emp_id= $_POST['emp_id'];
$cds_id= $_POST['cds_id'];
$iname=$_POST['iname'];
$email_intr=$_POST['email_intr'];
$contact_noit=$_POST['contact_noit'];
//if(isset($_POST['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){ 
if(count($_POST["iname"]) > 0){
for($i = 0; $i < count($_POST["iname"]); $i++){
 $iname = mysqli_real_escape_string($conn,$_POST['iname'][$i]);
 $email_intr = mysqli_real_escape_string($conn,$_POST['email_intr'][$i]);
 $contact_noit = mysqli_real_escape_string($conn,$_POST['contact_noit'][$i]);
$sql="INSERT into candidate_interviewers(emp_id,cds_id,name,email_id,contact_no,created_date) values ('$emp_id','$cds_id','$iname','$email_intr','$contact_noit','$date')";
if (mysqli_query($conn, $sql)) {
    $last_id= mysqli_insert_id($conn);
   }
  }
 }
//}else{ echo "Please Login";   }
}
 $conn->close();
 ?>