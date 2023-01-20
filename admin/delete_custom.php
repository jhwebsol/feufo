<?php include("includes/db_config.php");
if(isset($_GET['id']))
{ $id = $_GET['id'];
 $id = $_GET['name'];
if(file_exists("../real-estate-projects/".strtolower(str_replace(" ", "-", $_GET["name"])).".php")){ unlink("../real-estate-projects/".strtolower(str_replace(" ", "-", $_GET["name"])).".php");
$sql="DELETE FROM custome_page WHERE id={$_GET['id']}";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
}
}
echo "<script>window.location.href='custom-page.php'</script>";
?>