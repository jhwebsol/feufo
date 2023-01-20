<?php include("includes/css.php");?>
<?php if (isset($_POST['submit'])) {
extract($_POST);
$type=mysqli_real_escape_string($conn,$_POST['type']);
$tmp_file = $_FILES['icon']['tmp_name'];
$ext = pathinfo($_FILES["icon"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$gimg = $rand.".".$ext;
move_uploaded_file($tmp_file,"product/image/".$gimg);
$sql="INSERT into es_property_type(types,status) values ('$type','$status')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='property-type.php'</script>";
}
}
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["v_id"];
$sql1 ="UPDATE  es_property_type  SET types='$type',status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from es_property_type where id = '$id'";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
 if($_FILES["icon"]["name"] != ""){
$oname=$_FILES["icon"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["icon"]["tmp_name"];
$path = "product/image/".$resg->id.'908'.'.'.$extension;
$upath = "product/image/".$resg->icon;
unlink($upath);
move_uploaded_file($tn,$path);
 $image = $resg->id.'908'.'.'.$extension;
} else {
  $image = $resg->icon;
}
$sqlup = "UPDATE es_property_type SET  icon='$image' WHERE  id = $resg->id";
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
                <a href="property-type.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Property Type</a>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-6">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">Property Type</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Type </label>
                                        <input type="text" name="type" class="form-control" placeholder="Type">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image </label>
                                        <input type="file" name="img" class="form-control" placeholder="Slug">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select type="text" name="status" class="form-control">
                                            <option>Active</option>
                                            <option>InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
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
                    $('#type').val(data.types);
                    $('#v_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

    });


    function delete_video_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_ptype.php?id=' + id;
        }
    }

</script>

</html>
