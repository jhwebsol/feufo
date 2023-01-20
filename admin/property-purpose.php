<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);  
 date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
$sql="INSERT into property_purpose(purpose,status,created_date) values ('$purpose','$status','$date')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res)
    {
        echo "
            <script>
                alert('Property Purpose created successfully...');
                location.replace('property-purpose.php');
            </script>
        ";
    }

}

if(isset($_POST['update']))
{
    //var_dump($_FILES);exit();
extract($_POST);
$id=$_POST["cat_id"];
$sql1="UPDATE property_purpose SET purpose='$purpose',status='$status'  WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
if($res){ echo "
            <script>location.replace('property-purpose.php');
            </script>
        ";
    }

}
 ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</button>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Property Purpose</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table class="table table-bordered example2">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$sql="select * from property_purpose";
									$result = mysqli_query($conn, $sql);
									 $j=1;
									while($res= mysqli_fetch_array($result))
									{ 
									?>
                                        <tr>
                                            <td><?php echo $j; $j++; ?></td>
                                            <td><?php echo $res['purpose']; ?></td>
                                            <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                            </td>
                                            <td>
                                                <a href="view-agent-property.php" class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
                                                <button type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-primary edit_data" ><i class="fa fa-pencil fa-lg"></i></button>
                                                <a href="javascript:delete_ptype_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Property Purpose Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Property Purpose</label>
                                            <input type="text" name="purpose"  class="form-control" placeholder="Property Purpose ">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option for="">Active</option>
                                                <option for="">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit" id="insert" value="Insert" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Property Purpose</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Property Purpose</label>
                                            <input type="text" name="purpose" id="purpose" class="form-control" placeholder="Property Purpose ">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option>Active</option>
                                                <option>InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cat_id" id="cat_id" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="update" id="insert" value="Submit" class="btn btn-success" />
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
            var cat_id = $(this).attr("id");
            $.ajax({
                url: "edit_property-purpose.php",
                method: "POST",
                data: { cat_id: cat_id
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#purpose').val(data.purpose);
                    $('#cat_id').val(data.id);
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
    var dbdetails="property_purpose";
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
    function delete_cat_by_ID(id) {
        if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
            window.location.href = 'delete_property-purpose.php?id=' + id;
        }
    }
</script>

</html>