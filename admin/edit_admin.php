<?php include("includes/db_config.php"); 
if(isset($_POST["aid"]))  
{  
$query = "SELECT * FROM es_admin_user WHERE id = '".$_POST["aid"]."'";  
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_array($result);  
 echo json_encode($row);   }  
 ?>