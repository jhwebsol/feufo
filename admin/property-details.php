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
									<div class="col-md-4"><h3 class="box-title">Product Details</h3></div>
									<div class="col-md-2 pull-right"><a href="add-product.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add New Product</button></a></div>
								</div>
							</div>
							<div class="box-body table-responsive">
								<table class="table table-bordered table-striped example3">
									<thead>
										<tr>
											<th><input type="checkbox" value=""> All</th>
											<th>Sr. No</th>
											<th>Product Code</th>
											<th>Product Name</th>
											<th>Product Size</th>
											<th>Quantity</th>
											<th>Prices</th>
											<th>Note</th> 
											<th>View</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox" value=""></td>
											<td>1</td>
											<td><b>DS11</b></td>
											<td>Onion</td>
											<td>100 KG</td>
											<td>1</td>
											<td> 500</td>
											<td>Hi, This is very good Product...</td> 
											<td><a href="view-product-details.php"><i class="fa fa-eye"></i></a></td>
											<td><a href="edit-product-details.php"><i class="fa fa-pencil"></i></a></td>
											<td><a href=""><i class="fa fa-trash"></i></a></td>
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
