<?php  
 //fetch.php  
include("includes/db_config.php"); 
if(isset($_POST["prd_id"]))  
 {  
      $query = "SELECT * FROM product_detail WHERE id = '".$_POST["prd_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>