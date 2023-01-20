<?php include("includes/db_config.php"); 
if(isset($_POST["t_id"]))  
 {  $query = "SELECT * FROM es_testimonial WHERE id = '".$_POST["t_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>