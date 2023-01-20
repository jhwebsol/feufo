<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select * from employer where id=".$id;
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
										<h3 class="box-title">Employer Payment Details</h3>
									</div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom">
									<div class="table-responsive">
										<table class="table table-bordered table-stripped table-hover">
											<thead></thead>
											<tbody>
									        <?php $user_id=$_GET['user_id'];
									        $page_count = "SELECT * FROM employer_payment where empr_id='".$user_id."'";
                                            $result_cts=mysqli_query($conn,$page_count) or die(mysqli_error());
									        while($res= mysqli_fetch_array($result_cts)){ 
									         ?>
												<tr class="odd"> 
												  <th>Payment id: </th>
													<td colspan="3"> <?php echo $res['payment_id']; ?></td> 
												</tr>
												<tr class="even"> 
												  <th>Amount:</th>
												  <td colspan="3"><?php echo $res['amount']; ?> </td>
												</tr> 

												<tr class="odd">	
													<th>Balance transaction: </th>
													<td><?php echo $res['balance_transaction']; ?></td> 	
													<th>Payment status: </th>
													<td><?php echo $res['payment_status']; ?> </td> 
												</tr>
												<tr class="even">	
													<th>Payment date: </th>
													<td><?php echo $res['payment_date']; ?></td> 	
												</tr>
												<?php } ?>
											</tbody>
											<tfoot> </tfoot>
										</table> 
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
