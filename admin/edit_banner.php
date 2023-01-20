<?php    
include("includes/db_config.php"); 
if(isset($_POST["ban_id"]))  
 {  
      $query = "SELECT * FROM slider WHERE id = '".$_POST["ban_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>