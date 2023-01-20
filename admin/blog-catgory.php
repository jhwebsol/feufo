<?php include("includes/css.php"); 
if (isset($_POST['submit'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$sql="INSERT into blog_category(bc_name,status,created_date) values ('$cname','$status','$date')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='blog-catgory.php'</script>";
} }
if(isset($_POST['update']))
{
extract($_POST);
$id=$_POST["cat_id"];
$sql1 ="UPDATE  blog_category  SET bc_name='$bc_name',status='$status' WHERE id='$id'"; 
$res=mysqli_query($conn,$sql1) or die(mysqli_error());
}
 ?>
<style>
    .modal-content .form-group {
        margin-bottom: 0px;
    }

    .modal-content .form-group label {
        margin-top: 5px;
        margin-bottom: 0px;
    }
</style>

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
                    <div class="box-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Blog Category Table</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example2">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $sql_tsm=mysqli_query($conn,"select * from blog_category order by id DESC "); $j=1; while($restsm= mysqli_fetch_array($sql_tsm)){ ?>
                                <tr>
                                    <td><?php echo $j; $j++; ?></td>
                                    <td><?php echo $restsm['bc_name']; ?></td>
                                    <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $restsm['status']; ?>"><?= $restsm['status']; ?></option>
                                            <option value="Active" data-nid="<?= $restsm['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $restsm['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                        </select></form>
                                    </td>
                                    <td><button type="button" name="edit" id="<?= $restsm['id'];?>" class="btn btn-primary edit_data"><i class="fa fa-pencil fa-lg"></i></button>
                                        <a href="javascript:delete_bg_by_ID('<?php echo $res['id']; ?>');" class="ask"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Blog Category Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="cname" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                     <!--  <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" name="" id="" class="form-control" placeholder="Slug">
                                        </div>
                                    </div> -->
                                    
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"><input type="submit" name="submit" value="Submit" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Blog Category Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="bc_name" id="bc_name" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                     
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cat_id" id="cat_id" />
                                </div>
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
                var cat_id = $(this).attr("id");
                $.ajax({
                    url: "edit_bcat.php",
                    method: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#bc_name').val(data.bc_name);
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
    var dbdetails="blog_category";
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
        function delete_bg_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_bcategory.php?id=' + id;
            }
        }
    </script>
</body>

</html>