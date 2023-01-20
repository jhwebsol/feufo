<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select es_property.*,es_property_type.types from es_property join es_property_type on es_property.property_type=es_property_type.id where es_property.id=".$id;
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
										<h3 class="box-title">View Property Details</h3>
									</div>
									<div class="col-md-1 pull-right"><a href="property.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a> </div>
								</div>
							</div>
							<div class="box-body">
								<div class="nav-tabs-custom">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead></thead>
											<tbody>
										<?php  $j=1;
											$res= mysqli_fetch_array($result);
											 $state=$res['state'];
                                             $city=$res['city'];
										$sql_state = mysqli_query($conn,"select * from states where id ='$state'");
				                            $row_state = mysqli_fetch_array($sql_state);
				                            $sql_city = mysqli_query($conn,"select * from cities where id ='$city'");
				                            $row_city = mysqli_fetch_array($sql_city);
											?>
												<tr>
												  <th>Property types</th>
												  <td><?php echo $res['types']; ?></td>
											  	<th>Property Name:</th>
												<td><?php echo $res['property_name']; ?></td> 
											
												</tr>
												<tr>
													<th>Property Id:</th>
													<td><?php echo $res['property_id']; ?></td> 
												    <th>Rooms:</th>
													<td><?php echo $res['room']; ?></td> 
												</tr>
												<tr>
													<th>Price:</th>
													<td><?php echo $res['price']; ?></td> 
												    <th>Description:</th>
													<td><?php echo $res['desp']; ?></td> 
												</tr>
												<tr>	
													<th>Bathrooms: </th>
													<td><?php echo $res['bathrooms']; ?></td> 
													<th>Balconies :</th>
													<td><?php echo $res['balconies']; ?></td> 
												</tr>
												<tr>	
													<th>Year Built: </th>
													<td><?php echo $res['year_built']; ?></td> 	
													<th>Garages: </th>
													<td><?php echo $res['garages']; ?></td> 
												</tr>
												<tr>	
													<th>Furnished status: </th>
													<td><?php echo $res['furnished_status']; ?></td> 	
													<th>Area: </th>
													<td><?php echo $res['area']; ?></td> 
												</tr>
												<tr>	
													<th>State: </th>
													<td><?php echo $row_state['name']; ?></td> 	
													<th>City: </th>
													<td><?php echo $row_city['name']; ?></td> 
												</tr>
												<tr>	
													<th>Name: </th>
													<td><?php echo $res['con_name']; ?></td> 	
													<th>Email Id: </th>
													<td><?php echo $res['con_email']; ?></td> 
												</tr>
												<tr>	
													<th>Phone No: </th>
													<td><?php echo $res['con_phone']; ?></td> 	
												    <th>Address: </th>
													<td><?php echo $res['address']; ?></td> 	
													</tr>
												<tr>	
													<th>Title: </th>
													<td><?php echo $res['title']; ?></td> 
													<th>Meta Keyword:</th>
													<td><?php echo $res['meta_keyword']; ?></td> 
												</tr>
												<tr>
													<th>Video :</th>
													<td>   <video  controls height="50px" width="50px"><source src="product/video/<?php echo $res['video']; ?>" type="video/mp4">Your browser does not support the video tag.</video>
                                                    </td> 
												
												</tr>
											     <tr>
													<th>Floor Plans:</th>
													<td colspan="3"> <a href="" data-toggle="modal" data-target="#myModal"><img src="product/<?php echo $res['floor_plan']; ?>" width="140px"></a></td>
												</tr>
												<?php $idd=$res['id'];
                                                $k=0;
                                                $sql_prd=mysqli_query($conn,"select * from es_property_image where property_id=".$idd);
                                                 while($resimg= mysqli_fetch_array($sql_prd)){  ?>
												<tr>
													<th>Images:</th>
													<td colspan="3"> <a href="" data-toggle="modal" data-target="#myModal"><img src="product/image/<?= $resimg['images']; ?>" width="140px"></a></td>
												</tr>
											    <?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="4"><a href="property.php"><button class="btn btn-flat btn-custom2 btn-md"><i class="fa fa-backward"></i> Back</button></a></td>
												</tr>
											</tfoot>
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
