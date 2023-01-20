<?php include("includes/db_config.php");
if(isset($_GET['id']))
{ echo $id = $_GET['id'];
$sql_prt=mysqli_query($conn,"select * from es_property where id='".$id."'");
$res_prt= mysqli_fetch_array($sql_prt);
if(file_exists("../property-services/".strtolower(str_replace(" ", "-", $res_prt["property_name"])).".php")){
	unlink("../property-services/".strtolower(str_replace(" ", "-", $res_prt["property_name"])).".php");
echo $id = $_GET['id'];
$sql=mysqli_query($conn,"DELETE FROM es_property WHERE id='".$id."'"); 
$sql1=mysqli_query($conn,"DELETE FROM es_property_image WHERE property_id='".$id."'");
$sqls=mysqli_query($conn,"DELETE FROM property_aminities WHERE property_id='".$id."'");
}else{
$sql=mysqli_query($conn,"DELETE FROM es_property WHERE id='".$id."'"); 
$sql1=mysqli_query($conn,"DELETE FROM es_property_image WHERE property_id='".$id."'");
$sqls=mysqli_query($conn,"DELETE FROM property_aminities WHERE property_id='".$id."'");	
}
}
echo "<script>window.location.href='property.php'</script>";
?>