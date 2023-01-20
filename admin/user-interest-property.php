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
								<h3 class="box-title">User Interested Property Enquiry</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Name</th>
											<th>Email</th> 
											<th>Property name</th> 
											<th>Date</th> 
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $j=1;
							            $sql2="SELECT a.*,p.property_name,us.name,us.email_id from user_interest_prpty a join es_property p on a.property_id=p.id join user_profile us on a.user_id=us.id
"; 
							            $exe2=mysqli_query($conn,$sql2);
							            while ($res=mysqli_fetch_array($exe2)){ ?>
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['name']; ?></td>
											<td><?php echo $res['email_id']; ?></td>
											<td><?php echo $res['property_name']; ?></td>
											<td><?php echo $res['created_date']; ?></td>
											 <td><a href="javascript:delete_enq_by_ID('<?php echo $res['id']; ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
											</td>
										</tr> 

									<?php } ?>
									</tbody>
<tfoot>
<tr>
<td colspan="2"><a href="property.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a></td>
<td colspan="4"></td>
</tr>
<tfoot>

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
				window.location.href = 'delete_enquiryus.php?id=' + id;
			}
		}

	</script>
</body>

</html>
