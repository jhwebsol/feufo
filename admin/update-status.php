<?php include("includes/db_config.php"); 
if(isset($_POST["nstatus"]))  
 {  $id=$_POST["id"];
$status=$_POST["nstatus"];
$db=$_POST["db"];
$sql1 ="UPDATE  ".$db."  SET status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
 }  
 ?>