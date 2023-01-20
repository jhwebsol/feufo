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
								<h3 class="box-title">Career</h3>
								<div class="col-md-2 pull-right"><a href="add-career.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add New Career</button></a></div>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example2">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Job Title</th>
											<th>Description</th>
											<th>Images</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $j=1;
							            $sql2="SELECT * from career_detail";
							            $exe2=mysqli_query($conn,$sql2);
							            while ($res=mysqli_fetch_array($exe2))
							            { ?>
										<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['job_title']; ?></td>
											<td><?php echo html_entity_decode($res['desp']); ?></td>
											<td><img src="img/document/<?php echo $res['image']; ?>" width="60px"></td>
											<td><a href="edit-career.php?id=<?= $res['id']; ?>" class="pl-10 pr-10 font-20"><i class="fa fa-pencil-square"></i></a>
													</td>
											 <td><a href="javascript:delete_test_by_ID('<?php echo $res['id'] ?>');" class="ask btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a></td>
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

		function delete_test_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_career.php?id=' + id;
	}
}

	</script>
</body>

</html>
