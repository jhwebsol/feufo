<?php include("includes/db_config.php"); 
if(isset($_POST["prd_id"]))  
 {  $query = "SELECT * FROM es_property_image WHERE id = '".$_POST["prd_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>