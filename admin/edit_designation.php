<?php include("includes/db_config.php"); 
if(isset($_POST["c_id"]))  
{  
$query = "SELECT * FROM designation WHERE id = '".$_POST["c_id"]."'";  
$result = mysqli_query($conn, $query);  
$row = mysqli_fetch_array($result);  
 echo json_encode($row);   }  
 ?>