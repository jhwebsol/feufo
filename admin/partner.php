<?php include("includes/css.php");  ?>
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
                        <h6 class="m-0 font-weight-bold text-primary">Partner Table</h6>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered example2">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Designation</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Javed</td>
                                    <td><img src="img/testimonial/<?php echo $res['image']; ?>" width="60px"></td>
                                    <td>Manager</td>
                                    <td>
                                        <select class="toggle btn btn-success" data-toggle="toggle" role="button" style="width: 96.65px; height: 37.6px;">
                                            <option for="" class="btn btn-success toggle-on">Active</option>
                                            <option for="" class="btn btn-success toggle-on">InActive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-pencil fa-lg"></i></button>
                                        <a data-toggle="modal" data-target="#deleteModal" href="javascript:;" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Partner Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="" id="" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Designation">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Second social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Second Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Third social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Third Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Four social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Four Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
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
                                    <input type="hidden" name="cat_id" id="cat_id" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="update" id="insert" value="Save" class="btn btn-success" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Partner Form</h4>
                            </div>
                            <form method="post" id="insert_form" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Designation">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Second social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Second Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Third social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Third Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Four social icon</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Four Link</label>
                                            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Link">
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
                    url: ".php",
                    method: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#cat_name').val(data.cat_name);
                        $('#cat_image').val(data.cat_image);
                        $('#cat_id').val(data.id);
                        $('#insert').val("Update");
                        $('#add_data_Modal').modal('show');
                    }
                });
            });
        });

        function delete_cat_by_ID(id, cat_name) {
            if (confirm('Do You Want to Deleting This \nContinue anyway?')) {
                window.location.href = 'delete_category.php?id=' + id + '&cat_name=' + cat_name;
            }
        }
    </script>
</body>

</html>