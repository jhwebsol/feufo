<?php  include("includes/db_config.php");
$id=$_GET['id'];
$sql="select user_payment.*,user_profile.fname,user_profile.mob_no from user_payment join user_profile on user_payment.user_id=user_profile.id where user_payment.id='".$id."'";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en-IN">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Feufo</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php include("includes/css.php")?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php");?>
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content"  id="divToPrint">
                <div class="col-md-12">

                    <div class="box">
                        <div class="box-body">
                          
                            <div class="no-padding table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <?php $res= mysqli_fetch_array($result);
                                           $user_id=$res['user_id'];
                                        $sql=mysqli_query($conn,"select * from user_profile where id='".$user_id."'")or die(mysqli_error($conn));
                                         $res_lg= mysqli_fetch_array($sql); 
                                         $country=$res_lg['country'];
                                        $state=$res_lg['state'];
                                        $city=$res_lg['city'];
                                        $sql_country = mysqli_query($conn,"select * from countries where id = '$country'");
                                        $row_country = mysqli_fetch_array($sql_country);
                                        $sql_state = mysqli_query($conn,"select * from states where id = '$state'");
                                        $row_state = mysqli_fetch_array($sql_state);
                                        $sql_city = mysqli_query($conn,"select * from cities where id = '$city'");
                                        $row_city = mysqli_fetch_array($sql_city);?>
                                       
										<tr>
                                            <td colspan="3">
                                                <strong>Name :</strong>
                                                <?php echo $res_lg['fname']; ?>
                                            </td>
                                            <td colspan="2">
                                                <strong>Email-Id :</strong>
                                                <?php echo $res_lg['email']; ?>
                                            </td> 
                                        </tr>
                                         <tr>
                                            <td colspan="3">
                                                <strong>Contact Number :</strong>
                                                <?php echo $res_lg['mob_no']; ?>
                                            </td>
                                            <td colspan="2">
                                                <strong>Address :</strong>
                                                <?php echo $res_lg['addr']." , ".$row_country['name']." , ".$row_state['name']." , ".$row_city['name']; ?>
                                            </td> 
                                        </tr>
                                       
                                        <tr>
                                            <td>
                                                <label>Order No. :</label>
                                                <input type="text" class="form-control" value="<?php echo $res['order_id']; ?>" readonly>
                                            </td>
                                            <td colspan="7">
                                                <label>Date :</label>
                                                <input type="text" class="form-control" value="<?php $date=$res['created_date']; 
                                                 echo $Date = date("d M Y , H:i A ", strtotime($date)); ?>" readonly>
                                            </td>
                                        </tr>
                                        <?php $promo_id=$res['promo_id'];
                                        if($promo_id !="0"){
                                        $promo_id=$res['promo_id'];
                                        $sql1="select * from promo_code where id='".$promo_id."'";
                                        $result_code = mysqli_query($conn, $sql1); 
                                        $res_code= mysqli_fetch_array($result_code);
                                        $discount=$res_code['discount'];
                                        }else{
                                        $discount="-";
                                        }
                                        ?>
                                         <tr>
                                            <td colspan="5">
                                                <strong>Promo Code Applied :</strong>
                                                <?php echo $discount; ?>
                                            </td>
                                            
                                        </tr>
                                        <tr class="ala_heading">
                                            <td colspan="6">
                                                <h3 class="text-center">Product Details </h3>
                                            <td>
                                        </tr>
                                        <tr>
                                           <th>S.No.</th>  
                                            <th>Product Name</th> 
                                            <th>Product Image</th> 
                                            <th>Quantity</th>
                                            <th>Product Size</th>
                                            <th>Price</th>
                                            <th>Total Price</th> 
                                        </tr>
                                        <?php   $j=1;
                                           $cart_id=$res['cart_id'];
                                           $ct_id = explode(" , ",$cart_id);
                                           foreach($ct_id as $cid){
                                         // $query="select * from addto_cart where id='".$cid."'";
                                           $query="select addto_cart.*,product.prod_img1,product.prod_name from addto_cart join product on addto_cart.prod_id=product.id where addto_cart.id='".$cid."'";
                                           $res_pltrr = mysqli_query($conn, $query);
                                           while($res_sr= mysqli_fetch_array($res_pltrr)){
                                          //  var_dump($res_sr);
                                            ?>
                                        <tr>
                                           <tr>
                                            <td><?php echo $j; $j++; ?></td> 
                                            <td><?php echo $res_sr['prod_name']; ?></td>
                                             <td><img src="product/<?php echo $res_sr['prod_img1']; ?>" width="50px" alt="<?php echo $res_sr['prod_name']; ?>" title="<?php echo $res_sr['prod_name']; ?>" class="shoppingcart_img"></td>
                                            <td><?php echo $res_sr['quantity']; ?></td> 
                                            <td><?php echo $res_sr['prod_size']; ?></td>
                                            <td><?php echo $res_sr['price']; ?></td>
                                           
                                            <td><?php $price=($res_sr['price'] * $res_sr['quantity']); echo $price; ?></td>
                                        </tr>
                                        <?php } } ?>
                                        
                                        <tr>
                                            <td colspan="6" class="text-center"><strong>Grand Total:</strong></td>
                                            <td class="text-center" style="font-size:20px;"><strong><?php echo $res['total_price']; ?></strong></td>
                                        </tr>                                    
                                    </tbody>
                                </table>                              
                            </div>
                        </div>
                    </div>
                </div>
             </section>		
		</div>
		
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?>
</body>

</html>
