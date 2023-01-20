<?php include("includes/css.php");?>
<?php if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["v_id"];
$sql1 ="UPDATE  skill_detail  SET skill_name='$sname',status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from skill_detail where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
 if($_FILES["img"]["name"] != ""){
$oname=$_FILES["img"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["img"]["tmp_name"];
$path = "emp/skill/".$resg->id.'908'.'.'.$extension;
$upath = "emp/skill/".$resg->skill_image;
unlink($upath);
move_uploaded_file($tn,$path);
$image = $resg->id.'908'.'.'.$extension;
} else {
$image = $resg->skill_image;
}
$sqlup ="UPDATE skill_detail SET skill_image='$image' WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error());  
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
                <a href="add-skill.php" class="btn btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example1">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Skill Name</th>
                                    <th>Skill Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
									$sql="select * from skill_detail";
									$result = mysqli_query($conn, $sql); $j=1;
									while($res= mysqli_fetch_array($result)){ 
									?>
                                <tr>
                                    <td><?php echo $j; $j++; ?></td>
                                    <td><?php echo $res['skill_name']; ?></td>
                                    <td><img src="emp/skill/<?php echo $res['skill_image']; ?>" width="40px"></td>
                                    <td><?php echo $res['status']; ?></td>
                                    <td>
                                        <a href="#" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-md btn-success edit_data"><i class="fa fa-pencil fa-lg"></i></a>
                                        &nbsp; <a  href="javascript:delete_ptype_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
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
                        <h4 class="modal-title">Update Skills</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Skills Name</label>
                                    <input type="text" name="sname" id="sname" class="form-control" placeholder="Enter Type">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="img" class="form-control" placeholder="Enter Type">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option>Active</option>
                                        <option>InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="v_id" id="v_id" />
                        <div class="modal-footer">
                            <input type="submit" name="update" id="insert" value="Update" class="btn btn-success" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php")?>
    </div>
    <?php include("includes/js.php")?>
</body>
<script language="javascript">
    $(document).ready(function() {
        $(document).on('click', '.edit_data', function() {
            var p_id = $(this).attr("id");
            $.ajax({
                url: "edit_ptype.php",
                method: "POST",
                data: {
                    p_id: p_id
                },
                dataType: "json",
                success: function(data) {
                    $('#sname').val(data.skill_name);
                    $('#status').val(data.status);
                    $('#v_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

    });
    function delete_ptype_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_skill.php?id=' + id;
        }
    }
</script>

</html>