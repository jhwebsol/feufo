<?php include("includes/css.php");
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["tid"];
	$sql1 ="UPDATE  es_testimonial  SET name='$name',designation='$location',linkdin_link='$linkdin_link',status='$status' WHERE id='$id'"; 
	$res=mysqli_query($conn,$sql1) or die(mysqli_error());
	if($res){
	$sqlg = "SELECT * from es_testimonial where id = '$id'";
	  $resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
	  $resg = mysqli_fetch_object($resultg);
		 if($_FILES["img"]["name"] != ""){
		$oname=$_FILES["img"]["name"];
		$pos = strrpos($oname, ".");
		$extension=substr($oname,$pos+1);
		$tn = $_FILES["img"]["tmp_name"];
		$path = "img/testimonial/".$resg->id.'.'.$extension;
		$upath = "img/testimonial/".$resg->image;
		unlink($upath);
		move_uploaded_file($tn,$path);
		 $image = $resg->id.'.'.$extension;
		} else {
		  $image = $resg->image;
		}
		$sqlup = "UPDATE es_testimonial SET  image='$image' WHERE  id = $resg->id";
		$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());
		}
    }
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="add-testimonial.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> Create</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header with-border">
                        <h3 class="box-title">Testimonial Table</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped example3">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Linkedin link</th>
                                    <th>Photo</th>
                                    <th>Designation</th>
                                    <th>Description</th>
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php $sql_tsm=mysqli_query($conn,"select * from es_testimonial order by id DESC"); $j=1;
                                        while($restsm= mysqli_fetch_array($sql_tsm)){ ?>
                                <tr>
                                     <td><?php echo $j; $j++; ?></td>
                                    <td><?php echo $restsm['name']; ?></td>
                                    <td><?php echo $restsm['linkdin_link']; ?></td>
                                   <td><img src="img/testimonial/<?php echo $restsm['image']; ?>" width="60px"></td>
                                    <td><?php echo $restsm['designation']; ?></td>
                                    <td><?php echo $restsm['desp']; ?></td>
                                   <!--  <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $restsm['status']; ?>"><?= $restsm['status']; ?></option>
                                            <option value="Active" data-nid="<?= $restsm['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $restsm['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                    </td> --> 
                                    <td><button type="button" name="edit" id="<?php echo $restsm["id"]; ?>" class="btn btn-primary edit_data" ><i class="fa fa-pencil fa-lg"></i></button>
                                        <a href="javascript:delete_prod_by_ID('<?php echo $restsm['id']; ?>');" class="ask btn btn-danger btn-md"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr><?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade" id="add_data_Modal" aria-hidden="true">  
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Testimonial</h4>
                    </div>
                    <form method="post" id="insert_form" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Linkedin link</label>
                                <input type="text" name="linkdin_link" id="linkdin_link" class="form-control" placeholder="Linkedin">
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="location" id="location" class="form-control" placeholder="Designation">
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="img" class="form-control" placeholder=" Photo">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select type="text" name="status" id="status" class="form-control">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                            <input type="hidden" name="tid" id="tid" />
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="update" id="insert" value="Update" class="btn btn-success" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ./Modal Category -->

        <?php include("includes/footer.php");?>
        <div class="control-sidebar-bg"></div>
    </div>
    <?php include("includes/js.php");?>
<script>
    $(document).ready(function() {

        $(document).on('click', '.edit_data', function() {
            var t_id = $(this).attr("id");
            $.ajax({
                url: "edit_tstm.php",
                method: "POST",
                data: {
                    t_id: t_id
                },
                dataType: "json",
                success: function(data) {
                    $('#name').val(data.name);
                    $('#location').val(data.designation);
                    $('#linkdin_link').val(data.linkdin_link);
                    $('#status').val(data.status);
                    $('#tid').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

    });
$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="es_testimonial";
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
    function delete_prod_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_testimonial.php?id=' + id;
        }
    }

</script>
</body>
</html>