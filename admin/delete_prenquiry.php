<?php include("includes/db_config.php");
if(isset($_GET['id']))
{ $id = $_GET['id'];
$sql="DELETE FROM property_enquiry WHERE id={$_GET['id']}";
$res=mysqli_query($conn,$sql) or die(mysqli_error()); }
echo "<script>window.location.href='property-enquiry.php'</script>";
?>