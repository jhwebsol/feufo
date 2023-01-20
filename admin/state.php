<?php include("includes/css.php");  ?>
<?php if (isset($_POST['submit'])) {
extract($_POST);
$sql="INSERT into aminities(aminity,status) values ('$aminity','$status')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='aminities.php'</script>";
} 
}
if(isset($_POST['update']))
{ extract($_POST);
$id=$_POST["s_id"];
$sql1 ="UPDATE  state  SET country_id='$country_id',state_name='$state',status='$status' WHERE id='$id'"; 
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
                <a href="create-state.php" class="btn btn-md btn-primary"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</a>
            </section>
            <section class="content">
                <div class="box box-danger gurnew">
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">State Table</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example2">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sql="select state.*,country.country_name from state join country on state.country_id=country.id";
                                    $result = mysqli_query($conn, $sql);
                                             $j=1;
                                    while($res= mysqli_fetch_array($result)){ ?>
                             
                                <tr>
                                   <td><?php echo $j; $j++; ?></td>
                                    <td><?php echo $res['country_name']; ?></td>
                                    <td><?php echo $res['state_name']; ?></td>
                                    <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                    </td>
                                    <td>
                                        <button type="button" name="edit" value="Edit" id="<?php echo $res["id"]; ?>" class="btn btn-primary edit_data" ><i class="fa fa-pencil fa-lg"></i></button>
                                               

                                        <a href="javascript:delete_ct_by_ID('<?php echo $res['id'] ?>');" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                                    
                                    </td>
                                </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit State Table</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" name="country_id" id="country_id" >
                                             <?php $sql="select * from country ";
                                    $result = mysqli_query($conn, $sql);
                                    while($res= mysqli_fetch_array($result)){ ?>
                                            <option value="<?php echo $res['id']; ?>"><?php echo $res['country_name']; ?></option><?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" id="state_name" class="form-control" placeholder="State Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="toggle btn btn-success" data-toggle="toggle" name="status" id="status" role="button" style="width: 96.65px; height: 37.6px;">   
                                              <option value="Active" class="btn btn-success toggle-on">Active</option>
                                              <option value="Inactive" class="btn btn-success toggle-on">InActive</option>
                                        </select>
                                    </div>

                                    <input type="hidden" name="s_id" id="s_id" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="update" id="insert" value="Insert" class="btn btn-success" />
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
                var s_id = $(this).attr("id");
                $.ajax({
                    url: "edit_state.php",
                    method: "POST",
                    data: {
                        s_id: s_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#country_id').val(data.country_id);
                        $('#state_name').val(data.state_name);
                        $('#status').val(data.status);
                        $('#s_id').val(data.id);
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
    var dbdetails="state";
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
        function delete_ct_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_state.php?id=' + id;
            }
        }
    </script>
</body>

</html>
