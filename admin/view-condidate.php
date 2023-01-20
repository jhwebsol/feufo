<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select sub_category.sub_category_name,category.cat_name,employee_details.* from employee_details join category on employee_details.cat_id=category.id join sub_category on employee_details.subcat_id=sub_category.id where employee_details.id=".$id;
$result = mysqli_query($conn, $sql);
if(isset($_POST['add']))
{ extract($_POST);
$id=$_GET["id"];
 $sql_prd="INSERT into skills(emp_id,skill_name,skill_year) values ('$id','$sname','$syear')";
       $prd_res=mysqli_query($conn, $sql_prd) or die(mysqli_error());
}
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["cid"];
$sql1 ="UPDATE skills SET skill_name='$sname',skill_year='$syear' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
}
}
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
										<h3 class="box-title">View Candidate Job Details</h3>
									</div>
									<div class="col-md-1 pull-right"><a href="candidate-job.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a> </div>
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
									          <tr>
													<th>Category</th>
													 <td><?php echo $res['cat_name']; ?></td>
													<th>Sub Category:</th>
													  <td><?php echo $res['sub_category_name']; ?></td> 
												</tr>
												<tr class="odd"> 
												    <th>Candidate Name: </th>
													<td> <?php echo $res['emp_name']; ?></td> 
													<th>Mobile no:</th>
												  <td><?php echo $res['mobile_no']; ?></td> 
												</tr> 

												<tr class="odd"> 
												  <th>Location:</th>
												  <td><?php echo $res['location']; ?></td> 
												  <th>Job type:</th>
												  <td><?php echo $res['job_type']; ?> </td>
												</tr> 
												<tr class="odd"> 
												  <th>Basic salary:</th>
												  <td><?php echo $res['salary']; ?> </td>
												  <th>Feufo Fees:</th>
												  <td><?php echo $res['feufo_fees']; ?> </td>
												
												</tr> 
												<tr class="even">		
												    <th>Avalibility: </th>
													<td><?php echo $res['avalibility']; ?></td> 
													<th>Experience level : </th>
													<td><?php echo $res['experience_level']; ?></td> 	
												</tr>
												<tr class="even">		
												    <th>Assetment link: </th>
													<td><?php echo $res['assetment_link']; ?></td> 
													<th>Github: </th>
													<td><?php echo $res['github']; ?></td> 	
												</tr>
												<tr class="odd">	
													<th>Present Work At: </th>
													<td><img src="emp/<?php echo $res['previous_company']; ?>" style="width:30px;"></td> 	
													<th>Present Company Linkedin Id: </th>
													<td><?php echo $res['previous_comp_linkedin']; ?> </td> 
												</tr>
												<tr class="odd">	
													<th>Previous Work At: </th>
													<td><img src="emp/<?php echo $res['present_company']; ?>" style="width:30px;"></td> 	
													<th>Previous Compnay Linkedin Id: </th>
													<td><?php echo $res['present_comp_linkedin']; ?> </td> 
												</tr>
												<tr class="odd">	
													<th>Email Id: </th>
													<td><?php echo $res['email_id']; ?></td> 	
													<th>Linkedin: </th>
													<td><?php echo $res['linkedin']; ?> </td> 
												</tr>
												<tr class="odd">	
													<th>Twitter: </th>
													<td><?php echo $res['twitter']; ?></td> 	
													<th>Discord: </th>
													<td><?php echo $res['discord']; ?> </td> 
												</tr>
												<tr class="odd">	
													<th>Short Description: </th>
													<td><?php echo $res['desp']; ?></td> 	
												</tr>
												<tr class="even">	
													<th>Image: </th>
													<td><img src="emp/<?php echo $res['image']; ?>" style="width:30px;"></td> 	
													<th>Image 2: </th>
													<td><img src="emp/<?php echo $res['image2']; ?>" style="width:30px;"></td> 
												</tr>
												<tr class="odd">
													<th>Image 3: </th>
													<td><img src="emp/<?php echo $res['image3']; ?>" style="width:30px;"></td> 
											  	<th>Image 4:</th>
												<td><img src="emp/<?php echo $res['image4']; ?>" style="width:30px;"></td> 											
												</tr>
												<tr class="even">
													<th>Image 5:</th>
													<td><img src="emp/<?php echo $res['image5']; ?>" style="width:30px;"></td> 
											     	<th>Resume:</th>
													<td><?php echo $res['resume']; ?></td> 
												</tr>
												<tr class="even">	
													<th>Seo Title: </th>
													<td colspan="3"><?php echo $res['title']; ?></td>
												 </tr>
												<tr class="odd">	
													<th>Seo Description: </th>
													<td colspan="3"><?php echo $res['meta_keyword']; ?></td>
												 </tr> 
											    <?php } ?>
											    <tr>
													<th colspan="4" style="background-color: #e8d8a7;"><h3 class="text-center mt-10 mb-10"> Skill Details</h3></th> 
												</tr><td class="pull-right" colspan="4"> <button type="button" class="btn btn-md btn-success " data-toggle="modal" data-target="#myModal"> Add</button></td>  
	                       <?php  $sql_prd="select * from skills where emp_id={$_GET["id"]}";
	                       $res_prd = mysqli_query($conn, $sql_prd);
	                       while($res1= mysqli_fetch_array($res_prd)){
	                       $cdid=$res1['skill_name'];
			                   $sqlr_prd=mysqli_query($conn,"select * from skill_detail where id='".$cdid."'");
			                   $resr1= mysqli_fetch_array($sqlr_prd); ?>
												<tr>
												<th colspan="4" style="height:1px; background-color:#e96125;"></th>	</tr>
												<tr>
												<td class="pull-right" colspan="4"><input type="button" name="edit" value="Edit" id="<?php echo $res1["id"]; ?>" class="btn btn-md btn-success edit_data" />
												 <a href="javascript:delete_prd_by_ID('<?php echo $res1['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>  
                          </tr>
                          </tr>
                          <tr>
													<th>Skill name:</th>
													<td><?php echo $resr1['skill_name']; ?></td> 
																							<th>Skill Year (Experince):</th>
													<td><?php echo $res1['skill_year']; ?></td> 
												</tr>
												<?php } //} ?>
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
	<!-- Modal Category --> 
			<div id="add_data_Modal" class="modal fade">  
		      <div class="modal-dialog">  
		           <div class="modal-content">  
		                <div class="modal-header">  
		                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
		                     <h4 class="modal-title">Update Skill Details</h4>  
		                </div>  
		                <div class="modal-body">  
		                     <form method="post" name="frm" id="insert_form" enctype="multipart/form-data">  
		                          <label>Skill name</label> 
		                          <select class="form-control" name="sname" id="sname">
		                          	<?php $sqltps=mysqli_query($conn,"SELECT * from skill_detail");
                                      while($restps=mysqli_fetch_array($sqltps)){ ?>
                                      	<option value="<?= $restps['id'];?>"><?= $restps['skill_name'];?></option>
                                      <?php } ?>
		                          </select> 
		                          </br>

		                        <label>Year(Experince)</label>  
		                         <input type="text" name="syear" id="syear" class="form-control" placeholder="Year">
		                          </br>

		                          <input type="hidden" name="cid" id="cid" />  
		                          <input type="submit" name="update" id="insert" value="Insert" class="btn btn-success" />  
		                     </form>  
		                </div>  
		                <div class="modal-footer">  
		                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
		                </div>  
		           </div>  
		      </div>  
		 </div>  
			<!-- ./Modal Category -->


			  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Skill Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
				  <!-- Modal body -->
				  <div class="modal-body">
				   <form method="post" name="add" id="insert_form" enctype="multipart/form-data">  
              
              <label>Skill name</label>  
              <select class="form-control" name="sname" id="sname">
              	<?php $sqltps=mysqli_query($conn,"SELECT * from skill_detail");
                      while($restps=mysqli_fetch_array($sqltps)){ ?>
                      	<option value="<?= $restps['id'];?>"><?= $restps['skill_name'];?></option>
                      <?php } ?>
              </select>
              </br>

                  <label>Year(Experince)</label>  
             <input type="text" name="syear" id="syear" class="form-control" placeholder="Year">
              </br>  
              <input type="submit" name="add" value="Add" class="btn btn-success" />  
         </form>  
        </div>
      </div>
    </div> 
  </div>
<?php include("includes/footer.php");?>
<div class="control-sidebar-bg"></div>
</div>
<?php include("includes/js.php");?>
<script language="javascript">
 $(document).ready(function(){
      $(document).on('click', '.edit_data', function(){  
           var cid = $(this).attr("id");  
           $.ajax({  
                url:"edit_skill.php",  
                method:"POST",  
                data:{cid:cid},   
                dataType:"json",  
                success:function(data){  
                     $('#sname').val(data.skill_name); 
                     $('#syear').val(data.skill_year);  
                     $('#cid').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
 });  
function delete_prd_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_pskill.php?id=' + id;
	}
}

</script>	
</body>
</html>
