<?php  include("includes/db_config.php"); 
if(isset($_POST["s_id"]))  
 {  
      $query = "SELECT * FROM state WHERE id = '".$_POST["s_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>