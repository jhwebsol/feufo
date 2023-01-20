<?php include("includes/db_config.php"); 
if(isset($_POST["g_id"]))  
 {  $query = "SELECT * FROM nearest_location WHERE id = '".$_POST["g_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>