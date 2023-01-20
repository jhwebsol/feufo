<?php include("includes/css.php"); ?>
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
								<h3 class="box-title">Property User Message</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body table-responsive">
								<table class="table table-bordered example1">
									<thead>
										<tr>
											<th>Serial</th>
											<th>Name</th>  
											<th>Email Id</th> 
											<th>Contact No</th> 
											<th>Subject</th> 
											<th>Message</th> 
											<th>Property</th> 
											<th>Status</th> 
											<th>Action</th>
										</tr>
									</thead>
									<tbody> 
										<?php $j=1;
							            $sqlrw=mysqli_query($conn,"select property_enquiry.*,es_property.property_name from property_enquiry join es_property on property_enquiry.pid=es_property.id order by property_enquiry.id DESC ");
							            while ($res=mysqli_fetch_array($sqlrw)){ ?>
		                           <tr class="odd">
		                            <td class="sorting_1"><?php echo $j; $j++; ?></td>
									 <td><?php echo $res['name']; ?></td>
									 <td><?php echo $res['email_id']; ?></td>
									 <td><?php echo $res['phone_no']; ?></td>
									 <td><?php echo $res['subject']; ?></td>
									 <td><?php echo $res['desp']; ?></td>
									 <td><a target="_blank" href="#"><?php echo $res['property_name']; ?></a></td>
		                            <td>  <form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
		                           </td>
		                            <td>
		                                <a href="javascript:delete_enq_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
		                            </td>
		                        </tr> <?php } ?>       
                            
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
				window.location.href = 'delete_prenquiry.php?id=' + id;
			}
		}
$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="property_enquiry";
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
