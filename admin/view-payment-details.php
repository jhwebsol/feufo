<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.id=".$id;
$result = mysqli_query($conn, $sql);
?>
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
									<div class="col-md-4">
										<h3 class="box-title">View Payment Details</h3>
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom">
									<div class="table-responsive">
										<tbody>
                                        <?php $id=$_GET['id'];
                                        $sql_ptm="select pricing_package_cart.*,plan_pricing.plan_name,plan_pricing.plan_price from pricing_package_cart join plan_pricing on pricing_package_cart.plan_id=plan_pricing.id where property_id='".($id)."' ";
                                        $resultm = mysqli_query($conn, $sql_ptm);
                                        $res= mysqli_fetch_array($resultm); ?>
                                       <tr>
                                            <td>
                                                <label>Plan name. :</label>
                                                <input type="text" class="form-control" value="<?php echo $res['plan_name']; ?>" readonly>
                                            </td>
                                            <td colspan="7">
                                                <label>Plan Price :</label>
                                                <input type="text" class="form-control" value="<?= $date=$res['plan_price'];  ?>" readonly>
                                            </td>
                                        </tr>
                                       <tr>
                                            <td>
                                                <label>Order No. :</label>
                                                <input type="text" class="form-control" value="<?php echo $res['order_id']; ?>" readonly>
                                            </td>
                                            <td colspan="7">
                                                <label>Date :</label>
                                                <input type="text" class="form-control" value="<?php $date=$res['created_dates']; 
                                                 echo $Date = date("d M Y , H:i A ", strtotime($date)); ?>" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <strong>Payment Method :</strong>
                                                <input type="text" class="form-control" value="<?= $date=$res['payment_method'];  ?>" readonly>
                                            </td>
                                           </tr>
                                        <tr>
                                            <td colspan="3">
                                                <strong>Payment Update Status :</strong>
                                                <input type="text" class="form-control" value="<?= $date=$res['payment_status'];  ?>" readonly>
                                            </td>
                                           </tr>
                                       
                                    </tbody>
                                 
									</div>
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
