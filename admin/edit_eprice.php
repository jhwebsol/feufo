<?php include("includes/db_config.php"); 
if(isset($_POST["pid"]))  
 {  $query = "SELECT * FROM employee_price WHERE id = '".$_POST["pid"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>