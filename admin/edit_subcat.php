<?php include("includes/db_config.php");
if(isset($_POST["scat_id"]))  
 {  $query = "SELECT * FROM sub_category WHERE id = '".$_POST["scat_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }
?>