<?php include("includes/db_config.php");
if(($_POST['action']== "add_delete")){
$id = $_POST['data_pid'];
$sql="DELETE FROM candidate_interview_date WHERE id='".$id."'";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
}
if(($_POST['action']== "delete_interviewer")){
$id = $_POST['data_pid'];
$sql="DELETE FROM candidate_interviewers WHERE id='".$id."'";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
}
?>