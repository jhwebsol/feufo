<?php include("includes/css.php");?>
<?php if (isset($_POST['submit'])) {
extract($_POST);
$sql="INSERT into nearest_location(location,status) values ('$aname','$status')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='nearest-location.php'</script>";
}
}
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["g_id"];
$sql1 ="UPDATE  nearest_location  SET location='$aname',status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){
 }
}
 ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</button>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example1">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sql="select * from nearest_location ";
									$result = mysqli_query($conn, $sql);
                                             $j=1;
									while($res= mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <td><?php echo $j; $j++; ?></td>
                                    <td><?php echo $res['location']; ?></td>
                                    <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                    </td>
                                    <!--<td><img src="img/partners/<?php echo $res['image']; ?>" class="img-responsive" style="width:50px" alt=""> </td>-->
                                    <td>
                                        <button type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-primary edit_data" ><i class="fa fa-pencil fa-lg"></i></button>
                                               

                                        <a href="javascript:delete_ptype_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Nearest Location Form</h4>
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
                                            <select class="form-control" name="status">
                                                <option>Active</option>
                                                <option>InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit" value="Save" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="edit_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Nearest Location</h4>
                            </div>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Location :</label>
                                            <input type="text" name="aname" id="location" class="form-control" placeholder="Enter Location">
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
</body>
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
                    $('#location').val(data.location);
                    $('#status').val(data.status);
                    $('#g_id').val(data.id);
                    $('#insert').val("Update");
                    $('#edit_data_Modal').modal('show');
                }
            });
        });
     });

$(document).ready(function(){
$('.nstatus').on('change', function(){
    var nstatus = $(this).val();
    var nid = $(this).find(':selected').data('nid');
    var dbdetails="nearest_location";
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
    function delete_ptype_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_nearest-location.php?id=' + id;
        }
    }
</script>

</html>