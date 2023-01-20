<?php  include("includes/db_config.php");
$sql="select user_payment.*,user_profile.fname,user_profile.mob_no from user_payment join user_profile on user_payment.user_id=user_profile.id ";
$result = mysqli_query($conn, $sql);
if(isset($_POST['Search']))
{
extract($_POST);
$prd_name=$_POST["prd_name"];
$sql="select addto_cart.*,user_profile.fname,user_profile.lname,user_profile.mob_no from addto_cart join user_profile on addto_cart.user_id=user_profile.id where prod_name='$prd_name' group by addto_cart.order_no";
$result = mysqli_query($conn, $sql);
}
if(isset($_POST['update']))
{
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
$product=$_POST["product"];
$id=$_POST["a_id"];
$sql1 ="UPDATE user_payment SET payment_status='$product',delivered_date='$date' WHERE id='$id'"; 
$res_sql=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
if($res_sql)
{
 echo "<script>window.location.href='product-order-details.php'</script>";
}
}
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
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-danger">
							<div class="box-header">
								<div class="row">
									<div class="col-md-12">
										<h3 class="box-title">Order Details</h3>
									</div>

								</div>
							</div>
							<div class="box-body">
								
								<div class="table-responsive">
									<table class="table table-bordered table-striped example3">
																				<thead>
											<tr>
												<th>Sr. No</th>
												<th>Order-Id</th>
												<th>Cust.Name</th>
												<th class="text-center">Cust.Contact</th>
												
												<th class="text-center">Date Of Order</th>
												<th class="text-center">Total Prices(Rs.)</th>
												<th class="text-center">No.Of Product</th>
												<th>Payment Method</th>
												<th>Status</th>
												<th>View</th>
												<th>Invoice</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$j=1;
											while($res= mysqli_fetch_array($result))
											{ ?>
											<tr>
												<td><?php echo $j; $j++; ?></td>
											    <td><?php echo $res['order_id']; ?></td> 
											    <td class="text-capitalize"><?php echo $res['fname']; ?></td> 
												<td class="text-center"><?php echo $res['mob_no']; ?></td> 
											
												<td class="text-center"><?php echo $res['created_date']; ?></td>  
												<td class="text-center"><?php echo $res['total_price']; ?></td>  
												<td class="text-capitalize"><?php
													echo $res['cart_id']; ?></td> 
												<td class="text-capitalize"><?php echo $res['payment_method']; ?></td> 
												<td>
												<form method="post" action="">
													<select class="form-control" name="product">
														<option value="<?php echo $res['payment_status']; ?>"><?php echo $res['payment_status']; ?></option>
														<option value="Accept">Accept</option>
														<option value="Processing">Processing</option>
														<option value="Delivered">Delivered</option>
														<option value="Reject">Reject</option>
													</select>
													<input type="hidden" name="a_id" value="<?php echo $res['id']; ?>" class="form-control-sm">
												<button type="submit" name="update" class="btn btn-success" >Update</button> 
												</form>
												</td>
												<td><a href="view-product-order-detail.php?id=<?php echo $res['id'];?>"><i class="fa fa-eye"></i></a></td>
												<td><a href="invoice.php?id=<?php echo $res['id'];?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Invoice</a></td>
												 <td><a href="javascript:delete_ord_by_ID('<?php echo $res['id']; ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
											</tr> 
										<?php } ?>   
										</tbody>
									</table>
								</div>
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
