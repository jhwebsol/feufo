<?php include("includes/db_config.php");
if(isset($_GET['id']))
{ $id = $_GET['id'];
$sql="DELETE FROM candidate_interview_details WHERE id={$_GET['id']}";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
$sqls="DELETE FROM candidate_interview_date WHERE cid={$_GET['id']}";
$ress=mysqli_query($conn,$sqls) or die(mysqli_error());
$sqls="DELETE FROM candidate_interview_times WHERE cd_interview_id={$_GET['id']}";
$ress=mysqli_query($conn,$sqls) or die(mysqli_error());
}
}
echo "<script>window.location.href='candidate-interview.php'</script>";
?>