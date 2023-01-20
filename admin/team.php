<?php include("includes/css.php");
if(isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d, H:i:s");
$id="7";
$sql1 ="UPDATE  home_section SET title='$title',desp='$desp',created_date='$date' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
} ?>
 <body class="hold-transition skin-blue sidebar-mini">
    		<div class="wrapper">
       			<?php include("includes/header.php");?>
        		<?php include("includes/sidebar.php");?>
        		<div class="content-wrapper">
		            <section class="content-header">
		                <a href="add-team.php" class="btn btn-md btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
		            </section>
		            <section class="content">
		                <div class="box box-danger gurnew">
		                    <div class="box-header py-3">
		                        <h6 class="m-0 font-weight-bold text-primary">Staff Table</h6>
		                    </div>
		                    <div class="box-body table-responsive">
								<table class="table table-bordered example2">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Name</th>
											<th>Email</th>
											<th>Images</th>
											<th>Author</th> 
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $j=1;
							            $sql2="SELECT * from team";
							            $exe2=mysqli_query($conn,$sql2);
							            while ($res=mysqli_fetch_array($exe2))
							            { ?>
										<tr>
											<td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['name']; ?></td>
											<td> </td>
											<td><img src="img/<?php echo $res['image']; ?>" width="60px"></td>
											<td> </td> 
											 <td> <form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
		                                    </td>
											<td><a href="edit-team.php?id=<?= $res['id']; ?>" class="pl-10 pr-10 font-20"><i class="fa fa-pencil-square"></i></a>
											<a href="javascript:delete_test_by_ID('<?php echo $res['id'] ?>');" class="ask btn btn-md btn-danger"><i class="fa fa-trash-o"></i></a></td>
										</tr>

									<?php } ?>
									</tbody>
								</table>
							</div>
							
							<div class="box-body table-responsive">
                            <form method="post" action="" enctype="multipart/form-data">
                                <?php $idd="7";
                                $restp=mysqli_fetch_array(mysqli_query($conn,"SELECT * from home_section where id='".$idd."'")); ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title </label>
                                        <input type="text" value="<?= $restp['title'];?>" name="title" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description </label>
                                        <textarea name="desp" rows="4" class="form-control" placeholder=""><?= $restp['desp'];?></textarea>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Update">
                                </div>
                            </form>
                        </div>
						</div>
					</div>
				</div>
			</section>
			<!--  <section class="content">
                <div class="col-md-6">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">Team Page</h3>
                        </div>
                        
                    </div>
                </div>
            </section> -->
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

function delete_test_by_ID(id)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete_team.php?id=' + id;
	}
}
$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="team";
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
</script>
</body>

</html>
