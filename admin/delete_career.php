<?php include("includes/db_config.php");
if(isset($_GET['id']))
{ $id = $_GET['id'];
$sql="DELETE FROM career_detail WHERE id={$_GET['id']}";
$res=mysqli_query($conn,$sql) or die(mysqli_error()); }
echo "<script>window.location.href='career_detail.php'</script>";
?>