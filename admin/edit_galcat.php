<?php include("includes/db_config.php"); 
if(isset($_POST["ad_id"]))  
 {  
      $query = "SELECT * FROM gallery_category WHERE id = '".$_POST["ad_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>