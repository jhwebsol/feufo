<?php include("includes/css.php"); 
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["a_id"];
$sql1 ="UPDATE  blog_enquiry SET status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
?>
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
								<h3 class="box-title">Review</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Name</th>
											<th>Email</th> 
											<th>Blog name</th> 
											<th> Comment</th> 
											<th>Date</th> 
											<th>Status</th> 
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $j=1;
							            $sql2="SELECT a.*,p.blog_title,us.name,us.email_id from blog_enquiry a join blog p on a.blog_id=p.id join user_profile us on a.user_id=us.id";
							            $exe2=mysqli_query($conn,$sql2);
							            while ($res=mysqli_fetch_array($exe2)){ ?>
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['name']; ?></td>
											<td><?php echo $res['email']; ?></td>
											<td><?php echo $res['blog_title']; ?></td>
											<td><?php echo $res['comment']; ?></td>
											<td><?php echo $res['created_date']; ?></td>
											<td>
												<form method="post" action="">
													<select class="form-control" name="status">
														<option value="<?php echo $res['status']; ?>"><?php echo $res['status']; ?></option>
														<option value="Active">Active</option>
														<option value="Deactive">Deactive</option>
													</select>
													<input type="hidden" name="a_id" value="<?php echo $res['id']; ?>" class="form-control-sm">
												<button type="submit" name="update" class="btn btn-success" >Update</button> 
												</form>
												</td>
												
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
				window.location.href = 'delete_enquirybg.php?id=' + id;
			}
		}

	</script>
</body>
</html>