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
									<div class="col-md-4"><h3 class="box-title">Plan Text Details</h3></div>
									<div class="col-md-2 pull-right"><a href="add-plan-details.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-plus"></i> Add New Plan Text</button></a></div>
								</div>
							</div>
							<div class="box-body table-responsive">
								<table class="table table-bordered table-striped example3">
									<thead>
										<tr>
											<th>Sr. No</th>
											<th>Plan text</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php $sql="select * from plan_details ";
									$result = mysqli_query($conn, $sql);
                                             $j=1;
									while($res= mysqli_fetch_array($result)){ ?>
										<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['plan_text']; ?></td> 
											 <td><a href="javascript:delete_txt_by_ID('<?php echo $res['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>
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
		
		<?php include("includes/footer.php");?>
		<div class="control-sidebar-bg"></div>
	</div>
	<?php include("includes/js.php");?>
	<script type="text/javascript">
function delete_txt_by_ID(id){
	if(confirm('Do you want to delete this \nContinue anyway?')){
		window.location.href='delete_plan_txt.php?id='+id; }
	}
</script>
</body>
</html>
