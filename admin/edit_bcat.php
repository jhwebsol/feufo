<?php include("includes/db_config.php"); 
if(isset($_POST["cat_id"]))  
 {  $query = "SELECT * FROM blog_category WHERE id = '".$_POST["cat_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>