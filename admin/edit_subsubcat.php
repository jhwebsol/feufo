<?php  
 //fetch.php  
include("includes/db_config.php"); 
if(isset($_POST["scat_id"]))  
 {  
 	//var_dump($_POST);exit();
      $query = "SELECT * FROM sub_sub_category WHERE id = '".$_POST["scat_id"]."'";  
      	//$sql="select sub_category.*,category.cat_name from sub_category join category on sub_category.category_id=category.id join category on sub_category.category_id=category.id WHERE sub_category.id = '".$_POST["cat_id"]."'";
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>