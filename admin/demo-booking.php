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
								<h3 class="box-title">Demo booking details</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Company Name</th>
											<th>Name</th>
											<th>Email Id</th> 
											<th>Contact No</th> 
											<th>Training focus</th> 
											<th>Demo date</th> 
											<th>Demo Time</th> 
											<th>Date</th> 
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $j=1;
								            $sql2="SELECT * from demo_booking";
								            $exe2=mysqli_query($conn,$sql2);
								            while ($res=mysqli_fetch_array($exe2))
								            { ?>
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['company_name']; ?></td>
											<td><?php echo $res['name']; ?></td>
											<td><?php echo $res['email_id']; ?></td>
											<td><?php echo $res['contact_no']; ?></td>
											<td><?php echo $res['training_focus']; ?></td>
											<td><?php echo $res['demo_date']; ?></td>
											<td><?php echo $res['demo_time']; ?></td>
											<td><?php echo $res['created_date']; ?></td>
											 <td><a href="javascript:delete_enq_by_ID('<?php echo $res['id']; ?>');" class="ask btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a></td>
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


		  function delete_enq_by_ID(id)
		{
			if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
				window.location.href = 'delete_demobk.php?id=' + id;
			}
		}

	</script>
</body>

</html>
