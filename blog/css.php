<?php if(isset($_POST["log_submit"])) 
{  extract($_POST);
 $emails = $_POST["username"]; 
$passwords = $_POST["passwords"]; 
$emails = stripslashes($emails);
$passwords = stripslashes($passwords);
$sqlsr ="SELECT * FROM employer WHERE email_id = '".$emails."'";
$result = mysqli_query($conn, $sqlsr) or die(mysqli_error($conn));
$resr= mysqli_fetch_array($result);
 $hashedpassword=$resr['password']; 
if (password_verify($passwords, $hashedpassword)){ 
$_SESSION['loggedin_employer'] = true;
$_SESSION['employer_id']=$resr['id'];
echo $user_id=$_SESSION['employer_id'];
echo '<script>alert("Login successfully")</script>'; 
echo "<script>window.location.href='https://www.feufo.com/index.php'</script>";
}else{
$sqlcd =mysqli_query($conn,"SELECT * FROM employee_details WHERE email_id = '".$emails."'");
$rescd= mysqli_fetch_array($sqlcd);
$passwordep=$rescd['password']; 
if (password_verify($passwords, $passwordep)){ 
$_SESSION['loggedin_employee'] = true;
$_SESSION['employee_id']=$rescd['id'];
echo $euser_id=$_SESSION['employee_id'];
echo '<script>alert("Login successfully")</script>'; 
echo "<script>window.location.href='https://www.feufo.com/candidate/dashboard.php'</script>";
}else{ echo '<script>alert("The username or password are incorrect!")</script>'; }
}
//else{ echo '<script>alert("The username or password are incorrect!")</script>'; }
}
if(isset($_POST['register'])) {
extract($_POST);
$email= $_POST['email'];
$password= $_POST['password'];
$cpassword= $_POST['passwords'];
$sql ="SELECT count(*) as num FROM employer WHERE email_id = '".$email."'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$res= mysqli_fetch_array($result);
 $count=$res['num']; 
if($count == 0){
if($password === $cpassword){ 
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$options = [
    'cost' => 11,
];
$passwordFromPost = $_POST['password'];
$passwordhash = password_hash($passwordFromPost, PASSWORD_BCRYPT, $options);
$sql="INSERT into employer(email_id,password,created_date) values ('$email','$passwordhash','$date')";
$result = mysqli_query($conn, $sql); 
$last_id= mysqli_insert_id($conn);
if($result) {
$sqls=mysqli_query($conn,"INSERT into employer_social_md(empr_id) values ('$last_id')");
$sqlss=mysqli_query($conn,"INSERT into employer_contact(empr_id) values ('$last_id')");
  echo '<script>alert("Registration successfully Completed")</script>'; 
}
}else{
    echo '<script>alert("Email Id OR Password Does not match")</script>';  
} }else{
    echo '<script>alert("Email Id Already Exits! Please Login")</script>';  
}
}

?>
<title>Feufo</title> 
<link rel="icon" href="https://www.feufo.com/img/favicon.png" type="image/x-icon">
<link href="https://www.feufo.com/css/bootstrap.css" rel="stylesheet">
<link href="https://www.feufo.com/css/style.css" rel="stylesheet">
<link href="https://www.feufo.com/css/responsive.css" rel="stylesheet">
<link href="https://www.feufo.com/css/custom.css" rel="stylesheet">