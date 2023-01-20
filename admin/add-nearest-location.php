<?php include("includes/css.php");?>
<?php if (isset($_POST['submit'])) {
extract($_POST);
$tmp_file = $_FILES['image']['tmp_name'];
$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
$rand = md5(uniqid().rand());
$gimg = $rand.".".$ext;
move_uploaded_file($tmp_file,"img/partners/".$gimg);
$sql="INSERT into area(area_name,image) values ('$area_name','$gimg')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='add-nearest-location.php'</script>";
}
}
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["g_id"];
$sql1 ="UPDATE  area  SET area_name='$aname' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
$sqlg = "SELECT * from area where id = $id";
$resultg = mysqli_query($conn,$sqlg) or die(mysqli_error());
$resg = mysqli_fetch_object($resultg);
 if($_FILES["image"]["name"] != ""){
$oname=$_FILES["image"]["name"];
$pos = strrpos($oname, ".");
$extension=substr($oname,$pos+1);
$tn = $_FILES["image"]["tmp_name"];
$path = "img/partners/".$resg->id.'.'.$extension;
$upath = "img/partners/".$resg->image;
unlink($upath);
move_uploaded_file($tn,$path);
 $image = $resg->id.'.'.$extension;
} else {
  $image = $resg->image;
}
$sqlup = "UPDATE area SET  image='$image' WHERE  id = $resg->id";
$resultup = mysqli_query($conn,$sqlup) or die(mysqli_error()); }
}
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <a href="add-nearest-location.php" class="btn btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-body table-responsive">
                         
                    </div>
                </div>
                <!--<div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header">
								<h3 class="box-title">Add Area</h3>
							</div>
							<div class="box-body">
								<form method="post" action="" enctype="multipart/form-data">
									
									<div class="form-group">
										<label>Area Name :</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="text" name="area_name" class="form-control" placeholder="Enter Area Name">
										</div>
									</div> 
									<div class="form-group">
										<label>Image :(Size 255px X 233px)</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-suitcase"></i>
											</div>
											<input type="file" name="image" class="form-control" >
										</div>
									</div> 

									<div class="form-group">
										<div class="input-group">
											<input type="submit" name="submit" class="btn btn-success btn-md" value="Submit">
										</div>
									</div>
								</form>
							</div> 
						</div>
					</div>
				--> 
        <!-- Modal Category -->
        <div id="add_data_Modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Nearest Location</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Location :</label> 
                                    <input type="text" name="aname" id="aname" class="form-control" placeholder="Enter Location">
                                </div>
                            </div>
                             <div class="col-md-12">
                            <div class="form-group">
                                <label> Status</label> 
                                    <select class="form-control">
                                        <option>Active</option>
                                        <option>InActive</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="g_id" id="g_id" />
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
<script language="javascript">
    $(document).ready(function() {

        $(document).on('click', '.edit_data', function() {
            var g_id = $(this).attr("id");
            $.ajax({
                url: "edit_nearest-location.php",
                method: "POST",
                data: {
                    g_id: g_id
                },
                dataType: "json",
                success: function(data) {
                    $('#aname').val(data.area_name);
                    $('#g_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

    });


    function delete_gall_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_nearest-location.php?id=' + id;
        }
    }

</script>
</body>
</html>