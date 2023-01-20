<?php  
 //fetch.php  
include("includes/db_config.php"); 
if(isset($_POST["country_id"]))  
 {  
      $query = "SELECT * FROM country WHERE id = '".$_POST["country_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>