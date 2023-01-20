<?php include("includes/db_config.php"); 
if(isset($_POST["cid"]))  
{ $query = "SELECT * FROM skills WHERE id = '".$_POST["cid"]."'";  
 $result = mysqli_query($conn, $query);  
 $row = mysqli_fetch_array($result);  
 echo json_encode($row);  
 }  
 ?>