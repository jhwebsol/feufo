<?php include("includes/css.php")?>

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
						<div class="box box-primary">
							<div class="box-header with-border">
								<div class="row">
									<div class="col-md-4">
										<h3 class="box-title">FAQ Details</h3>
									</div>
									<div class="col-md-2 pull-right"><a href="add_faq.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add FAQ </button></a></div>
								</div>
							</div>

							<!-- /.box-header -->
							<div class="box-body">  
								<div class="table-responsive mt-20">
									<table class="table table-bordered table-striped example1">
										<thead>
											<tr>
												<th>S. No</th> 
												<th>FAQ Title</th>  
												<th>Description</th> 
												<th>Edit</th>  
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php  
                                    $sql="SELECT * from faq ";
                                    $exe=mysqli_query($conn,$sql);
                                    $i=1;
                                    while ($row=mysqli_fetch_array($exe)){
                                    ?>
										<tr>
											<td><?php echo $i; $i++;?></td>
											<td><?php echo $row['title'];?> </td> 
											<td><div style="height:200px;overflow:scroll;"><?php echo html_entity_decode($row['desp']);?></div></td> 
											<td><a href="edit-faq-details.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
											</td>
											<td><a href="javascript:delete_student_by_ID('<?php echo $row['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>  
										<?php } ?>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
	<script type="text/javascript">
		function delete_student_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_faq.php?id=' + id;
	}
}

</script>
</body>
</html>