<?php include("includes/css.php");?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper"> 
            <section class="content-header">
               	<a href="add-blog-details.php" class="btn btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Blog Table</h6>
                    </div>
                    <div class="box-body table-responsive">
						<table class="table table-bordered table-striped example1">
							<thead>
								<tr>
									<th>Serial</th> 
									<th>Title</th> 
									<th>Image</th> 
									<th>Banner</th> 
									<th>Status</th>  
									<th>Action</th>
								</tr>
							</thead>
							<tbody>	
							<?php $sql2="select * from blog "; $i=1;
								  $exe2=mysqli_query($conn,$sql2);
                                  while($res=mysqli_fetch_array($exe2)){
                                   ?>				 
								<tr>
									<td><?php echo $i; $i++; ?>.</td>
									<td><?php echo $res['blog_title']; ?></td>
									<td><img src="img/blog/<?php echo $res['blog_image']; ?>" class="img-responsive" style="width:100px" alt=""> </td>
									<td><img src="img/blog/<?php echo $res['banner']; ?>" class="img-responsive" style="width:100px" alt=""> </td>
									  <td> <form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
		                           </td>
									<td>
										<a href="view-blog-details.php?editid=<?php echo $res['id']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
										<a href="edit-blog-details.php?editid=<?php echo $res['id']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								      <a href="blog-review.php?id=<?php echo $res['id']; ?>" class="btn btn-warning"><i class="fa fa-comments"></i></a> 
								      <a href="javascript:delete_blog_by_ID('<?php echo $res['id'] ?>','<?php echo $res['blog_title'] ?>');" class="ask btn btn-danger"><i class="fa fa-trash-o"></i></a>
								  </td>
								</tr><?php } ?>										 
							</tbody>
						</table>
					</div> 
				</div>
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
<script type="text/javascript">
	function delete_blog_by_ID(id,blog_url)
{
	if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
		window.location.href = 'delete-blog.php?id=' + id + '&blog_url=' + blog_url;
	}
}

$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="blog";
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