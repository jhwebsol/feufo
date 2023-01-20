<?php include("includes/css.php");
if (isset($_POST['sumbitss'])) {
extract($_POST);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$title = mysqli_real_escape_string($conn,$_POST['question']);
$content = mysqli_real_escape_string($conn,$_POST['answer']);
$sql_prd="INSERT into faq(title,desp,status,created_date) values ('$title','$content','$status','$date')";
$prd_res=mysqli_query($conn, $sql_prd) or die(mysqli_error());
if($prd_res){
     echo "<script>window.location.href='faq.php'</script>";
 }
}
?> 
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php")?>
        <?php include("includes/sidebar.php")?>
         <div class="content-wrapper">
            <section class="content-header">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create</button>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">FAQ Table</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table class="table table-bordered example2">
                                    <thead>
                                        <tr>
                                            <th width="">Serial</th>
                                            <th width="">Question</th>
                                            <th width="">Answer</th>
                                            <th width="">Status</th>
                                            <th width="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $j=1;
                                        $sql2="SELECT * from faq";
                                        $exe2=mysqli_query($conn,$sql2);
                                        while ($res=mysqli_fetch_array($exe2))
                                        { ?>
                                        <tr>
                                            <td><?php echo $j; $j++; ?></td>
                                            <td><?php echo $res['title']; ?></td>
                                            <td style="overflow-y: auto;width:50%"><?php echo $res['desp']; ?></td>
                                            <td><form method="post" action="" id="FORM_ID">
                                        <select class="toggle btn btn-success nstatus" id="nstatus" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option value="<?= $res['status']; ?>"><?= $res['status']; ?></option>
                                            <option value="Active" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">Active</option>
                                            <option value="Inactive" data-nid="<?= $res['id'];?>" for="" class="btn btn-success toggle-on">InActive</option>
                                          </select></form>
                                            </td>
                                            <td><a href="edit-faq-details.php?id=<?php echo $res['id']; ?>">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-pencil fa-lg"></i></button></a>
                                                <a href="javascript:delete_test_by_ID('<?php echo $res['id'] ?>');" class="ask"><button type="button" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i></button></a>                                                
                                            </td>
                                        </tr><?php } ?> 
                                    </tbody>
                                </table>
                            </div>
                         </div>
                    </div>

                </div>
                <!-- Modal Banner -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">FAQ Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input type="text" name="question" id="question" class="form-control" placeholder="Enter Question">
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Answer</label>
                                           <textarea type="text" name="answer" class="form-control" placeholder="Enter Answer" rows="3"></textarea>
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
                                    <input type="submit" name="sumbitss" id="insert" value="Save" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit FAQ Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input type="text" name="name" id="name" class="form-control" value="Who Are Our Clients?">
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <textarea type="text" class="form-control" placeholder="Answer" rows="3"></textarea> 
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom:10px;">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control">
                                                <option for="">Active</option>
                                                <option for="">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="ban_id" id="ban_id" />
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

        function delete_test_by_ID(id) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_faq.php?id=' + id;
            }
        }

        $(document).ready(function() {

            $(document).on('click', '.edit_data', function() {
                var ban_id = $(this).attr("id");
                $.ajax({
                    url: "edit_banner.php",
                    method: "POST",
                    data: {
                        ban_id: ban_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#name').val(data.name);
                        $('#ban_id').val(data.id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });

        });
    </script>
</body>

</html>