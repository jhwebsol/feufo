<?php include("includes/db_config.php"); 
if(isset($_GET['id']))
{ 
$id = $_GET['id'];
$sql="DELETE FROM es_testimonial WHERE id={$_GET['id']}";
$res=mysqli_query($conn,$sql) or die(mysqli_error());

}
echo "<script>window.location.href='testimonial.php'</script>";
?>