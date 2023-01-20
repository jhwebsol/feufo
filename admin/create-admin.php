<?php include("includes/css.php");
if (isset($_POST['submit'])) {
extract($_POST);
  $password = md5($_POST["password"]); 
$sql="INSERT into es_admin_user(name,username,password,status) values ('$name','$username','$password','$status')";
$res=mysqli_query($conn,$sql) or die(mysqli_error());
if($res){
     echo "<script>window.location.href='admin.php'</script>";
}
}
?> 

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include("includes/header.php");?>
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <section class="content-header">
                <a href="admin.php" class="btn btn-primary"><i class="fa fa-list fa-lg" aria-hidden="true"></i> All Admin</a>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-6">
                    <div class="box box-danger gurnew">
                        <div class="box-header with-border">
                            <h3 class="box-title">Admin</h3>
                        </div>
                        <div class="box-body table-responsive">
                            <form method="post" action="" enctype="multipart/form-data">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name </label>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Username/Email </label>
                                        <input type="email" name="username" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
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
