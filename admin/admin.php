<?php include("includes/css.php"); 
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["aid"];
$sql1 ="UPDATE es_admin_user SET name='$name',password='$password',username='$username',status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
 }
}
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?> 
		<div class="content-wrapper"> 
             <section class="content-header">
                <a href="create-admin.php" class="btn btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
            </section>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Admin Table</h3>
							</div> 
							<div class="box-body table-responsive">
								<table class="table table-bordered" id="example1">
									<thead>
										<tr>
											<th>Serial</th>
											<th>Name</th>
											<th>Email</th>   
											<th>Status</th>  
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $j=1;
					            $sql2="SELECT * from es_admin_user";
					            $exe2=mysqli_query($conn,$sql2);
					            while($res=mysqli_fetch_array($exe2)){ ?>
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['name']; ?></td>
											<td><?php echo $res['username']; ?></td> 
											<td><?php echo $res['status']; ?></td> 
											<td><form method="post" action="" id="FORM_ID">
                                     <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                         <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                         <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                         <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                     </select></form>
                                 </td>
											 <td><button type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-primary edit_data" ><i class="fa fa-pencil fa-lg"></i></button>
											 	<a href="javascript:delete_us_by_ID('<?php echo $res['id']; ?>');" class="ask"><i class="fa fa-trash-o"></i></a></td> 
										</tr> 
									<?php } ?>
									</tbody>
								</table>
							</div> 
						</div>
					</div> 
				</div> 
				 <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Admin Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="col-md-12">
                                        <div class="form-group">
                                            <label>name :</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                                        </div>
                                    </div>
                                  <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Username/Email Id:</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
                                        </div>
                                    </div>
                                  <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Aminity">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option>Active</option>
                                                <option>InActive</option>
                                            </select>
                                        </div>
                                    </div>
                          
                                </div>
                                <input type="hidden" name="aid" id="aid" />
                                <div class="modal-footer">
                                    <input type="submit" name="update" id="insert" value="Update" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
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
		$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="es_admin_user";
    if(nstatus){
        $.ajax({
            type:'POST',
            url:'update-status.php',
            data:'nstatus='+nstatus+ "&id=" + nid+ "&db=" + dbdetails,
            success:function(data){
                alert("successfully Updated");
               window.location.href=window.location.href;
               // console.log(html);
               // $('#city').html('<option value="">Select Division</option>'); 
            }
        }); 
    }
});
});
		  function delete_us_by_ID(id)
		{
			if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
				window.location.href = 'delete_admin.php?id=' + id;
			}
		}
$(document).ready(function() {
$(document).on('click', '.edit_data', function() {
    var aid = $(this).attr("id");
    $.ajax({
        url: "edit_admin.php",
        method: "POST",
        data: { aid: aid },
        dataType: "json",
        success: function(data) {
            $('#name').val(data.name);
            $('#username').val(data.username);
            $('#password').val(data.password);
            $('#status').val(data.status);
            $('#aid').val(data.id);
            $('#insert').val("Update");
            $('#add_data_Modal').modal('show');
        }
    });
});
  });
	</script>
</body>
</html>