<?php include("includes/css.php"); ?>
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
										<h3 class="box-title">Home Services</h3>
									</div>
									<div class="col-md-2 pull-right"><a href="add-service-detail.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add Home Services</button></a></div>
								</div>
							</div>
							<div class="box-body">
								
								<div class="bb-2"></div>
								<div class="table-responsive">
									<table class="table table-bordered table-striped example3">	
										<thead>
											<tr>
												<th>Sr. No</th>
												<th> Title</th>
												<th> Image</th>
												<th>Description</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$sql_qry="select service_details.* from service_details ";
                                            $result_pr = mysqli_query($conn, $sql_qry); $j=1;
										   while($res= mysqli_fetch_array($result_pr)){ ?>
											<tr>
											   <td><?php echo $j; $j++; ?></td>
											   <td><?php echo $res['title']; ?></td>
											   <td><img src="img/<?php echo $res['service_img']; ?>" width="60px"></td>
											   <td><?php echo html_entity_decode($res['description']);  ?></td>
											    <td><a href="edit-services.php?id=<?php echo $res['id']; ?>"><i class="fa fa-pencil"></i></a></td> 
												 <td><a href="javascript:delete_prod_by_ID('<?php echo $res['id']; ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
											</tr>
										<?php } ?>
										</tbody>
										 </form>
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
 <script>
function delete_prod_by_ID(id)
{
if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
window.location.href = 'delete_services.php?id=' + id;
}
}

</script>

</html>
