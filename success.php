 <?php include("includes/db_config.php");
 if(isset($_SESSION['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){
}else{
 echo "<script> alert('Please Login!'); 
location.replace('https://www.feufo.com/index.php'); </script>";
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?> 
<link href="css/candidate.css" rel="stylesheet"> 
</head>

<body>
    <div class="page-wrapper">
        <?php include("includes/header.php");?>
        <section class="page-title">
            <div class="auto-container">
                <div class="title-outer">
                    <h1>Success</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Success</li>
                    </ul>
                </div>
            </div>
        </section>
    <section class="about-section-three">
      <div class="auto-container">
      <div class="row">
        <div class="column col-lg-6 col-md-6 col-sm-6">
         <h4 class="text-black">Thanks for your payment. <br/> Your Transaction Id: <?php echo $_GET['id'];?></h4>
        </div>

        </div> 
      </div>
    </section>
        <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>