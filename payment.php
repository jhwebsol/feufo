<?php include("includes/db_config.php"); 
if(isset($_SESSION['loggedin_employer']) && $_SESSION['loggedin_employer'] == true){
}else{
 echo "<script> alert('Please Login!'); 
location.replace('https://www.feufo.com/index.php'); </script>";
}
require 'stripe/Stripe.php';
$publishable_key    = "pk_test_51MCrkEAN3VWthXwpnxdCrcsKZ0SoT2Y2XSMRR28xjnl0DfIgnJGeILiX37xHxoAtoKseeIsyN5NsMYgYOJQyHFgV00HmXcGhlJ";
$secret_key         = "sk_test_51MCrkEAN3VWthXwp1CvYIVIy9SItlC7C3Gch2cmObcEkBBoYnWCYOZVm9lQ34OBdSSQXRno4OypTnOZINd1UhrSv00LVf3tMRL";

if(isset($_POST['stripeToken'])){
    Stripe::setApiKey($secret_key);
    $description    = "Invoice #".rand(99999,999999999);
    $amount_cents   = 100;
    $tokenid        = $_POST['stripeToken'];
    
    try {
        $charge         = Stripe_Charge::create(array( 
        "amount"        => $amount_cents,
        "currency"      => "usd",
        "source"        => $tokenid,
        "description"   => $description)              
        );
        
       // if (is_array($charge)){
        $id         = $charge['id'];
        $amount     = $charge['amount'];
        $balance_transaction = $charge['balance_transaction'];
        $currency   = $charge['currency'];
        $status     = $charge['status'];
        $date   = date("Y-m-d H:i:s");
        
        $result = "succeeded";
        /* You can save the above response in DB */
        $eid=$_SESSION['employer_id'];
        $sqlptm="INSERT into employer_payment(empr_id,payment_id,amount,balance_transaction,payment_status,payment_date) values ('$eid','$id','$amount','$balance_transaction','$status','$date')";
        $results = mysqli_query($conn, $sqlptm); 
        //}
        header("location:success.php?id=".$id);
        exit;

        }catch(Stripe_CardError $e) {           
            $error = $e->getMessage();
            $result = "declined";
        }
}


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php include("includes/css.php");?> 
<link href="css/candidate.css" rel="stylesheet"> 
<style>
.default-form .form-group {
  position: relative;
  margin-bottom: 10px;
}
.default-form {
  position: relative;
  padding: 10px 30px 30px 30px;
}
.form-group label{color:#000;font-weight:600;margin-bottom: 0.1rem;}
.default-form .form-group .form-control{margin-bottom:10px; height:45px!important;border:1px solid #ccc!important;line-height: 18px!important}
</style> 
</head>

<body>
    <div class="page-wrapper">
        <?php include("includes/header.php");?>
        <section class="page-title">
            <div class="auto-container">
                <div class="title-outer">
                    <h1>Payment</h1>                    
                </div>
            </div>
        </section>
  <section class="about-section-three" style="background: linear-gradient(90deg, rgba(96,40,89,1) 0%, rgba(78,48,109,1) 46%, rgba(58,57,133,1) 100%);">
      <div class="auto-container">
      <div class="row">
        <div class="column col-lg-3 col-md-3 col-sm-3"></div>
        <div class="column col-lg-6 col-md-6 col-sm-6" style="background-color:#fff;border-radius: 5px;"> 
        <div class="col-lg-12 col-md-12 col-sm-12 text-center"><img src="img/stripepayment.jpg"></div>
		<div class="contact-form default-form" >
            <?php $sqlpr=mysqli_fetch_array(mysqli_query($conn,"select * from employee_price")); ?>
          <form action="" method="post" name="cardpayment" id="payment-form">
		  <div class="row form-group">
                <?php 
                if($_GET['id']!=""){
                ?>
                <div class="col-lg-12 col-md-12">
                  <div class="payment-success">Thanks for your payment. <br/> Your Transaction Id: <?php print $_GET['id']?></div>
                </div>
                <?php } ?>
                 
                <div class="col-lg-12 col-md-12">
                  <label>Card Holder Name</label>
                  <input name="holdername" id="name" class="form-control" type="text"  required />
                 </div>
                
                <div class="col-lg-12 col-md-12">
                  <label class="form-label" for="email">Email</label>
                  <input name="email" id="email" class="form-control" type="email" required />
                 </div>
                
                <div class="col-lg-12 col-md-12">
                  <label class="form-label" for="card">Card Number</label>
                  <input name="cardnumber" id="card" class="form-control" type="text" maxlength="16" data-stripe="number" required />
                 </div>


                <div class="col-lg-4 col-md-12">
                  <label class="form-label" for="password">Expiry Month</label>
                  <select name="month" id="month" class="form-control" data-stripe="exp_month">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                </div>
				<div class="col-lg-4 col-md-12">
                  <label class="form-label" for="password">Expiry Year</label>
                <select name="year" id="year" class="form-control" data-stripe="exp_year">
                    <option value="19">2019</option>
                    <option value="20">2020</option>
                    <option value="21">2021</option>
                    <option value="22">2022</option>
                    <option value="23">2023</option>
                    <option value="24">2024</option>
                    <option value="25">2025</option>
                    <option value="26">2026</option>
                    <option value="27">2027</option>
                    <option value="28">2028</option>
                    <option value="29">2029</option>
                    <option value="30">2030</option>
                    <option value="31">2031</option>
                    <option value="32">2032</option>
                    <option value="33">2033</option>
                    <option value="34">2034</option>
                    <option value="35">2035</option>
                    <option value="36">2036</option>
                    <option value="37">2037</option>
                    <option value="38">2038</option>
                    <option value="39">2039</option>
                    <option value="40">2040</option>
                    <option value="41">2041</option>
                    <option value="42">2042</option>
                    <option value="43">2043</option>
                    <option value="44">2044</option>
                    <option value="45">2045</option>
                    <option value="46">2046</option>
                    <option value="47">2047</option>
                    <option value="48">2048</option>
                    <option value="49">2049</option>
                    <option value="50">2050</option>
                </select>
				</div>
				<div class="col-lg-4 col-md-12">				
                  <label class="form-label" for="password">CVV</label>                
                <input name="cvv" id="cvv" class="form-control" type="text" placeholder="CVV" data-stripe="cvc" required />            
                 </div>

                <div class="form-group">
                  <div class="payment-errors"></div>
                </div>

                <div class="button-style col-lg-12 col-md-12">
                    <button class=" theme-btn btn-style-one button login submit" style="width:100%;">
                       PAYNOW ($ <?= $sqlpr['price'];?>) <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
              </form>
            </div>
            </div> 
        </div> 
      </div>
    </section>
        <?php include("includes/footer.php");?>
    </div>
    <?php include("includes/js.php");?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    Stripe.setPublishableKey('<?php print $publishable_key; ?>');
  
    $(function() {
      var $form = $('#payment-form');
      $form.submit(function(event) {
        // Disable the submit button to prevent repeated clicks:
        $form.find('.submit').prop('disabled', true);
    
        // Request a token from Stripe:
        Stripe.card.createToken($form, stripeResponseHandler);
    
        // Prevent the form from being submitted:
        return false;
      });
    });

    function stripeResponseHandler(status, response) {
      // Grab the form:
      var $form = $('#payment-form');
    
      if (response.error) { // Problem!
    
        // Show the errors on the form:
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.submit').prop('disabled', false); // Re-enable submission
    
      } else { // Token was created!
    
        // Get the token ID:
        var token = response.id;

        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));
    
        // Submit the form:
        $form.get(0).submit();
      }
    };
    
</script> 
<script>
(function ($) {
    "use strict";
     $(function() {
        $('input').focus(function(){
          $(this).parents('.form-group').addClass('focused');
        });

        $('input').blur(function(){
          var inputValue = $(this).val();
          if ( inputValue == "" ) {
            $(this).removeClass('filled');
            $(this).parents('.form-group').removeClass('focused');  
          } else {
            $(this).addClass('filled');
          }
        });  
    });
}(jQuery));
</script>   
</body>

</html>