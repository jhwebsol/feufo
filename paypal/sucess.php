<?php include("db_config.php"); 
 include("paypal/config.php"); 
 // If transaction data is available in the URL 
 if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && !empty($_GET['cc']) ){ 
     // Get transaction information from URL 
     $item_number = $_GET['item_number'];  

     $txn_id = $_GET['tx']; 

     $payment_gross = $_GET['amt']; 

     $currency_code = $_GET['cc']; 

     //$payment_status = $_GET['st']; 
 // Get product info from the database 

     $productResult = mysqli_query($conn,"SELECT * FROM assig_order WHERE id = ".$item_number); 
      $productRow=mysqli_fetch_array($productResult);
    // $productRow = $productResult->fetch_assoc(); 

     // Check if transaction data exists with the same TXN ID. 

     $prevPaymentResult = mysqli_query($conn,"SELECT * FROM payment WHERE txn_id = '".$txn_id."'"); 


     if( mysqli_num_rows($prevPaymentResult) > 0){ 
         $productRow=mysqli_fetch_array($prevPaymentResult);
         //$paymentRow = $prevPaymentResult->fetch_assoc(); 

         $payment_id = $paymentRow['payment_id']; 
         $payment_gross = $paymentRow['payment_gross']; 

         //$payment_status = $paymentRow['payment_status']; 

}else{ 

         // Insert transaction data into the database 
date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
         $insert =("INSERT INTO payment(order_id,txn_id,payment_gross,currency_code,created_date) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$date."')"); 
         $result = mysqli_query($conn, $insert) or die(mysqli_error());
         //$payment_id = $db->insert_id;
         $payment_id= mysqli_insert_id($conn);
 

} 

} 
 ?>
<div class="container">
    <div class="status">
        <?php if(!empty($payment_id)){ ?>
            <h1 class="success">Your Payment has been Successful</h1>
         <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>

            <p><b>Transaction ID:</b> <?php echo $txn_id; ?></p>

            <p><b>Paid Amount:</b> <?php echo $payment_gross; ?></p>

            <!-- <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
 -->
            <h4>Product Information</h4>
       <!--   <p><b>Name:</b> <?php echo $productRow['name']; ?></p> -->
            <p><b>Price:</b> <?php echo $productRow['price']; ?></p>

        <?php }else{ ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>

    </div>
    <a href="index.php" class="btn-link">Back to Products</a>

</div>