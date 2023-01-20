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
								<h3 class="box-title">Candidate Enquiry</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Name</th>
											<th>Opting out for</th> 
											<th>Company Name</th> 
											<th>Programming language and libraries</th> 
											<th>Timezone</th> 
											<th>Salary</th> 
											<th>Join at</th> 
											<th>Location </th> 
											<th>Linkedin Profile </th> 
											<th>Repository Link </th> 
											<th>Photo </th> 
											<th>CV </th> 
											<th>Date </th> 
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php
											 $j=1;
							            $sql2="SELECT * from hired_enquiry";
							            $exe2=mysqli_query($conn,$sql2);
							            while ($res=mysqli_fetch_array($exe2))
							            { ?>
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['name']; ?></td>
											<td><?php echo $res['skill']; ?></td>
											<td><?php echo $res['company_name']; ?></td>
											<td><?php echo $res['programming_language']; ?></td>
											<td><?php echo $res['timezone']; ?></td>
											<td><?php echo $res['salary']; ?></td>
											<td><?php echo $res['joining_at']; ?></td>
											<td><?php echo $res['location']; ?></td>
											<td><?php echo $res['linkedin']; ?></td>
											<td><?php echo $res['repository_link']; ?></td>
											<td><img src="img/<?php echo $res['image']; ?>" width="40px"></td>
											<td> <a href="pdf_download.php?file_id=<?= $res['id'];?>" class="btn btn-warning mb-10">CV </a></td>
                                   
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
				window.location.href = 'delete_hdenquiry.php?id=' + id;
			}
		}

	</script>
</body>

</html>
