<?php include("includes/css.php");
if (isset($_POST['submit'])){
extract($_POST);
for($i = 0; $i < count($_POST["syear"]); $i++){
  if(!empty($_POST['syear'][$i])){
   $syear = mysqli_real_escape_string($conn,$_POST['syear'][$i]);
    $sql_prd="INSERT into skills(emp_id,skill_year) values ('$emp_id','$syear')";
    if(mysqli_query($conn, $sql_prd)) {
     $last_id[]= mysqli_insert_id($conn); }
   }
} 
    foreach($_POST['sname'] as $key => $skname){
         $did = $last_id[$key]; 
        $sql1 ="UPDATE skills SET skill_name='$skname' WHERE id= '".$did."'"; 
        if(mysqli_query($conn, $sql1)) {
       }
    } 
    echo "<script>window.location.href='candidate-job.php'</script>";
}
 ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<div class="content-wrapper">
<section class="content">
<div class="row">					 
<div class="col-xs-12">
	<div class="box box-danger">
		<div class="box-header">
			<div class="row">
				<div class="col-md-10"><h3 class="box-title">Add Skills</h3></div>
				
			</div>
		</div>
		<div class="box-body">
			<div class="nav-tabs-custom"> 			 
				<form action=""  method="post" enctype="multipart/form-data">
					<div>
						<div class="row">	
							 <div class="col-md-12">
                                <div class="table-responsive">
                                        <table class="table"> 
                                            <tbody>
                                            	<div class="col-md-4">
		                                            <label>Candidate Name:</label>
		                                            <div class="input-group">
		                                                <div class="input-group-addon">
		                                                    <i class="fa fa-suitcase"></i>
		                                                </div>
		                                                <select name="emp_id" id="emp_id" class="form-control" required>
		                                                <option value="">Select</option>
		                                                 <?php
		                                                    $sql2="SELECT * from employee_details";
		                                                    $exe2=mysqli_query($conn,$sql2);
		                                                    while ($res2=mysqli_fetch_array($exe2)){ ?>
		                                                    <option value="<?php echo $res2['id']; ?>"><?php echo $res2['emp_name'];?></option>
		                                                    <?php } ?>
		                                            </select>
		                                            </div>
		                                        </div><br/>
                                                <?php $sqltps=mysqli_query($conn,"SELECT * from skill_detail");
                                               while($restps=mysqli_fetch_array($sqltps)) { ?>
                                                <tr>
                                                    <td><strong>Skill Name:</strong>
                                                        <input type="checkbox" name="sname[]" class="skills" placeholder="" value="<?= $restps['id'];?>"><?= $restps['skill_name'];?>
                                                    </td>
                                                    <td>
                                                        <strong>Skill Year:</strong>
                                                        <input type="text" name="syear[]" class="form-control tx" placeholder="" style="display: none">
                                                    </td>
                                                </tr><?php } ?>
                                            </tbody>
                                        </table>
                                        <hr/>
                                    </div>
                                     <div class="clearfix"></div>
                                       <!--<div class="col-sm-12">
                                        <div class="optionBox mt-20">
                                            <div class="block">
                                                <button type="button" name="add" id="add" class="btn btn-success">Add More +</button>
                                            </div>
                                          </div>
                                       </div> -->
                                    <div class="clearfix"></div>
                                   </div> 
								</div>
									
								<div class="col-md-4">			
									<div class="form-actions"> 
										<button  type="submit" name="submit" id="submit" class="btn btn-success btn-lg"><i class="fa fa fa-check-square-o"></i> Create</button>
									</div>
								</div>
							</div>
						</form>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script> 
      $('#summernote').summernote({
         tabsize: 10,
        height: 300
      });
    </script> 
<script type="text/javascript">
 /*$(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
        i++;
         $('#dynamic_field').append('<div id="row'+i+'" class="cdy"><div><strong>Skill Name:</strong><br /><input type="text" name="snames[]" class="form-control name_list" /></div><div><strong>Image:<span>(Size: 30px x 30px) </span></strong><br /><input type="file" name="simg[]" class="form-control name_list" /></div><div><strong>Skill Year:</strong><br /><input type="text" name="syears[]" placeholder="" class="form-control name_list" /></div><div style="width:10%; margin-top:30px"><button type="button" name="removes" id="'+i+'" class="btn btn-danger btn_removes">X</button></div></div><div class="clearfix"></div><hr/>'); 
    });
    $(document).on('click', '.btn_removes', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });
    $('#submit').click(function() {
        $.ajax({
            url: "add-candidate-skill.php",
            method: "POST",
            data: $('#add_name').serialize(),
            success: function(data) {
                alert(data);
                $('#add_name')[0].reset();
            }
        });
    });
});*/	
jQuery($ => {
  $('.skills').on('change', function() {
    $(this).closest('tr').find('.tx').toggle(this.checked);
  });
});    
</script>
	</body>
</html>