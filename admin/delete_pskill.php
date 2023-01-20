<?php
include("includes/db_config.php");

if(isset($_GET['id']))
{
	//var_dump($_GET);exit();
$id = $_GET['id'];
$sql="
DELETE FROM skills
WHERE id={$_GET['id']}";
$res=mysqli_query($conn,$sql) or die(mysqli_error());

}
echo "<script>window.location.href='candidate-job.php'</script>";
?>