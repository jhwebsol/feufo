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
										<table class="table table-bordered table-stripped table-hover">
											<thead></thead>
											<tbody>
									        <?php while($res= mysqli_fetch_array($result)){ 
									         $ptid=$res['property_for'];
											 $sqlpt=mysqli_fetch_array(mysqli_query($conn,"select * from property_purpose where id=".$ptid));
											 $uid=$res['nearest_location'];
											 $sqllc=mysqli_fetch_array(mysqli_query($conn,"select * from nearest_location where id=".$uid)); ?>
												<tr class="odd"> 
												  <th>Title: </th>
													<td colspan="3"> <?php echo $res['property_name']; ?></td> 
												</tr>
												<tr class="even"> 
												  <th>Slug:</th>
												  <td colspan="3"><?php echo $res['slug']; ?> </td>
												</tr> 

												<tr class="odd"> 
												  <th>Property Types:</th>
												  <td><?php echo $res['types']; ?></td> 
												  <th>City:</th>
												  <td> </td>
												</tr> 
												<tr class="even">		
												    <th>Address: </th>
													<td><?php echo $res['address']; ?></td> 
													<th>Phone No: </th>
													<td><?php echo $res['con_phone']; ?></td> 	
												</tr>
												<tr class="odd">	
													<th>Email Id: </th>
													<td><?php echo $res['con_email']; ?></td> 	
													<th>Website: </th>
													<td><?php echo $res['website']; ?> </td> 
												</tr>
												<tr class="even">	
													<th>Purpose: </th>
													<td><?php echo $sqlpt['purpose']; ?></td> 	
													<th>Price: </th>
													<td> <?php echo $res['price']; ?></td> 
												</tr>
												<tr class="odd">
													<th>Period: </th>
													<td> <?php echo $res['period']; ?></td> 
											  	<th>Total Area(Square Feet):</th>
												<td><?php echo $res['area']; ?></td> 											
												</tr>
												<tr class="even">
													<th>Total Unit:</th>
													<td><?php echo $res['area_unit']; ?></td> 
												    <th>Total Rooms:</th>
													<td><?php echo $res['room']; ?></td> 
												</tr>
												<tr class="odd">
													<th>Total Bedroom:</th>
													<td><?php echo $res['bedroom']; ?></td> 
												    <th>Total Bathroom:</th>
													<td><?php echo $res['bathrooms']; ?></td> 
												</tr>
												<tr class="even">
													<th>Total Floor:</th>
													<td><?php echo $res['floor_no']; ?></td> 
												    <th>Total Kitchen:</th>
													<td><?php echo $res['kitchen']; ?></td> 
												</tr>
												<tr class="odd">
													<th>Total Parking Place:</th>
													<td><?php echo $res['parking_place']; ?></td> 
												    <th>Image:</th>
													<td><?php $id=$res['id'];
													 $sqls=mysqli_query($conn,"select * from es_property_image where property_id=".$id);
													 while($resus= mysqli_fetch_array($sqls)){ ?>
													 <img src="product/image/<?= $resus['image'];?>" style="width:30px;float: left;margin-right:5px;"><?php } ?></td> 
												</tr>
												<tr class="even">
													<th>Thumbnail:</th>
													<td><img src="product/<?= $res['thumbnail'];?>" style="width:30px;"> </td> 
												    <th>Slider Images:</th>
													<td><img src="product/<?= $res['banner_image'];?>" style="width:90px;"></td> 
												</tr>
												<tr class="odd">
													<th>PDF:</th>
													<td><?php echo $res['pdf_file']; ?></td> 
												    <th>Youtube Video Link:</th>
													<td><?php echo $res['video']; ?> </td> 
												</tr>
												<tr class="even">
													<th>Aminities:</th>
													<td colspan="3"><?php $id=$res['id'];
													 $sqlss=mysqli_query($conn,"select * from aminities where property_id=".$id);
													 while($resuss= mysqli_fetch_array($sqlss)){ 
													 echo $resuss['aminity']; } ?> </td> 
												</tr>
												<tr class="odd">
													<th>Nearest Locations/Distance:</th>
													<td colspan="3"><?= $sqllc['location']; ?>(<?= $res['distances']; ?>)</td> 												     
												</tr>
												<tr class="even">	
													<th> Google Map Code: </th>
													<td colspan="3"><?= $res['map_link']; ?> </td>
												</tr>
												<tr class="odd">	
													<th>Description :</th>
													<td colspan="3"><?= $res['desp']; ?> </td> 
												</tr>
												<tr class="even">	
													<th>Status : </th>
													<td><?= $res['status']; ?></td> 	
													<th>Featured : </th>
													<td><?= $res['featured']; ?></td> 
												</tr>
												<tr class="odd">	
													<th>Top Property: </th>
													<td><?= $res['top_property']; ?></td> 	
													<th>Urgent Property: </th>
													<td><?= $res['urgent_property']; ?> </td> 
												</tr> 
												<tr class="even">	
													<th>Seo Title: </th>
													<td colspan="3"><?php echo $res['seo_title']; ?></td>
												 </tr>
												<tr class="odd">	
													<th>Seo Description: </th>
													<td colspan="3"><?php echo $res['seo_description']; ?></td>
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
