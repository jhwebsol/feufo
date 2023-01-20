<?php

 include("includes/db_config.php"); 
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM product WHERE id = '".$id."'";
  mysqli_query($conn, $query);
 }
}
echo "<script>window.location.href='products.php'</script>";

?>