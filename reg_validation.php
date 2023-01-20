<?php include("includes/db_config.php"); 
if(isset($_POST['search2'])){
	$search2= $_POST['search2'];
$sqlll2 = mysqli_query($conn,"SELECT * from employer where email_id ='$search2' ") or die (mysql_error());
if(mysqli_num_rows($sqlll2)>0){
echo "<b>".$search2." Email-Id Already Exists!";
}else{
	//echo "<b>".$search2." Available.";
}
}

if(isset($_POST['search'])){
$search= $_POST['search'];
$sqlll2 = mysqli_query($conn,"SELECT * from employer where email_id ='$search' ") or die (mysql_error());
if(mysqli_num_rows($sqlll2)>0){
echo " ";
}else{
	echo "<b>".$search." Email-Id Doesn't Exist Please Register!.";
}
}
?>