<?php session_start();
include("includes/db_config.php");
if (isset($_POST['submit'])) {
  extract($_POST);
  $email = $_POST["email"]; 
  $password = md5($_POST["password"]); 
  $email = stripslashes($email);
  $password = stripslashes($password);
 $sql="SELECT count(*) as num FROM admin_user WHERE username ='".$email."' AND password='".$password."'";
 $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$res= mysqli_fetch_array($result); 
 $count=$res['num']; 
if($count > 0 )
{  $sqlqr=mysqli_query($conn,"SELECT * FROM admin_user WHERE username ='".$email."'");
$ress= mysqli_fetch_array($sqlqr); 
$_SESSION['loggedin_admin'] = true;
echo $_SESSION['loggedin_admin'];
$_SESSION['aid']=$ress['id'];
echo $aid=$_SESSION['aid'];
echo "<script>window.location.href='dashboard.php'</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feufo</title>
    <link rel="stylesheet" href="assest/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="assest/css/login.css">
<style>
.btn-info {
    color: #fff;
    background-color: #2e59d9;
    border-color: #2e59d9;
    font-size:18px;
border-radius: 10rem;
padding: 0.75rem 1rem;
}
.col-form footer {
  background: #fff;
  border-top: 0px solid rgba(0, 0, 0, 0.1);
  display: block;
  padding: 15px 30px 25px;
  overflow: hidden;
  font-weight: 600;
  color: #000;
}
.col-form .form-control {  
  padding: 1.5rem 2.5rem;
  font-size: 16px;
}
</style>
</head>

<body class="body-bg-color">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row" style="margin-top:100px;background-color:#fff;border-radius:20px;">
                        <?php $idd="1";
                        $reslg=mysqli_fetch_array(mysqli_query($conn,"SELECT * from login_image where id='".$idd."'")); ?>
                        <div class="col-md-6" style="padding:0px;margin:0px;"><img src="https://vethire.io/img/git4.jpg" class="img-responsive img-fluid"></div>
                        <div class="col-md-6" style="padding:0px;margin:0px;">
                            <div class="">
                                <h2 class="text-center">Admin Login</h2>
                                <form action="" method="post" class="col-form" novalidate>
                                    <fieldset>
                                        <section>
                                            <div class="form-group has-feedback">
                                                <input class="form-control" placeholder="E-mail" name="email" type="email">
                                                <span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </section>
                                        <section>
                                            <div class="form-group has-feedback">
                                                <input class="form-control" placeholder="Password" name="password" type="password">
                                                <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </section>
                                        
                                    </fieldset>
                                    <footer>
                                        <button type="submit" name="submit" class="btn btn-info btn-block pull-right">Login</button>
                                    </footer>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>