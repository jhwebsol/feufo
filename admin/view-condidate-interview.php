<?php include("includes/css.php");
$id=$_GET["id"];
$sql="select employee_details.emp_name,employer.company_name,employer.emp_name as empr,cdn.* from candidate_interview_details cdn join employee_details on cdn.emp_id=employee_details.id join employer on cdn.empr_id=employer.id where cdn.id=".$id;
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
				<h1>Dashboard
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
										<h3 class="box-title">View Candidate Interview Details</h3>
									</div>
									<div class="col-md-1 pull-right"><a href="candidate-interview.php"><button class="btn btn-flat btn-custom2 btn-block"><i class="fa fa-arrow-left"></i> Back</button></a> </div>
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
													<th>Company name</th>
													 <td><?php echo $res['company_name']; ?></td>
													<th>Employer Name:</th>
													  <td><?php echo $res['empr']; ?></td> 
												</tr>
												<tr class="odd"> 
												    <th>Candidate Name: </th>
													<td> <?php echo $res['emp_name']; ?></td> 
													<th>Interview Type:</th>
												  <td><?php echo $res['interview_type']; ?></td> 
												</tr> 

												<tr class="odd"> 
												  <th>Schedule at:</th>
												  <td><?php echo $res['schedule_at']; ?></td> 
												  <th>Duration:</th>
												  <td><?php echo $res['duration']; ?> </td>
												</tr> 
												<tr class="odd"> 
												  <th>Stage:</th>
												  <td><?php echo $res['stage']; ?> </td>
												  <th>Timezone:</th>
												  <td><?php echo $res['timezone']; ?> </td>
												
												</tr> 
								
												  <?php } ?>
											    <tr>
													<th colspan="4" style="background-color: #e8d8a7;"><h3 class="text-center mt-10 mb-10">Candidate interview date details</h3></th> 
	                       <?php  $sql_prd="select * from candidate_interview_date where cid={$_GET["id"]}";
	                       $res_prd = mysqli_query($conn, $sql_prd);
	                       while($res1= mysqli_fetch_array($res_prd)){
	                       $hid=$res1['hours'];
	                       $findid = (mysqli_query($conn, "SELECT * FROM candidate_interview_times where id='".$hid."'"));
                         $res2=mysqli_fetch_array($findid); ?>
												<tr><th colspan="4" style="height:1px; background-color:#e96125;"></th>	</tr>
												<!-- <tr>
												<td class="pull-right" colspan="4"><input type="button" name="edit" value="Edit" id="<?php //echo $res1["id"]; ?>" class="btn btn-md btn-success edit_data" />
												 <a href="javascript:delete_prd_by_ID('<?php //echo $res1['id'] ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td>  
                          </tr> -->
                         </tr>
                         <tr>
													<th>Interview Date:</th>
													<td><?php echo $res1['in_date']; ?></td> 
													<th>Interview Time:</th>
													<td><?php echo $res2['hours'].':'.$res2['minute'].' '.$res2['timezone']; ?></td> 
												</tr>
												<?php } ?>
											<th colspan="4" style="background-color: #e8d8a7;"><h3 class="text-center mt-10 mb-10">Interviewer</h3></th> 
	                       <?php $sql_prds=mysqli_query($conn,"select * from candidate_interviewers where cds_id={$_GET["id"]}");
	                       while($ress= mysqli_fetch_array($sql_prds)){ ?>
												<tr><th colspan="4" style="height:1px; background-color:#e96125;"></th>	</tr>
											   </tr>
                         <tr>
													<th>Name:</th>
													<td><?php echo $ress['name']; ?></td> 
													<th>Email id:</th>
													<td><?php echo $ress['email_id']; ?></td> 
												</tr>
												<tr>
													<th>Contact no:</th>
													<td><?php echo $ress['contact_no']; ?></td> 
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
