<?php include("includes/db_config.php"); 
if(isset($_POST["p_id"]))  
 {  
      $query = "SELECT * FROM skill_detail WHERE id = '".$_POST["p_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>