<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select * from employer where id=".$id;
$result = mysqli_query($conn, $sql);
?>
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
										<h3 class="box-title">View Employer Details</h3>
									</div>
									<div class="col-md-1 pull-right"><a href="employer.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a> </div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom">
									<div class="table-responsive">
										<table class="table table-bordered table-stripped table-hover">
											<thead></thead>
											<tbody>
									        <?php while($res= mysqli_fetch_array($result)){ 
									         ?>
												<tr class="odd"> 
												  <th>Company Name: </th>
													<td colspan="3"> <?php echo $res['company_name']; ?></td> 
												</tr>
												<tr class="even"> 
												  <th>Name:</th>
												  <td colspan="3"><?php echo $res['emp_name']; ?> </td>
												</tr> 

												<tr class="odd">	
													<th>Email Id: </th>
													<td><?php echo $res['email_id']; ?></td> 	
													<th>Website: </th>
													<td><?php echo $res['website']; ?> </td> 
												</tr>
												<tr class="even">	
													<th>Contact no: </th>
													<td><?php echo $res['contact_no']; ?></td> 	
													<th>Alt Contact no: </th>
													<td> <?php echo $res['alt_contact_no']; ?></td> 
												</tr>
												<tr class="even">		
												    <th>Listing: </th>
													<td><?php if($res['listing'] =="Yes"){ echo "1";}else{ echo "0"; } ?></td> 
													<th>Skills:</th>

												    <td><?php $sk_id=$res['skill'];
					                                    $rids = explode(",",$sk_id);
					                                    foreach($rids as $pm_id){
												    $sqltps=mysqli_query($conn,"SELECT * from skill_detail where id='".$pm_id."'");
                                                    while($restps=mysqli_fetch_array($sqltps)){ 
                                                    	echo $restps['skill_name']; } } ?></td>
												</tr>
												<tr class="odd">
												<th>Est since: </th>
												<td> <?php echo $res['est_since']; ?></td> 
											  	<th>Team Size:</th>
												<td><?php echo $res['team_size']; ?></td> 											
												</tr>
												<tr class="even">
													<th>About data:</th>
													<td><?php echo $res['about_data']; ?></td> 

												</tr>
											        <?php $id=$_GET["id"];
									                $sqlsc =mysqli_query($conn,"SELECT * FROM employer_social_md WHERE empr_id='".$id."'");
									                $resc= mysqli_fetch_array($sqlsc); ?>
												<tr class="odd">
													<th>Facebook:</th>
													<td><?= $resc['facebook']; ?></td> 
												    <th>Twitter:</th>
													<td><?php echo $resc['twitter']; ?></td> 
												</tr>
												<tr class="even">
													<th>Linkedin:</th>
													<td><?php echo $resc['linkedin']; ?></td> 
												    <th>Email id:</th>
													<td><?php echo $resc['email_id']; ?></td> 
												</tr>
												 <?php 
									                $sqlsct =mysqli_query($conn,"SELECT * FROM employer_contact WHERE empr_id='".$id."'");
									                $resct= mysqli_fetch_array($sqlsct);
									                $cid=$resct['country'];
									               $sid=$resct['state'];
									               $ctid=$resct['city'];
									               $sqlct=mysqli_fetch_array(mysqli_query($conn,"select * from country where id=".$cid));
									               $sqlst=mysqli_fetch_array(mysqli_query($conn,"select * from state where id=".$sid));
									               $sqlcy=mysqli_fetch_array(mysqli_query($conn,"select * from city where id=".$ctid));
									                ?>
												<tr class="odd">
													<th>Country:</th>
													<td><?php echo $sqlct['country_name']; ?></td> 
												    <th>State:</th>
													<td><?php echo $sqlst['state_name']; ?></td> 
												</tr>
												<tr class="even">
													<th>City:</th>
													<td><?php echo $sqlcy['city_name']; ?></td> 
												    <th>Address:</th>
													<td><?= $resct['address'];?></td> 
												</tr>
												<tr class="odd">
													<th>Map link:</th>
													<td><?php echo $resct['map_link']; ?></td> 
												    <th>Latitude:</th>
													<td><?php echo $resct['latitude']; ?> </td> 
												</tr>
												<tr class="even">
													<th>Longitude:</th>
													<td colspan="3"><?= $resct['longitude']; ?> </td> 
												</tr>
												<?php } ?>
											</tbody>
											<tfoot> </tfoot>
										</table> 
									</div>
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
</html>
