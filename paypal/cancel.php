<?php include("includes/db_config.php"); 
 include("paypal/config.php"); 
//session_start();
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <title>Dezignmania</title>
    <?php include("includes/css.php");?>
</head>

<body>
    <div class="page-wrapper">
        <?php include("includes/header.php");?>


        <section class="services-section pay_now_in">
            <div class="container">

                <div class="col-md-10 col-md-offset-1 pay_ment" align="center">
                    <div class="row">  

                            <div class="col-md-6 col-md-offset-3"> 
								<div class="col-md-12 mb-20 text-center">
                                <div class="row text-center">
								<h3 class="text-black text-center"></h3>
                              <div class="container">
<div class="status">

<h1 class="error">Your PayPal Transaction has been Canceled</h1>

</div>

<a href="https://www.ardhaa.com/index.php" class="btn-link">Back to Products</a>

</div>
                </div>      
            </div>
     
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
</body>

</html>
