<?php  include("includes/db_config.php"); 
if(isset($_POST["bid"]))  
 {  
      $query = "SELECT * FROM aboutus_box WHERE id = '".$_POST["bid"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>