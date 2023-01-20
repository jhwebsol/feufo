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
								<h3 class="box-title">Property Enquiry User</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered" id="example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Personal type</th>
											<th>Name</th>
											<th>Email</th> 
											<th>Mobile no</th> 
											<th>Profile Pic</th> 
											<th>Date</th> 
											<th>IP address</th> 
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											 $j=1;
										            $sql2="SELECT * from es_property_user";
										            $exe2=mysqli_query($conn,$sql2);
										            while ($res=mysqli_fetch_array($exe2))
										            { ?>
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['personal_type']; ?></td>
											<td><?php echo $res['name']; ?></td>
											<td><?php echo $res['email_id']; ?></td>
											<td><?php echo $res['mobile_no']; ?></td>
											<td><img src="img/profile/<?= $res['profile_img']; ?>" width="60px" class="author__img"></td>
											<td><?php echo $res['created_date']; ?></td>
											<td><?php echo $res['ip_address']; ?></td>
											 <td><a href="javascript:delete_enq_by_ID('<?php echo $res['id']; ?>');" class="ask btn btn-md btn-danger"><i class="fa fa-trash-o"></i></a></td>
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
				window.location.href = 'delete_uesrp.php?id=' + id;
			}
		}

	</script>
</body>

</html>
