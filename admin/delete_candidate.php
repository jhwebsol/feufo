<?php include("includes/db_config.php");
if(isset($_GET['id']))
{ $id = $_GET['id'];
$sql_prt=mysqli_query($conn,"select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.category_id=category.id join sub_category on employee_details.sub_category_id=sub_category.id where employee_details.id='".$id."'");
$res_prt= mysqli_fetch_array($sql_prt);
if(file_exists("../".strtolower(str_replace(" ", "-", $res_prt["cat_name"]))."/".strtolower(str_replace(" ", "-", $res_prt["sub_category_name"]))."/".strtolower(str_replace(" ", "-", $res_prd["emp_name"])).".php")){
unlink("../".strtolower(str_replace(" ", "-", $_GET["name"]))."/".strtolower(str_replace(" ", "-", $res_cat["sub_name"]))."/".strtolower(str_replace(" ", "-", $res_scat["sub_sub_cat_name"]))."/".strtolower(str_replace(" ", "-", $res_prd["emp_name"])).".php");
$id = $_GET['id'];
$sql=mysqli_query($conn,"DELETE FROM employee_details WHERE id='".$id."'"); 
}else{
$sql=mysqli_query($conn,"DELETE FROM employee_details WHERE id='".$id."'"); 
}
}
echo "<script>window.location.href='candidate-job.php'</script>";
?>