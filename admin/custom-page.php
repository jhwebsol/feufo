<?php include("includes/css.php"); ?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?> 
		<div class="content-wrapper"> 
             <section class="content-header">
                <a href="create-custom-page.php" class="btn btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
            </section>
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-danger"> 
							<div class="box-header with-border">
								<h3 class="box-title">Custom Pages</h3>
							</div> 
							<div class="box-body table-responsive">
								<table class="table table-bordered" id="example1">
									<thead>
										<tr>
											<th>Serial</th>
											<th>Page Name</th>
											<th>Description</th>   
 											<th>Status</th>  
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
											 $j=1;
										            $sql2="SELECT * from custome_page";
										            $exe2=mysqli_query($conn,$sql2);
										            while ($res=mysqli_fetch_array($exe2))
										            { ?>
										 
										<tr>
											 <td><?php echo $j; $j++; ?></td>
											<td><?php echo $res['pname']; ?></td>
											<td style="height: 80px;overflow-y: auto"><?php echo $res['desp']; ?> </td> 
 											<td> <form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form></td>
											 <td><a href="edit-custom-page.php?id=<?= $res['id']; ?>" class="edit_data"><button type="button" class="btn btn-primary"><i class="fa fa-pencil fa-lg"></i></button></a>
											 	<a href="javascript:delete_us_by_ID('<?php echo $res['id']; ?>','<?php echo $res['pname']; ?>');" class="ask btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a></td> 
										</tr>  <?php } ?>
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
		  function delete_us_by_ID(id,name)
		{
			if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
				window.location.href = 'delete_custom.php?id=' + id+ '&name=' + name;
			}
		}
$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="custome_page";
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
