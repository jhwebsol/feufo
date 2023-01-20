<?php include("includes/css.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Customer</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered" id="example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Company Name</th>
											<th>Name</th>
											<th>Email</th> 
											<th>Mobile no</th> 
											<th>Website</th> 
											<th>Date</th> 
											<th>View</th> 
											<th>Edit</th> 
											<th>Chat</th> 
											<th>Payment Details</th> 
											<th>JD Details</th> 
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $j=1;
							            $sql2="SELECT * from employer";
							            $exe2=mysqli_query($conn,$sql2);
							            while ($res=mysqli_fetch_array($exe2))
							            { ?> 
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['company_name']; ?></td>
											<td><?php echo $res['emp_name']; ?></td>
											<td><?php echo $res['email_id']; ?></td>
											<td><?php echo $res['contact_no']; ?></td>
											<td><?php echo $res['website']; ?></td>
											<td><?php echo $res['created_date']; ?></td>
											 <td> <a href="view-employer.php?id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
											 <td> <a href="edit-employer-details.php?id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil fa-lg"></i></a>
											 <td> <a href="view-message.php?user_id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
											 <td><a href="employer-payment-details.php?user_id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
											 <td><a href="employer-jd-details.php?user_id=<?php echo $res['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
											 <td><a href="javascript:delete_us_by_ID('<?php echo $res['id']; ?>');" class="ask btn btn-md btn-danger"><i class="fa fa-trash-o"></i></a></td>
											</td>
										</tr> 

									<?php } ?>
									</tbody>
								</table>
							</div> 
						</div>
					</div> 
				</div> 
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
	<script>
		$(function() {
			$('#example1').DataTable()
			$('#example2').DataTable({
				'paging': true,
				'lengthChange': false,
				'searching': false,
				'ordering': true,
				'info': true,
				'autoWidth': false
			})
		})
		  function delete_us_by_ID(id)
		{
			if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
				window.location.href = 'delete_employer.php?id=' + id;
			}
		}

	</script>
</body>

</html>
